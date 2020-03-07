<?php
require "links/db_connect.php";
if ($_SESSION['logged_user']) {
    header('Location: /');
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/reg_and_log_st.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/icon.ico" type="image/x-icon">
    <title>program</title>
</head>

<body>
    <a href="/">
        <div class="back">
            <img src="img\back.svg" alt="">
        </div>
    </a>
    <form action="links/signup.php" method="post">

        <label>Ваше имя</label>
        <input oninput="nameFun(this)" maxlength="20" type="text" name="name" placeholder="Введите ваше имя" required>

        <label>Ваш Email</label>
        <input oninput="emailFun(this)" maxlength="50" type="email" name="email" placeholder="Введите ваш email" required>

        <label>Ваш пароль</label>
        <input oninput="acept_pasFun(this)" maxlength="50" type="password" name="password" placeholder="Введите пароль" required>

        <label>Подтверждение пароля</label>
        <input oninput="acept_pas2Fun(this)" maxlength="50" type="password" name="password_2" placeholder="Подтвердите пароль" required>

        <label>Кто вы?</label>
        <div class="radio_b">
            <label><input class="radio_bb" type="radio" name="rol" value="1" required> Лектор</label>
            <label><input class="radio_bb" type="radio" name="rol" value="0" required> Слушатель</label>
        </div>

        <button type="submit">Зарегистрироваться</button>
        <p>
            Есть аккаунт? - <a href="login.php">авторизируйтесь</a>!
        </p>

        <div class="msg"></div>

        <script type="text/javascript" src="libs/jquery.js"></script>
        <script type="text/javascript" src="js/reg.js"></script>
        <script type="text/javascript">
            $('form').submit(function(event) {
                event.preventDefault();
                $.post('links/signup.php', $('form').serialize(),
                    function(data) {
                        if (data == '1') {
                            document.location.href = "index.php";
                        } else {
                            $('.msg').html(data);
                            $('form').css('padding-bottom', '33px');
                        }
                    }
                );
            });
        </script>
    </form>
</body>

</html>