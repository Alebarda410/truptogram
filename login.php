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
    <form action="links/signin.php" method="post">
        <label>Ваш Email</label>
        <input maxlength="50" 
            type="email"
            name="email" 
            placeholder="Введите email" 
            required>
        <label>Ваш Пароль</label>
        <input maxlength="50"
            type="password"
            name="password"
            placeholder="Введите пароль"
            required
            readonly
            onfocus="this.removeAttribute('readonly')">
        <button type="submit">Войти</button>
        <p color>
            Нет аккаунта? - <a href="register.php">зарегистрируйтесь</a>!
        </p>
        <?php
        if ($_SESSION['errL']) {
            echo '<b style="color:red;">'.$_SESSION['errL'].'</b>';
            $_SESSION['errL']='';
        }
        ?>
    </form>
</body>

</html>