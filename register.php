<?php
require "links/db_connect.php";
if ($_SESSION['logged_user']) {
    header('Location: /');
}
$t = $_SERVER['HTTP_REFERER'];
if (!empty($t)) {
    if ($t != 'https://truprogram.space/login.php') {
        $_SESSION['back'] = $_SERVER['HTTP_REFERER'];
    }
} else {
    $_SESSION['back'] = 'index.php';
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
    <a href="<?php echo $_SESSION['back']; ?>">
        <div class="back">
            <img id="o" src="img\back.svg" alt="back" width="30px">
            <img id="d" src="img\back_mini.svg" alt="back" width="40px">
        </div>
    </a>
    <form>

        <label>Ваше имя</label>
        <input oninput="nameFun(this)" maxlength="12" type="text" name="name" placeholder="Например Иван" required>

        <label>Ваш Email</label>
        <input oninput="emailFun(this)" maxlength="50" type="email" name="email" placeholder="example@mail.ru" required>

        <label>Ваш пароль</label>
        <input readonly onblur="remove()" onfocus="tooltip(this)" data-tooltip="Должен содержать минимум:<br>- одну латинскую букву<br>- одну заглавную букву<br>- одну цифру<br>быть длиннее 6 сиволов" oninput="acept_pasFun(this)" maxlength="50" type="password" name="password" placeholder="Введите пароль" required>

        <label>Подтверждение пароля</label>
        <input readonly onfocus="this.removeAttribute('readonly')" oninput="acept_pas2Fun(this)" maxlength="50" type="password" name="password_2" placeholder="Подтвердите пароль" required>

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
                            alert('Пройдите по ссылке в письме на почте чтобы получить полный доступ!');
                            document.location.href = "<?php echo $_SESSION['back']; ?>";
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