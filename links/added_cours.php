<?php
require 'db_connect.php';
$cours = R::dispense('courses');
if (!password_verify($_POST['password'], $_SESSION['logged_user']->password)) {
    echo 'Подтвердите пароль!';
} elseif (strlen($_POST['location']) < 5 && strlen($_POST['location']) > 50) {
    echo 'Слишком короткий адрес!';
} elseif (strlen($_POST['overview']) < 500 && strlen($_POST['overview']) > 20000) {
    echo 'Описание должно быть длиннее 500 символов!';
} elseif (strlen($_POST['topic']) < 2 && strlen($_POST['topic']) > 50) {
    echo 'Название должно быть длиннее 2 символов!';
} elseif (strlen($_POST['speaker']) < 2 && strlen($_POST['speaker']) > 50) {
    echo 'Имя должно быть длиннее 2 символов!';
} elseif (!ctype_digit($_POST['count_student'])) {
    echo 'Это должно быть числом!';
} elseif (!is_numeric(strtotime($_POST['date']))) {
    echo 'Некорректная дата!';
} else {
    if ($_FILES['logo']['name']) {
        if ($_FILES['logo']['size'] > 5 * 1024 * 1024) {
            echo 'Файл должен быть меньше 5Мб!';
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
                $cours->count_student = $_POST['count_student'];
                $cours->date = $_POST['date'];
                R::store($cours);
                echo '1';
            } else {
                echo 'Неверный тип файла!';
            }
        }
    }
}
