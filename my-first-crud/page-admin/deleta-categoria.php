<?php
    // require_once("../model/Categoria.php");
    // require_once '../dao/CategoriaDao.php';

    require_once '../global.php';
    
    $categoria = new Categoria();
        
    if(isset($_POST['del'])){
        $categoria->setId($_POST['del']);
        
        CategoriaDao::deletar($categoria);
    }


    include('form-categoria.php');


?>