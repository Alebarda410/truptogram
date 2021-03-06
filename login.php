<?php
require "links/db_connect.php";
if ($_SESSION['logged_user']) {
    header('Location: /');
}
$t = $_SERVER['HTTP_REFERER'];
if (!empty($t)) {
    if ($t != 'https://truprogram.space/register.php') {
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
    
        <label>Ваш Email</label>
        <input maxlength="50" type="email" name="email" placeholder="Введите email" required>

        <label>Ваш Пароль</label>
        <input maxlength="50" type="password" name="password" placeholder="Введите пароль" required>

        <button type="submit">Войти</button>
        <p color>
            Нет аккаунта? - <a href="register.php">зарегистрируйтесь</a>!
        </p>

        <div class="msg"></div>
        <script type="text/javascript" src="libs/jquery.js"></script>
        <script type="text/javascript">
            $('form').submit(function(event) {
                event.preventDefault();
                $.post('links/signin.php', $('form').serialize(),
                    function(data) {
                        if (data == '1') {
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