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

            <?php if ($_SESSION['logged_user']) : ?>
                <div class="lk_mini">

                    <div class="user">

                        <a class="n" href="profile.php">
                            <?php echo $_SESSION['logged_user']->name; ?>
                        </a>
                        
                        <a class="v" href="links/logout.php">Выйти</a>
                    </div>

                    <a href="profile.php">
                        <img width="50px" src=<?php echo '"' . $_SESSION['logged_user']->avatar . '"'; ?> alt="avatar">
                    </a>

                </div>
            <?php else : ?>
                <a href="login.php"><input class="log_btn" type="button" value="Вход"></a>
            <?php endif;  ?>
        </div>
    </div>
</header>