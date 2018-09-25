<?php
/**
 * Created by PhpStorm.
 * User: DONG
 * Date: 25/09/2018
 * Time: 11:25
 */
require_once '../includes/core.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="This world-exclusive introduction to the show is narrated by series presenter Sir David Attenborough and set to an exclusive track developed by Hans Zimmer and Radiohead.">
    <meta name="csrf-token" content="MLTebguX9zzU5wafIohkmTX783xC6xVaxmXxcp4V">
    <link rel="icon" type="image/png" href="http://www.tuviti.com/instant-blog/favicon.png">
    <link rel="amphtml" href="http://www.tuviti.com/instant-blog/posts/blue-planet/amp">
    <title>Instant Blog - Blue Planet</title>
    <!-- Facebook og-->
    <meta property="fb:app_id" content="1970044353024876" />
    <meta property="og:url" content="http://www.tuviti.com/instant-blog/posts/blue-planet" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Blue Planet" />
    <meta property="og:description" content="This world-exclusive introduction to the show is narrated by series presenter Sir David Attenborough and set to an exclusive track developed by Hans Zimmer and Radiohead." />
    <meta property="og:image" content="https://i.ytimg.com/vi/_38JDGnr0vA/hqdefault.jpg"/>

    <!-- Twitter card-->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@" />
    <meta name="twitter:creator" content="@">
    <meta name="twitter:url" value="http://www.tuviti.com/instant-blog/posts/blue-planet" />
    <meta name="twitter:title" content="Blue Planet" />
    <meta name="twitter:description" content="This world-exclusive introduction to the show is narrated by series presenter Sir David Attenborough and set to an exclusive track developed by Hans Zimmer and Radiohead." />
    <meta name="twitter:image" content="https://i.ytimg.com/vi/_38JDGnr0vA/hqdefault.jpg"/>

    <!-- Css styles-->
    <link href="<?php echo _URL_STYLE;?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo _URL_STYLE;?>/css/instant.css" rel="stylesheet">
    <link href="<?php echo _URL_STYLE;?>/css/simple-line-icons.css" rel="stylesheet">
    <link href="<?php echo _URL_STYLE;?>/css/plyr.css" rel="stylesheet">
