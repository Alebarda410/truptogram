<?php
require 'db_connect.php';
$user = $_SESSION['logged_user'];
if ($user->token == $_GET['token']) {
    $user->verification = 1;
    $user->token = null;
    R::store($user);
}
header('Location: /');
