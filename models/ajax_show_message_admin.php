<?php
// if (isset($_POST['session_id'])) {
//     try {
//         $dbh = new PDO('mysql:dbname=webinar_db;host=localhost', 'webinar', '1');
//     } catch (Exception $e) {
//         die($e->getMessage());
//     }
//
//     $sth = $dbh->prepare('SELECT id, user_name, date_created, message FROM messages WHERE
//                             uid = :uid');
//     $sth->execute(array('uid' => $_POST['session_id']));
//     $array = $sth->fetchAll(PDO::FETCH_ASSOC);
//     echo json_encode($array);
// }
?>
