<?php
/**
 * Created by PhpStorm.
 * User: DONG
 * Date: 10/29/2018
 * Time: 3:47 PM
 */
require_once '../includes/core.php';

switch ($act){
    case 'update_media':
        $post       = $db->from(_TABLE_POST)->where('post_id' , $id)->fetch_first();
        if(!$post){
            $array['resposive'] = 404;
            $array['message'] = 'Bài Viết Không Tồn Tại';
            echo json_encode($array);
            break;
        }
        header('location:'.$funcion->getUrlPost($id));
        break;
    case 'post_video':
        require_once '../includes/class.chatfuel.php';
        $chatfuel       = new chatfuel();
        $post_title     = (isset($_REQUEST['post_title'])      && !empty($_REQUEST['post_title']))    ? trim($_REQUEST['post_title'])    : '';
        if(strlen($post_title) == 1) {$post_title = '';}
        $post_content   = (isset($_REQUEST['post_content'])    && !empty($_REQUEST['post_content']))  ? trim($_REQUEST['post_content'])  : '';
        if(strlen($post_content) == 1) {$post_content= '';}
        $post_share     = (isset($_REQUEST['post_share'])      && !empty($_REQUEST['post_share']))    ? trim($_REQUEST['post_share'])    : '';
        preg_match('/http:\/\/v.douyin.com\/(.*)\//m', $post_share, $match);
        $post_share     = $match[0];
        $post_hot       = (isset($_REQUEST['post_hot'])        && !empty($_REQUEST['post_hot']))      ? trim($_REQUEST['post_hot'])      : '';
        $post_category  = (isset($_REQUEST['post_category'])   && !empty($_REQUEST['post_category'])) ? trim($_REQUEST['post_category']) : '';
        if(!$post_share){
            echo $chatfuel->sendText('Không Tìm Thấy Đường Link ...');
            break;
        }
        $data = array(
            'post_name'         => $post_title,
            'post_content'      => $post_content,
            'post_type'         => 'video',
            'post_users'        => 1,
            'post_keyword'      => 'video hot, video hay nhat, video danh cho gioi tre',
            'post_description'  => 'video hot, video hay nhat, video danh cho gioi tre',
            'post_source'       => $post_share,
            'post_store'        => '',
            'post_status'       => 1,
            'post_show'         => $post_hot,
            'post_view'         => 0,
            'post_url'          => $funcion->randomString(15),
            'post_time'         => $config->getTimeNow()
        );
        $id = $db->insert(_TABLE_POST, $data);
        if($id){
            // Add Category
            $post_category = explode(',', $post_category);
            foreach ($post_category AS $category){
                $data = array(
                    'group_type'    =>  'post',
                    'group_index'   =>  $id,
                    'group_value'   =>  $category,
                    'group_users'   =>  1,
                    'group_time'    =>  $config->getTimeNow()
                );
                // Insert To Group
                $db->insert(_TABLE_GROUP, $data);
            }
            echo $chatfuel->sendText('Thêm Bài Viết Thành Công, Xem bài viết tại '._URL_HOME.'/api/?act=update_media&id='.$id);
            break;
        }
        break;
}