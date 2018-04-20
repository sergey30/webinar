<?php
session_start();
require '../models/functions.php';

$user_ip = $_SERVER['REMOTE_ADDR'];
$user_browser = $_SERVER['HTTP_USER_AGENT'];
$date_created = date('Y-m-d H:i:s');

if ((isset($_GET['user_name'])) && (strlen($_GET['user_name']) > 0) && ($_GET['submit'] == 'yes')) {
    $user_name = $_GET['user_name'];
    $_SESSION['user_name'] = $user_name;
    add_user($user_ip, $user_browser, $date_created, $user_name);
    show_webinar($user_name);
} elseif ( (isset($_SESSION['user_name'] )) && (!isset($_GET['user_name'])) ) {
    require '../templates/login.php';
} else {
    $_SESSION['user_name'] = false;
    require '../templates/login.php';
}





?>
