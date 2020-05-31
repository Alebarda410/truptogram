<?php
require 'db_connect.php';
$email_l = strlen($_POST['email']);
$pas_l = strlen($_POST['password']);
if (R::findOne('users', 'email = ?', [$_POST['email']]) > 0) {
    exit('Такой Email уже зарегистроирован!');
} elseif ($email_l > 50 || $pas_l > 50 || ($_POST['rol'] != '0' && $_POST['rol'] != '1')) {
    exit('Выберите роль !');
} elseif ($_POST['password_2'] != $_POST['password']) {
    exit('Пароли не совпадают!');
} elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,}/', $_POST['password'])) {
    exit('Некорректный пароль!');
} elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    exit('Некорректный email!');
} elseif (!preg_match('/^[А-Я][а-я]{1,11}$/u', $_POST['name'])) {
    exit('Некорректное имя!');
} else {
    $token = md5($_POST['email'] . time());
    $user = R::dispense('users');
    $user->name = $_POST['name'];
    $user->email = $_POST['email'];
    $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user->rol = $_POST['rol'];
    $user->token = $token;
    $_SESSION['logged_user'] = $user;
    R::store($user);
    $_SESSION['logged_user']->avatar = 'upload\def_avatar.svg';
    $body = 'https://truprogram.space/links/activation.php';
    $body .= "?token=$token";
    require 'email_check.php';
    SendMail($_POST['email'], $body);
    exit('1');
}
