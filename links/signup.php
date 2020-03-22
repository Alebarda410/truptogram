<?php
require 'db_connect.php';
$email_l = strlen($_POST['email']);
$pas_l = strlen($_POST['password']);
if (R::findOne('users', 'email = ?', [$_POST['email']]) > 0) {
    echo 'Такой Email уже зарегистроирован!';
} elseif ($email_l > 50 || $pas_l > 50 || ($_POST['rol'] != '0' && $_POST['rol'] != '1')) {
    echo 'Юзай форму с JS падла1!';
} elseif ($_POST['password_2'] != $_POST['password']) {
    echo 'Юзай форму с JS падла2!';
} elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^\w\s]).{6,}/', $_POST['password'])) {
    echo 'Юзай форму с JS падла3!';
} elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo 'Не корректный email!';
} elseif (!preg_match('/^[А-Я][а-я]{1,11}$/u', $_POST['name'])) {
    echo 'Юзай форму с JS падла4!';
} else {
    $user = R::dispense('users');
    $user->name = $_POST['name'];
    $user->email = $_POST['email'];
    $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user->rol = $_POST['rol'];
    $user->token = md5($_POST['email'] . time());
    R::store($user);
    //подтверждение почты
    include  '../libs/phpmailer/PHPMailer.php';
    include  '../libs/phpmailer/Exception.php';
    include  '../libs/phpmailer/SMTP.php';
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->CharSet = 'utf-8';
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = 'smtp.beget.com';
    $mail->Username = 'noreply@truprogram.space';
    $mail->Password = '15975300Qq';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('noreply@truprogram.space', 'Администрация');
    $mail->addAddress($_POST['email']);
    $mail->isHTML(true);echo '16';
    $mail->Subject = 'Регистрация на truprogram.space';
    $mail->Body = 'Письмо';
    $mail->send();
    echo '1';
}