</head>
<body class="bg-instant">
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-nav">
    <a class="navbar-brand" href="http://www.tuviti.com/instant-blog">
        <img src="http://www.tuviti.com/instant-blog/images/logo.png" class="d-inline-block align-top" alt="">
    </a>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsDefault" aria-controls="navbarsDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsDefault">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
                <a class="nav-link mr-3 d-none d-md-block" href="http://www.tuviti.com/instant-blog" data-toggle="tooltip" data-placement="bottom" title="Home"><i class="icon-home icons nav-icon"></i></a>
                <a class="nav-link d-md-none" href="http://www.tuviti.com/instant-blog"><i class="icon-home icons"></i> Home</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link mr-3 d-none d-md-block" href="http://www.tuviti.com/instant-blog/popular" data-toggle="tooltip" data-placement="bottom" title="Popular"><i class="icon-rocket icons nav-icon"></i></a>
                <a class="nav-link d-md-none" href="http://www.tuviti.com/instant-blog/popular"><i class="icon-rocket icons"></i> Popular</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link mr-3 d-none d-md-block" href="http://www.tuviti.com/instant-blog/categories" data-toggle="tooltip" data-placement="bottom" title="Categories"><i class="icon-grid icons nav-icon"></i></a>
                <a class="nav-link d-md-none" href="http://www.tuviti.com/instant-blog/categories"><i class="icon-grid icons"></i> Categories</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link mr-3 d-none d-md-block" href="http://www.tuviti.com/instant-blog/archives" data-toggle="tooltip" data-placement="bottom" title="Archives"><i class="icon-clock icons nav-icon"></i></a>
                <a class="nav-link d-md-none" href="http://www.tuviti.com/instant-blog/archives"><i class="icon-clock icons"></i> Archives</a>
            </li>
            <li class="nav-item">
                <span data-toggle="modal" data-target="#searchModal">
                    <a class="nav-link mr-3 d-none d-md-block" href="#" data-toggle="tooltip" data-placement="bottom" title="Search"><i class="icon-magnifier icons nav-icon"></i></a>
                    <a class="nav-link d-md-none" href="#"><i class="icon-magnifier icons"></i> Search</a>
                </span>
            </li>
            <li class="nav-item ">
                <a class="nav-link mr-3 d-none d-md-block" href="http://www.tuviti.com/instant-blog/login" data-toggle="tooltip" data-placement="bottom" title="Login"><i class="icon-user icons nav-icon"></i></a>
                <a class="nav-link d-md-none" href="http://www.tuviti.com/instant-blog/login"><i class="icon-user icons"></i> Login</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body bg-instant p-5">
                <div class="row">
                    <div class="col-10">
                        <form class="form-inline" action="http://www.tuviti.com/instant-blog/search" method="get">
                            <input name="s" type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Search" required>
                            <button type="submit" class="btn btn-secondary btn-lg ml-1"><i class="icon-magnifier icons"></i></button>
                        </form>
                    </div>
                    <div class="col-2">
                        <button type="button" class="close mr-3" data-dismiss="modal" aria-label="Close">
                            <span class="text-white" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="embed-responsive embed-responsive-16by9 mb-3 card-img-top">
                    <video poster="../media/images/post/BER8wYaM6U3X.jpg" id="player" playsinline controls>
                        <source src="https://onedrive.live.com/download?cid=0C96A527668396F3&resid=C96A527668396F3%2186423&authkey=AMipFtGPuZicYf8" type="video/mp4">
                    </video>
                </div>
                <div class="card-body">
                    <div class="list-item mb-3">
                        <div class="list-left">
                            <a href="http://www.tuviti.com/instant-blog/profile/admin">
                                <img class="avatar img-fluid rounded-circle" src="http://www.tuviti.com/instant-blog/images/defaultuser.png">
                            </a>
                        </div>
                        <div class="list-body">
                            <div class="text-ellipsis">
                                <a class="nocolor" href="http://www.tuviti.com/instant-blog/profile/admin">Admin</a>
                                <small class="text-muted time">8 months ago</small>
                            </div>
                            <div class="text-ellipsis">
                                <small class="text-muted">admin</small>
                                <small class="text-muted time"><a href="http://www.tuviti.com/instant-blog/category/lifestyle">
                                        #lifestyle
                                    </a></small>
                            </div>
                        </div>
                    </div>
                    <h1>Blue Planet</h1>
                    <p>
                        This world-exclusive introduction to the show is narrated by series presenter Sir David Attenborough and set to an exclusive track developed by Hans Zimmer and Radiohead.
                    </p>
                    <p>
                        <img class="img-fluid" src="http://www.tuviti.com/instant-screen/adsinstant2.png">
                    </p>

                    <p>The prequel features an array of some of the most awe-inspiring shots and highlights from the new series, as well as several exclusive scenes that will not feature in any of the seven episodes which are set for UK broadcast on BBC One later this year.</p>
                    <h4>About BBC Earth</h4>
                    <p>The world is an amazing place full of stories, beauty and natural wonder. Jump in to BBC Earth&#039;s YouTube channel and meet your planet. You&#039;ll find 50 years worth of astounding, entertaining, thought-provoking and educational natural history content on here. Dramatic, rare, and exclusive, nature doesn&#039;t get more exciting than this. Subscribe to be the first to view new videos. And you can become part of the BBC community by checking out our BBC Earth Facebook page. Here you&#039;ll find the best natural history content from the web, exclusive videos and images and a thriving, vibrant community.</p>
                </div>
                <div class="card-body card-border">
                    <div class="row">
                        <div class="col like ml-3 lesspadding">
                            <a href="http://www.tuviti.com/instant-blog/login" >
                                <div class="heartguest"></div>
                            </a>
                            <div class="likeCount" id="likeCount15">0</div>
                        </div>
                        <div class="col lesspadding">
                            <a href="https://www.pinterest.com/pin/create/button/"
                               data-pin-do="buttonBookmark"
                               data-pin-tall="true"
                               data-pin-custom="true">
                                <button type="button" class="btn btn-sm btn-block btn-danger btnpoint"> <i class="icon-social-pinterest icons"></i> <span class="d-none d-md-inline-block">Save</span></button>
                            </a>
                        </div>
                        <div class="col lesspadding">
                            <a role="button" class="btn btn-face btn-sm share" href="https://www.facebook.com/sharer/sharer.php?u=http://www.tuviti.com/instant-blog/posts/blue-planet" target="_blank"><i class="icon-social-facebook icons"></i> <span class="d-none d-md-inline-block">Share</span></a>
                        </div>
                        <div class="col lesspadding">
                            <a role="button" class="btn btn-twit btn-sm share" href="https://twitter.com/share?url=http://www.tuviti.com/instant-blog/posts/blue-planet&via=" target="_blank"><i class="icon-social-twitter icons"></i> <span class="d-none d-md-inline-block">Share</span></a>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="fb-comments" data-href="http://www.tuviti.com/instant-blog/posts/blue-planet" data-width="100%" data-numposts="5"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row mb-3">
                <div class="col">
                    <a role="button" class="btn btn-block btn-arrow" href="http://www.tuviti.com/instant-blog/posts/supercars" data-toggle="tooltip" data-placement="bottom" title="Previous">
                        <i class="icon-arrow-left icons"></i>
                    </a>
                </div>
                <div class="col">
                    <a role="button" class="btn btn-block btn-arrow" href="http://www.tuviti.com/instant-blog/posts/colorful-umbrellas-art-flying-in-the-sky" data-toggle="tooltip" data-placement="bottom" title="Random">
                        <i class="icon-shuffle icons"></i>
                    </a>
                </div>
                <div class="col">
                    <a role="button" class="btn btn-block btn-arrow" href="http://www.tuviti.com/instant-blog/posts/features-of-instant-blog-script" data-toggle="tooltip" data-placement="bottom" title="Next">
                        <i class="icon-arrow-right icons"></i>
                    </a>
                </div>
            </div>
            <div class="card pagesideads embed-responsive mb-3">
                <img class="card-img" src="http://www.tuviti.com/instant-screen/adsinstant1.png">
            </div>
            <div class="card bg-instant text-white">
                <img class="card-img" src="http://www.tuviti.com/instant-blog/uploads/1515933619.jpg">
                <div class="card-img-overlay bg-over">
                    <a class="link-over" href="http://www.tuviti.com/instant-blog/posts/best-drone-photos"></a>
                    <div class="card-like">
                        <a href="http://www.tuviti.com/instant-blog/login" >
                            <div class="heartguest"></div>
                        </a>
                        <div class="card-count" id="likeCount7">0</div>
                    </div>
                    <a class="category text-muted" href="http://www.tuviti.com/instant-blog/category/lifestyle"> # lifestyle</a>
                    <h4 class="bottom-txt">
                        Best Drone Photos
                    </h4>
                    <a class="author" href="http://www.tuviti.com/instant-blog/profile/admin">
                        <img class="avatar-sm img-fluid rounded-circle" src="http://www.tuviti.com/instant-blog/images/defaultuser.png">
                        <span class="align-middle">Admin</span>
                    </a>
                    <small class="text-muted card-date">8 months ago</small>
                </div>
            </div>
            <div class="card bg-instant text-white">
                <div class="youtube">
                    <img class="card-img change-ratio" src="https://i.ytimg.com/vi/wH_6aqTuGFo/hqdefault.jpg">
                </div>
                <div class="card-img-overlay bg-over">
                    <a class="link-over" href="http://www.tuviti.com/instant-blog/posts/trollhunters"></a>
                    <div class="card-like">
                        <a href="http://www.tuviti.com/instant-blog/login" >
                            <div class="heartguest"></div>
                        </a>
                        <div class="card-count" id="likeCount6">0</div>
                    </div>
                    <a href="http://www.tuviti.com/instant-blog/posts/trollhunters" class="playericon nocolor" data-toggle="tooltip" data-placement="bottom" title="Video">
                        <i class="icon-social-youtube icons text-muted"></i>
                    </a>
                    <h4 class="bottom-txt">
                        Trollhunters
                    </h4>
                    <a class="author" href="http://www.tuviti.com/instant-blog/profile/admin">
                        <img class="avatar-sm img-fluid rounded-circle" src="http://www.tuviti.com/instant-blog/images/defaultuser.png">
                        <span class="align-middle">Admin</span>
                    </a>
                    <small class="text-muted card-date">8 months ago</small>
                </div>
            </div>
            <div class="card bg-instant text-white">
                <img class="card-img" src="http://www.tuviti.com/instant-blog/uploads/1515934131.gif">
                <div class="card-img-overlay bg-over">
                    <a class="link-over" href="http://www.tuviti.com/instant-blog/posts/how-to-tell-a-story"></a>
                    <div class="card-like">
                        <a href="http://www.tuviti.com/instant-blog/login" >
                            <div class="heartguest"></div>
                        </a>
                        <div class="card-count" id="likeCount8">0</div>
                    </div>
                    <h4 class="bottom-txt">
                        How to Tell a Story
                    </h4>
                    <a class="author" href="http://www.tuviti.com/instant-blog/profile/admin">
                        <img class="avatar-sm img-fluid rounded-circle" src="http://www.tuviti.com/instant-blog/images/defaultuser.png">
                        <span class="align-middle">Admin</span>
                    </a>
                    <small class="text-muted card-date">8 months ago</small>
                </div>
            </div>
            <div class="card bg-instant text-white">
                <img class="card-img" src="http://www.tuviti.com/instant-blog/uploads/1515934330.jpg">
                <div class="card-img-overlay bg-over">
                    <a class="link-over" href="http://www.tuviti.com/instant-blog/posts/life-on-mars"></a>
                    <div class="card-like">
                        <a href="http://www.tuviti.com/instant-blog/login" >
                            <div class="heartguest"></div>
                        </a>
                        <div class="card-count" id="likeCount10">0</div>
                    </div>
                    <h4 class="bottom-txt">
                        Life On Mars
                    </h4>
                    <a class="author" href="http://www.tuviti.com/instant-blog/profile/admin">
                        <img class="avatar-sm img-fluid rounded-circle" src="http://www.tuviti.com/instant-blog/images/defaultuser.png">
                        <span class="align-middle">Admin</span>
                    </a>
                    <small class="text-muted card-date">8 months ago</small>
                </div>
            </div>
            <div class="card bg-instant text-white">
                <img class="card-img" src="http://www.tuviti.com/instant-blog/uploads/1515932775.jpg">
                <div class="card-img-overlay bg-over">
                    <a class="link-over" href="http://www.tuviti.com/instant-blog/posts/follow-your-dreams"></a>
                    <div class="card-like">
                        <a href="http://www.tuviti.com/instant-blog/login" >
                            <div class="heartguest"></div>
                        </a>
                        <div class="card-count" id="likeCount4">0</div>
                    </div>
                    <a class="category text-muted" href="http://www.tuviti.com/instant-blog/category/lifestyle"> # lifestyle</a>
                    <h4 class="bottom-txt">
                        Follow Your Dreams
                    </h4>
                    <a class="author" href="http://www.tuviti.com/instant-blog/profile/admin">
                        <img class="avatar-sm img-fluid rounded-circle" src="http://www.tuviti.com/instant-blog/images/defaultuser.png">
                        <span class="align-middle">Admin</span>
                    </a>
                    <small class="text-muted card-date">8 months ago</small>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="fbcomment" data-user-id="1970044353024876"></div>

