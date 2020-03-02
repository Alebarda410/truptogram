<?php
require "db_connect.php";

$errors = array();


if ($_POST['password_2'] != $_POST['password']) {
    $errors[] = 'Пароли не одинаковы !';
}

// исключаем два одинаковых мейла
if (R::count('users', "full_name = ?", array($_POST['full_name'])) > 0) {
    $errors[] = 'Пользователь с таким Логином существует !';
}

if (R::count('users', "email = ?", array($_POST['email'])) > 0) {
    $errors[] = 'Пользователь с таким Email существует !';
}

//здесь регистрируем
if (empty($errors)) {
    // все хорошо, регисирируем в Базе Данных

    $user = R::dispense('users');
    $user->full_name = $_POST['full_name'];
    $user->email = $_POST['email'];
    $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user->rol = $_POST['rol'];
    R::store($user);
    header('Location: /');
} else {
    //приколхозить вывод ошибок
}
