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
    <div class="login-container">
        <div class="form">
            <div class="title">
                "Турбо Инстаграм. Трансляция мастер-класса. Начинаем сегодня в 19:00 мск."
            </div>
            <div class="author">
                <span class="faded-letters">Ведущие вебинара:</span><br>
                <span class="big-latters">Варвара Еремина. Эксперт в области таргетированной рекламы в соц. сетях. С 2015 года.</span>
            </div>
            <div class="date">
                <span class="faded-letters">Дата проведения:</span><br>
                <span class="big-latters">17.04.2018 - 19:00</span>
                <span class="faded-letters">мск</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="big-latters">Начало</span>
                <span class="faded-letters">9</span>
                <span class="big-latters">ч.</span>
            </div>
            <form class="" action="" method="post">
                <label for="input-name">Введите ваше имя:</label><br>
                <input type="text" class="" id="input-name" name="user_name" placeholder="например, Иван Петров" required autofocus pattern="[a-zA-Z0-9А-Яа-яЁё]{1,20}" value="<?php echo $user_name ?>">
                <button type="submit" class="" name="submit" value="yes">Войти в комнату</button>
            </form>
        </div>
    </div>

    <!-- <script src="assets/lib/jquery-3.3.1.js"></script> -->
    <!-- <script src="assets/js/insert_name.js"></script> -->
  </body>
</html>
