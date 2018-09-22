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
                                        <input type="text" autofocus class="<?php echo $config->form_style('text_input');?>" placeholder="Tiêu Đề Video" name="post_title">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="tinymce round"></textarea>
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
                                                <input type="checkbox" id="switcheryColor" class="switchery" data-color="primary"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col text-left">
                                                <label class="card-title ml-1">Đăng Không Cần Duyệt</label>
                                            </div>
                                            <div class="col text-right">
                                                <input type="checkbox" id="switcheryColor" class="switchery" data-color="primary" checked/>
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
                                        <input type="text" class="<?php echo $config->form_style('text_input');?>" placeholder="URL Video Nguồn" name="post_source" />
                                    </div>
                                    <div class="form-group">
                                        <label>URL Lưu Trữ Gốc</label>
                                        <input type="text" id="" class="<?php echo $config->form_style('text_input');?>" placeholder="URL Lưu Trữ Gốc" name="post_store" />
                                    </div>
                                    <div class="form-group">
                                        <label>URL Ảnh Video</label>
                                        <input type="text" class="<?php echo $config->form_style('text_input');?>" placeholder="URL Lưu Trữ Gốc" name="post_images" />
                                    </div>
                                    <fieldset class="form-group">
                                        <label>Hoặc Tải Ảnh Từ Máy Tính</label><br />
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
                                        <label>Chuyên Mục</label><br />
                                        <select class="select2 form-control border-grey-blue" multiple="multiple">
                                            <option value="1">Hài Hước</option>
                                            <option value="2">Giải Trí</option>
                                            <option value="3">TROLL</option>
                                            <option value="4">Hot Girl</option>
                                        </select>
                                    </fieldset>
                                    <div class="form-group">
                                        <label>Thẻ Keyword</label>
                                        <input type="text" value="video hay, video giai tri, video giải trí, video gai xinh, hot girl" class="<?php echo $config->form_style('text_input');?>" placeholder="Thẻ Keyword" name="post_keyword" />
                                    </div>
                                    <fieldset class="form-group">
                                        <p class="text-muted">Thẻ Description.</p>
                                        <textarea class="<?php echo $config->form_style('text_input');?>" id="" rows="3" placeholder="Thẻ Description" name="description">Tổng hợp các Video hay, hot nhất hiện nay</textarea>
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
                    $(document).ready(function(){
                        $('#auto_fill').click(function () {
                            var post_post_source = $('input[name=post_source]').val();
                            if(post_post_source == ''){
                                swal("Cảnh Báo!", "Bạn chưa nhập URL VIDEO");
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