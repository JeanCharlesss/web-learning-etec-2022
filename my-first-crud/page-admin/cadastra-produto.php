<?php
    // require_once("../model/Produto.php");
    // require_once '../model/Categoria.php';
    // require_once '../dao/ProdutoDao.php';

    require_once '../global.php';

    header("Location: form-produto.php");

    $produto = new Produto();
    $produto->setNome($_POST['nome']);
    $produto->setPreco($_POST['preco']);
    $produto->setDescricao($_POST['descricao']);

    $categoria = new Categoria();

    $categoria->setId($_POST['categoria']);

    $produto->setCategoria($categoria);
    
    //cadastrando produto sem a foto
    ProdutoDao::cadastrar($produto);

    $produto->setId(ProdutoDao::consultarId($produto));

    //nome original do arquivo no computador do usuário
    $nome = $_FILES['foto']['name'];

    //para validações que possam ser necessárias, na nossa loja não será origatório
    $tipo =$_FILES['foto']['type'];// exemplo image/gif
    $tamanho = $_FILES['foto']['size']; // tamanho em bytes

    //nome temporário do arquivo como foi armazenado no servidor, é o ARQUIVO!!!
    $arquivo = $_FILES['foto']['tmp_name'];

    $diretorio = "img/produtos/";
    
    $extensao = substr($nome, -4);//pega o ponto e os 3 caracteres da extensão do arquivo
    $nomenovo = $produto->getId().$extensao;

    $nomecompleto =  $diretorio.$nomenovo;

    move_uploaded_file($arquivo, "../".$nomecompleto);

    $produto->setFoto($nomecompleto);

    ProdutoDao::atualizarFoto($produto);

?>