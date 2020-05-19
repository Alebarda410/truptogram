<?php
require "links/db_connect.php";
$res = R::getAll("SELECT id, overview, topic, logo FROM `courses` ORDER BY `id` DESC LIMIT 10");
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
    <a name="top"></a>
    <?php include "HEADER.php"; ?>  
    <div class="wraper">
        <div class="cont">

            <?php foreach ($res as $article) : ?>
                <div class="cours">
                    <a href="<?php echo 'cours.php?id=' . $article['id']; ?>"><img width="150px" src="<?php echo $article['logo']; ?>" alt="logo"></a>
                    <div class="description">
                        <a href="<?php echo 'cours.php?id=' . $article['id']; ?>" class="zag">
                            <?php echo $article['topic']; ?>
                        </a>
                        <span class="text">
                            <?php echo $article['overview']; ?>
                            <a href="<?php echo 'cours.php?id=' . $article['id']; ?>">Подробнее</a>
                        </span>

                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
    <a href="#top">
        <div class="back">
            <img src="img\up.svg" alt="back" width="35px">
        </div>
    </a>
    <?php include "FOOTER.php"; ?>
    <script type="text/javascript" src="libs/jquery.js"></script>
    <script type="text/javascript" src="js/scroll_courses.js"></script>

</body>

</html>