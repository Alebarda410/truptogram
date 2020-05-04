<?php
require "links/db_connect.php";
$res = R::getAll("SELECT overview, topic, logo FROM `courses` ORDER BY `id` DESC LIMIT 10");
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/courses_st.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/icon.ico" type="image/x-icon">
    <title>program</title>
</head>

<body>

    <?php include "HEADER.php"; ?>

    <div class="wraper">
        <div class="cont">

            <?php foreach ($res as $article) : ?>
                <div class="cours">
                    <img width="150px" src="<?php echo $article['logo']; ?>" alt="logo">
                    <div class="description">
                        <a href="cours.php" class="zag">
                            <?php echo $article['topic']; ?>
                        </a>
                        <div class="text">
                            <?php echo $article['overview']; ?>
                            <a href="cours.php">Подробнее...</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>

    <?php include "FOOTER.php"; ?>
    <script type="text/javascript" src="libs/jquery.js"></script>
    <script type="text/javascript" src="js/scroll_courses.js"></script>

</body>

</html>