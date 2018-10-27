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
        <a href="<?php echo _URL_HOME;?>" class="logo">
            <div class="img-wrap">
                <img src="<?php echo _URL_HOME;?>/media/images/system/logo.png" alt="Video">
            </div>
        </a>
        <div class="mCustomScrollbar" data-mcs-theme="dark">
            <ul class="left-menu">
                <li>
                    <a href="#" class="js-sidebar-open">
                        <svg class="olymp-menu-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="OPEN MENU">
                            <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-menu-icon"></use>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="03-Newsfeed.html">
                        <svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right"   data-original-title="NEWSFEED">
                            <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-newsfeed-icon"></use>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="16-FavPagesFeed.html">
                        <svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="FAV PAGE">
                            <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-star-icon"></use>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="17-FriendGroups.html">
                        <svg class="olymp-happy-faces-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="FRIEND GROUPS">
                            <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-happy-faces-icon"></use>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="18-MusicAndPlaylists.html">
                        <svg class="olymp-headphones-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="MUSIC&PLAYLISTS">
                            <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-headphones-icon"></use>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="19-WeatherWidget.html">
                        <svg class="olymp-weather-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="WEATHER APP">
                            <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-weather-icon"></use>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="20-CalendarAndEvents-MonthlyCalendar.html">
                        <svg class="olymp-calendar-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="CALENDAR AND EVENTS">
                            <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-calendar-icon"></use>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="24-CommunityBadges.html">
                        <svg class="olymp-badge-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Community Badges">
                            <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-badge-icon"></use>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="25-FriendsBirthday.html">
                        <svg class="olymp-cupcake-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Friends Birthdays">
                            <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-cupcake-icon"></use>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="26-Statistics.html">
                        <svg class="olymp-stats-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Account Stats">
                            <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-stats-icon"></use>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="27-ManageWidgets.html">
                        <svg class="olymp-manage-widgets-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Manage Widgets">
                            <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-manage-widgets-icon"></use>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1">
        <a href="<?php echo _URL_HOME;?>" class="logo">
            <div class="img-wrap">
                <img src="<?php echo _URL_HOME;?>/media/images/system/logo.png" width="50px" height="50px" alt="Olympus">
            </div>
            <div class="title-block">
                <h6 class="logo-title">VIDEO SHARE</h6>
            </div>
        </a>

        <div class="mCustomScrollbar" data-mcs-theme="dark">
            <ul class="left-menu">
                <li>
                    <a href="#" class="js-sidebar-open">
                        <svg class="olymp-close-icon left-menu-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                        <span class="left-menu-title">Collapse Menu</span>
                    </a>
                </li>
                <li>
                    <a href="03-Newsfeed.html">
                        <svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right"   data-original-title="NEWSFEED">
                            <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-newsfeed-icon"></use>
                        </svg>
                        <span class="left-menu-title">Newsfeed</span>
                    </a>
                </li>
                <li>
                    <a href="16-FavPagesFeed.html">
                        <svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="FAV PAGE">
                            <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-star-icon"></use>
                        </svg>
                        <span class="left-menu-title">Fav Pages Feed</span>
                    </a>
                </li>
                <li>
                    <a href="17-FriendGroups.html">
                        <svg class="olymp-happy-faces-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="FRIEND GROUPS">
                            <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-happy-faces-icon"></use>
                        </svg>
                        <span class="left-menu-title">Friend Groups</span>
                    </a>
                </li>
                <li>
                    <a href="18-MusicAndPlaylists.html">
                        <svg class="olymp-headphones-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="MUSIC&PLAYLISTS">
                            <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-headphones-icon"></use>
                        </svg>
                        <span class="left-menu-title">Music & Playlists</span>
                    </a>
                </li>
                <li>
                    <a href="19-WeatherWidget.html">
                        <svg class="olymp-weather-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="WEATHER APP">
                            <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-weather-icon"></use>
                        </svg>
                        <span class="left-menu-title">Weather App</span>
                    </a>
                </li>
                <li>
                    <a href="20-CalendarAndEvents-MonthlyCalendar.html">
                        <svg class="olymp-calendar-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="CALENDAR AND EVENTS">
                            <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-calendar-icon"></use>
                        </svg>
                        <span class="left-menu-title">Calendar and Events</span>
                    </a>
                </li>
                <li>
                    <a href="24-CommunityBadges.html">
                        <svg class="olymp-badge-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Community Badges">
                            <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-badge-icon"></use>
                        </svg>
                        <span class="left-menu-title">Community Badges</span>
                    </a>
                </li>
                <li>
                    <a href="25-FriendsBirthday.html">
                        <svg class="olymp-cupcake-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Friends Birthdays">
                            <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-cupcake-icon"></use>
                        </svg>
                        <span class="left-menu-title">Friends Birthdays</span>
                    </a>
                </li>
                <li>
                    <a href="26-Statistics.html">
                        <svg class="olymp-stats-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Account Stats">
                            <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-stats-icon"></use>
                        </svg>
                        <span class="left-menu-title">Account Stats</span>
                    </a>
                </li>
                <li>
                    <a href="27-ManageWidgets.html">
                        <svg class="olymp-manage-widgets-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Manage Widgets">
                            <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-manage-widgets-icon"></use>
                        </svg>
                        <span class="left-menu-title">Manage Widgets</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- ... end Fixed Sidebar Left -->

