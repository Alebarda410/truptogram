<?php
require "db_connect.php";
$user = R::findOne('users', 'email = ?', [$_POST['email']]);
if ($user) {
    if (password_verify($_POST['password'], $user->password)) {
        $_SESSION['logged_user'] = $user;
        header('Location: /');
    } else {
        $_SESSION['errL'] = 'Пароль введен неправильно!';
        header('Location: ../login.php');
    }
} else {
    $_SESSION['errL'] = 'Пользователь не найден!';
    header('Location: ../login.php');
}
