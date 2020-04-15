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
                    <input oninput="nameFun(this)" maxlength="12" type="text" name="name" placeholder="Введите новое имя" pattern="^[А-Я][а-я]{1,11}$">

                    <label>Текущий Email: <?php echo $user->email; ?></label>
                    <input oninput="emailFun(this)" maxlength="50" type="email" name="email" placeholder="Введите новый email">

                    <label>Изменить аватар</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="5242880‬" />
                    <input type="file" name="avatar" accept="image/*">

                    <label>Для изменения данных введите текущий пароль</label>
                    <input maxlength="50" type="password" name="password" placeholder="Введите ваш пароль">

                    <button class="ch_ps">Сменить пароль <img id="up_down" width="15px" src="img/down.svg" alt="" srcset=""></button>

                    <div class="wrap_pas_change">
                        <div class="pas_change">
                            <label>Новый пароль</label>
                            <input id="pas1" oninput="acept_pasFun(this)" value="" maxlength="50" type="password" name="new_password" placeholder="Введите новый пароль" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^\w\s]).{6,}">

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
                        <button>Новый курс</button>
                        <p>Ближайшие курсы</p>
                    <?php else : ?>
                        <p>Вы слушатель</p>
                        <p>Ближайшие курсы</p>
                    <?php endif;  ?>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/prof_edit.js"></script>
        <script type="text/javascript" src="libs/jquery.js"></script>
        <script type="text/javascript">
            $('form').submit(function(event) {
                event.preventDefault();
                var formNm = $('form')[0];
                var formData = new FormData(formNm);
                $.ajax({
                    type: 'POST',
                    url: 'links/edit_user.php',
                    enctype: 'multipart/form-data',
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        $('.msg').html(data);
                        $('form').css('padding-bottom', '33px');
                    }
                });
            });
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
    <?php endif; ?>
    <?php include "FOOTER.php"; ?>
</body>

</html>