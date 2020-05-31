<?php
require 'db_connect.php';
$cours = R::dispense('courses');
if (!password_verify($_POST['password'], $_SESSION['logged_user']->password)) {
    exit ('Подтвердите пароль!');
} elseif (strlen($_POST['location']) < 5 && strlen($_POST['location']) > 200) {
    exit ('Слишком короткий адрес!');
} elseif (strlen($_POST['overview']) < 500 && strlen($_POST['overview']) > 5000) {
    exit ('Описание должно быть длиннее 500 символов!');
} elseif (strlen($_POST['topic']) < 2 && strlen($_POST['topic']) > 50) {
    exit ('Название должно быть длиннее 2 символов!');
} elseif (strlen($_POST['speaker']) < 2 && strlen($_POST['speaker']) > 50) {
    exit ('Имя должно быть длиннее 2 символов!');
} elseif (!is_numeric(strtotime($_POST['date']))) {
    exit ('Некорректная дата!');
} else {
    if ($_FILES['logo']['name']) {
        if ($_FILES['logo']['size'] == 0 || $_FILES['logo']['size'] > 5242880) {
            exit ('Файл должен быть меньше 5Мб!');
        } else {
            $tmp_name = $_FILES['logo']['tmp_name'];
            if (preg_match('/^image/', mime_content_type($tmp_name))) {
                $name = time() . $_FILES['logo']['name'];
                move_uploaded_file($tmp_name, '../upload/' . $name);
                $cours->logo = '../upload/' . $name;
                $cours->location = $_POST['location'];
                $cours->overview = $_POST['overview'];
                $cours->topic = $_POST['topic'];
                $cours->speaker = $_POST['speaker'];
                $cours->date = $_POST['date'];
                R::store($cours);
                $user = $_SESSION['logged_user'];
                $user->courses = $user->courses . ',' . $cours->id;
                R::store($user);
                $_SESSION['logged_user']->courses = $user->courses;
                exit ('Курс добавлен!');
            } else {
                exit ('Неверный тип файла!');
            }
        }
    }
}
