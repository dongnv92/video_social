<?php
/**
 * Created by PhpStorm.
 * User: DONG
 * Date: 21/09/2018
 * Time: 14:17
 */

require_once '../includes/core.php';
// Kiểm tra đã đăng nhập chưa
if(!$user){ $funcion->redirectUrl(_URL_LOGIN);exit();}
$admin_module   = 'category';

switch ($act){
    default:
        if(!in_array($type, array('video'))){
            $admin_title = 'Chuyên Mục';
            require_once 'header.php';
            echo $config->getPanelError(array('title' => 'Trang Không Tồn Tại', 'content' => 'Không đúng định dạng chuyên mục !'));
            require_once 'footer.php';
            break;
        }
        if($submit){
            $category_name      = (isset($_POST['category_name'])   && !empty($_POST['category_name']))     ? $_POST['category_name']   : false;
            $category_url       = (isset($_POST['category_url'])    && !empty($_POST['category_url']))      ? $_POST['category_url']    : false;
            $category_parent    = (isset($_POST['category_parent']) && !empty($_POST['category_parent']))   ? $_POST['category_parent'] : 0;
            $error              = array();
            if(!$category_name){
                $error['category_name'] = 'Bạn chưa nhập tên chuyên mục';
            }
            if(!$category_url){
                $category_url = $funcion->makeSlug($category_name);
            }
            if($category_parent){
                $db->select('category_id')->from(_TABLE_CATEGORY)->where(array('category_id' => $category_parent))->fetch_first();
                if($db->affected_rows == 0){
                    $error['category_parent'] = 'Chuyên Mục Không Tồn Tại';
                }
            }

            if(!$error){
                $data = array(
                    'category_name'     => $category_name,
                    'category_url'      => $category_url,
                    'category_type'     => $type,
                    'category_parent'   => $category_parent,
                    'category_users'    => $user['users_id'],
                    'category_time'     => $config->getTimeNow()
                );
                $id = $db->insert(_TABLE_CATEGORY, $data);
                if(!$id){
                    $admin_title = 'Thêm Chuyên Mục Video';
                    require_once 'header.php';
                    echo $config->getPanelError(array('title' => 'Lỗi thêm dữ liệu', 'content' => 'Đã xảy ra lỗi khi thêm dữ liệu !'));
                    require_once 'footer.php';
                    break;
                }
            }
        }
        $admin_title = 'Chuyên Mục';
        require_once 'header.php';
        ?>
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-header"><h4 class="card-title">Thêm Chuyên Mục</h4></div>
                    <div class="card-body">
                        <?php if($submit && !$error){ echo $config->getAlert('success', 'Thêm chuyên mục thành công'); }?>
                        <form action="" class="form form-horizontal" method="post">
                            <div class="form-group label-floating">
                                <label class="control-label">Tên Chuyên Mục</label>
                                <input type="text" required value="<?php $category_name;?>" name="category_name" placeholder="Nhập Tên Chuyên Mục" class="<?php echo $config->form_style('text_input')?>">
                                <?php echo $error['category_name'] ? $config->getAlert('help_error', $error['category_name']) : '';?>
                            </div>
                            <div class="form-group label-floating">
                                <label class="control-label">Đường Dẫn</label>
                                <input type="text" value="<?php $category_url?>" name="category_url" placeholder="Nhập Tên Đường Dẫn" class="<?php echo $config->form_style('text_input')?>">
                                <?php echo $error['category_url'] ? $config->getAlert('help_error', $error['category_url']) : '';?>
                            </div>
                            <fieldset class="form-group">
                                <p>Chuyên mục cha</p>
                                <select name="category_parent" class="<?php echo $config->form_style('text_input')?>">
                                    <option value="0">Trống</option>
                                    <?php $funcion->showCategories($db->select('category_id, category_name, category_parent')->from(_TABLE_CATEGORY)->where(array('category_type' => $type))->fetch(), 0, '','select'); ?>
                                </select>
                                <?php echo $error['category_parent'] ? $config->getAlert('help_error', $error['category_parent']) : '';?>
                            </fieldset>
                            <div class="text-right"><?php echo $config->form_input('submit', array('value' => 'Thêm Chuyên Mục', 'name' => 'submit'))?></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header"><h4 class="card-title">Danh Sách Chuyên Mục</h4></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <tbody>
                                <?php $funcion->showCategories($db->select('category_id, category_name, category_parent')->from(_TABLE_CATEGORY)->where(array('category_type' => $type))->fetch(), 0, '','table'); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script language="JavaScript">
            $(document).ready(function () {

            })
        </script>
        <?php
        require_once 'footer.php';
     break;
}