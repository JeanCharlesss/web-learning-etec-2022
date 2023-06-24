<?php

    if (file_exists('index.php')) {
        header("Location: index.php");
    }else{
        header("Location: ../index.php");
    }
    
    

    session_start();
    unset($_SESSION['$user-client']);
    unset($_SESSION['password-client']);
    session_destroy();

?>