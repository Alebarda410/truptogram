<?php
require "db_connect.php";
$user = R::findOne('users', 'email = ?', [$_POST['email']]);
if ($user) {
    if (password_verify($_POST['password'], $user->password)) {
        $_SESSION['logged_user'] = $user;
        exit ('1');
    } else {
        exit ('Пароль введен неправильно!');
    }
} else {
    exit ('Email не зарегистрирован!');
}
