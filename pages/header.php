<?php
/**
 * Created by PhpStorm.
 * User: DONG
 * Date: 01/10/2018
 * Time: 11:40
 */
//require_once '../includes/core.php';
$header['title'] = $header['title'] ? $header['title'] : 'Trang Chủ';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $header['title'];?></title>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="apple-touch-icon" href="<?php echo _URL_HOME;?>/media/images/system/favicon.ico">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo _URL_HOME;?>/media/images/system/favicon.ico">
    <!-- Main Font -->
    <script src="<?php echo _URL_STYLE;?>/js/webfontloader.min.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ['Roboto:300,400,500,700:latin']
            }
        });
    </script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo _URL_STYLE;?>/Bootstrap/dist/css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="<?php echo _URL_STYLE;?>/Bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo _URL_STYLE;?>/Bootstrap/dist/css/bootstrap-grid.css">
    <!-- Main Styles CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo _URL_STYLE;?>/css/main.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo _URL_STYLE;?>/css/fonts.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo _URL_STYLE;?>/player/build/mediaelementplayer.min.css">
    <script src="<?php echo _URL_STYLE;?>/js/jquery-3.2.1.js"></script>
    <style>
        .facebook-responsive {
            overflow:hidden;
            padding-bottom:56.25%;
            position:relative;
            height:0;
        }

        .facebook-responsive iframe {
            left:0;
            top:0;
            height:100%;
            width:100%;
            position:absolute;
        }
    </style>
</head>
<body>
<!-- Fixed Sidebar Left -->
<div class="fixed-sidebar">
    <div class="fixed-sidebar-left sidebar--small" id="sidebar-left">
        <a href="<?=_URL_HOME?>" class="logo">
            <div class="img-wrap">
                <img src="<?=_URL_HOME?>/media/images/system/logo.png" alt="Xôi Dừa">
            </div>
        </a>
        <div class="mCustomScrollbar" data-mcs-theme="dark">
            <ul class="left-menu">
                <li>
                    <a href="#" class="js-sidebar-open">
                        <svg class="olymp-menu-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="OPEN MENU">
                            <use xlink:href="<?=_URL_STYLE?>/svg-icons/sprites/icons.svg#olymp-menu-icon"></use>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right"   data-original-title="NEWSFEED">
                            <use xlink:href="<?=_URL_STYLE?>/svg-icons/sprites/icons.svg#olymp-newsfeed-icon"></use>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="FAV PAGE">
                            <use xlink:href="<?=_URL_STYLE?>/svg-icons/sprites/icons.svg#olymp-star-icon"></use>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1">
        <a href="02-ProfilePage.html" class="logo">
            <div class="img-wrap">
                <img src="<?=_URL_HOME?>/media/images/system/logo.png" alt="Xôi Dừa">
            </div>
            <div class="title-block">
                <h6 class="logo-title">Xôi Dừa</h6>
            </div>
        </a>
        <div class="mCustomScrollbar" data-mcs-theme="dark">
            <ul class="left-menu">
                <li>
                    <a href="#" class="js-sidebar-open">
                        <svg class="olymp-close-icon left-menu-icon">
                            <use xlink:href="<?=_URL_STYLE?>/svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                        </svg>
                        <span class="left-menu-title">Collapse Menu</span>
                    </a>
                </li>
                <li>
                    <a href="03-Newsfeed.html">
                        <svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right"   data-original-title="NEWSFEED">
                            <use xlink:href="<?=_URL_STYLE?>/svg-icons/sprites/icons.svg#olymp-newsfeed-icon"></use>
                        </svg>
                        <span class="left-menu-title">Newsfeed</span>
                    </a>
                </li>
                <li>
                    <a href="16-FavPagesFeed.html">
                        <svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="FAV PAGE">
                            <use xlink:href="<?=_URL_STYLE?>/svg-icons/sprites/icons.svg#olymp-star-icon"></use>
                        </svg>
                        <span class="left-menu-title">Fav Pages Feed</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- ... end Fixed Sidebar Left -->


