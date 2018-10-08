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
                $images         = explode('/', $url);
                $array['images']= $images[5];
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
        switch ($type){
            case 'delete':
                $array = array();
                $array['resposive'] = $funcion->deletePost($id);
                echo json_encode($array);
                break;
        }
        break;
    case 'download':
        $url = $_GET['url'];
        header("Content-Type: application/octet-stream");
        header("Content-Transfer-Encoding: Binary");
        header('Content-disposition: attachment; filename="'. $funcion->randomString(12) .'.mp4"');
        echo readfile($url);
        break;
    case 'video_load':
        $db->select('post_id')->from(_TABLE_POST);
        $db->where(array('post_type' => 'video', 'post_show' => 1, 'post_status' => 1));
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
}
