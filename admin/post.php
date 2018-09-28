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
    case 'update':
        switch ($type){
            case 'video':
                $post = $db->from(_TABLE_POST)->where('post_id' , $id)->fetch_first();
                if(!$post){
                    $admin_title = 'Chuyên Mục';
                    require_once 'header.php';
                    echo $config->getPanelError(array('title' => 'Trang Không Tồn Tại', 'content' => 'Bài viết không tồn tại'));
                    require_once 'footer.php';
                    break;
                }

                $post_title         = (isset($_POST['post_title'])          && !empty($_POST['post_title']))        ? $_POST['post_title']          : $post['post_name'];
                $post_content       = (isset($_POST['post_content'])        && !empty($_POST['post_content']))      ? $_POST['post_content']        : $post['post_content'];
                $post_source        = (isset($_POST['post_source'])         && !empty($_POST['post_source']))       ? $_POST['post_source']         : $post['post_source'];
                $post_store         = (isset($_POST['post_store'])          && !empty($_POST['post_store']))        ? $_POST['post_store']          : $post['post_store'];
                $post_keyword       = (isset($_POST['post_keyword'])        && !empty($_POST['post_keyword']))      ? $_POST['post_keyword']        : $post['post_keyword'];
                $post_category      = (isset($_POST['post_category'])       && !empty($_POST['post_category']))     ? $_POST['post_category']       : '';
                $post_description   = (isset($_POST['post_description'])    && !empty($_POST['post_description']))  ? $_POST['post_description']    : $post['post_description'];
                $post_url           = (isset($_POST['post_url'])            && !empty($_POST['post_url']))          ? $_POST['post_url']            : $post['post_url'];
                $post_status        = (isset($_POST['post_status'])         && !empty($_POST['post_status']))       ? $_POST['post_status']         : $post['post_status'];
                $post_show          = (isset($_POST['post_show'])           && !empty($_POST['post_show']))         ? $_POST['post_show']           : $post['post_show'];
                $media_images       = (isset($_POST['media_images'])        && !empty($_POST['media_images']))      ? $_POST['media_images']        : '';
                $media_video        = (isset($_POST['media_video'])         && !empty($_POST['media_video']))       ? $_POST['media_video']         : '';

                $error              = array();

                if($submit){
                    if(!$post_title){
                        $error['post_title'] = 'Bạn chưa nhập tiêu đề';
                    }
                    if($post_source && !filter_var($post_source, FILTER_VALIDATE_URL)){
                        $error['post_source'] = 'Không đúng định dạng URL';
                    }
                    if(($post['post_source'] != $post_source) && $db->select('post_source')->from(_TABLE_POST)->where('post_source' , $post_source)->fetch()){
                        $error['post_source'] = 'Video Đã Tồn Tại';
                    }
                    if(!$post_store){
                        $error['post_store'] = 'Bạn chưa nhập nguồn lưu trữ Video gốc';
                    }
                    if($post_store && !filter_var($post_source, FILTER_VALIDATE_URL)){
                        $error['post_store'] = 'Không đúng định dạng URL';
                    }
                    if(($post['post_store'] != $post_store) && $db->select('post_store')->from(_TABLE_POST)->where('post_store' , $post_store)->fetch()){
                        $error['post_store'] = 'URL lưu trữ đã tồn tại';
                    }
                    if(!in_array($funcion->urlToDomain($post_store) , $config->store_suport())){
                        $error['post_store'] = 'Trang lưu trữ không được hỗ trợ';
                    }
                    if(!$post_category){
                        $error['post_category'] = 'Bạn chưa chọn chuyên mục';
                    }
                    if(!$media_images && !$funcion->checkUpload('media_images_upload')){
                        $error['media_images'] = 'Bạn chưa chọn ảnh';
                    }
                    if($media_images && !filter_var($media_images, FILTER_VALIDATE_URL)){
                        $error['media_images'] = 'Đường dẫn File ảnh chưa đúng định dạng';
                    }
                    if(($post['post_url'] != $post_url) && $db->select('post_url')->from(_TABLE_POST)->where('post_url' , $post_url)->fetch()){
                        $error['post_url'] = 'URL đã tồn tại';
                    }
                    if(!$media_video){
                        $error['media_video'] = 'Video không được để trống';
                    }
                    if($media_video && !filter_var($media_video, FILTER_VALIDATE_URL)){
                        $error['media_video'] = 'URL Video Không Đúng Định Dạng';
                    }


                    $media_video = $funcion->getDirectOndrive($post_store);
                    if(!$media_video){
                        $error['post_store'] = 'Trang lưu trữ không được hỗ trợ hoặc có lỗi';
                    }

                    if(!$error) {
                        if($media_images != $funcion->getMediaPost($id, 'images')){
                            $data = $uploader->upload($media_images, array(
                                'uploadDir' => '../'._PATH_IMAGES_POST.'/',
                                'title' => array('auto', 12),
                            ));

                            if($data['isComplete']){
                                $images = $db->select('media_id')->from(_TABLE_MEDIA)->where(array('media_type' => 'images', 'media_parent' => $id))->fetch_first();
                                $media['media_name']    = $data['data']['metas'][0]['name'];
                                $media['media_source']  = _PATH_IMAGES_POST.'/'.$media['media_name'];
                                $data_img = array('media_source' => $media['media_source']);
                                if(!$db->where(array('media_id' => $images['media_id']))->update(_TABLE_MEDIA , $data_img)->execute()){
                                    $error['media_images'] = 'Có lỗi trong quá trình update ảnh';
                                }
                            }

                            if($data['hasErrors']){
                                $error['media_images'] = 'Có lỗi trong quá trình tải ảnh từ Server về';
                            }
                        }

                        if(!$error){
                            if($funcion->checkUpload('media_images_upload')){
                                $data = $uploader->upload($_FILES['media_images_upload'], array(
                                    'limit'         => 1, //Maximum Limit of files. {null, Number}
                                    'maxSize'       => 10, //Maximum Size of files {null, Number(in MB's)}
                                    'extensions'    => array('jpg', 'png','gif', 'jpeg'), //Whitelist for file extension. {null, Array(ex: array('jpg', 'png'))}
                                    'required'      => false, //Minimum one file is required for upload {Boolean}
                                    'uploadDir'     => '../'._PATH_IMAGES_POST.'/', //Upload directory {String}
                                    'title'         => array('auto', 12), //New file name {null, String, Array} *please read documentation in README.md
                                    'removeFiles'   => true, //Enable file exclusion {Boolean(extra for jQuery.filer), String($_POST field name containing json data with file names)}
                                    'replace'       => false, //Replace the file if it already exists {Boolean}
                                    'perms'         => null, //Uploaded file permisions {null, Number}
                                    'onCheck'       => null, //A callback function name to be called by checking a file for errors (must return an array) | ($file) | Callback
                                    'onError'       => null, //A callback function name to be called if an error occured (must return an array) | ($errors, $file) | Callback
                                    'onSuccess'     => null, //A callback function name to be called if all files were successfully uploaded | ($files, $metas) | Callback
                                    'onUpload'      => null, //A callback function name to be called if all files were successfully uploaded (must return an array) | ($file) | Callback
                                    'onComplete'    => null, //A callback function name to be called when upload is complete | ($file) | Callback
                                    'onRemove'      => 'onFilesRemoveCallback' //A callback function name to be called by removing files (must return an array) | ($removed_files) | Callback
                                ));

                                if($data['isComplete']){
                                    $images = $db->select('media_id')->from(_TABLE_MEDIA)->where(array('media_type' => 'video', 'media_parent' => $id))->fetch_first();
                                    $media['media_name']    = $data['data']['metas'][0]['name'];
                                    $media['media_source']  = _PATH_IMAGES_POST.'/'.$media['media_name'];
                                    $data_img = array('media_source' => $media['media_source']);
                                    if(!$db->where(array('media_id' => $images['media_id']))->update(_TABLE_MEDIA , $data_img)->execute()){
                                        $error['media_images'] = 'Có lỗi trong quá trình update ảnh';
                                    }
                                }

                                if($data['hasErrors']){
                                    $error['media_images'] = 'Có lỗi trong quá trình tải ảnh từ Server về';
                                }
                            }
                        }

                        if(!$error){
                            $data = array(
                                'post_name'         => $post_title,
                                'post_content'      => $post_content,
                                'post_keyword'      => $post_keyword,
                                'post_description'  => $post_description,
                                'post_source'       => $post_source,
                                'post_store'        => $post_store,
                                'post_status'       => $post_status,
                                'post_show'         => $post_show,
                                'post_url'          => $post_url
                            );
                            if($db->where(array('post_id' => $id))->update(_TABLE_POST, $data)->execute()){
                                // Add Category
                                foreach ($post_category AS $category){
                                    if(!$db->select('group_id')->from(_TABLE_GROUP)->where(array('group_type' => 'post', 'group_index' => $id, 'group_value' => $category))->fetch()){
                                        $data = array(
                                            'group_type'    =>  'post',
                                            'group_index'   =>  $id,
                                            'group_value'   =>  $category,
                                            'group_users'   =>  $user['users_id'],
                                            'group_time'    =>  $config->getTimeNow()
                                        );
                                        $db->insert(_TABLE_GROUP, $data);
                                    }
                                }
                                //$funcion->redirectUrl(_URL_ADMIN.'/post.php?type='.$type);
                                $post = $db->from(_TABLE_POST)->where('post_id' , $id)->fetch_first();
                            }
                        }
                    }
                }
                $admin_title    = 'Chỉnh sửa bài viết '.$post['post_name'];
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
                                    <h4 class="card-title"><?php echo $admin_title;?> <a href="<?php echo $funcion->getUrlPost($id);?>" target="_blank">Xem Bài Viết</a> </h4>
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
                            <div class="card">
                                <div class="card-header"><h4 class="card-title">Tập Tin Bài Viết</h4> </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-md-1 text-right">Ảnh</div>
                                        <div class="col-md-7">
                                            <input type="text" value="<?php echo $funcion->getMediaPost($id, 'images')?>" class="<?php echo $config->form_style('text_input');?>" name="media_images">
                                            <?php echo $error['media_images'] ? $config->getAlert('help_error', $error['media_images']) : '';?>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="file" id="post_images_upload" class="round" name="media_images_upload">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1 text-right">Video</div>
                                        <div class="col-md-11">
                                            <input type="text" value="<?php echo $funcion->getMediaPost($id, 'video')?>" class="<?php echo $config->form_style('text_input');?>" name="media_video">
                                            <?php echo $error['media_video'] ? $config->getAlert('help_error', $error['media_video']) : '';?>
                                        </div>
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
                                                <input type="checkbox" name="post_status" value="1" <?php echo $post_status ? 'checked' : '';?> class="switchery" data-color="primary"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col text-left">
                                                <label class="card-title ml-1">Đăng Luôn</label>
                                            </div>
                                            <div class="col text-right">
                                                <input type="checkbox" name="post_show" value="1" <?php echo $post_show ? 'checked' : '';?> class="switchery" data-color="primary" checked/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col text-right">
                                                <input type="submit" id="submit" name="submit" class="btn btn-round btn-github" value="Chỉnh Sửa Bài Viết" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header"><h4 class="card-title">Chuyên Mục</h4> </div>
                                <div class="card-body">
                                    <fieldset class="form-group">
                                        <label><strong class="text-danger">(*)</strong> Chuyên Mục</label><br />
                                        <select name="post_category[]" id="category_select" class="select2 form-control border-grey-blue" multiple="multiple">
                                        <?php
                                            foreach ($db->select('category_name, category_id')->from(_TABLE_CATEGORY)->where('category_type', 'video')->fetch() AS $category){
                                                echo '<option '. ($db->select('group_id')->from(_TABLE_GROUP)->where(array('group_type' => 'post', 'group_index' => $id, 'group_value' => $category['category_id']))->fetch() ? 'selected="selected"' : '') .' value="'. $category['category_id'] .'">'. $category['category_name'] .'</option>';
                                            }
                                        ?>
                                        </select>
                                        <?php echo $error['post_category'] ? $config->getAlert('help_error', $error['post_category']) : '';?>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header"><h4 class="card-title">Nguồn Video Và Lưu Trữ Gốc</h4></div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>URL Video Gốc <a id="text_download" style="display: none" href="" >| <i class="ft-download-cloud"></i> Tải Về</a></label>
                                        <input type="text" value="<?php echo $post_source;?>" class="<?php echo $config->form_style('text_input');?>" placeholder="URL Video Nguồn" name="post_source" />
                                        <?php echo $error['post_source'] ? $config->getAlert('help_error', $error['post_source']) : '';?>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-control"><strong class="text-danger">(*)</strong> URL Lưu Trữ Gốc</label>
                                        <input type="text" value="<?php echo $post_store;?>" class="<?php echo $config->form_style('text_input');?>" placeholder="URL Lưu Trữ Gốc" name="post_store" />
                                        <?php echo $error['post_store'] ? $config->getAlert('help_error', $error['post_store']) : '';?>
                                    </div>
                                    <div class="form-group text-center">
                                        <img src="<?php echo $funcion->getMediaPost($id, 'images')?>" height="200px" width="200" style="border-radius: 100px" />
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header"><h4 class="card-title">Tùy Chọn</h4></div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Đường Dẫn Bài Viết</label>
                                        <input type="text" value="<?php echo $post_url;?>" class="<?php echo $config->form_style('text_input');?>" placeholder="Đường Dẫn Bài Viết" name="post_url" />
                                        <?php echo $error['post_url'] ? $config->getAlert('help_error', $error['post_url']) : '';?>
                                    </div>
                                    <div class="form-group">
                                        <label>Thẻ Keyword</label>
                                        <input type="text" value="video hay, video giai tri, video giải trí, video gai xinh, hot girl" class="<?php echo $config->form_style('text_input');?>" placeholder="Thẻ Keyword" name="post_keyword" />
                                    </div>
                                    <fieldset class="form-group">
                                        <p class="text-muted">Thẻ Description.</p>
                                        <textarea class="<?php echo $config->form_style('text_input');?>" id="" rows="3" placeholder="Thẻ Description" name="post_description">Tổng hợp các Video hay, hot nhất hiện nay</textarea>
                                    </fieldset>
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
                            var post_store          = $('input[name=post_store]').val();
                            var media_images        = $('input[name=media_images]').val();
                            var media_video         = $('input[name=media_video]').val();
                            var count_cate_selected = $("#category_select :selected").length;

                            if(media_images == ''){
                                swal("Warning!", "Ảnh video không được để trống", "warning");
                                return false;
                            }
                            if(media_video == ''){
                                swal("Warning!", "Video lưu trữ không được để trống", "warning");
                                return false;
                            }
                            if(post_store == ''){
                                swal("Warning!", "Bạn chưa nhập URL file lưu trữ", "warning");
                                return false;
                            }
                            if(ValidURL(post_store) == false){
                                swal("Warning!", "URL File lưu trữ không đúng định dạng","warning");
                                return false;
                            }
                            if(count_cate_selected == 0){
                                swal("Thông báo!", "Bạn chưa chọn chuyên mục", "warning");
                                return false;
                            }
                            if( document.getElementById("post_images_upload").files.length == 0 && post_images == ''){
                                swal("Thông báo!", "Bạn cận nhập URL ảnh hoặc tải ảnh lên", "warning");
                                return false;
                            }

                        });
                    });
                </script>
                <?php
                require_once 'footer.php';
                break;
            default:
                $admin_title = 'Chuyên Mục';
                require_once 'header.php';
                echo $config->getPanelError(array('title' => 'Trang Không Tồn Tại', 'content' => 'Không đúng định dạng bài viết'));
                require_once 'footer.php';
                break;
        }
        break;
    case 'add':
        require_once '../includes/class.uploader.php';
        $uploader = new Uploader();
        switch ($type){
            case 'video':
                if($submit){
                    $post_title         = (isset($_POST['post_title'])          && !empty($_POST['post_title']))        ? $_POST['post_title']          : '';
                    $post_content       = (isset($_POST['post_content'])        && !empty($_POST['post_content']))      ? $_POST['post_content']        : '';
                    $post_source        = (isset($_POST['post_source'])         && !empty($_POST['post_source']))       ? $_POST['post_source']         : '';
                    $post_store         = (isset($_POST['post_store'])          && !empty($_POST['post_store']))        ? $_POST['post_store']          : '';
                    $post_images        = (isset($_POST['post_images'])         && !empty($_POST['post_images']))       ? $_POST['post_images']         : '';
                    $post_category      = (isset($_POST['post_category'])       && !empty($_POST['post_category']))     ? $_POST['post_category']       : '';
                    $post_keyword       = (isset($_POST['post_keyword'])        && !empty($_POST['post_keyword']))      ? $_POST['post_keyword']        : '';
                    $post_description   = (isset($_POST['post_description'])    && !empty($_POST['post_description']))  ? $_POST['post_description']    : '';
                    $post_url           = (isset($_POST['post_url'])            && !empty($_POST['post_url']))          ? $_POST['post_url']            : $funcion->makeSlug($post_title);
                    $post_status        = (isset($_POST['post_status'])         && !empty($_POST['post_status']))       ? $_POST['post_status']         : 0;
                    $post_show          = (isset($_POST['post_show'])           && !empty($_POST['post_show']))         ? $_POST['post_show']           : 0;
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
                    if(!in_array($funcion->urlToDomain($post_store) , $config->store_suport())){
                        $error['post_store'] = 'Trang lưu trữ không được hỗ trợ';
                    }
                    if(!$post_category){
                        $error['post_category'] = 'Bạn chưa chọn chuyên mục';
                    }
                    if(!$post_images && !$funcion->checkUpload('post_images_upload')){
                        $error['post_images'] = 'Bạn chưa chọn ảnh';
                    }
                    if($post_images && !filter_var($post_images, FILTER_VALIDATE_URL)){
                        $error['post_images'] = 'Đường dẫn File ảnh chưa đúng định dạng';
                    }
                    if($db->select('post_url')->from(_TABLE_POST)->where('post_url' , $post_url)->fetch()){
                        $error['post_url'] = 'URL đã tồn tại';
                    }
                    if($db->select('post_source')->from(_TABLE_POST)->where('post_source' , $post_source)->fetch()){
                        $error['post_source'] = 'Video Đã Tồn Tại';
                    }
                    if($db->select('post_store')->from(_TABLE_POST)->where('post_store' , $post_store)->fetch()){
                        $error['post_store'] = 'URL lưu trữ đã tồn tại';
                    }

                    if($post_images){
                        $data = $uploader->upload($post_images, array(
                            'uploadDir' => '../'._PATH_IMAGES_POST.'/',
                            'title' => array('auto', 12),
                        ));

                        if($data['isComplete']){
                            $media['media_name']    = $data['data']['metas'][0]['name'];
                            $media['media_type']    = 'images';
                            $media['media_source']  = _PATH_IMAGES_POST.'/'.$media['media_name'];
                            $media['media_store']   = 'local';
                        }

                        if($data['hasErrors']){
                            $error['post_images'] = 'Có lỗi trong quá trình tải ảnh từ Server về';
                        }
                    }

                    if($funcion->checkUpload('post_images_upload')){
                        $data = $uploader->upload($_FILES['post_images_upload'], array(
                            'limit' => 1, //Maximum Limit of files. {null, Number}
                            'maxSize' => 10, //Maximum Size of files {null, Number(in MB's)}
                            'extensions' => array('jpg', 'png','gif', 'jpeg'), //Whitelist for file extension. {null, Array(ex: array('jpg', 'png'))}
                            'required' => false, //Minimum one file is required for upload {Boolean}
                            'uploadDir' => '../'._PATH_IMAGES_POST.'/', //Upload directory {String}
                            'title' => array('auto', 12), //New file name {null, String, Array} *please read documentation in README.md
                            'removeFiles' => true, //Enable file exclusion {Boolean(extra for jQuery.filer), String($_POST field name containing json data with file names)}
                            'replace' => false, //Replace the file if it already exists {Boolean}
                            'perms' => null, //Uploaded file permisions {null, Number}
                            'onCheck' => null, //A callback function name to be called by checking a file for errors (must return an array) | ($file) | Callback
                            'onError' => null, //A callback function name to be called if an error occured (must return an array) | ($errors, $file) | Callback
                            'onSuccess' => null, //A callback function name to be called if all files were successfully uploaded | ($files, $metas) | Callback
                            'onUpload' => null, //A callback function name to be called if all files were successfully uploaded (must return an array) | ($file) | Callback
                            'onComplete' => null, //A callback function name to be called when upload is complete | ($file) | Callback
                            'onRemove' => 'onFilesRemoveCallback' //A callback function name to be called by removing files (must return an array) | ($removed_files) | Callback
                        ));

                        if($data['isComplete']){
                            $media['media_name']    = $data['data']['metas'][0]['name'];
                            $media['media_type']    = 'images';
                            $media['media_source']  = _PATH_IMAGES_POST.'/'.$media['media_name'];
                            $media['media_store']   = 'local';

                        }

                        if($data['hasErrors']){
                            $error['post_images'] = 'Có lỗi trong quá trình tải ảnh từ Server về';
                        }
                    }

                    $media_video = $funcion->getDirectOndrive($post_store);
                    if(!$media_video){
                        $error['post_store'] = 'Trang lưu trữ không được hỗ trợ hoặc có lỗi';
                    }

                    if(!$error) {
                        $data = array(
                            'post_name'         => $post_title,
                            'post_content'      => $post_content,
                            'post_type'         => $type,
                            'post_users'        => $user['users_id'],
                            'post_keyword'      => $post_keyword,
                            'post_description'  => $post_description,
                            'post_source'       => $post_source,
                            'post_store'        => $post_store,
                            'post_status'       => $post_status,
                            'post_show'         => $post_show,
                            'post_view'         => 0,
                            'post_url'          => $post_url,
                            'post_time'         => $config->getTimeNow()
                        );
                        $id = $db->insert(_TABLE_POST, $data);
                        if($id){
                            // Add Category
                            foreach ($post_category AS $category){
                                $data = array(
                                    'group_type'    =>  'post',
                                    'group_index'   =>  $id,
                                    'group_value'   =>  $category,
                                    'group_users'   =>  $user['users_id'],
                                    'group_time'    =>  $config->getTimeNow()
                                );
                                // Insert To Group
                                $db->insert(_TABLE_GROUP, $data);
                            }

                            $data = array(
                                'media_type'    =>  'images',
                                'media_name'    =>  $media['media_name'],
                                'media_source'  =>  $media['media_source'],
                                'media_store'   =>  $media['media_store'],
                                'media_users'   =>  $user['users_id'],
                                'media_parent'  =>  $id,
                                'media_time'    =>  $config->getTimeNow()
                            );
                            // Insert Images
                            $db->insert(_TABLE_MEDIA, $data);
                            $data = array(
                                'media_type'    =>  'video',
                                'media_name'    =>  $media_video,
                                'media_source'  =>  $media_video,
                                'media_store'   =>  'onedrive',
                                'media_users'   =>  $user['users_id'],
                                'media_parent'  =>  $id,
                                'media_time'    =>  $config->getTimeNow()
                            );
                            // Insert Video URL
                            $db->insert(_TABLE_MEDIA, $data);
                            $funcion->redirectUrl(_URL_ADMIN.'/post.php?type='.$type);
                        }

                    }
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
                                                <input type="checkbox" name="post_status" value="1" <?php echo $post_status ? 'checked' : '';?> class="switchery" data-color="primary"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col text-left">
                                                <label class="card-title ml-1">Đăng Luôn</label>
                                            </div>
                                            <div class="col text-right">
                                                <input type="checkbox" name="post_show" value="1" <?php echo $post_show ? 'checked' : '';?> class="switchery" data-color="primary" checked/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col text-left">
                                                <button type="button" id="auto_fill" class="btn btn-round btn-github">Tự Động Điền</button>
                                                <img height="50px" src="../media/images/system/gif/<?php echo rand(1,17);?>.gif" style="display: none" id="loading_wait">
                                            </div>
                                            <div class="col text-right">
                                                <input type="submit" id="submit" name="submit" class="btn btn-round btn-github" value="Đăng Video" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header"><h4 class="card-title">Chuyên Mục</h4> </div>
                                <div class="card-body">
                                    <fieldset class="form-group">
                                        <label><strong class="text-danger">(*)</strong> Chuyên Mục</label><br />
                                        <select name="post_category[]" id="category_select" class="select2 form-control border-grey-blue" multiple="multiple">
                                            <?php $funcion->showCategories($db->select('category_id, category_name, category_parent')->from(_TABLE_CATEGORY)->where(array('category_type' => $type))->fetch(), 0, '','select'); ?>
                                        </select>
                                        <?php echo $error['post_category'] ? $config->getAlert('help_error', $error['post_category']) : '';?>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header"><h4 class="card-title">Nguồn Video Và Lưu Trữ Gốc</h4></div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>URL Video Gốc <a id="text_download" style="display: none" href="" >| <i class="ft-download-cloud"></i> Tải Về</a></label>
                                        <input type="text" value="<?php echo $post_source;?>" class="<?php echo $config->form_style('text_input');?>" placeholder="URL Video Nguồn" name="post_source" />
                                        <?php echo $error['post_source'] ? $config->getAlert('help_error', $error['post_source']) : '';?>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-control"><strong class="text-danger">(*)</strong> URL Lưu Trữ Gốc</label>
                                        <input type="text" value="<?php echo $post_store;?>" class="<?php echo $config->form_style('text_input');?>" placeholder="URL Lưu Trữ Gốc" name="post_store" />
                                        <?php echo $error['post_store'] ? $config->getAlert('help_error', $error['post_store']) : '';?>
                                    </div>
                                    <div class="form-group">
                                        <label><strong class="text-danger">(*)</strong> URL Ảnh Video</label>
                                        <input type="text" value="<?php echo $post_images;?>" class="<?php echo $config->form_style('text_input');?>" placeholder="URL Lưu Trữ Gốc" name="post_images" />
                                        <?php echo $error['post_images'] ? $config->getAlert('help_error', $error['post_images']) : '';?>
                                    </div>
                                    <fieldset class="form-group">
                                        <label><strong class="text-danger">(*)</strong> Hoặc Tải Ảnh Từ Máy Tính</label><br />
                                        <input type="file" id="post_images_upload" class="round" name="post_images_upload">
                                    </fieldset>
                                    <div class="form-group text-center">
                                        <img id="images_preview" src="" height="200px" style="display: none;" />
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header"><h4 class="card-title">Tùy Chọn</h4></div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Đường Dẫn Bài Viết</label>
                                        <input type="text" value="<?php echo $post_url;?>" class="<?php echo $config->form_style('text_input');?>" placeholder="Đường Dẫn Bài Viết" name="post_url" />
                                        <?php echo $error['post_url'] ? $config->getAlert('help_error', $error['post_url']) : '';?>
                                    </div>
                                    <div class="form-group">
                                        <label>Thẻ Keyword</label>
                                        <input type="text" value="video hay, video giai tri, video giải trí, video gai xinh, hot girl" class="<?php echo $config->form_style('text_input');?>" placeholder="Thẻ Keyword" name="post_keyword" />
                                    </div>
                                    <fieldset class="form-group">
                                        <p class="text-muted">Thẻ Description.</p>
                                        <textarea class="<?php echo $config->form_style('text_input');?>" id="" rows="3" placeholder="Thẻ Description" name="post_description">Tổng hợp các Video hay, hot nhất hiện nay</textarea>
                                    </fieldset>
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
                            var post_store          = $('input[name=post_store]').val();
                            var post_images         = $('input[name=post_images]').val();
                            var count_cate_selected = $("#category_select :selected").length;

                            if(post_store == ''){
                                swal("Warning!", "Bạn chưa nhập URL file lưu trữ", "warning");
                                return false;
                            }
                            if(ValidURL(post_store) == false){
                                swal("Warning!", "URL File lưu trữ không đúng định dạng","warning");
                                return false;
                            }
                            if(count_cate_selected == 0){
                                swal("Thông báo!", "Bạn chưa chọn chuyên mục", "warning");
                                return false;
                            }
                            if( document.getElementById("post_images_upload").files.length == 0 && post_images == ''){
                                swal("Thông báo!", "Bạn cận nhập URL ảnh hoặc tải ảnh lên", "warning");
                                return false;
                            }
                            if(post_images != '' && ValidURL(post_images) == false){
                                swal("Warning!", "URL File ảnh sai định dạng","warning");
                                return false;
                            }

                        });

                        $('#auto_fill').click(function () {
                            var post_source = $('input[name=post_source]').val();

                            if(post_source == ''){
                                swal("Warning!", "Bạn chưa nhập URL VIDEO");
                                return false;
                            }
                            if(ValidURL(post_source) == false){
                                swal("Warning!", "URL VIDEO không đúng định dạng");
                                return false;
                            }

                            $.ajax({
                                url         : '<?php echo _URL_HOME;?>/includes/ajax.php',
                                method      : 'POST',
                                dataType    : 'json',
                                data        : {'act' : 'get_auto_video', 'url' : post_source, 'post_title' : $('input[name=post_title]').val()},
                                beforeSend  : function () {
                                    $('#loading_wait').show();
                                },
                                success     : function (data) {
                                    $('input[name=post_images]').val(data.images);
                                    $('#images_preview').attr('src', data.images);
                                    $('#images_preview').show();
                                    $('input[name=post_url]').val(data.urlSlug);
                                    $('#loading_wait').hide();
                                    $('#text_download').attr('href', '<?php echo _URL_HOME;?>/includes/ajax.php?act=download&url=' + data.video)
                                    $('#text_download').show();
                                },
                                timeout: 20000
                            })
                        })
                    });
                </script>
                <?php
                require_once 'footer.php';
            break; // Case Type Video
            default:
                $admin_title = 'Chuyên Mục';
                require_once 'header.php';
                echo $config->getPanelError(array('title' => 'Trang Không Tồn Tại', 'content' => 'Không đúng định dạng bài viết'));
                require_once 'footer.php';
                break;
                break;
        }
    break; // Case Act Add
    default:
        switch ($type){
            case 'video':
                $admin_title = 'Danh sách Video';
                $css_plus       = array(
                    'app-assets/vendors/css/extensions/sweetalert.css',
                    'app-assets/css/pages/users.min.css'
                );
                $js_plus        = array(
                    'app-assets/vendors/js/extensions/sweetalert.min.js',
                    'app-assets/js/scripts/extensions/sweet-alerts.min.js'
                );
                require_once 'header.php';
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Search Bar -->
                                <form action="" method="get">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="search-input open">
                                                <input class="input form-control round" type="text" value="<?php echo $users_name ? $users_name : '';?>" name="users_name" placeholder="Tên Video">
                                            </div>
                                        </div>
                                        <div class="col-md-3">

                                        </div>
                                        <div class="col-md-3">

                                        </div>
                                        <div class="col-md-3 text-right">
                                            <input type="submit" class="btn btn-outline-blue round" value="Lọc dữ liệu">
                                        </div>
                                    </div>
                                </form>
                                <!-- Search Bar -->
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $db->select()->from(_TABLE_POST);
                $db->where('post_type', $type);
                $db->order_by('post_id', 'DESC');
                $data = $db->fetch();
                echo '<div id="user-profile-cards-with-cover-image" class="row mt-2">';
                foreach ($data AS $datas){
                    ?>
                    <div class="col-xl-3 col-md-6 col-12" data-for="<?php echo $datas['post_id'];?>">
                        <div class="card profile-card-with-cover">
                            <div class="card-img-top img-fluid bg-cover height-200" style="background: url('<?php echo $funcion->getMediaPost($datas['post_id'], 'images')?>');"></div>
                            <div class="card-profile-image">
                                <img src="<?php echo $funcion->getDetailUser($datas['post_users'], 'users_avatar');?>" class="rounded-circle img-border box-shadow-1">
                            </div>
                            <div class="profile-card-with-cover-content text-center">
                                <div class="card-body">
                                    <h4 class="card-title"><a href="<?php echo $funcion->getUrlPost($datas['post_id']);?>"><?php echo $datas['post_name'];?></a></h4>
                                    <ul class="list-inline list-inline-pipe">
                                        <li><?php echo $funcion->getDetailUser($datas['post_users'], 'users_name');?></li>
                                        <li><?php echo $config->getTimeView($datas['post_time']);?></li>
                                    </ul>
                                    <h6 class="card-subtitle text-muted">
                                        <!-- category -->
                                        <?php
                                        foreach ($db->select('group_value')->from(_TABLE_GROUP)->where(array('group_type' => 'post', 'group_index' => $datas['post_id']))->fetch() AS $post_cate){
                                            $category = $db->select('category_name')->from(_TABLE_CATEGORY)->where('category_id', $post_cate['group_value'])->fetch_first();
                                            echo '<a href="#">#'. $category['category_name'] .'</a> ';
                                        }
                                        ?>
                                        <!-- category -->
                                    </h6>
                                </div>
                                <div class="text-center">
                                    <button type="button" title="delete" data-num="<?php echo $datas['post_id'];?>" class="btn btn-icon btn-pure secondary mr-1"><i class="ft-x"></i></button>
                                    <a href="<?php echo  _URL_ADMIN.'/post.php?act=update&type=video&id='.$datas['post_id'];?>"><button type="button" class="btn btn-icon btn-pure secondary mr-1"><i class="ft-edit"></i></button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                echo '</div>';
                ?>
                <script language="JavaScript">
                    $(document).ready(function () {
                        $('button[title=delete]').click(function () {
                            var id = $(this).attr('data-num');
                            swal({
                                title: "Bạn có chắc chắn muốn xóa bài viết này?",
                                text: "Sau khi xóa sẽ không khôi phục được!",
                                icon: "warning",
                                buttons: {
                                    cancel: {
                                        text: "Quay Lại",
                                        value: null,
                                        visible: true,
                                        className: "",
                                        closeModal: true,
                                    },
                                    confirm: {
                                        text: "Xóa Ngay",
                                        value: true,
                                        visible: true,
                                        className: "",
                                        closeModal: false
                                    }
                                }
                            })
                            .then((isConfirm) => {
                                if (isConfirm) {
                                    $.ajax({
                                        url     : '<?php echo _URL_HOME;?>/includes/ajax.php',
                                        method  : 'POST',
                                        dataType: 'json',
                                        data    : {'act' : 'post', 'type' : 'delete', 'id' : id},
                                        success : function (data) {
                                            if(data.resposive == 200){
                                                $('div[data-for='+ id +']').remove();
                                                swal("Deleted!", "Đã Xóa Bài Viết Thành Công.", "success");
                                            }else{
                                                swal("Error!", "Có lỗi khi thực hiện xóa bài viết. Vui lòng thử lại!", "error");
                                            }
                                        }
                                    });
                                }
                            });
                        });
                    })
                </script>
                <?php
                require_once 'footer.php';
                break;
            default:
                $admin_title = 'Chuyên Mục';
                require_once 'header.php';
                echo $config->getPanelError(array('title' => 'Trang Không Tồn Tại', 'content' => 'Không đúng định dạng bài viết'));
                require_once 'footer.php';
                break;
                break;
        }
        break;
}