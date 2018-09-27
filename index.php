<?php
/**
 * Created by PhpStorm.
 * User: DONG
 * Date: 24/09/2018
 * Time: 16:31
 */
require_once 'includes/core.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="<?php echo _URL_HOME;?>/media/images/system/favicon.ico">
    <title>Video Social</title>
    <link href="style/css/bootstrap.min.css" rel="stylesheet">
    <link href="style/summernote/summernote-bs4.css" rel="stylesheet">
    <link href="style/css/instant.css" rel="stylesheet">
    <link href="style/css/simple-line-icons.css" rel="stylesheet">
</head>
<body class="bg-instant">
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-nav">
    <a class="navbar-brand" href="<?php echo _URL_HOME;?>">
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
            <?php $funcion->getViewVideoGrid('video', array('limit' => 100, 'offset' => 0)); ?>
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
