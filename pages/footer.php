<?php
/**
 * Created by PhpStorm.
 * User: DONG
 * Date: 01/10/2018
 * Time: 11:44
 */
?>
<!-- JS Scripts -->
<script src="<?php echo _URL_STYLE;?>/js/jquery.appear.js"></script>
<script src="<?php echo _URL_STYLE;?>/js/jquery.mousewheel.js"></script>
<script src="<?php echo _URL_STYLE;?>/js/perfect-scrollbar.js"></script>
<script src="<?php echo _URL_STYLE;?>/js/jquery.matchHeight.js"></script>
<script src="<?php echo _URL_STYLE;?>/js/svgxuse.js"></script>
<script src="<?php echo _URL_STYLE;?>/js/imagesloaded.pkgd.js"></script>
<script src="<?php echo _URL_STYLE;?>/js/Headroom.js"></script>
<script src="<?php echo _URL_STYLE;?>/js/velocity.js"></script>
<script src="<?php echo _URL_STYLE;?>/js/ScrollMagic.js"></script>
<script src="<?php echo _URL_STYLE;?>/js/jquery.waypoints.js"></script>
<script src="<?php echo _URL_STYLE;?>/js/jquery.countTo.js"></script>
<script src="<?php echo _URL_STYLE;?>/js/popper.min.js"></script>
<script src="<?php echo _URL_STYLE;?>/js/material.min.js"></script>
<script src="<?php echo _URL_STYLE;?>/js/bootstrap-select.js"></script>
<script src="<?php echo _URL_STYLE;?>/js/smooth-scroll.js"></script>
<script src="<?php echo _URL_STYLE;?>/js/selectize.js"></script>
<script src="<?php echo _URL_STYLE;?>/js/swiper.jquery.js"></script>
<script src="<?php echo _URL_STYLE;?>/js/moment.js"></script>
<script src="<?php echo _URL_STYLE;?>/js/circle-progress.js"></script>
<script src="<?php echo _URL_STYLE;?>/js/loader.js"></script>
<script src="<?php echo _URL_STYLE;?>/js/jquery.magnific-popup.js"></script>
<script src="<?php echo _URL_STYLE;?>/js/base-init.js"></script>
<script defer src="<?php echo _URL_STYLE;?>/fonts/fontawesome-all.js"></script>
<script src="<?php echo _URL_STYLE;?>/Bootstrap/dist/js/bootstrap.bundle.js"></script>
<script src="<?php echo _URL_STYLE;?>/player/build/mediaelement-and-player.min.js"></script>
<script >
    $(document).ready(function() {
        $(document).on('scroll', function() {
            $('video').mediaelementplayer();
        }).trigger('scroll');
    });
</script>

</body>
</html>
