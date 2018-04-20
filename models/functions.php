<?php
function add_user($user_ip, $user_browser, $date_created, $user_name){
    try {
        $dbh = new PDO('mysql:dbname=webinar_db;host=localhost', 'webinar', '1');
    } catch (Exception $e) {
        die($e->getMessage());
    }

    $sth = $dbh->prepare("INSERT INTO users SET
            user_name = :user_name,
            user_ip = :user_ip,
            user_browser = :user_browser,
            date_created = :date_created");
        $sth->execute(array('user_name' => $user_name,
                            'user_ip' => $user_ip,
                            'user_browser' => $user_browser,
                            'date_created' => $date_created));
}


function show_webinar($user_name){
    require '../templates/webinar.php';
}





 ?>
