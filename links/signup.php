<?php
require "db_connect.php";
$fname_l = strlen($_POST['full_name']);
$email_l = strlen($_POST['email']);
$pass_l = strlen($_POST['password']);
if (R::count('users', "email = ?", [$_POST['email']]) > 0) {
    echo 'Такой Email уже зарегистроирован!';
} elseif ($fname_l == 0 || $fname_l > 100 || $email_l > 50) {
    echo 'Юзай форму с JS падла!';
} elseif ($_POST['password_2'] != $_POST['password'] && $pass_l> ) {
    echo 'Юзай форму с JS падла!';
} elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo 'Юзай форму с JS падла!';
} elseif (empty($_POST['rol']){
    echo 'Юзай форму с JS падла!';
} else {
    $user = R::dispense('users');
    $user->full_name = $_POST['full_name'];
    $user->email = $_POST['email'];
    $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user->rol = $_POST['rol'];
    R::store($user);
    echo '1';
}