<!-- Fixed Sidebar Left -->
<div class="fixed-sidebar fixed-sidebar-responsive">
    <div class="fixed-sidebar-left sidebar--small" id="sidebar-left-responsive">
        <a href="#" class="logo js-sidebar-open">
            <img src="<?php echo _URL_HOME;?>/media/images/system/logo.png" alt="Olympus">
        </a>
    </div>
    <div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1-responsive">
        <a href="#" class="logo">
            <div class="img-wrap">
                <img src="<?php echo _URL_HOME;?>/media/images/system/logo.png" height="50px" width="50px" alt="Olympus">
            </div>
            <div class="title-block">
                <h6 class="logo-title">VIDEO</h6>
            </div>
        </a>

        <div class="mCustomScrollbar" data-mcs-theme="dark">

            <div class="control-block">
                <div class="author-page author vcard inline-items">
                    <div class="author-thumb">
                        <img alt="author" src="<?php echo _URL_HOME;?>/media/images/system/avatar.png" height="50px" class="avatar">
                        <span class="icon-status online"></span>
                    </div>
                    <a href="<?php echo _URL_HOME;?>" class="author-name fn">
                        <div class="author-title">
                            James Spiegel <svg class="olymp-dropdown-arrow-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
                        </div>
                        <span class="author-subtitle">SPACE COWBOY</span>
                    </a>
                </div>
            </div>

            <div class="ui-block-title ui-block-title-small">
                <h6 class="title">MAIN SECTIONS</h6>
            </div>

            <ul class="left-menu">
                <li>
                    <a href="#" class="js-sidebar-open">
                        <svg class="olymp-close-icon left-menu-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                        <span class="left-menu-title">Collapse Menu</span>
                    </a>
                </li>
                <li>
                    <a href="mobile-index.html">
                        <svg class="olymp-newsfeed-icon left-menu-icon" data-toggle="tooltip" data-placement="right"   data-original-title="NEWSFEED">
                            <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-newsfeed-icon"></use>
                        </svg>
                        <span class="left-menu-title">Newsfeed</span>
                    </a>
                </li>
                <li>
                    <a href="Mobile-28-YourAccount-PersonalInformation.html">
                        <svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="FAV PAGE">
                            <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-star-icon"></use>
                        </svg>
                        <span class="left-menu-title">Fav Pages Feed</span>
                    </a>
                </li>
                <li>
                    <a href="mobile-29-YourAccount-AccountSettings.html">
                        <svg class="olymp-happy-faces-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="FRIEND GROUPS">
                            <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-happy-faces-icon"></use>
                        </svg>
                        <span class="left-menu-title">Friend Groups</span>
                    </a>
                </li>
                <li>
                    <a href="Mobile-30-YourAccount-ChangePassword.html">
                        <svg class="olymp-headphones-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="MUSIC&PLAYLISTS">
                            <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-headphones-icon"></use>
                        </svg>
                        <span class="left-menu-title">Music & Playlists</span>
                    </a>
                </li>
                <li>
                    <a href="Mobile-31-YourAccount-HobbiesAndInterests.html">
                        <svg class="olymp-weather-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="WEATHER APP">
                            <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-weather-icon"></use>
                        </svg>
                        <span class="left-menu-title">Weather App</span>
                    </a>
                </li>
                <li>
                    <a href="Mobile-32-YourAccount-EducationAndEmployement.html">
                        <svg class="olymp-calendar-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="CALENDAR AND EVENTS">
                            <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-calendar-icon"></use>
                        </svg>
                        <span class="left-menu-title">Calendar and Events</span>
                    </a>
                </li>
                <li>
                    <a href="Mobile-33-YourAccount-Notifications.html">
                        <svg class="olymp-badge-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Community Badges">
                            <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-badge-icon"></use>
                        </svg>
                        <span class="left-menu-title">Community Badges</span>
                    </a>
                </li>
                <li>
                    <a href="Mobile-34-YourAccount-ChatMessages.html">
                        <svg class="olymp-cupcake-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Friends Birthdays">
                            <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-cupcake-icon"></use>
                        </svg>
                        <span class="left-menu-title">Friends Birthdays</span>
                    </a>
                </li>
                <li>
                    <a href="Mobile-35-YourAccount-FriendsRequests.html">
                        <svg class="olymp-stats-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Account Stats">
                            <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-stats-icon"></use>
                        </svg>
                        <span class="left-menu-title">Account Stats</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg class="olymp-manage-widgets-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="Manage Widgets">
                            <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-manage-widgets-icon"></use>
                        </svg>
                        <span class="left-menu-title">Manage Widgets</span>
                    </a>
                </li>
            </ul>

            <div class="ui-block-title ui-block-title-small">
                <h6 class="title">YOUR ACCOUNT</h6>
            </div>

            <ul class="account-settings">
                <li>
                    <a href="#">
                        <svg class="olymp-menu-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg>
                        <span>Profile Settings</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="FAV PAGE">
                            <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-star-icon"></use>
                        </svg>
                        <span>Create Fav Page</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg class="olymp-logout-icon">
                            <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-logout-icon"></use>
                        </svg>
                        <span>Log Out</span>
                    </a>
                </li>
            </ul>
            <div class="ui-block-title ui-block-title-small">
                <h6 class="title">About Olympus</h6>
            </div>
        </div>
    </div>
