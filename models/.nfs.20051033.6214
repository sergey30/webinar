<?php
function get_user_name($session_id){
    try {
        $dbh = new PDO('mysql:dbname=webinar_db;host=localhost', 'webinar', '1');
    } catch (Exception $e) {
        die($e->getMessage());
    }

    $sth = $dbh->prepare("SELECT user_name FROM users WHERE
                        id = :id");
    $sth->execute(array('id' => $session_id));

    $array = $sth->fetch(PDO::FETCH_ASSOC);
    $user_name = $array['user_name'];
    return $user_name;
}
 ?>
