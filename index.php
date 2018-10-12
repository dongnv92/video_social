<?php
/**
 * Created by PhpStorm.
 * User: DONG
 * Date: 24/09/2018
 * Time: 16:31
 */
require_once 'includes/core.php';
require_once 'pages/header.php';
//$db->select('post_id')->from(_TABLE_POST);
//$db->where(array('post_type' => 'video', 'post_show' => 1, 'post_status' => 1));
//$db->execute();
//$total_count = $db->affected_rows;
?>
<div class="container">
    <div class="row">
        <!-- Main Content -->
        <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
            <div id="newsfeed-items-grid">
                <input type="hidden" name="total_count" id="total_count" value="<?php /*echo $total_count; */?>" />
                <?php /*echo $funcion->getViewVideoList('video', array('limit' => 4, 'offset' => 0));*/?>
            </div>
            <div class="text-center" id="load-more-button">
                <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span>
                <div>Đang tải dữ liệu. Vui lòng đợi ...</div>
            </div>
            <br />
        </main>
        <!-- ... end Main Content -->
        <!-- Left Sidebar -->
        <aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-12 col-12">
        <?php
            echo $funcion->getBlockSideBarIndex();
            echo $funcion->getBlockSideBarCategory();
            echo $funcion->getBlockAbout();
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
    <script type="text/javascript">
        $(document).ready(function(){
            getMoreData(37);
            windowOnScroll();
        });
        function windowOnScroll() {
            $(window).on("scroll", function(e){
                if ($(window).scrollTop() == $(document).height() - $(window).height()){
                    if($(".ui-block").length < $("#total_count").val()) {
                        var lastId = $("div[name=ui-block]:last").attr("id");
                        getMoreData(lastId);
                    }
                }
            });
        }

        function getMoreData(lastId) {
            $(window).off("scroll");
            $.ajax({
                url: '<?php echo _URL_HOME;?>/includes/ajax.php?act=video_load&limit=4&last_id=' + lastId,
                type: "get",
                beforeSend: function ()
                {
                    $('#load-more-button').show();
                },
                success: function (data) {
                    setTimeout(function() {
                        $('#load-more-button').hide();
                        $("#newsfeed-items-grid").append(data);

                        windowOnScroll();
                    }, 1000);
                }
            });
        }
    </script>
<?php
require_once 'pages/footer.php';
