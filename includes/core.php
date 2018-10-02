<?php
/**
 * Created by PhpStorm.
 * User: DONG
 * Date: 19/09/2018
 * Time: 15:35
 */
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Ho_Chi_Minh');
require 'simple_html_dom.php';
require_once 'class.mysqli.db.php';
require_once 'class.config.php';
require_once 'function.php';
define('_URL_HOME','http://localhost/dong/video_social');
//define('_URL_HOME','http://192.168.0.103/dong/video_social');
define('_URL_LOGIN',_URL_HOME.'/login');
define('_URL_LOGOUT',_URL_HOME.'/logout');
define('_URL_ADMIN',_URL_HOME.'/admin');
define('_URL_BACK', isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : _URL_ADMIN);
define('_URL_STYLE', _URL_HOME.'/style/social');
define('_TABLE_USERS','social_users');
define('_TABLE_CATEGORY','social_category');
define('_TABLE_POST','social_post');
define('_TABLE_MEDIA','social_media');
define('_TABLE_GROUP','social_group');
define('_PATH_IMAGES_POST','media/images/post');
define('_CONFIG_PLAYER_STORE','tiktok');

define('_DB_HOST','localhost');
define('_DB_USERNAME','root');
define('_DB_PASSWORD','');
define('_DB_DATABASE','social');
$db     = new Database(_DB_HOST, _DB_USERNAME,_DB_PASSWORD,_DB_DATABASE);
$config = new config();
$funcion= new myFunction();

/** Kiểm tra tồn tại của tên đăng nhập và mật khẩu  */
if ($_SESSION['user'] && $_SESSION['pass']) {
    $db->from(_TABLE_USERS);
    $db->where(array('users_id' => $_SESSION['user'], 'users_password' => $_SESSION['pass']));
    $user = $db->fetch_first();
    if(!$user){
        unset ($_SESSION['user']);
        unset ($_SESSION['pass']);
        setcookie('user', '');
        setcookie('pass', '');
    }
}

$submit = (isset($_POST['submit'])  && !empty($_POST['submit']))    ? trim($_POST['submit']): false;
$id     = (isset($_REQUEST['id'])   && !empty($_REQUEST['id']))     ? (int) $_REQUEST['id'] : false;
$act    = (isset($_REQUEST['act'])  && !empty($_REQUEST['act']))    ? $_REQUEST['act']      : false;
$type   = (isset($_REQUEST['type']) && !empty($_REQUEST['type']))   ? $_REQUEST['type']     : false;
$url    = (isset($_REQUEST['url'])  && !empty($_REQUEST['url']))    ? trim($_REQUEST['url']): false;

