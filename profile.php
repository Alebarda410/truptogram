<?php
require "links/db_connect.php";
if (!$_SESSION['logged_user']) {
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
    <header>
        <div class="hed_wraper">
            <nav class="header_nav">
                <a class="logo" href="/">
                    <img src="img\logo.svg" alt="TRUprogram">
                </a>
                <ul class="header_list">
                    <li class="list_item"><a href="">Новости</a></li>
                    <li class="list_item"><a href="">Курсы</a></li>
                    <li class="list_item"><a href="">Контакты</a></li>
                    <li class="list_item"><a href="">О нас</a></li>
                </ul>
            </nav>
            <div class="header_form">
                <a class="logo_hiden" href="/">
                    <img src="img\logo.svg" alt="TRUprogram">
                </a>
                <div class="lk_mini">
                    <div class="user">
                        <a class="n" href="profile.php"><?php echo $_SESSION['logged_user']->name; ?></a>
                        <a class="v" href="links/logout.php">Выйти</a>
                    </div>
                    <a href="profile.php"><img width="50px" src=<?php echo '"' . $_SESSION['logged_user']->avatar . '"'; ?> alt="avatar"></a>
                </div>

            </div>
    </header>
    <div class="wraper">
        <div class="edit_profile">
            <form action="links/edit_user.php" method="post">

                <label>Текущее имя: <?php echo $_SESSION['logged_user']->name; ?></label>
                <input oninput="nameFun(this)" maxlength="12" type="text" name="name" placeholder="Введите новое имя">

                <label>Текущий Email: <?php echo $_SESSION['logged_user']->email; ?></label>
                <input oninput="emailFun(this)" maxlength="50" type="email" name="email" placeholder="Введите новый email">

                <label>Изменить аватар</label>
                <input type="file" name="avatar">

                <label>Для подтверждения изменений введите текущий пароль</label>
                <input maxlength="50" type="password" name="password" placeholder="Введите ваш пароль">

                <label>Новый пароль</label>
                <input oninput="acept_pasFun(this)" maxlength="50" type="password" name="password" placeholder="Введите новый пароль">

                <label>Подтверждение нового пароля</label>
                <input oninput="acept_pas2Fun(this)" maxlength="50" type="password" name="password_2" placeholder="Подтвердите новый пароль">

                <button type="submit">Изменить</button>

                <div class="msg"></div>

                <script type="text/javascript" src="libs/jquery.js"></script>
                <script type="text/javascript" src="js/reg.js"></script>
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
        </div>
        <div class="next_courses">
            <p>Ближайшие курсы</p>
        </div>
    </div>
    <footer class="footer">
        <div class="foot_wraper">
            <div class="copyright">© TRUprogram 2020</div>
            <div class="social">
                <a href=""><img width="25rep" src="img/facebook.svg" alt="facebook"></a>
                <a href=""><img width="25rep" src="img/TRUtwitter.svg" alt="twitter"></a>
                <a href=""><img width="25rep" src="img/VK.svg" alt="VK"></a>
                <a href=""><img width="30rep" src="img/instagram.svg" alt="instagram"></a>
                <a href=""><img width="25rep" src="img/ok.svg" alt="ok"></a>
                <a href=""><img width="25rep" src="img/youtube.svg" alt="youtube"></a>
            </div>
            <div class="contacts">
                <p>pochta@gmail.com</p>
                <p>88005553535</p>
            </div>
        </div>
    </footer>
    <script type="text/javascript" src="libs/jquery.js"></script>
</body>

</html>