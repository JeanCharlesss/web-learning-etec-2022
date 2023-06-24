<?php

    header("Location: ../index.php");

    session_start();
    unset($_SESSION['$user-admin']);
    unset($_SESSION['password-admin']);
    session_destroy();

?>