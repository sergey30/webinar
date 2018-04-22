<?php
session_start();
require '../models/functions.php';

$user_ip = $_SERVER['REMOTE_ADDR'];
$user_browser = $_SERVER['HTTP_USER_AGENT'];
$date_created = date('Y-m-d H:i:s');

if ((isset($_POST['user_name'])) && (strlen($_POST['user_name']) > 0) && ($_POST['submit'] == 'yes')) {
    if (isset($_SESSION['id'])) {
        $user_name = get_user_name();
        require '../templates/webinar.php';
    } else {
        $user_name = $_POST['user_name'];
        add_user($user_ip, $user_browser, $date_created, $user_name);
        require '../templates/webinar.php';
    }
} elseif (isset($_SESSION['id'])) {
    $user_name = get_user_name();
    require '../templates/login.php';
} else {
    $user_name = false;
    require '../templates/login.php';
}

?>
