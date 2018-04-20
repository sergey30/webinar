<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/css/bootstrap-reboot.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Webinar</title>
  </head>
  <body>
    <div class="webinar-container">
        <div class="header">
            <div class="author">
                <span class="faded-letters">Ведущие вебинара:</span>
                <span class="author-name">Варвара Еремина. Эксперт в области таргетированной рекламы в соц. сетях. С 2015 года.</span>
            </div>
            <div class="participant">
                <span class="faded-letters">Участник:</span>
                <span class="participant-name"><?php echo $user_name ?></span>
                <a href="http://192.168.64.2/webinar/public/?action=out">Выйти</a>
            </div>
        </div>
        <div class="title">
            "Турбо Инстаграм. Трансляция мастер-класса. Начинаем сегодня в 19:00 мск."
        </div>
        <div class="content">
            <div class="img visible">
                <img class="visible" src="assets/images/slide1.jpg" alt="">
                <img class="" src="assets/images/slide2.jpg" alt="">
                <img class="" src="assets/images/slide3.jpg" alt="">
                <img class="" src="assets/images/slide4.jpg" alt="">
                <div class="caption">Вебинар стартует в 19:00 мск Поддержка start@makers.bz</div>
            </div>
            <div class="video ">
                <video controls></video>
                <div class="caption">Если трансляция не идет, измените настройки браузера разрешив автозапуск контента</div>
            </div>
            <div class="chat">
                <div class="messages">
                    <div class="message">

                    </div>
                </div>
                <form class="" action="" method="get">
                    <input type="hidden" name="user_name" value="<?php echo $_SESSION['user_name'] ?>">
                    <textarea name="message" required></textarea>
                    <button type="submit" class="" name="submit" value="yes">Отправить</button>
                </form>
                <div class="notification">
                    Вы видите только свои сообщения и сообщения модераторов.
                </div>
            </div>
        </div>
    </div>

    <script src="assets/lib/jquery-3.3.1.js"></script>
    <script src="assets/js/script.js"></script>
  </body>
</html>
