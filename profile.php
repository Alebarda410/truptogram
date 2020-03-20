<?php
require "links/db_connect.php";
if (!$_SESSION['logged_user'] || $_SESSION['logged_user']->verification == 0) {
    header('Location: /');
}
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

    <div class="wraper">
        <div class="cont">
            <form>

                <label>Текущее имя: <?php echo $_SESSION['logged_user']->name; ?></label>
                <input oninput="nameFun(this)" maxlength="12" type="text" name="name" placeholder="Введите новое имя">

                <label>Текущий Email: <?php echo $_SESSION['logged_user']->email; ?></label>
                <input oninput="emailFun(this)" maxlength="50" type="email" name="email" placeholder="Введите новый email">

                <label>Изменить аватар</label>
                <input type="file" name="avatar">

                <label>Для подтверждения изменений введите текущий пароль</label>
                <input maxlength="50" type="password" name="password" placeholder="Введите ваш пароль">

                <button class="ch_ps">Сменить пароль <img id="up_down" width="15px" src="img/down.svg" alt="" srcset=""></button>

                <script type="text/javascript" src="libs/jquery.js"></script>
                <script type="text/javascript">
                    var ff = -1;
                    $('.ch_ps').click(function() {
                        event.preventDefault();
                        ff *= -1;
                        $('#pas1').val('');
                        $('#pas2').val('');
                        $('.wrap_pas_change').toggle(200);
                        if (ff == 1) {
                            $('#up_down').attr('src', 'img/up.svg');
                        } else {
                            $('#up_down').attr('src', 'img/down.svg');
                        }
                    });
                </script>
                <div class="wrap_pas_change">
                    <div class="pas_change">
                        <label>Новый пароль</label>
                        <input id="pas1" oninput="acept_pasFun(this)" value="" maxlength="50" type="password" name="new_password" placeholder="Введите новый пароль">

                        <label>Подтверждение нового пароля</label>
                        <input id="pas2" oninput="acept_pas2Fun(this)" value="" maxlength="50" type="password" name="new_password_2" placeholder="Подтвердите новый пароль">
                    </div>
                </div>

                <button type="submit">Подтвердить изменения</button>

                <div class="msg"></div>

                <script type="text/javascript" src="js/prof_edit.js"></script>
                <script type="text/javascript">
                    $('form').submit(function(event) {
                        event.preventDefault();
                        $.post('links/edit_user.php', $('form').serialize(),
                            function(data) {
                                $('.msg').html(data);
                                $('form').css('padding-bottom', '33px');
                            }
                        );
                    });
                </script>
            </form>

            <div class="next_courses">
                <p>Ближайшие курсы</p>
            </div>
        </div>
    </div>

    <?php include "FOOTER.php"; ?>

</body>

</html>