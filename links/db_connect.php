<?php 
if(file_exists('libs/rb.php')){
    require 'libs/rb.php';
}
else{
    require '../libs/rb.php';
}
R::setup( 'mysql:host=localhost;dbname=truprogram', 'root', 'usbw' );
session_start();