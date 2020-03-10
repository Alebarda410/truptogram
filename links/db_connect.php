<?php 
    if(file_exists('libs/rb.php')){
        require 'libs/rb.php';
    }
    else{
        require '../libs/rb.php';
    }
R::setup( 'mysql:host=donat4yq.beget.tech;dbname=donat4yq_truprog', 'donat4yq_truprog', '15975300Qq' );
session_start();