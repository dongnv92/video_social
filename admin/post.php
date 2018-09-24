<?php
/**
 * Created by PhpStorm.
 * User: DONG
 * Date: 20/09/2018
 * Time: 14:50
 */

require_once '../includes/core.php';
// Kiểm tra đã đăng nhập chưa
if(!$user){ $funcion->redirectUrl(_URL_LOGIN);exit();}
$admin_module   = 'post';

switch ($act){
    case 'add':
        switch ($type){
            case 'video':
                if($submit){
                    $post_title         = (isset($_POST['post_title'])          && !empty($_POST['post_title']))        ? $_POST['post_title']          : false;
                    $post_content       = (isset($_POST['post_content'])        && !empty($_POST['post_content']))      ? $_POST['post_content']        : false;
                    $post_source        = (isset($_POST['post_source'])         && !empty($_POST['post_source']))       ? $_POST['post_source']         : false;
                    $post_store         = (isset($_POST['post_store'])          && !empty($_POST['post_store']))        ? $_POST['post_store']          : false;
                    $post_images        = (isset($_POST['post_images'])         && !empty($_POST['post_images']))       ? $_POST['post_images']         : false;
                    $post_category      = (isset($_POST['post_category'])       && !empty($_POST['post_category']))     ? $_POST['post_category']       : false;
                    $post_keyword       = (isset($_POST['post_keyword'])        && !empty($_POST['post_keyword']))      ? $_POST['post_keyword']        : false;
                    $post_description   = (isset($_POST['post_description'])    && !empty($_POST['post_description']))  ? $_POST['post_description']    : false;
                    $post_url           = (isset($_POST['post_url'])            && !empty($_POST['post_url']))          ? $_POST['post_url']            : false;
                    $error              = array();
                    if(!$post_title){
                        $error['post_title'] = 'Bạn chưa nhập tiêu đề';
                    }
                    if($post_source && !filter_var($post_source, FILTER_VALIDATE_URL)){
                        $error['post_source'] = 'Không đúng định dạng URL';
                    }
                    if(!$post_store){
                        $error['post_store'] = 'Bạn chưa nhập nguồn lưu trữ Video gốc';
                    }
                    if($post_store && !filter_var($post_source, FILTER_VALIDATE_URL)){
                        $error['post_store'] = 'Không đúng định dạng URL';
                    }



                    break;
                }
                $admin_title    = 'Thêm Mới Video';
                $css_plus       = array(
                    'app-assets/vendors/css/editors/tinymce/tinymce.min.css',
                    'app-assets/vendors/css/forms/selects/select2.min.css',
                    'app-assets/vendors/css/forms/toggle/bootstrap-switch.min.css',
                    'app-assets/vendors/css/forms/toggle/switchery.min.css',
                    'app-assets/css/plugins/forms/switch.min.css',
                    'app-assets/css/core/colors/palette-switch.min.css',
                    'app-assets/vendors/css/extensions/sweetalert.css'
                );
                $js_plus        = array(
                    'app-assets/vendors/js/editors/tinymce/tinymce.js',
                    'app-assets/js/scripts/editors/editor-tinymce.min.js',
                    'app-assets/vendors/js/forms/select/select2.full.min.js',
                    'app-assets/js/scripts/forms/select/form-select2.min.js',
                    'app-assets/vendors/js/forms/toggle/bootstrap-switch.min.js',
                    'app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js',
                    'app-assets/vendors/js/forms/toggle/switchery.min.js',
                    'app-assets/js/scripts/forms/switch.min.js',
                    'app-assets/vendors/js/extensions/sweetalert.min.js',
                    'app-assets/js/scripts/extensions/sweet-alerts.min.js'
                );
                require_once 'header.php';
                ?>
                <form class="form form-horizontal" action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"><?php echo $admin_title;?></h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <input required type="text" value="<?php echo $post_title;?>" autofocus class="<?php echo $config->form_style('text_input');?>" placeholder="Tiêu Đề Video" name="post_title">
                                        <?php echo $error['post_title'] ? $config->getAlert('help_error', $error['post_title']) : '';?>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="tinymce round" name="post_content"><?php echo $post_content;?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"><?php echo $admin_title;?></h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col text-left">
                                                <label class="card-title ml-1">Đánh Dấu Video HOT</label>
                                            </div>
                                            <div class="col text-right">
                                                <input type="checkbox" name="post_popular" value="1" id="switcheryColor" class="switchery" data-color="primary"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col text-left">
                                                <label class="card-title ml-1">Đăng Luôn</label>
                                            </div>
                                            <div class="col text-right">
                                                <input type="checkbox" name="post_status" value="1" id="switcheryColor" class="switchery" data-color="primary" checked/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col text-left">
                                                <button type="button" id="auto_fill" class="btn btn-round btn-github">Tự Động Điền</button>
                                                <img height="50px" src="../style/layouts/imgs/<?php echo rand(1,17);?>.gif" style="display: none" id="loading_wait">
                                            </div>
                                            <div class="col text-right">
                                                <input type="submit" id="submit" name="submit" class="btn btn-round btn-github" value="Đăng Video" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header"><h4 class="card-title">Nguồn Video Và Lưu Trữ Gốc</h4></div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>URL Video Gốc</label>
                                        <input type="text" required class="<?php echo $config->form_style('text_input');?>" placeholder="URL Video Nguồn" name="post_source" />
                                        <?php echo $error['post_source'] ? $config->getAlert('help_error', $error['post_source']) : '';?>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-control"><strong class="text-danger">(*)</strong> URL Lưu Trữ Gốc</label>
                                        <input type="text" id="" class="<?php echo $config->form_style('text_input');?>" placeholder="URL Lưu Trữ Gốc" name="post_store" />
                                        <?php echo $error['post_store'] ? $config->getAlert('help_error', $error['post_store']) : '';?>
                                    </div>
                                    <div class="form-group">
                                        <label><strong class="text-danger">(*)</strong> URL Ảnh Video</label>
                                        <input type="text" class="<?php echo $config->form_style('text_input');?>" placeholder="URL Lưu Trữ Gốc" name="post_images" />
                                    </div>
                                    <fieldset class="form-group">
                                        <label><strong class="text-danger">(*)</strong> Hoặc Tải Ảnh Từ Máy Tính</label><br />
                                        <input type="file" class="round" name="post_images_upload">
                                    </fieldset>
                                    <div class="form-group text-center">
                                        <img id="images_preview" src="" height="200px" style="display: none;" />
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header"><h4 class="card-title">Tùy Chọn</h4></div>
                                <div class="card-body">
                                    <fieldset class="form-group">
                                        <label><strong class="text-danger">(*)</strong> Chuyên Mục</label><br />
                                        <select name="post_category[]" class="select2 form-control border-grey-blue" multiple="multiple">
                                            <?php $funcion->showCategories($db->select('category_id, category_name, category_parent')->from(_TABLE_CATEGORY)->where(array('category_type' => $type))->fetch(), 0, '','select'); ?>
                                        </select>
                                    </fieldset>
                                    <div class="form-group">
                                        <label>Thẻ Keyword</label>
                                        <input type="text" value="video hay, video giai tri, video giải trí, video gai xinh, hot girl" class="<?php echo $config->form_style('text_input');?>" placeholder="Thẻ Keyword" name="post_keyword" />
                                    </div>
                                    <fieldset class="form-group">
                                        <p class="text-muted">Thẻ Description.</p>
                                        <textarea class="<?php echo $config->form_style('text_input');?>" id="" rows="3" placeholder="Thẻ Description" name="post_description">Tổng hợp các Video hay, hot nhất hiện nay</textarea>
                                    </fieldset>
                                    <div class="form-group">
                                        <label>Đường Dẫn Bài Viết</label>
                                        <input type="text" class="<?php echo $config->form_style('text_input');?>" placeholder="Đường Dẫn Bài Viết" name="post_url" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <script language="JavaScript">
                    function ValidURL(str) {
                        var regex = /(http|https):\/\/(\w+:{0,1}\w*)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%!\-\/]))?/;
                        if(!regex .test(str)) {
                            return false;
                        } else {
                            return true;
                        }
                    }

                    $(document).ready(function(){

                        $('input[name=submit]').click(function () {

                        })

                        $('#auto_fill').click(function () {
                            var post_post_source = $('input[name=post_source]').val();
                            if(post_post_source == ''){
                                swal("warning!", "Bạn chưa nhập URL VIDEO");
                                return false;
                            }
                            if(ValidURL(post_post_source) == false){
                                swal("warning!", "URL VIDEO không đúng định dạng");
                                return false;
                            }

                            $.ajax({
                                url         : '<?php echo _URL_HOME;?>/includes/ajax.php',
                                method      : 'POST',
                                dataType    : 'json',
                                data        : {'act' : 'get_auto_video', 'url' : post_post_source, 'post_title' : $('input[name=post_title]').val()},
                                beforeSend  : function () {
                                    $('#loading_wait').show();
                                },
                                success     : function (data) {
                                    $('input[name=post_images]').val(data.images);
                                    $('#images_preview').attr('src', data.images);
                                    $('#images_preview').show();
                                    $('input[name=post_url]').val(data.urlSlug);
                                    $('#loading_wait').hide();
                                }
                            })
                        })
                    });
                </script>
                <?php
                require_once 'footer.php';
            break;
        }
        ?>
        <?php
    break;
}