<?php
require '../libs/phpmailer/PHPMailer.php';
require '../libs/phpmailer/Exception.php';
require '../libs/phpmailer/SMTP.php';
function SendMail($email,$body)
{
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->CharSet = 'utf-8';
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = 'smtp.beget.com';
    $mail->Username = 'noreply@truprogram.space';
    $mail->Password = '15975300Qq';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('noreply@truprogram.space', 'noreply');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = 'Регистрация на truprogram.space';
    $mail->Body = $body;
    $mail->send();
}