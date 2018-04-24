<?php
if ((isset($_POST['user_name'])) && (strlen($_POST['user_name']) > 0)) {
    try {
        $dbh = new PDO('mysql:dbname=webinar_db;host=localhost', 'webinar', '1');
    } catch (Exception $e) {
        die($e->getMessage());
    }

    $user_name = $_POST['user_name'];
    $user_ip = $_SERVER['REMOTE_ADDR'];
    $user_browser = $_SERVER['HTTP_USER_AGENT'];
    $date_created = date('Y-m-d H:i:s');

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

    // $_SESSION['id'] = $array['id'];

    echo $array['id'];

    // echo "string";
    //
    // header('Location: http://192.168.64.2/webinar/public/?tpl=webinar');
}
?>
