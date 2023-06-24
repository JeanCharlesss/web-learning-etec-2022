<?php 
    require_once '../global.php';
    
        $cliente = new Cliente();
        
        $cliente->setUsuario($_POST['txtUsuario']);
        $cliente->setSenha($_POST['txtSenha']);

        if(!empty(LoginDao::verificar($cliente))){
            session_start();
            $_SESSION['user-client'] = $cliente->getUsuario();
            $_SESSION['password-client'] = $cliente->getSenha();
            echo('<script>
                window.location = "../index.php";
            </script>');
        }else{
        echo('
            <script>
                alert("Usuário ou senha inválidas");
                window.location = "../login.php";
            </script>
        ');
       }


?>