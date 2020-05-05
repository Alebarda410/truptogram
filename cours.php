<?php
require "links/db_connect.php";
$cours = R::findOne('courses', 'id = ?', [$_GET['id']]);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cours.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/icon.ico" type="image/x-icon">
    <title>program</title>
    <script src="https://vk.com/js/api/openapi.js?168" type="text/javascript"></script>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=b9a5170f-cf6d-46ee-8b6c-753687614944&lang=ru_RU" type="text/javascript"></script>
</head>

<body>

    <?php include "HEADER.php"; ?>

    <div class="wraper">
    <?php echo $cours->topic; ?><br><br>
        <table>
            <tr>
                <td>Выступающий</td>
                <td><?php echo $cours->speaker; ?><br></td>
            </tr>
            <tr>
                <td>Число студентов</td>
                <td><?php echo $cours->count_student; ?><br></td>
            </tr>
            <tr>
                <td>Место проведения</td>
                <td><?php echo $cours->location; ?><br></td>
            </tr>
        </table><br>
        
        <?php echo $cours->overview; ?><br><br>
        <div id="vk_comments"></div>
    </div>

    <?php include "FOOTER.php"; ?>

    <script type="text/javascript">
        window.onload = function() {
            VK.init({
                apiId: 7411475,
                onlyWidgets: true
            });
            VK.Widgets.Comments('vk_comments', {
                limit: 10,
                attach: '*'
            }, <?php echo $_GET['id']; ?>);
        }
    </script>

</body>

</html>