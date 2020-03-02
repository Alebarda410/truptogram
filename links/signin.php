<?php
require "db_connect.php";

$errors = array();
$user = R::findOne('users', 'email = ?', array($_POST['email']));

if ($user) {
    // Когда  логин сушествует, проверяем пароль
    if (password_verify($_POST['password'], $user->password)) {
        // Все хорошо, логиним пользователя
        $_SESSION['logged_user'] = $user;
        header('Location: /');
    } else {
        $errors[] = 'Пароль неправильно введен';
    }
} else {
    $errors[] = 'Пользователь не найден!';
}
//доделать ошибки и их передачу на форму
