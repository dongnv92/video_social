<?php
/**
 * Created by PhpStorm.
 * User: Dong
 * Date: 19/09/2018
 * Time: 22:18
 */
require_once('includes/core.php');
session_destroy();
setcookie('user', '');
setcookie('pass', '');
$user_id 	= false;
$user_pass	= false;
$funcion->redirectUrl(_URL_HOME);
