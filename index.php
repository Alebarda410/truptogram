<?php require "links/db_connect.php"; ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
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

                <!--Проверка авторизации-->

                <?php if (isset($_SESSION['logged_user'])) : ?>

                    Ета ебала работает
                    <a href="links/logout.php">Выйти</a>

                <?php else : ?>
                    <a href="login.php"><input class="log_btn" type="button" value="Вход"></a>
                <?php endif;  ?>

                <!--Конец проверки авторизации-->

            </div>
    </header>

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
</body>

</html>