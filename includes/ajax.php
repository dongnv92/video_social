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
require 'simple_html_dom.php';

switch ($act){
    case 'get_auto_video':
        switch ($funcion->urlToDomain($url)){
            case 'v.douyin.com':
                $ch = curl_init($url);
                curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch);
                curl_close($ch);
                $html = str_get_html($result);
                $url = $html->find('a', 0)->href;
                $ch = curl_init($url);
                curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.15');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $result = curl_exec($ch);
                curl_close($ch);
                $html   = str_get_html($result);
                $script = $html->find('script',7);
                $script = explode('"', $script);
                $video  = $script[1];
                $images = $script[3];
                $author = $html->find("title", 0)->plaintext;
                $array  = array('images' => $images, 'video' => $funcion->tiktok_getUrlVideoChina($url), 'author' => $author);
                break;
            case 'vt.tiktok.com':
                $html   = file_get_html($url);
                $images = $html->find("meta[property=og:image]", 0)->content;
                $video  = $html->find("meta[property=og:video:url]", 0)->content;
                $author = $html->find("title", 0)->plaintext;
                $author = str_replace(' on Tik Tok: TikTok', '', $author);
                $array  = array('images' => $images, 'video' => $video, 'author' => $author);
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
}