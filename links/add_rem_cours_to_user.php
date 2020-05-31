<?php
require "db_connect.php";
if (strlen($_SESSION['current_id']) > 4) {
    exit ('Necatit');
} else {
    $_SESSION['current_id'] = abs($_SESSION['current_id'] * 1);
    $user = $_SESSION['logged_user'];
    if ($_POST['zap'] === 'zap') {
        $user->courses = $user->courses . ',' . $_SESSION['current_id'];
        R::store($user);
        $_SESSION['logged_user']->courses = $user->courses;
        exit ('zap');
    }
    if ($_POST['zap'] === 'otp') {
        $user->courses = str_replace(',' . $_SESSION['current_id'], '', $user->courses);
        R::store($user);
        $_SESSION['logged_user']->courses = $user->courses;
        exit ('otp');
    }
    if ($_POST['zap'] === 'del') {
        $cours = R::load('courses', $_SESSION['current_id']);
        unlink($cours->logo);
        R::trash($cours);
        $user->courses = str_replace(',' . $_SESSION['current_id'], '', $user->courses);
        R::store($user);
        $_SESSION['logged_user']->courses = $user->courses;
        exit ('del');
    }
}
