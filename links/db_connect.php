<?php 
    if(file_exists('libs/rb.php')){
        require 'libs/rb.php';
    }
    else{
        require '../libs/rb.php';
    }
R::setup( 'mysql:host=localhost;dbname=donat4yq_truprog', 'donat4yq_truprog', 'sYW3yk9%' );
session_start();