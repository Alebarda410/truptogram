<?php
require "db_connect.php";

if ($_POST['password_2'] != $_POST['password']) {
    $_SESSION['errR'] = 'Пароли не одинаковы!';
    header('Location: ../register.php');
}

if (R::count('users', "email = ?", [$_POST['email']]) > 0) {
    $_SESSION['errR'] = 'Пользователь с таким Email существует!';
    header('Location: ../register.php');
}

if (!$_SESSION['errR']) {
    $user = R::dispense('users');
    $user->full_name = $_POST['full_name'];
    $user->email = $_POST['email'];
    $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user->rol = $_POST['rol'];
    R::store($user);
    header('Location: /');
}