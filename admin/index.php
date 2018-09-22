<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 19/09/2018
 * Time: 20:34
 */
require_once '../includes/core.php';
// Kiểm tra đã đăng nhập chưa
if(!$user){ $funcion->redirectUrl(_URL_LOGIN);exit();}

$admin_title = 'Trang quản trị';
require_once 'header.php';

require_once 'footer.php';
