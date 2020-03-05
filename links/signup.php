<?php
require "db_connect.php";
$email_l = strlen($_POST['email']);
$rol_l = strlen($_POST['rol']);
$name_l = strlen($_POST['name']);
if (R::count('users', "email = ?", [$_POST['email']]) > 0) {
    echo 'Такой Email уже зарегистроирован!';
} elseif ($email_l > 50 || $rol_l != 1) {
    echo 'Юзай форму с JS падла1!';
} elseif ($_POST['password_2'] != $_POST['password']) {
    echo 'Юзай форму с JS падла2!';
} elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^\w\s]).{6,}/', $_POST['password'])) {
    echo 'Юзай форму с JS падла3!';
} elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo 'Не корректный email!';
} elseif (!preg_match('/^[А-Я][а-я]+$/', $_POST['name'])!=1 || $name_l > 20) {
    echo 'Юзай форму с JS падла4!';
} else {
    $user = R::dispense('users');
    $user->name = $_POST['name'];
    $user->email = $_POST['email'];
    $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user->rol = $_POST['rol'];
    R::store($user);
    echo '1';
}
