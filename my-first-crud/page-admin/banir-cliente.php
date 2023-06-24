<?php

    require_once '../global.php';
    
    $cliente = new Cliente();
        
    if(isset($_POST['del'])){
        $cliente->setId($_POST['del']);
        
        ClienteDao::deletar($cliente);
    }


    include('cliente-lista.php');


?>