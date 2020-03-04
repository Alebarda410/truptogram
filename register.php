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
    <form action="links/signup.php" method="post">
        <label>Полные ФИО </label>
        <input maxlength="100"
            type="text"
            name="full_name"
            placeholder="Введите полное имя"
            required
            pattern="[А-Я][а-я]{1,20}\s[А-Я][а-я]{1,20}\s[А-Я][а-я]{1,20}">
        <label>Ваш Email</label>
        <input maxlength="50"
            type="email"
            name="email"
            placeholder="Введите email"
            required>
        <label>Ваш пароль</label>
        <input maxlength="50"
            type="password"
            name="password"
            placeholder="Введите пароль"
            required
            pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
        <label>Подтверждение пароля</label>
        <input maxlength="50"
            type="password"
            name="password_2"
            placeholder="Подтвердите пароль"
            required>
        <label>Кто вы?</label>
        <div class="radio_b">
            <label><input class="radio_bb" type="radio" name="rol" value="1" required> Лектор</label>
            <label><input class="radio_bb" type="radio" name="rol" value="0" required> Слушатель</label>
        </div>
        <button type="submit">Зарегистрироваться</button>
        <p>
            Есть аккаунт? - <a href="login.php">авторизируйтесь</a>!
        </p>
        <?php
        if ($_SESSION['errR']) {
            echo '<b style="color:red;">'.$_SESSION['errR'].'</b>';
            $_SESSION['errR']='';
        }
        ?>
    </form>
</body>

</html>