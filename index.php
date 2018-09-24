<?php
/**
 * Created by PhpStorm.
 * User: DONG
 * Date: 24/09/2018
 * Time: 16:31
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="http://www.tuviti.com/instant-blog/favicon.png">
    <title>Video Social</title>
    <link href="style/css/bootstrap.min.css" rel="stylesheet">
    <link href="style/summernote/summernote-bs4.css" rel="stylesheet">
    <link href="style/css/instant.css" rel="stylesheet">
    <link href="style/css/simple-line-icons.css" rel="stylesheet">
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
            <li class="nav-item active">
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



<div class="se-pre-con"></div>
<div class="container-fluid mt-5">
    <div class="row">
        <div class="grid" data-columns>

            <div class="card bg-instant text-white">
                <img class="card-img" src="http://www.tuviti.com/instant-blog/uploads/1516634211.jpg">
                <div class="card-img-overlay bg-over">
                    <a class="link-over" href="http://www.tuviti.com/instant-blog/posts/features-of-instant-blog-script"></a>
                    <div class="card-like">
                        <a href="http://www.tuviti.com/instant-blog/login" >
                            <div class="heartguest"></div>
                        </a>
                        <div class="card-count" id="likeCount16">0</div>
                    </div>
                    <h4 class="bottom-txt">
                        Features of Instant Blog Script
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
                    <img class="card-img change-ratio" src="https://i.ytimg.com/vi/_38JDGnr0vA/hqdefault.jpg">
                </div>
                <div class="card-img-overlay bg-over">
                    <a class="link-over" href="http://www.tuviti.com/instant-blog/posts/blue-planet"></a>
                    <div class="card-like">
                        <a href="http://www.tuviti.com/instant-blog/login" >
                            <div class="heartguest"></div>
                        </a>
                        <div class="card-count" id="likeCount15">0</div>
                    </div>
                    <a class="category-middle text-muted" href="http://www.tuviti.com/instant-blog/category/lifestyle"> # lifestyle</a>
                    <a href="http://www.tuviti.com/instant-blog/posts/blue-planet" class="playericon nocolor" data-toggle="tooltip" data-placement="bottom" title="Video">
                        <i class="icon-social-youtube icons text-muted"></i>
                    </a>
                    <h4 class="bottom-txt">
                        Blue Planet
                    </h4>
                    <a class="author" href="http://www.tuviti.com/instant-blog/profile/admin">
                        <img class="avatar-sm img-fluid rounded-circle" src="http://www.tuviti.com/instant-blog/images/defaultuser.png">
                        <span class="align-middle">Admin</span>
                    </a>
                    <small class="text-muted card-date">8 months ago</small>
                </div>
            </div>

            <div class="card bg-instant text-white">
                <img class="card-img" src="http://www.tuviti.com/instant-blog/uploads/1515934595.gif">
                <div class="card-img-overlay bg-over">
                    <a class="link-over" href="http://www.tuviti.com/instant-blog/posts/supercars"></a>
                    <div class="card-like">
                        <a href="http://www.tuviti.com/instant-blog/login" >
                            <div class="heartguest"></div>
                        </a>
                        <div class="card-count" id="likeCount11">0</div>
                    </div>
                    <h4 class="bottom-txt">
                        Supercars
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

            <div class="card text-white bg-danger">
                <div class="card-txt-body bg-over">
                    <a class="link-over" href="http://www.tuviti.com/instant-blog/posts/post-without-image"></a>
                    <div class="card-like">
                        <a href="http://www.tuviti.com/instant-blog/login" >
                            <div class="heartguest"></div>
                        </a>
                        <div class="card-count" id="likeCount5">0</div>
                    </div>
                    <h4>Post without image</h4>
                    <p class="card-text">You can create new posts with out image, but you can choose background for them.</p>
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
            <div class="card betads embed-responsive">
                <img class="card-img" src="http://www.tuviti.com/instant-screen/adsinstant.png">
            </div>

            <div class="card bg-instant text-white">
                <img class="card-img" src="http://www.tuviti.com/instant-blog/uploads/1515932489.jpg">
                <div class="card-img-overlay bg-over">
                    <a class="link-over" href="http://www.tuviti.com/instant-blog/posts/build-confidence"></a>
                    <div class="card-like">
                        <a href="http://www.tuviti.com/instant-blog/login" >
                            <div class="heartguest"></div>
                        </a>
                        <div class="card-count" id="likeCount3">0</div>
                    </div>
                    <h4 class="bottom-txt">
                        How To Build Confidence From Scratch
                    </h4>
                    <a class="author" href="http://www.tuviti.com/instant-blog/profile/admin">
                        <img class="avatar-sm img-fluid rounded-circle" src="http://www.tuviti.com/instant-blog/images/defaultuser.png">
                        <span class="align-middle">Admin</span>
                    </a>
                    <small class="text-muted card-date">8 months ago</small>
                </div>
            </div>

            <div class="card bg-instant text-white">
                <img class="card-img" src="http://www.tuviti.com/instant-blog/uploads/1515932280.jpg">
                <div class="card-img-overlay bg-over">
                    <a class="link-over" href="http://www.tuviti.com/instant-blog/posts/colorful-umbrellas-art-flying-in-the-sky"></a>
                    <div class="card-like">
                        <a href="http://www.tuviti.com/instant-blog/login" >
                            <div class="heartguest"></div>
                        </a>
                        <div class="card-count" id="likeCount2">0</div>
                    </div>
                    <h4 class="bottom-txt">
                        Colorful Umbrellas Art Flying In The Sky
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
    <hr>
    <div class="row">
        <div class="col-md-12">

        </div>
    </div>
</div>

<footer class="blog-footer">
    <ul class="list-inline">

        <li class="list-inline-item"><a class="text-light" href="http://www.tuviti.com/instant-blog/page/sample-page">Sample Page</a></li>

        <li class="list-inline-item"><a class="text-light" href="http://www.tuviti.com/instant-blog/page/sample-page-2">Sample Page 2</a></li>
    </ul>
    <div class="text-muted"><p>© 2018 ANC Media. This is footer. Go to <a href="https://codecanyon.net/item/instant-blog-facebook-instant-articles-google-amp-supported-php-script/21312459?ref=anc-media">CodeCanyon</a> .</p></div>
</footer>

<script src="style/js/jquery-3.2.1.min.js"></script>
<script src="style/js/salvattore.min.js"></script>
<script src="style/js/popper.min.js"></script>
<script src="style/js/bootstrap.min.js"></script>
<script src="style/js/heart.js"></script>
<script src="style/summernote/summernote-bs4.js"></script>
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
