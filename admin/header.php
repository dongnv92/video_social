<?php
/**
 * Created by PhpStorm.
 * User: Dong
 * Date: 19/09/2018
 * Time: 22:45
 */
require_once '../includes/core.php';
$admin_title = isset($admin_title) && !empty($admin_title) ? $admin_title : 'VIDEO';
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="author" content="DONG NGUYN">
    <title><?php echo $admin_title;?></title>
    <link rel="apple-touch-icon" href="../media/images/system/favicon.ico">
    <link rel="shortcut icon" type="image/x-icon" href="../media/images/system/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
    <?php foreach ($css_plus AS $css){?>
    <link rel="stylesheet" type="text/css" href="<?php echo $css;?>">
    <?php }?>
    <script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
</head>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu" data-col="2-columns">
<!-- fixed-top-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item">
                    <a class="navbar-brand" href="<?php echo _URL_ADMIN;?>">
                        <img class="brand-logo" alt="modern admin logo" src="../media/images/system/logo.png">
                        <h3 class="brand-text">VIDEO SOCIAL</h3>
                    </a>
                </li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
                    <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>
                        <div class="search-input">
                            <input class="input" type="text" placeholder="Tìm kiếm ...">
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <span class="mr-1">Hi,<span class="user-name text-bold-700"><?php echo $user['users_name'];?></span></span>
                            <span class="avatar avatar-online"><img src="<?php echo 'images/avatar.png'; ?>" alt="avatar"><i></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="ft-user"></i> Xem trang cá nhân</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="la la-gears"></i> Sửa trang cá nhân</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="ft-power"></i> Thoát</a>
                        </div>
                    </li>
                    <li class="dropdown dropdown-notification nav-item">
                        <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                            <i class="ficon ft-bell"></i>
                            <?php echo $notification > 0 ? '<span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">'.$notification.'</span>' : '';?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <h6 class="dropdown-header m-0"><span class="grey darken-2">Thông báo</span></h6>
                                <span class="notification-tag badge badge-default badge-danger float-right m-0"></span>
                            </li>
                            <li class="scrollable-container media-list w-100">

                            </li>
                            <!--<li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all notifications</a></li> Đọc tất cả thông báo-->
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header">
                <span data-i18n="nav.category.layouts">Nội dung</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
            </li>
            <li class=" nav-item">
                <a href="#"><i class="ft-folder"></i><span class="menu-title">Chuyên Mục</span></a>
                <ul class="menu-content">
                    <li <?php echo ($admin_module == 'category' && $act == 'list') ? 'class="active"' : '';?>><a class="menu-item" href="<?php echo _URL_ADMIN;?>/category.php?act=list">Danh sách chuyên mục</a></li>
                    <li <?php echo ($admin_module == 'category' && $type == 'video') ? 'class="active"' : '';?>><a class="menu-item" href="<?php echo _URL_ADMIN;?>/category.php?type=video">Video</a></li>
                </ul>
            </li>
            <li class=" nav-item">
                <a href="#"><i class="ft-edit"></i><span class="menu-title" data-i18n="nav.page_layouts.main">Bài viết</span></a>
                <ul class="menu-content">
                    <li <?php echo ($admin_module == 'post' && !$act && $type == 'video') ? 'class="active"' : '';?>><a class="menu-item" href="<?php echo _URL_ADMIN;?>/post.php?type=video">Danh sách Video</a></li>
                    <li <?php echo ($admin_module == 'post' && $act == 'add' && $type == 'video') ? 'class="active"' : '';?>><a class="menu-item" href="<?php echo _URL_ADMIN;?>/post.php?act=add&type=video">Thêm Video</a></li>
                </ul>
            </li>
            <li class=" navigation-header"><span data-i18n="nav.category.layouts">Điều hướng</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i></li>
            <li class=" nav-item"><a href="<?php echo _URL_ADMIN;?>"><i class="la la-coffee"></i><span class="menu-title">Quản trị</span></a></li>
            <li class=" nav-item"><a href="<?php echo _URL_LOGOUT;?>"><i class="la la-long-arrow-left"></i><span class="menu-title">Đăng xuất</span></a></li>
        </ul>
    </div>
</div>
<div class="app-content content">
    <div class="content-wrapper">
