<?php
require "db_connect.php";
if (R::count('users', "email = ?", [$_POST['email']]) > 0) {
    echo 'Такой Email уже зарегистроирован!';
}
elseif  ($_POST['password_2'] !== $_POST['password']) {
    echo 'Вклюси js дебик!';
}
elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    echo 'Вклюси js дебик!';
}
else {
    $user = R::dispense('users');
    $user->full_name = $_POST['full_name'];
    $user->email = $_POST['email'];
    $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user->rol = $_POST['rol'];
    R::store($user);
    echo '1';
}