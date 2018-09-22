<?php
/**
 * Created by PhpStorm.
 * User: Dong
 * Date: 19/09/2018
 * Time: 20:45
 */

require_once 'includes/core.php';
if($user){
   redirectUrl(_URL_ADMIN);
}

if($submit){
    $username 	= $_REQUEST['username'] 	? trim($_REQUEST['username']) : '';
    $password 	= $_REQUEST['password'] 	? trim($_REQUEST['password']) : '';
    $remember 	= $_REQUEST['remember'] 	? trim($_REQUEST['remember']) : '';
    if($submit){
        $error = array();
        $db->from(_TABLE_USERS);
        $db->where('users_password' , md5($password));
        $db->open_where();
        $db->where('users_login', $username);
        $db->or_where('users_email', $username);
        $db->close_where();
        $row = $db->fetch_first();
        if(!$username || !$password){
            $error['login'] = 'Bạn cần nhập đủ thông tin';
        }
        if(!$row){
            $error['login'] = 'Tên đăng nhập hoặc mât khẩu không đúng';
        }
        /* Xử lý đăng nhập thành công */
        if(!$error){
            if($remember){
                setcookie("user", $row['users_id'], time() + 30*24*60*60);
                setcookie('pass', $row['users_password'],time() + 30*24*60*60);
                $_SESSION['user'] = $row['users_id'];
                $_SESSION['pass'] = $row['users_password'];
            }else{
                $_SESSION['user'] = $row['users_id'];
                $_SESSION['pass'] = $row['users_password'];
            }
            $funcion->redirectUrl(_URL_ADMIN);
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="author" content="DONG NGUYEN">
    <title>Đăng nhập</title>
    <link rel="apple-touch-icon" href="style/layouts/imgs/favicon.ico">
    <link rel="shortcut icon" type="image/x-icon" href="style/layouts/imgs/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="admin/app-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="admin/app-assets/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="admin/app-assets/vendors/css/forms/icheck/custom.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="admin/app-assets/css/app.css">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="admin/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="admin/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="admin/app-assets/css/pages/login-register.css">
    <!-- END Page Level CSS-->
</head>
<body class="vertical-layout vertical-menu 1-column   menu-expanded blank-page blank-page"
      data-open="click" data-menu="vertical-menu" data-col="1-column">
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-md-4 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 m-0">
                            <div class="card-header border-0">
                                <div class="card-title text-center">
                                    <div class="p-1">
                                        <img src="style/layouts/imgs/logo.png" alt="branding logo">
                                    </div>
                                </div>
                                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                    <span>Đăng nhập hệ thống</span>
                                </h6>
                            </div>
                            <div class="card-content">
                                <?php
                                if($submit && $error['login']){
                                    echo '<p class="card-text text-center text-danger"><i>'.$error['login'].'</i></p>';
                                }
                                ?>
                                <div class="card-body">
                                    <form class="form-horizontal form-simple" action="" method="post">
                                        <fieldset class="form-group position-relative has-icon-left mb-0">
                                            <input type="text" class="form-control form-control-lg input-lg" name="username" value="<?php echo $username;?>" placeholder="Tên đăng nhập" required>
                                            <div class="form-control-position">
                                                <i class="ft-user"></i>
                                            </div>
                                        </fieldset>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="password" class="form-control form-control-lg input-lg" name="password" placeholder="Nhập mật khẩu" required>
                                            <div class="form-control-position">
                                                <i class="la la-key"></i>
                                            </div>
                                        </fieldset>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-12 text-center text-md-left">
                                                <fieldset>
                                                    <label for="remember-me"><input type="checkbox" name="remember" value="1" class="chk-remember"> Ghi nhớ đăng nhập</label>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-6 col-12 text-center text-md-right"><a href="javascript:;" class="card-link">Quên mật khẩu?</a></div>
                                        </div>
                                        <input type="submit" name="submit" class="btn btn-info btn-lg btn-block" value="Đăng nhập">
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="">
                                    <p class="float-sm-left text-center m-0">
                                        <a href="#" class="card-link">VIDEO GIẢI TRÍ</a>
                                    </p>
                                    <p class="float-sm-right text-center m-0">
                                        <a href="#" class="card-link">LIÊN HỆ</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<script src="admin/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
<script src="admin/app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
<script src="admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js" type="text/javascript"></script>
<script src="admin/app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="admin/app-assets/js/core/app.js" type="text/javascript"></script>
<script src="admin/app-assets/js/scripts/forms/form-login-register.js" type="text/javascript"></script>
</body>
</html>