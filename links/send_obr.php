<?php
require 'db_connect.php';
require '../libs/phpmailer/PHPMailer.php';
require '../libs/phpmailer/Exception.php';
require '../libs/phpmailer/SMTP.php';
if (strlen($_POST['text']) > 10 && strlen($_POST['name']) > 2 && strlen($_POST['text']) < 5000 && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->CharSet = 'utf-8';
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = 'smtp.beget.com';
    $mail->Username = 'noreply@truprogram.space';
    $mail->Password = 'b3*OKqQi';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('noreply@truprogram.space', 'truprogram');
    $mail->addAddress('official@truprogram.space');
    $mail->isHTML(true);
    $mail->Subject = 'Форма обратной связи';
    $mail->Body = $_POST['text'].' - '.$_POST['email'];
    $mail->send();
    exit ('Письмо отправлено!');
}
else{
    exit ('Данные не корректны!');
}