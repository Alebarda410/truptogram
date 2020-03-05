<?php
require "db_connect.php";
$email_l = strlen($_POST['email']);
$rol_l = strlen($_POST['rol']);
if (R::count('users', "email = ?", [$_POST['email']]) > 0) {
    echo 'Такой Email уже зарегистроирован!';
} elseif ($email_l > 50 || $rol_l != 1) {
    echo 'Юзай форму с JS падла!';
} elseif ($_POST['password_2'] != $_POST['password']) {
    echo 'Юзай форму с JS падла!';
} elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^\w\s]).{6,}/', $_POST['password'])) {
    echo 'Юзай форму с JS падла!';
} elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo 'Не корректный email!';
} elseif (!preg_match('/[А-Я][а-я]{1,19}/', $_POST['name'])) {
    echo 'Юзай форму с JS падла!';
} else {
    $user = R::dispense('users');
    $user->name = $_POST['name'];
    $user->email = $_POST['email'];
    $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user->rol = $_POST['rol'];
    R::store($user);
    echo '1';
}
