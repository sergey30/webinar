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
                <a href="http://192.168.64.2/webinar/public/">Выйти</a>
            </div>
        </div>
        <div class="title">
            Турбо Инстаграм. Трансляция мастер-класса. Начинаем сегодня в 19:00 мск.
        </div>
        <div class="content">
            <div class="img visible">
                <img class="visible" src="assets/images/slide1.jpg" alt="">
                <img class="" src="assets/images/slide2.jpg" alt="">
                <img class="" src="assets/images/slide3.jpg" alt="">
                <img class="" src="assets/images/slide4.jpg" alt="">
                <div class="caption">Если проблемы с видео или звуком: <br>
                    1. Закройте неиспользуемые вкладки браузера и другие неиспользуемые сейчас программы. <br>
                    2. Отключите AdBlock и другие расширения, которые могут влиять на работу комнаты. <br>
                    3. Смените браузер. Рекомендуем последние версии Chrome, Яндекс.Браузер, Opera, Firefox.
                </div>
            </div>
            <div class="video ">
                <video controls></video>
                <div class="caption">Если трансляция не идет, измените настройки браузера разрешив автозапуск контента</div>
            </div>
            <div class="chat">
                <div class="participants">
                    Количество участников: <span class="amount"></span>
                </div>
                <div class="messages">

                </div>
                <form class="" action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">
                    <textarea name="message" rows="1" required></textarea>
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
