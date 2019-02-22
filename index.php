<?php
/**
 * Created by PhpStorm.
 * User: DONG
 * Date: 24/09/2018
 * Time: 16:31
 */
require_once 'includes/core.php';
$sort = isset($_GET['sort']) ? $_GET['sort'] : '';
// Where
$where = array();
$where['post_type']     = 'video';
$where['post_status']   = 1;
if(!$sort){
    $where['post_show'] = 1;
}
// Where
$db->select('post_id')->from(_TABLE_POST);
$db->where($where);
$db->order_by('post_time', 'DESC');
$db->limit(5);
$data           = $db->fetch();

$db->select('post_id')->from(_TABLE_POST);
$db->where($where);
$db->execute();
$total_count = $db->affected_rows;

require_once 'pages/header.php';
?>
<div class="container">
    <div class="row">
        <!-- Main Content -->
        <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
            <div id="newsfeed-items-grid">
                <input type="hidden" name="total_count" id="total_count" value="<?php echo $total_count; ?>" />
                <?php
                foreach ($data as $video){
                    echo $funcion->getPostDetailList($video['post_id']);
                }
                ?>
            </div>
            <div class="text-center" id="load-more-button">
                <div><a href="#" onclick="windowOnScroll()" class="btn btn-primary btn-sm full-width" data-toggle="modal" data-target="#edit-my-poll-popup">Xem thêm<div class="ripple-container"></div></a></div>
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
                url: '<?php echo _URL_HOME;?>/includes/ajax.php?act=video_load&limit=5&last_id=' + lastId + '&sort=<?=$sort?>',
                type: "get",
                beforeSend: function (){
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
