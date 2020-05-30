<?php
require "db_connect.php";
$gg = 0;
$user = $_SESSION['logged_user'];
$email_l = strlen($_POST['email']);
$new_pas_l = strlen($_POST['new_password']);
$name_l = strlen($_POST['name']);
if (!password_verify($_POST['password'], $user->password)) {
    echo 'Подтвердите пароль!';
} else {
    if ($name_l > 0) {
        if ($_POST['name'] != $user->name) {
            if (!preg_match('/^[А-Я][а-я]{1,11}$/u', $_POST['name'])) {
                echo 'Имя не соответствует требованиям!';
            } else {
                $user->name = $_POST['name'];
                $gg = 1;
            }
        } else {
            echo 'Вы ввели ваше старое имя';
        }
    }
    if ($email_l > 0) {
        if (R::findOne('users', 'email = ?', [$_POST['email']]) > 0) {
            echo 'Такой Email уже зарегистроирован!';
        } elseif ($email_l > 50) {
            echo 'Слишком длинный Email!';
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            echo 'Не корректный Email!';
        } else {
            $user->email = $_POST['email'];
            $gg = 1;
        }
    }
    if ($new_pas_l > 0) {
        if ($new_pas_l > 50) {
            echo 'Некорректный пароль!';
        } elseif ($_POST['new_password_2'] != $_POST['new_password']) {
            echo 'Пароли не совпадают!';
        } elseif (password_verify($_POST['new_password'], $user->password)) {
            echo 'Новый и старый пароли совпадают!';
        } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,}/', $_POST['password'])) {
            echo 'Пароль не соответствует требованиям!';
        } else {
            $user->password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
            $gg = 1;
        }
    }

    if ($_FILES['avatar']['name']) {
        if ($_FILES['avatar']['size'] == 0 || $_FILES['logo']['size'] > 5242880) {
            echo 'Файл должен быть меньше 5Мб!';
        } else {
            $tmp_name = $_FILES['avatar']['tmp_name'];
            if (preg_match('/^image/', mime_content_type($tmp_name))) {
                $name = time() . $_FILES['avatar']['name'];
                move_uploaded_file($tmp_name, '../upload/' . $name);
                if ($user->avatar != 'upload\def_avatar.svg') {
                    unlink($user->avatar);
                }
                $user->avatar = '../upload/' . $name;
                $gg = 1;
            } else {
                echo 'Неверный тип файла!';
            }
        }
    }
    if ($gg == 1) {
        R::store($user);
        echo 'Данные изменены!';
    } else {
        echo 'Данные не менялись';
    }
}
