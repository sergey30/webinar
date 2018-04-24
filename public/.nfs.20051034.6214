<?php
session_start();
require '../models/functions.php';

if (isset($_GET['session_id'])) {
    $_SESSION['id'] = $_GET['session_id'];
}
$user_ip = $_SERVER['REMOTE_ADDR'];
$user_browser = $_SERVER['HTTP_USER_AGENT'];
$date_created = date('Y-m-d H:i:s');
$today_date = date('d-m-Y');

$time_msk = date('H') + 3;
$webinar_time = 24 - $time_msk - 5;

switch ($webinar_time) {
    case '-5':
        $webinar_time = 20;
        break;
    case '-4':
        $webinar_time = 19;
        break;
    case '-3':
        $webinar_time = 18;
        break;
    case '-2':
        $webinar_time = 18;
        break;
}

if (($time_msk >= 19) && ($time_msk < 21)) {
    $webinar_time = "Вебинар идет";
}

if ((isset($_GET['tpl'])) && ($_GET['tpl'] === 'webinar')) {
    $user_name = get_user_name($_SESSION['id']);
    require '../templates/webinar.php';
} elseif (isset($_SESSION['id'])) {
    $user_name = get_user_name($_SESSION['id']);
    require '../templates/login.php';
} else {
    $user_name = false;
    require '../templates/login.php';
}
?>
