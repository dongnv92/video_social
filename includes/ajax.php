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
            default:
                echo json_encode(array('error' => 'Empty URL'));
                break;
        }
        $post_title    = (isset($_REQUEST['post_title'])  && !empty($_REQUEST['post_title']))    ? $_REQUEST['post_title']      : false;
        $array['urlSlug'] = $funcion->makeSlug($post_title);
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
    case 'video_grid':
        $db->select()->from(_TABLE_POST);
        $db->where(array('post_type' => 'video', 'post_show' => 1));
        $db->limit($_GET['limit'], $_GET['offset']);
        $db->order_by('post_id', 'DESC');
        foreach ($db->fetch() AS $row){
            ?>
            <div class="card bg-instant text-white">
                <img class="card-img" src="<?php echo $funcion->getMediaPost($row['post_id']);?>">
                <div class="card-img-overlay bg-over">
                    <a class="link-over" href="<?php echo $funcion->getUrlPost($row['post_id']);?>"></a>
                    <div class="card-like">
                        <a href="<?php echo $funcion->getUrlPost($row['post_id']);?>" >
                            <div class="heartguest"></div>
                        </a>
                        <div class="card-count" id="likeCount16">0</div>
                    </div>
                    <h4 class="bottom-txt">
                        <?php echo $row['post_name'];?>
                    </h4>
                    <a class="author" href="#">
                        <img class="avatar-sm img-fluid rounded-circle" src="<?php echo $funcion->getDetailUser($row['post_users'], 'users_avatar');?>">
                        <span class="align-middle"><?php echo $funcion->getDetailUser($row['post_users'], 'users_name');?></span>
                    </a>
                    <small class="text-muted card-date"><?php echo $config->getTimeView($row['post_time']);?></small>
                </div>
            </div>
            <?php
        }
        break;
    case 'downloadmp4':
        header("Content-Type: application/octet-stream");
        header("Content-Transfer-Encoding: Binary");
        header('Content-disposition: attachment; filename="'. time() .'.MP4"');
        readfile($url);
        break;
}
