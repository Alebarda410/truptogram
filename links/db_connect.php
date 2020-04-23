<?php 
    if(file_exists('libs/rb.php')){
        require 'libs/rb.php';
    }
    else{
        require '../libs/rb.php';
    }
R::setup( 'mysql:host=donat4yq.beget.tech;dbname=donat4yq_truprog', 'donat4yq_truprog', 'F%aGNA2d' );
session_start();