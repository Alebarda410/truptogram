<?php
require "db_connect.php";
$user = R::findOne('users', 'email = ?', [$_POST['email']]);
if ($user) {
    if (password_verify($_POST['password'], $user->password)) {
        $_SESSION['logged_user'] = $user;
        echo '1';
    } else {
        echo 'Пароль введен неправильно!';
    }
} else {
    echo 'Email не зарегистрирован!';
}
