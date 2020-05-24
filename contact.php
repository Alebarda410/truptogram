<?php
require "links/db_connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contact_st.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/icon.ico" type="image/x-icon">
    <title>program</title>
</head>

<body>

    <?php include "HEADER.php"; ?>

    <div class="wraper">
        <div class="cont">

            <div class="zag">Что-то очень важное</div>

            <div class="txt">
                <p>Товарищи! постоянное информационно-пропагандистское обеспечение нашей деятельности играет важную роль в формировании существенных финансовых и административных условий. Товарищи! дальнейшее развитие различных форм деятельности способствует подготовки и реализации дальнейших направлений развития. Значимость этих проблем настолько очевидна, что сложившаяся структура организации представляет собой интересный эксперимент проверки модели развития. Не следует, однако забывать, что сложившаяся структура организации представляет собой интересный эксперимент проверки системы обучения кадров, соответствует насущным потребностям.</p>
                <p>Задача организации, в особенности же начало повседневной работы по формированию позиции требуют от нас анализа существенных финансовых и административных условий. Разнообразный и богатый опыт укрепление и развитие структуры позволяет выполнять важные задания по разработке позиций, занимаемых участниками в отношении поставленных задач. Не следует, однако забывать, что начало повседневной работы по формированию позиции позволяет выполнять важные задания по разработке форм развития. Повседневная практика показывает, что постоянное информационно-пропагандистское обеспечение нашей деятельности требуют определения и уточнения систем массового участия. Идейные соображения высшего порядка, а также реализация намеченных плановых заданий в значительной степени обуславливает создание направлений прогрессивного развития. Равным образом консультация с широким активом представляет собой интересный эксперимент проверки форм развития.</p>
                <p>Повседневная практика показывает, что консультация с широким активом требуют определения и уточнения модели развития. Товарищи! новая модель организационной деятельности позволяет оценить значение дальнейших направлений развития.</p>
            </div>
            <div class="zag">Форма обратной связи</div>

            <form>
                <label>Как к вам обращаться?</label>
                <input type="text" name="name" placeholder="Введите свое имя">
                <label>Email для ответа</label>
                <input type="email" name="email" placeholder="Введите email для ответа">
                <label>Суть обращения</label>
                <textarea placeholder="Опишите суть обращения" name="text" cols="100" rows="10"></textarea>
                <button type="submit">Отправить</button>
                <div class="msg"></div>
            </form>
            <a name="email"></a>
        </div>
    </div>

    <?php include "FOOTER.php"; ?>
    <script type="text/javascript" src="libs/jquery.js"></script>
    <script type="text/javascript">
        $('form').submit(function(event) {
            event.preventDefault();
            $.post('links/send_obr.php', $('form').serialize(),
                function(data) {
                    $('.msg').html(data);
                    $('form').css('padding-bottom', '33px');
                }
            );
        });
    </script>
</body>

</html>