<footer class="blog-footer">
    <ul class="list-inline">

        <li class="list-inline-item"><a class="text-light" href="http://www.tuviti.com/instant-blog/page/sample-page">Sample Page</a></li>

        <li class="list-inline-item"><a class="text-light" href="http://www.tuviti.com/instant-blog/page/sample-page-2">Sample Page 2</a></li>
    </ul>
    <div class="text-muted"><p>© 2018 ANC Media. This is footer. Go to <a href="https://codecanyon.net/item/instant-blog-facebook-instant-articles-google-amp-supported-php-script/21312459?ref=anc-media">CodeCanyon</a> .</p></div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?php echo _URL_STYLE;?>/js/salvattore.min.js"></script>
<script src="<?php echo _URL_STYLE;?>/js/popper.min.js"></script>
<script src="<?php echo _URL_STYLE;?>/js/bootstrap.min.js"></script>
<script src="<?php echo _URL_STYLE;?>/js/heart.js"></script>
<script src="<?php echo _URL_STYLE;?>/summernote/summernote-bs4.js"></script>
<script src="<?php echo _URL_STYLE;?>/js/plyr.js"></script>
<!--<script>const player = new Plyr('#player');</script>-->
<script type="text/javascript">
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip({
            trigger : 'hover',
            container: 'body'
        });
        $(".se-pre-con").fadeOut("slow");
    });
</script>
</body>
</html>
