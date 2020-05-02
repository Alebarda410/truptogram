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
    <script type="text/javascript">
        ymaps.ready(init);

        function init() {
            var myMap = new ymaps.Map("map", {
                center: [55.76, 37.64],
                zoom: 7
            });
        }
    </script>
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

                <label>Максимальное число участников</label>
                <input type="number" name="count_student" max="2147483647" placeholder="0 если неограниченно" required>

                <label>Подробное описание курса</label>
                <textarea required maxlength="5000" placeholder="Максимум 5000 символов" form="tipo_id" name="overview" id="" cols="30" rows="10"></textarea>

                <label>Выберите способ и место проведение</label>
                <div class="radio_b">
                    <label><input class="radio_bb" type="radio" name="pin" value="1" required> Онлайн</label>
                    <label><input class="radio_bb" type="radio" name="pin" value="0" required> По адресу</label>
                </div>
                <div class="wrap_map">
                    <label>Выберите место</label>
                    <div id="map" style="width: 397.31px; height: 300px"></div>
                </div>
                <div class="wrap_text">
                    <div class="cost_flex">
                        <label>Ссылка на ваш сайт</label>
                        <input maxlength="50" type="text" name="location" placeholder="Web адрес" required>
                    </div>
                </div>

                <label>Для добавления курса введите текущий пароль</label>
                <input maxlength="50" type="password" name="password" placeholder="Введите ваш пароль" required>

                <button type="submit">Добавить курс</button>

                <div class="msg"></div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/add_cours.js"></script>
    <script type="text/javascript" src="libs/jquery.js"></script>
    <script type="text/javascript">
        $('form').submit(function(event) {
            event.preventDefault();
            var formNm = $('form')[0];
            var formData = new FormData(formNm);
            $.ajax({
                type: 'POST',
                url: '',
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

        $('[value = 1]').click(function() {
            $('.wrap_map').hide(100);
            $('.wrap_text').show(100);
        });

        $('[value = 0]').click(function() {
            $('.wrap_text').hide(100);
            $('.wrap_map').show(100);
        });
    </script>
    <?php include "FOOTER.php"; ?>

</body>

</html>