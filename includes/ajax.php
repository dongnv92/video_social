<?php
/**
 * Created by PhpStorm.
 * User: DONG
 * Date: 17/09/2018
 * Time: 09:33
 * http://v.douyin.com/dmhfjJ/
 * https://1drv.ms/v/s!AvOWg2YnpZYMhaMX-IXoqZ3RPx8Gow
 */
require_once 'core.php';
switch ($act){
    case 'get_auto_video':
        switch ($funcion->urlToDomain($url)){
            case 'v.douyin.com':
                $data   = $funcion->tiktok_getUrlVideoChina_v2($url);
                $array  = array('images' => $data['images'], 'video' => $data['video'], 'download' => $data['download']);
                break;
            case 'vt.tiktok.com':
                $data   = $funcion->tiktok_getUrlVideoVietNam_v2($url);
                $array  = array('images' => $data['images'], 'video' => $data['video'], 'download' => $data['download']);
                break;
            case '1drv.ms':
                $html   = file_get_html($url);
                $url    = $html->find('meta [http-equiv=refresh]', 0)->content;
                $url    = str_replace(array('0;url=', '&#58;','&#63;','&#61;','&#33;','&#38;','&#37;'), array('', ':','?','=','!','&','%') , $url);
                $url    = parse_url($url);
                parse_str($url['query'], $query);
                $down   = 'https://onedrive.live.com/download?cid='. $query['cid'] .'&resid='. $query['id'] .'&authkey='.$query['authkey'];
                $array  = array('url_direct' => $down);
                break;
            case 'youtube.com':
                $url    = parse_url($url);
                parse_str($url['query'], $query);
                $array['images'] = 'https://img.youtube.com/vi/'. $query['v'] .'/0.jpg';
                break;
            case 'drive.google.com':
                $drive = $funcion->getGoogleDrive($url);
                $array['images'] = $drive['images'];
                break;
            case 'facebook.com':
                $facebook = $funcion->getFacebookVideo($url);
                $array['images']        = $facebook['images'];
                $array['download']      = $facebook['video'];
                $array['title']         = $facebook['title'];
                $array['content']       = $facebook['description'];
                $array['post_store']    = $url;
                break;
            default:
                echo json_encode(array('error' => 'Empty URL'));
                break;
        }
        $post_title         = (isset($_REQUEST['post_title'])  && !empty($_REQUEST['post_title']))    ? $_REQUEST['post_title']      : false;
        $array['urlSlug']   = $funcion->makeSlug($post_title);
        echo json_encode($array);
        break;
    case 'category':
        switch ($type){
            case 'delete':
                $array = array();
                $array['resposive'] = $funcion->deleteCategory($id);
                echo json_encode($array);
                break;
            case 'load_list':
                $type_cate      = $_REQUEST['type_cate'];
                $type_display   = $_REQUEST['type_display'];
                $funcion->showCategories($db->select('category_id, category_name, category_parent')->from(_TABLE_CATEGORY)->where(array('category_type' => $type_cate))->fetch(), 0, '',$type_display);
                break;
        }
        break;
    case 'post':
        switch ($type) {
            case 'delete':
                $array = array();
                $array['resposive'] = $funcion->deletePost($id);
                echo json_encode($array);
                break;
            case 'update_show':
                $post_show = $_REQUEST['post_show'];
                if ($db->where(array('post_id' => $id))->update(_TABLE_POST, array('post_show' => $post_show))->execute()) {
                    $array['resposive'] = 200;
                } else {
                    $array['resposive'] = 400;
                }
                echo json_encode($array);
                break;
            case 'update_media':
                // kiểm tra xe bài viết có tồn tại không
                $post       = $db->from(_TABLE_POST)->where('post_id' , $id)->fetch_first();
                if(!$post){
                    $array['resposive'] = 404;
                    $array['message'] = 'bài Viết Không Tồn Tại';
                    echo json_encode($array);
                    break;
                }
                // kiểm tra xem bài viết đã có video chưa
                $db->select('media_id')->from(_TABLE_MEDIA)->where(array('media_parent' => $id, 'media_type' => 'images'))->execute();
                $post_images    = $db->affected_rows;
                $db->select('media_id')->from(_TABLE_MEDIA)->where(array('media_parent' => $id, 'media_type' => 'video'))->execute();
                $post_video     = $db->affected_rows;
                $get_video      = $funcion->tiktok_getUrlVideoChina_v2($post['post_source']);

                if($post_images == 0){
                    // Save Images To Host
                    $file_name_images = $config->getTimeNow().'_'. $user['users_id'] .'_'. $funcion->randomString(10).'.jpg';
                    if(copy($get_video['images'], '../'._PATH_IMAGES_POST.'/'.$file_name_images)){
                        $data_images = array(
                            'media_type'    =>  'images',
                            'media_name'    =>  $file_name_images,
                            'media_source'  =>  _PATH_IMAGES_POST.'/'.$file_name_images,
                            'media_store'   =>  'local',
                            'media_users'   =>  1,
                            'media_parent'  =>  $id,
                            'media_time'    =>  $config->getTimeNow()
                        );
                        if(!$db->insert(_TABLE_MEDIA, $data_images)){
                            $array['resposive'] = 400;
                            echo json_encode($array);
                            break;
                        }
                    }else{
                        $array['resposive'] = 401;
                        echo json_encode($array);
                        break;
                    }
                }

                if($post_video == 0){
                    // Save Video To Host
                    $file_name_video = $config->getTimeNow().'_1_'. $funcion->randomString(16).'.mp4';
                    if(copy($get_video['download'], '../'._PATH_VIDEO_POST.'/'.$file_name_video)){
                        $data_video = array(
                            'media_type'    =>  'video',
                            'media_name'    =>  $file_name_video,
                            'media_source'  =>  _PATH_VIDEO_POST.'/'.$file_name_video,
                            'media_store'   =>  'local',
                            'media_users'   =>  1,
                            'media_parent'  =>  $id,
                            'media_time'    =>  $config->getTimeNow()
                        );
                        if(!$db->insert(_TABLE_MEDIA, $data_video)){
                            $array['resposive'] = 400;
                            $array['message']   = 'Error Database';
                            echo json_encode($array);
                            break;
                        }
                    }else{
                        $array['resposive'] = 401;
                        $array['message']   = 'Error Copy';
                        echo json_encode($array);
                        break;
                    }
                }
                $array['resposive'] = 200;
                $array['message']   = 'Thêm Media Thành Công';
                $array['images']    = _URL_HOME.'/'._PATH_IMAGES_POST.'/'.$file_name_images;

                echo json_encode($array);
                break;
            default:
                echo json_encode(array('response' => 'default page'));
                break;
        } // End Switch Type
        break;
    case 'download':
        $url = $_GET['url'];
        header("Content-Type: application/octet-stream");
        header("Content-Transfer-Encoding: Binary");
        header('Content-disposition: attachment; filename="'. $funcion->randomString(12) .'.mp4"');
        echo readfile($url);
        break;
    case 'video_load':
        $sort = isset($_GET['sort']) ? $_GET['sort'] : '';
        // Where
        $where = array();
        $where['post_type']     = 'video';
        $where['post_show']     = 1;
        if(!$sort){
        $where['post_status']   = 1;
        }
        // Where

        $db->select('post_id')->from(_TABLE_POST);
        $db->where($where);
        $db->where('post_id <', $_GET['last_id']);
        $db->limit($_GET['limit']);
        $db->order_by('post_id', 'DESC');
        foreach ($db->fetch() AS $row){
            echo $funcion->getPostDetailList($row['post_id']);
        }
        break;
    case 'downloadmp4':
        header("Content-Type: application/octet-stream");
        header("Content-Transfer-Encoding: Binary");
        header('Content-disposition: attachment; filename="'. time() .'.MP4"');
        readfile($url);
        break;
    case 'send_email':
        echo file_get_contents('http://112.78.11.14/send_email/ajax.php?act=get_list_email&email_top=2&type=rand');
        break;
}
