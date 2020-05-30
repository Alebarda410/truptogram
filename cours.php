<?php
require "links/db_connect.php";
$cours = R::findOne('courses', 'id = ?', [$_GET['id']]);
$_SESSION['current_id'] = $_GET['id'];
$urlHeaders = @get_headers($cours->location);
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
    <script src="https://api-maps.yandex.ru/2.1/?apikey=b9a5170f-cf6d-46ee-8b6c-753687614944&lang=ru_RU&load=Geolink" type="text/javascript"></script>
</head>

<body>

    <?php include "HEADER.php"; ?>

    <div class="wraper">
        <div class="zag"><?php echo $cours->topic; ?></div>
        <div class="ov">
            <div class="logo_cr">
                <img width="250px" src="<?php echo $cours->logo; ?>">
            </div>
            <div class="text_ov">
                <div class="sp">
                    <div class="sp1">Выступающий</div>
                    <div class="sp2"><?php echo $cours->speaker; ?></div>
                </div>

                <div class="da">
                    <div class="da1">Время проведения</div>
                    <div class="da2"><?php echo $cours->date; ?></div>
                </div>

                <div class="lo">
                    <div class="lo1">Место проведения</div>
                    <div class="lo2">

                        <?php if (strpos($urlHeaders[0], '200')) : ?>
                            <a target="_blank" href="<?php echo $cours->location; ?>"><?php echo $cours->location; ?></a>
                        <?php else : ?>
                            <div class="ymaps-geolink"><?php echo $cours->location; ?></div>
                        <?php endif;  ?>

                    </div>
                </div>
                <?php if ($_SESSION['logged_user']->verification == 1) : ?>
                    <form>
                        <?php if ($_SESSION['logged_user']->rol == 0) : ?>
                            <?php if (strpos($_SESSION['logged_user']->courses, $_GET['id']) === false) : ?>
                                <input type="hidden" name="zap" value="zap">
                                <button id="bt" type="submit">Записаться</button>
                            <?php else : ?>
                                <input type="hidden" name="zap" value="otp">
                                <button id="bt" type="submit">Отписаться</button>
                            <?php endif;  ?>
                        <?php elseif ($_SESSION['logged_user']->rol == 1 && strpos($_SESSION['logged_user']->courses, $_GET['id']) !== false) : ?>
                            <input type="hidden" name="zap" value="del">
                            <button id="bt" type="submit">Удалить</button>
                        <?php endif;  ?>
                    </form>
                <?php endif;  ?>
            </div>
        </div>
        <div class="text">
            <?php echo $cours->overview; ?>
        </div>

        <?php if ($_SESSION['logged_user']->verification == 1) : ?>
            <div id="vk_comments"></div>
        <?php else : ?>
            <div class="da2"> Подтвердите почту чтобы просмотреть или оставить коментарий!</div>
        <?php endif;  ?>
    </div>

    <?php include "FOOTER.php"; ?>
    <script type="text/javascript" src="libs/jquery.js"></script>
    <script src="js\cours.js"></script>
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