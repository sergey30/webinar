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

    $sth = $dbh->prepare("SELECT id FROM users WHERE
                        user_name = :user_name and
                        user_ip = :user_ip and
                        user_browser = :user_browser and
                        date_created = :date_created");
    $sth->execute(array('user_name' => $user_name,
                        'user_ip' => $user_ip,
                        'user_browser' => $user_browser,
                        'date_created' => $date_created));

    $array = $sth->fetch(PDO::FETCH_ASSOC);

    $_SESSION['id'] = $array['id'];
}


function get_user_name(){
    try {
        $dbh = new PDO('mysql:dbname=webinar_db;host=localhost', 'webinar', '1');
    } catch (Exception $e) {
        die($e->getMessage());
    }

    $sth = $dbh->prepare("SELECT user_name FROM users WHERE
                        id = :id");
    $sth->execute(array('id' => $_SESSION['id']));

    $array = $sth->fetch(PDO::FETCH_ASSOC);
    $user_name = $array['user_name'];
    return $user_name;
}






 ?>
