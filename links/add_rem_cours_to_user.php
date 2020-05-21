<?php
if (strlen($_SESSION['current_id']) > 4) {
    echo 'Necatit';
} else {
    $_SESSION['current_id'] = abs($_SESSION['current_id'] * 1);
}
require "db_connect.php";
$user = $_SESSION['logged_user'];
if ($_POST['zap'] === 'zap') {
    $user->courses = $user->courses . ',' . $_SESSION['current_id'];
    R::store($user);
    $_SESSION['logged_user']->courses = $user->courses;
    header('Location: https://truprogram.space/cours.php?id=' . $_SESSION['current_id']);
}
if ($_POST['zap'] === 'otp') {
    $user->courses = str_replace(','.$_SESSION['current_id'],'',$user->courses);
    R::store($user);
    $_SESSION['logged_user']->courses = $user->courses;
    header('Location: https://truprogram.space/cours.php?id=' . $_SESSION['current_id']);
}
