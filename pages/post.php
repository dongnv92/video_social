<?php
/**
 * Created by PhpStorm.
 * User: DONG
 * Date: 25/09/2018
 * Time: 11:25
 */
require_once '../includes/core.php';
$post       = $db->from(_TABLE_POST)->where('post_url' , $url)->fetch_first();
$users_post = $db->from(_TABLE_USERS)->where('users_id' , $post['post_users'])->fetch_first();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link rel="icon" type="image/x-icon" href="<?php echo _URL_HOME;?>/media/images/system/favicon.ico">
    <title><?php echo $post['post_name'];?></title>

    <!-- Facebook og-->
    <meta property="og:url" content="<?php echo $funcion->getCurrentDomain();?>" />
    <meta property="og:type" content="<?php echo $post['post_type'];?>" />
    <meta property="og:title" content="<?php echo $post['post_name'];?>" />
    <meta property="og:description" content="<?php echo $post['post_description'];?>" />
    <meta property="og:image" content="<?php echo $funcion->getMediaPost($post['post_id'],'images');?>"/>

    <!-- Css styles-->
    <link href="<?php echo _URL_STYLE;?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo _URL_STYLE;?>/css/instant.css" rel="stylesheet">
    <link href="<?php echo _URL_STYLE;?>/css/simple-line-icons.css" rel="stylesheet">
    <link href="<?php echo _URL_STYLE;?>/css/plyr.css" rel="stylesheet">
</head>
<body class="bg-instant">
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1&appId=727590360722146&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-nav">
    <a class="navbar-brand" href="<?php echo _URL_HOME;?>">
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
                <!-- Player -->
                <?php echo $funcion->getPlayerVideo($post['post_id']);?>
                <!-- Player -->
                <div class="card-body">
                    <div class="list-item mb-3">
                        <div class="list-left">
                            <a href="javascript:;">
                                <img class="avatar img-fluid rounded-circle" src="<?php echo $funcion->getDetailUser($post['post_id'],'users_avatar');?>">
                            </a>
                        </div>
                        <div class="list-body">
                            <div class="text-ellipsis">
                                <a class="nocolor" href="javascript:;"><?php echo $users_post['users_name'];?></a>
                                <small class="text-muted time"><?php echo $config->getTimeView($post['post_time']);?></small>
                            </div>
                            <div class="text-ellipsis">
                                <small class="text-muted"><?php echo $funcion->getDetailUser($post['post_id'], 'users_name');?></small>
                                <small class="text-muted time">
                                    <!-- category -->
                                    <?php
                                    foreach ($db->select('group_value')->from(_TABLE_GROUP)->where(array('group_type' => 'post', 'group_index' => $post['post_id']))->fetch() AS $post_cate){
                                        $category = $db->select('category_name')->from(_TABLE_CATEGORY)->where('category_id', $post_cate['group_value'])->fetch_first();
                                        echo '<a href="#">#'. $category['category_name'] .'</a> ';
                                    }
                                    ?>
                                    <!-- category -->
                                </small>
                            </div>
                        </div>
                    </div>
                    <h1><?php echo $post['post_name'];?></h1>
                    <p><?php echo $post['post_content'];?></p>
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
                            <a role="button" class="btn btn-face btn-sm share" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $funcion->getCurrentDomain();?>" target="_blank"><i class="icon-social-facebook icons"></i> <span class="d-none d-md-inline-block">Chia Sẻ</span></a>
                        </div>
                        <div class="col lesspadding">
                            <a role="button" class="btn btn-twit btn-sm share" href="https://twitter.com/share?url=<?php echo $funcion->getCurrentDomain();?>&via=" target="_blank"><i class="icon-social-twitter icons"></i> <span class="d-none d-md-inline-block">Chia Sẻ</span></a>
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
            <?php $funcion->getViewVideoGrid('video', array('limit' => 5, 'offset' => 0, 'rand' => true)); ?>
        </div>
    </div>
</div>

<div id="fbcomment" data-user-id="100006754150548"></div>

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
<script>const player = new Plyr('#player');</script>
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
