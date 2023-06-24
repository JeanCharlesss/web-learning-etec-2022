<?php
    session_start();
    $userSession = $_SESSION['user-admin'];
    $passwordSession = $_SESSION['password-admin'];

    if(($userSession != 'adm') || ($passwordSession != '123')){
        header("Location: ../index.php");
    }
?>