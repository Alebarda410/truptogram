<?php
require "links/db_connect.php";
if (!$_SESSION['logged_user']) {
    header('Location: /');
}
$user = $_SESSION['logged_user'];
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/profile_st.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/icon.ico" type="image/x-icon">
    <title>program</title>
</head>

<body>

    <?php include "HEADER.php"; ?>

    <?php if ($_SESSION['logged_user']->verification == 0) : ?>
        <div class="text">
            Для разблокировки полного функционала подтвердите почту!
        </div>
    <?php else : ?>
        <div class="wraper">
            <div class="cont">
                <form>

                    <label>Текущее имя: <?php echo $user->name; ?></label>
                    <input readonly onfocus="this.removeAttribute('readonly')" oninput="nameFun(this)" maxlength="12" type="text" name="name" placeholder="Введите новое имя" pattern="^[А-Я][а-я]{1,11}$">

                    <label>Текущий Email: <?php echo $user->email; ?></label>
                    <input oninput="emailFun(this)" maxlength="50" type="email" name="email" placeholder="Введите новый email" readonly onfocus="this.removeAttribute('readonly')">

                    <label>Изменить аватар</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="5242880‬" />
                    <input type="file" name="avatar" accept="image/*">

                    <label>Для изменения данных введите текущий пароль</label>
                    <input maxlength="50" type="password" name="password" placeholder="Введите ваш пароль" readonly onfocus="this.removeAttribute('readonly')">

                    <button class="ch_ps">Сменить пароль <img id="up_down" width="15px" src="img/down.svg" alt="" srcset=""></button>

                    <div class="wrap_pas_change">
                        <div class="pas_change">
                            <label>Новый пароль</label>
                            <input id="pas1" oninput="acept_pasFun(this)" value="" maxlength="50" type="password" name="new_password" placeholder="Введите новый пароль" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,}">

                            <label>Подтверждение нового пароля</label>
                            <input id="pas2" oninput="acept_pas2Fun(this)" value="" maxlength="50" type="password" name="new_password_2" placeholder="Подтвердите новый пароль">
                        </div>
                    </div>

                    <button type="submit">Подтвердить изменения</button>

                    <div class="msg"></div>
                </form>

                <div class="next_courses">
                    <?php if ($user->rol == 1) : ?>
                        <p>Вы лектор</p>
                        <a href="add_cours.php"><button class="left_btn">Новый курс</button></a>
                    <?php else : ?>
                        <p>Вы слушатель</p>
                    <?php endif;  ?>
                    <a href="my_curses.php"><button class="left_btn">Мои курсы</button></a>
                    <button onclick="del()" class="left_btn">Удалить аккаунт</button>
                    <a href="contact.php#email"><button class="left_btn">Написать администратору</button></a>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="libs/jquery.js"></script>
        <script type="text/javascript" src="js/prof_edit.js"></script>
    <?php endif; ?>
    <?php include "FOOTER.php"; ?>
</body>

</html>