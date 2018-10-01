<?php
/**
 * Created by PhpStorm.
 * User: DONG
 * Date: 24/09/2018
 * Time: 16:31
 */
require_once 'includes/core.php';
require_once 'pages/header.php';
?>
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
                <div id="newsfeed-items-grid">
                    <?php $funcion->getViewVideoList('video', array('limit' => 20, 'offset' => 0));?>
                </div>
                <a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="items-to-load.html" data-container="newsfeed-items-grid">
                    <svg class="olymp-three-dots-icon">
                        <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                    </svg>
                </a>
            </main>
            <!-- ... end Main Content -->
            <!-- Left Sidebar -->
            <aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-12 col-12">

            </aside>
            <!-- ... end Left Sidebar -->

            <!-- Right Sidebar -->
            <aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">Last Videos</h6>
                    </div>
                    <div class="ui-block-content">
                        <!-- W-Latest-Video -->
                        <ul class="widget w-last-video">
                            <li>
                                <a href="https://vimeo.com/ondemand/viewfromabluemoon4k/147865858" class="play-video play-video--small">
                                    <svg class="olymp-play-icon">
                                        <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-play-icon"></use>
                                    </svg>
                                </a>
                                <img src="http://192.168.0.103/dong/video_social/media/images/post/BER8wYaM6U3X.jpg" alt="video">
                                <div class="video-content">
                                    <div class="title">System of a Revenge - Hypnotize...</div>
                                    <time class="published" datetime="2017-03-24T18:18">3:25</time>
                                </div>
                                <div class="overlay"></div>
                            </li>
                            <li>
                                <a href="https://youtube.com/watch?v=excVFQ2TWig" class="play-video play-video--small">
                                    <svg class="olymp-play-icon">
                                        <use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-play-icon"></use>
                                    </svg>
                                </a>
                                <img src="http://192.168.0.103/dong/demo/img/video8.jpg" alt="video">
                                <div class="video-content">
                                    <div class="title">Green Goo - Live at Dan’s Arena</div>
                                    <time class="published" datetime="2017-03-24T18:18">5:48</time>
                                </div>
                                <div class="overlay"></div>
                            </li>
                        </ul>

                        <!-- .. end W-Latest-Video -->
                    </div>
                </div>

            </aside>
            <!-- ... end Right Sidebar -->
        </div>
    </div>
<?php
require_once 'pages/footer.php';