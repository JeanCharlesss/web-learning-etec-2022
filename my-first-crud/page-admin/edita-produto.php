<?php
    // require_once("../model/Categoria.php");
    // require_once '../dao/CategoriaDao.php';

    require_once '../global.php';
    
    $produto = new Produto();

    if(isset($_POST['del'])){
        $produto->setId($_POST['del']);
        $produto->setNome($_POST['editNome']);
        $produto->setPreco($_POST['editPreco']);
        $produto->setDescricao($_POST['editDescricao']);

        $categoria = new Categoria();
        $produto->setCategoria($_POST['editCategoria']);
        
        ProdutoDao::editar($produto);
    }

     include('form-produto.php');


?>