</div>
<!-- ... end Fixed Sidebar Left -->

<!-- Header-BP -->
<header class="header" id="site-header">
    <div class="page-title"><h6>VIDEO SHARE</h6></div>
    <div class="header-content-wrapper">
        <div class="control-block">
            <div class="control-icon more has-items">
                <svg class="olymp-chat---messages-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
                <div class="label-avatar bg-purple">2</div>
                <div class="more-dropdown more-with-triangle triangle-top-center">
                    <div class="ui-block-title ui-block-title-small">
                        <h6 class="title">Chat / Messages</h6>
                        <a href="#">Mark all as read</a>
                        <a href="#">Settings</a>
                    </div>
                    <div class="mCustomScrollbar" data-mcs-theme="dark">
                        <ul class="notification-list chat-message">
                            <li class="message-unread">
                                <div class="author-thumb">
                                    <img src="<?php echo _URL_HOME;?>/media/images/system/avatar.png" height="34px" width="34px" alt="author">
                                </div>
                                <div class="notification-event">
                                    <a href="#" class="h6 notification-friend">Diana Jameson</a>
                                    <span class="chat-message-item">Hi James! It’s Diana, I just wanted to let you know that we have to reschedule...</span>
                                    <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
                                </div>
                                <span class="notification-icon">
									<svg class="olymp-chat---messages-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
								</span>
                                <div class="more">
                                    <svg class="olymp-three-dots-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                                </div>
                            </li>
                            <li>
                                <div class="author-thumb">
                                    <img src="<?php echo _URL_HOME;?>/media/images/system/avatar.png" height="34px" width="34px" alt="author">
                                </div>
                                <div class="notification-event">
                                    <a href="#" class="h6 notification-friend">Jake Parker</a>
                                    <span class="chat-message-item">Great, I’ll see you tomorrow!.</span>
                                    <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
                                </div>
                                <span class="notification-icon">
									<svg class="olymp-chat---messages-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
								</span>

                                <div class="more">
                                    <svg class="olymp-three-dots-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                                </div>
                            </li>
                            <li>
                                <div class="author-thumb">
                                    <img src="<?php echo _URL_HOME;?>/media/images/system/avatar.png" height="34px" width="34px" alt="author">
                                </div>
                                <div class="notification-event">
                                    <a href="#" class="h6 notification-friend">Elaine Dreyfuss</a>
                                    <span class="chat-message-item">We’ll have to check that at the office and see if the client is on board with...</span>
                                    <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 9:56pm</time></span>
                                </div>
                                <span class="notification-icon">
										<svg class="olymp-chat---messages-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
									</span>
                                <div class="more">
                                    <svg class="olymp-three-dots-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                                </div>
                            </li>

                            <li class="chat-group">
                                <div class="author-thumb">
                                    <img src="<?php echo _URL_HOME;?>/media/images/system/avatar.png" height="34px" width="34px" alt="author">
                                    <img src="<?php echo _URL_HOME;?>/media/images/system/avatar.png" height="34px" width="34px" alt="author">
                                    <img src="<?php echo _URL_HOME;?>/media/images/system/avatar.png" height="34px" width="34px" alt="author">
                                    <img src="<?php echo _URL_HOME;?>/media/images/system/avatar.png" height="34px" width="34px" alt="author">
                                </div>
                                <div class="notification-event">
                                    <a href="#" class="h6 notification-friend">You, Faye, Ed &amp; Jet +3</a>
                                    <span class="last-message-author">Ed:</span>
                                    <span class="chat-message-item">Yeah! Seems fine by me!</span>
                                    <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 16th at 10:23am</time></span>
                                </div>
                                <span class="notification-icon">
										<svg class="olymp-chat---messages-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
									</span>
                                <div class="more">
                                    <svg class="olymp-three-dots-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <a href="#" class="view-all bg-purple">View All Messages</a>
                </div>
            </div>

            <div class="control-icon more has-items">
                <svg class="olymp-thunder-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-thunder-icon"></use></svg>

                <div class="label-avatar bg-primary">8</div>

                <div class="more-dropdown more-with-triangle triangle-top-center">
                    <div class="ui-block-title ui-block-title-small">
                        <h6 class="title">Notifications</h6>
                        <a href="#">Mark all as read</a>
                        <a href="#">Settings</a>
                    </div>

                    <div class="mCustomScrollbar" data-mcs-theme="dark">
                        <ul class="notification-list">
                            <li>
                                <div class="author-thumb">
                                    <img src="<?php echo _URL_HOME;?>/media/images/system/avatar.png" height="34px" width="34px" alt="author">
                                </div>
                                <div class="notification-event">
                                    <div><a href="#" class="h6 notification-friend">Mathilda Brinker</a> commented on your new <a href="#" class="notification-link">profile status</a>.</div>
                                    <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
                                </div>
                                <span class="notification-icon">
										<svg class="olymp-comments-post-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
									</span>

                                <div class="more">
                                    <svg class="olymp-three-dots-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                                    <svg class="olymp-little-delete"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
                                </div>
                            </li>

                            <li class="un-read">
                                <div class="author-thumb">
                                    <img src="<?php echo _URL_HOME;?>/media/images/system/avatar.png" height="34px" width="34px" alt="author">
                                </div>
                                <div class="notification-event">
                                    <div>You and <a href="#" class="h6 notification-friend">Nicholas Grissom</a> just became friends. Write on <a href="#" class="notification-link">his wall</a>.</div>
                                    <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">9 hours ago</time></span>
                                </div>
                                <span class="notification-icon">
										<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
									</span>

                                <div class="more">
                                    <svg class="olymp-three-dots-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                                    <svg class="olymp-little-delete"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
                                </div>
                            </li>

                            <li class="with-comment-photo">
                                <div class="author-thumb">
                                    <img src="<?php echo _URL_HOME;?>/media/images/system/avatar.png" height="34px" width="34px" alt="author">
                                </div>
                                <div class="notification-event">
                                    <div><a href="#" class="h6 notification-friend">Sarah Hetfield</a> commented on your <a href="#" class="notification-link">photo</a>.</div>
                                    <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 5:32am</time></span>
                                </div>
                                <span class="notification-icon">
										<svg class="olymp-comments-post-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
									</span>

                                <div class="comment-photo">
                                    <img src="img/comment-photo1.jpg" alt="photo">
                                    <span>“She looks incredible in that outfit! We should see each...”</span>
                                </div>

                                <div class="more">
                                    <svg class="olymp-three-dots-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                                    <svg class="olymp-little-delete"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
                                </div>
                            </li>

                            <li>
                                <div class="author-thumb">
                                    <img src="<?php echo _URL_HOME;?>/media/images/system/avatar.png" height="34px" width="34px" alt="author">
                                </div>
                                <div class="notification-event">
                                    <div><a href="#" class="h6 notification-friend">Green Goo Rock</a> invited you to attend to his event Goo in <a href="#" class="notification-link">Gotham Bar</a>.</div>
                                    <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 5th at 6:43pm</time></span>
                                </div>
                                <span class="notification-icon">
										<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
									</span>

                                <div class="more">
                                    <svg class="olymp-three-dots-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                                    <svg class="olymp-little-delete"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
                                </div>
                            </li>

                            <li>
                                <div class="author-thumb">
                                    <img src="<?php echo _URL_HOME;?>/media/images/system/avatar.png" height="34px" width="34px" alt="author">
                                </div>
                                <div class="notification-event">
                                    <div><a href="#" class="h6 notification-friend">James Summers</a> commented on your new <a href="#" class="notification-link">profile status</a>.</div>
                                    <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 2nd at 8:29pm</time></span>
                                </div>
                                <span class="notification-icon">
										<svg class="olymp-heart-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
									</span>

                                <div class="more">
                                    <svg class="olymp-three-dots-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                                    <svg class="olymp-little-delete"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <a href="#" class="view-all bg-primary">View All Notifications</a>
                </div>
            </div>

            <div class="author-page author vcard inline-items more">
                <div class="author-thumb">
                    <img src="<?php echo _URL_HOME;?>/media/images/system/avatar.png" height="34px" width="34px" alt="author">
                    <span class="icon-status online"></span>
                    <div class="more-dropdown more-with-triangle">
                        <div class="mCustomScrollbar" data-mcs-theme="dark">
                            <div class="ui-block-title ui-block-title-small"><h6 class="title">Thông Tin Tài Khoản</h6></div>
                            <ul class="account-settings">
                                <?php if($user){?>
                                    <li>
                                        <a href="<?php echo _URL_ADMIN;?>">
                                            <svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" data-original-title="FAV PAGE">
                                                <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-star-icon"></use>
                                            </svg>
                                            <span>Trang Quản Trị</span>
                                        </a>
                                    </li>
                                <?php }?>
                                <li>
                                    <a href="#">
                                        <svg class="olymp-menu-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-menu-icon"></use></svg><span>Cài Đặt</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <svg class="olymp-star-icon left-menu-icon"  data-toggle="tooltip" data-placement="right" data-original-title="FAV PAGE">
                                            <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-star-icon"></use>
                                        </svg>
                                        <span>Đăng Video</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <svg class="olymp-logout-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-logout-icon"></use></svg>
                                        <span>Thoát</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <a href="02-ProfilePage.html" class="author-name fn">
                    <div class="author-title"> <?php echo $user['users_name'];?> <svg class="olymp-dropdown-arrow-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
                    </div>
                    <span class="author-subtitle">ADMIN</span>
                </a>
            </div>

        </div>
    </div>

