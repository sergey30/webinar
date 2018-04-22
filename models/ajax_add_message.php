<?php
// добавляется новая запись в таблицу messages, $_POST["message"] поступает из формы, $_POST["id"] поступает из скрытого элемента формы в который вписан id сессии, проверяется длина собщения
if ((isset($_POST['message']) && isset($_POST['id'])) && (strlen($_POST['message']) < 2400)) {
    try {
        $dbh = new PDO('mysql:dbname=webinar_db;host=localhost', 'webinar', '1');
    } catch (Exception $e) {
        die($e->getMessage());
    }

    // из таблицы users получение имя пользователя который создал сообщение
    $sth = $dbh->prepare('SELECT user_name FROM users WHERE
        id = :id');
    $sth->execute(array('id' => $_POST['id']));
    $array = $sth->fetch(PDO::FETCH_ASSOC);

    // создается сообщение в таблице messages
    $sth = $dbh->prepare('INSERT INTO messages SET
        uid = :uid,
        user_name = :user_name,
        message = :message,
        date_created = :date_created');
    $sth->execute(array('uid' => $_POST['id'],
                        'user_name' => $array['user_name'],
                        'message' => $_POST['message'],
                        'date_created' => date('Y-m-d H:i:s')));

    // получение всех сообщений пользователя
    $sth = $dbh->prepare('SELECT id, user_name, date_created, message FROM messages WHERE
                            uid = :uid');
    $sth->execute(array('uid' => $_POST['id']));
    $array = $sth->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($array);

}
?>
