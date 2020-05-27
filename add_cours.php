<?php
require "links/db_connect.php";
if (!$_SESSION['logged_user']) {
    header('Location: /');
}
if ($_SESSION['logged_user']->rol == 0 || $_SESSION['logged_user']->verification == 0) {
    header('Location: /');
}
$date = date('Y-m-d\TH:i');
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/add_cours_st.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/icon.ico" type="image/x-icon">
    <title>program</title>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=b9a5170f-cf6d-46ee-8b6c-753687614944&lang=ru_RU" type="text/javascript"></script>
</head>

<body>

    <?php include "HEADER.php"; ?>

    <div class="wraper">
        <div class="cont">
            <form id="tipo_id">

                <label>Название курса</label>
                <input maxlength="50" type="text" name="topic" placeholder="HTML язык прораммирования" required>

                <label>Лектор курса</label>
                <input maxlength="50" type="text" name="speaker" placeholder="<?php echo $_SESSION['logged_user']->name; ?>" required>

                <label>Логотип курса</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="5242880‬" />
                <input type="file" name="logo" accept="image/*" required>

                <label>Дата и время курса</label>
                <input min="<?php echo $date; ?>" type="datetime-local" name="date" required>

                <label>Подробное описание курса</label>
                <textarea required maxlength="5000" placeholder="Максимум 5000 символов минимум 300" form="tipo_id" name="overview" cols="30" rows="10"></textarea>

                <label>Выберите способ и место проведение</label>
                <div class="radio_b">
                    <label><input onclick="clear_map()" class="radio_bb" type="radio" name="pin" value="1" required> Онлайн</label>
                    <label><input onclick="rabotai_padla()" class="radio_bb" type="radio" name="pin" value="0" required> По адресу</label>
                </div>
                <div class="wrap_map">
                    <label>Кликните по карте для выбора места</label>
                    <div id="map"></div>
                </div>
                <div class="wrap_text">
                    <div class="cost_flex">
                        <label>Ссылка на ваш сайт</label>
                        <input maxlength="50" type="text" name="location" placeholder="Web адрес" required>
                    </div>
                </div>

                <label>Для добавления курса введите текущий пароль</label>
                <input maxlength="50" type="password" name="password" placeholder="Введите ваш пароль" required readonly onfocus="this.removeAttribute('readonly')">

                <button onclick="mes()" type="submit">Добавить курс</button>

                <div class="msg"></div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="libs/jquery.js"></script>
    <script type="text/javascript" src="js/add_cours_map_api.js"></script>

    <?php include "FOOTER.php"; ?>

</body>

</html>