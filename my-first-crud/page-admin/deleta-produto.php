<?php
    // require_once("../model/Categoria.php");
    // require_once '../dao/CategoriaDao.php';

    require_once '../global.php';
    
    $produto = new Produto();
        
    if(isset($_POST['del'])){
        $produto->setId($_POST['del']);
        
        ProdutoDao::deletar($produto);
    }


    include('form-produto.php');


?>