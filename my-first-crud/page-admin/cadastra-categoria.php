<?php
    // require_once("../model/Categoria.php");
    // require_once '../dao/CategoriaDao.php';

    require_once '../global.php';

    header("Location: form-categoria.php");

    $categoria = new Categoria();
    $categoria->setNome($_POST['inputDesc']);
    
    CategoriaDao::cadastrar($categoria);

?>