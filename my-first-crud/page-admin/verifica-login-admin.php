<?php 
    $user = $_POST['user-admin'];
    $password = $_POST['password-admin'];

    if(($user == 'adm') && ($password == '123')){
        header("Location: index-admin.php");
        session_start();
        $_SESSION['user-admin'] = $user;
        $_SESSION['password-admin'] = $password;
    }else{
        header("Location: ../index.php");
     }

?>