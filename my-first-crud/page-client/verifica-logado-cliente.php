<?php
    session_start();
    function verificarLogado(){
        $bool = false;
        if( ( isset($_SESSION['user-client']) ) && ( isset($_SESSION['password-client']) ) ){
            $bool =  true;
            return $bool;
        }
        return $bool;
    }
?>