<!-- Fixed Sidebar Left Responsive -->
<div class="fixed-sidebar fixed-sidebar-responsive">
    <div class="fixed-sidebar-left sidebar--small" id="sidebar-left-responsive">
        <a href="#" class="logo js-sidebar-open">
            <img src="<?=_URL_HOME?>/media/images/system/logo.png" alt="Xôi Dừa">
        </a>
    </div>

    <div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1-responsive">
        <a href="#" class="logo">
            <div class="img-wrap">
                <img src="<?=_URL_HOME?>/media/images/system/logo.png" alt="Xôi Dừa">
            </div>
            <div class="title-block">
                <h6 class="logo-title">Xôi Dừa</h6>
            </div>
        </a>

        <div class="mCustomScrollbar" data-mcs-theme="dark">
            <?php if($user) {?>
            <div class="control-block">
                <div class="author-page author vcard inline-items">
                    <div class="author-thumb">
                        <img alt="author" width="50" height="50" src="<?=_URL_HOME?>/media/images/system/avatar.png" class="avatar">
                        <span class="icon-status online"></span>
                    </div>
                    <a href="02-ProfilePage.html" class="author-name fn">
                        <div class="author-title">
                            <?=$user['users_name']?> <svg class="olymp-dropdown-arrow-icon"><use xlink:href="<?=_URL_STYLE?>/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
                        </div>
                    </a>
                </div>
            </div>
            <?php }?>
            <div class="ui-block-title ui-block-title-small">
                <h6 class="title">MAIN SECTIONS</h6>
            </div>
            <ul class="left-menu">
                <li>
                    <a href="#" class="js-sidebar-open">
                        <svg class="olymp-close-icon left-menu-icon">
                            <use xlink:href="<?=_URL_STYLE?>/svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                        </svg>
                        <span class="left-menu-title">Đóng Menu</span>
                    </a>
                </li>
                <li>
                    <a href="<?=_URL_HOME?>">
                        <svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right"   data-original-title="NEWSFEED">
                            <use xlink:href="<?=_URL_STYLE?>/svg-icons/sprites/icons.svg#olymp-newsfeed-icon"></use>
                        </svg>
                        <span class="left-menu-title">Trang Chủ</span>
                    </a>
                </li>
                <li>
                    <a href="<?=_URL_HOME?>">
                        <svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="FAV PAGE">
                            <use xlink:href="<?=_URL_STYLE?>/svg-icons/sprites/icons.svg#olymp-star-icon"></use>
                        </svg>
                        <span class="left-menu-title">Video Hay</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- ... end Fixed Sidebar Right Responsive -->

<!-- Header-BP -->
<header class="header" id="site-header">
    <div class="header-content-wrapper">
        <div class="control-block">
            <div class="control-icon more has-items"><a href="<?=_URL_HOME?>"><h6 style="color: #ffffec">Trang Chủ</h6></a></div>
            <div class="control-icon more has-items"><a href="<?=_URL_HOME?>"><h6 style="color: #ffffec">Mới Nhất</h6></a></div>
            <div class="control-icon more has-items"><a href="<?=_URL_HOME?>"><h6 style="color: #ffffec">Đang HOT</h6></a></div>
            <?php if($user){?>
            <div class="author-page author vcard inline-items more">
                <div class="author-thumb">
                    <img alt="author" src="<?=_URL_HOME?>/media/images/system/avatar.png" width="50" height="50" class="avatar">
                    <span class="icon-status online"></span>
                    <div class="more-dropdown more-with-triangle">
                        <div class="mCustomScrollbar" data-mcs-theme="dark">
                            <div class="ui-block-title ui-block-title-small">
                                <h6 class="title">Quản Lý Tài Khoản</h6>
                            </div>
                            <ul class="account-settings">
                                <li>
                                    <a href="<?=_URL_ADMIN?>">
                                        <svg class="olymp-menu-icon">
                                            <use xlink:href="<?=_URL_STYLE?>/svg-icons/sprites/icons.svg#olymp-menu-icon"></use>
                                        </svg>
                                        <span>Quản Lý Nội Dung</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=_URL_ADMIN?>/post.php?act=add&type=vide">
                                        <svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="FAV PAGE">
                                            <use xlink:href="<?=_URL_STYLE?>/svg-icons/sprites/icons.svg#olymp-star-icon"></use>
                                        </svg>
                                        <span>Đăng Video</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=_URL_LOGOUT?>">
                                        <svg class="olymp-logout-icon"><use xlink:href="<?=_URL_STYLE?>/svg-icons/sprites/icons.svg#olymp-logout-icon"></use></svg>
                                        <span>Đăng Xuất</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <a href="02-ProfilePage.html" class="author-name fn">
                    <div class="author-title">
                        <?=$user['users_name']?> <svg class="olymp-dropdown-arrow-icon"><use xlink:href="<?=_URL_STYLE?>/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
                    </div>
                </a>
            </div>
            <?php }?>
        </div>
    </div>
</header>
<!-- ... end Header-BP -->

<!-- Responsive Header-BP -->
<header class="header header-responsive" id="site-header-responsive">
    <div class="header-content-wrapper">
        <ul class="nav nav-tabs mobile-app-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link" href="<?=_URL_HOME?>">
                    <div class="control-icon has-items">
                        <svg class="olymp-happy-face-icon"><use xlink:href="<?=_URL_STYLE?>/svg-icons/sprites/icons.svg#olymp-newsfeed-icon"></use></svg>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#chat" role="tab">
                    <div class="control-icon has-items">
                        <svg class="olymp-chat---messages-icon"><use xlink:href="<?=_URL_STYLE?>/svg-icons/sprites/icons.svg#olymp-play-icon"></use></svg>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#notification" role="tab">
                    <div class="control-icon has-items">
                        <svg class="olymp-thunder-icon"><use xlink:href="<?=_URL_STYLE?>/svg-icons/sprites/icons.svg#olymp-multimedia-icon"></use></svg>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#notification" role="tab">
                    <div class="control-icon has-items">
                        <svg class="olymp-thunder-icon"><use xlink:href="<?=_URL_STYLE?>/svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</header>
<!-- ... end Responsive Header-BP -->
<div class="header-spacer"></div>
