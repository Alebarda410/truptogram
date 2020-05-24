<?php
require "db_connect.php";
$user = R::load('users', $_SESSION['logged_user']->id);
if ($user->avatar != "../upload/def_avatar.svg") {
    unlink($user->avatar);
}
R::trash($user);
unset($_SESSION['logged_user']);
header('Location: /');