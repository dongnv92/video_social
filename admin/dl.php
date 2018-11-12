<?php
/**
 * Created by PhpStorm.
 * User: DONG
 * Date: 2018-11-07
 * Time: 08:52
 */

require_once '../includes/core.php';
// Kiểm tra đã đăng nhập chưa
if(!$user){ $funcion->redirectUrl(_URL_LOGIN);exit();}
$admin_module   = 'dl';

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

$admin_title = 'Tải Video Về Máy';
require_once 'header.php';
?>
<form action="" method="post">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><h4 class="card-title"><?php echo $admin_title;?> <small id="text_download" style="display: none"></small></h4></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10">
                            <input type="text" name="url_video" placeholder="Nhập Link Video Cần Tải Về Máy" width="100%" class="form-control round border-blue" autofocus>
                        </div>
                        <div class="col-md-2 text-right">
                            <button name="submit" class="btn btn-round btn-outline-blue">Lấy Link Download</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header"><h4 class="card-title">Xem Trước</h4> </div>
                <div id="result" class="card-body">

                </div>
            </div>
        </div>
    </div>
</form>
<script language="JavaScript">
    $(document).ready(function () {
        $('button[name=submit]').click(function () {
            var url = $('input[name=url_video]').val();
            if(url == ''){
                swal("Thông báo!", "Bạn chưa nhập URL", "warning");
                return false;
            }

            $.ajax({
                url         : '<?php echo _URL_HOME;?>/includes/ajax.php',
                method      : 'POST',
                dataType    : 'json',
                data        : {'act' : 'get_auto_video', 'url' : url},
                beforeSend  : function () {
                    $('button[name=submit]').html('<i class="ft-refresh-cw spinner"></i>');
                },
                success     : function (data) {
                    $('button[name=submit]').html('Lấy Link Download');
                    $('#result').html('<video width="100%" controls><source src="'+ data.download +'"></video>');
                    $('#text_download').show();
                    $('#text_download').html('<i class="ft-download-cloud"></i><a href="<?php echo _URL_HOME;?>/includes/ajax.php?act=download&url='+ data.download +'">Tải Video Này Về Máy</a>');
                }
            });
            return false;
        });
    });
</script>
<?php
require_once 'footer.php';