</header>

<!-- ... end Header-BP -->


<!-- Responsive Header-BP -->

<header class="header header-responsive" id="site-header-responsive">

    <div class="header-content-wrapper">
        <ul class="nav nav-tabs mobile-app-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#request" role="tab">
                    <div class="control-icon has-items">
                        <svg class="olymp-happy-face-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                        <div class="label-avatar bg-blue">6</div>
                    </div>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#chat" role="tab">
                    <div class="control-icon has-items">
                        <svg class="olymp-chat---messages-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
                        <div class="label-avatar bg-purple">2</div>
                    </div>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#notification" role="tab">
                    <div class="control-icon has-items">
                        <svg class="olymp-thunder-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-thunder-icon"></use></svg>
                        <div class="label-avatar bg-primary">8</div>
                    </div>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#search" role="tab">
                    <svg class="olymp-magnifying-glass-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use></svg>
                    <svg class="olymp-close-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                </a>
            </li>
        </ul>
    </div>

    <!-- Tab panes -->
    <div class="tab-content tab-content-responsive">

        <div class="tab-pane " id="request" role="tabpanel">

            <div class="mCustomScrollbar" data-mcs-theme="dark">
                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">FRIEND REQUESTS</h6>
                    <a href="#">Find Friends</a>
                    <a href="#">Settings</a>
                </div>
                <ul class="notification-list friend-requests">
                    <li>
                        <div class="author-thumb">
                            <img src="img/avatar55-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Tamara Romanoff</a>
                            <span class="chat-message-item">Mutual Friend: Sarah Hetfield</span>
                        </div>
                        <span class="notification-icon">
										<a href="#" class="accept-request">
											<span class="icon-add without-text">
												<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
											</span>
										</a>

										<a href="#" class="accept-request request-del">
											<span class="icon-minus">
												<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
											</span>
										</a>

									</span>

                        <div class="more">
                            <svg class="olymp-three-dots-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                        </div>
                    </li>
                    <li>
                        <div class="author-thumb">
                            <img src="img/avatar56-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Tony Stevens</a>
                            <span class="chat-message-item">4 Friends in Common</span>
                        </div>
                        <span class="notification-icon">
										<a href="#" class="accept-request">
											<span class="icon-add without-text">
												<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
											</span>
										</a>

										<a href="#" class="accept-request request-del">
											<span class="icon-minus">
												<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
											</span>
										</a>

									</span>

                        <div class="more">
                            <svg class="olymp-three-dots-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                        </div>
                    </li>
                    <li class="accepted">
                        <div class="author-thumb">
                            <img src="img/avatar57-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            You and <a href="#" class="h6 notification-friend">Mary Jane Stark</a> just became friends. Write on <a href="#" class="notification-link">her wall</a>.
                        </div>
                        <span class="notification-icon">
										<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
									</span>

                        <div class="more">
                            <svg class="olymp-three-dots-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                            <svg class="olymp-little-delete"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
                        </div>
                    </li>
                    <li>
                        <div class="author-thumb">
                            <img src="img/avatar58-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Stagg Clothing</a>
                            <span class="chat-message-item">9 Friends in Common</span>
                        </div>
                        <span class="notification-icon">
										<a href="#" class="accept-request">
											<span class="icon-add without-text">
												<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
											</span>
										</a>

										<a href="#" class="accept-request request-del">
											<span class="icon-minus">
												<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
											</span>
										</a>

									</span>

                        <div class="more">
                            <svg class="olymp-three-dots-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                        </div>
                    </li>
                </ul>
                <a href="#" class="view-all bg-blue">Check all your Events</a>
            </div>

        </div>

        <div class="tab-pane " id="chat" role="tabpanel">

            <div class="mCustomScrollbar" data-mcs-theme="dark">
                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">Chat / Messages</h6>
                    <a href="#">Mark all as read</a>
                    <a href="#">Settings</a>
                </div>

                <ul class="notification-list chat-message">
                    <li class="message-unread">
                        <div class="author-thumb">
                            <img src="img/avatar59-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Diana Jameson</a>
                            <span class="chat-message-item">Hi James! It’s Diana, I just wanted to let you know that we have to reschedule...</span>
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
                        </div>
                        <span class="notification-icon">
										<svg class="olymp-chat---messages-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
									</span>
                        <div class="more">
                            <svg class="olymp-three-dots-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                        </div>
                    </li>

                    <li>
                        <div class="author-thumb">
                            <img src="img/avatar60-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Jake Parker</a>
                            <span class="chat-message-item">Great, I’ll see you tomorrow!.</span>
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
                        </div>
                        <span class="notification-icon">
										<svg class="olymp-chat---messages-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
									</span>

                        <div class="more">
                            <svg class="olymp-three-dots-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                        </div>
                    </li>
                    <li>
                        <div class="author-thumb">
                            <img src="img/avatar61-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">Elaine Dreyfuss</a>
                            <span class="chat-message-item">We’ll have to check that at the office and see if the client is on board with...</span>
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 9:56pm</time></span>
                        </div>
                        <span class="notification-icon">
											<svg class="olymp-chat---messages-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
										</span>
                        <div class="more">
                            <svg class="olymp-three-dots-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                        </div>
                    </li>

                    <li class="chat-group">
                        <div class="author-thumb">
                            <img src="img/avatar11-sm.jpg" alt="author">
                            <img src="img/avatar12-sm.jpg" alt="author">
                            <img src="img/avatar13-sm.jpg" alt="author">
                            <img src="img/avatar10-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend">You, Faye, Ed &amp; Jet +3</a>
                            <span class="last-message-author">Ed:</span>
                            <span class="chat-message-item">Yeah! Seems fine by me!</span>
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 16th at 10:23am</time></span>
                        </div>
                        <span class="notification-icon">
											<svg class="olymp-chat---messages-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
										</span>
                        <div class="more">
                            <svg class="olymp-three-dots-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                        </div>
                    </li>
                </ul>

                <a href="#" class="view-all bg-purple">View All Messages</a>
            </div>

        </div>

        <div class="tab-pane " id="notification" role="tabpanel">

            <div class="mCustomScrollbar" data-mcs-theme="dark">
                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">Notifications</h6>
                    <a href="#">Mark all as read</a>
                    <a href="#">Settings</a>
                </div>

                <ul class="notification-list">
                    <li>
                        <div class="author-thumb">
                            <img src="img/avatar62-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <div><a href="#" class="h6 notification-friend">Mathilda Brinker</a> commented on your new <a href="#" class="notification-link">profile status</a>.</div>
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
                        </div>
                        <span class="notification-icon">
											<svg class="olymp-comments-post-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
										</span>

                        <div class="more">
                            <svg class="olymp-three-dots-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                            <svg class="olymp-little-delete"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
                        </div>
                    </li>

                    <li class="un-read">
                        <div class="author-thumb">
                            <img src="img/avatar63-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <div>You and <a href="#" class="h6 notification-friend">Nicholas Grissom</a> just became friends. Write on <a href="#" class="notification-link">his wall</a>.</div>
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">9 hours ago</time></span>
                        </div>
                        <span class="notification-icon">
											<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
										</span>

                        <div class="more">
                            <svg class="olymp-three-dots-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                            <svg class="olymp-little-delete"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
                        </div>
                    </li>

                    <li class="with-comment-photo">
                        <div class="author-thumb">
                            <img src="img/avatar64-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <div><a href="#" class="h6 notification-friend">Sarah Hetfield</a> commented on your <a href="#" class="notification-link">photo</a>.</div>
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 5:32am</time></span>
                        </div>
                        <span class="notification-icon">
											<svg class="olymp-comments-post-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
										</span>

                        <div class="comment-photo">
                            <img src="img/comment-photo1.jpg" alt="photo">
                            <span>“She looks incredible in that outfit! We should see each...”</span>
                        </div>

                        <div class="more">
                            <svg class="olymp-three-dots-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                            <svg class="olymp-little-delete"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
                        </div>
                    </li>

                    <li>
                        <div class="author-thumb">
                            <img src="img/avatar65-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <div><a href="#" class="h6 notification-friend">Green Goo Rock</a> invited you to attend to his event Goo in <a href="#" class="notification-link">Gotham Bar</a>.</div>
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 5th at 6:43pm</time></span>
                        </div>
                        <span class="notification-icon">
											<svg class="olymp-happy-face-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
										</span>

                        <div class="more">
                            <svg class="olymp-three-dots-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                            <svg class="olymp-little-delete"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
                        </div>
                    </li>

                    <li>
                        <div class="author-thumb">
                            <img src="img/avatar66-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <div><a href="#" class="h6 notification-friend">James Summers</a> commented on your new <a href="#" class="notification-link">profile status</a>.</div>
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 2nd at 8:29pm</time></span>
                        </div>
                        <span class="notification-icon">
											<svg class="olymp-heart-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
										</span>

                        <div class="more">
                            <svg class="olymp-three-dots-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                            <svg class="olymp-little-delete"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
                        </div>
                    </li>
                </ul>
                <a href="#" class="view-all bg-primary">View All Notifications</a>
            </div>
        </div>
    </div>
    <!-- ... end  Tab panes -->

</header>

<!-- ... end Responsive Header-BP -->
<div class="header-spacer"></div>
