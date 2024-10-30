<?php
    session_start();

    if(empty($_SESSION['logado']) || $_SESSION['logado'] == false){
        header('login.php');

    }
    
    echo'funcionou';