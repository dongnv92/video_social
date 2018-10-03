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
        <?php
            echo $funcion->getBlockSideBarIndex();
            echo $funcion->getBlockSideBarCategory();
        ?>
        </aside>
        <!-- ... end Left Sidebar -->
        <!-- Right Sidebar -->
        <aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
            <?php echo $funcion->getBlockSideBarVideo(array('limit' => 5, 'rand' => true));?>
        </aside>
        <!-- ... end Right Sidebar -->
    </div>
</div>
<?php
require_once 'pages/footer.php';
