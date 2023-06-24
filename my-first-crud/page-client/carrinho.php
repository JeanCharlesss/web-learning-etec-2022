
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Página inicial</title>
    <link href="../css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <header>
        <nav class="navbar navbar-expand-lg bg-light ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><i class="fa-solid fa-fire"></i> FireHouse</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mr-auto" style="margin-left: auto;">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.php">Menu</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="produtos.php">Jogos</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../index.php#sobre">Sobre</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../index.php#contato">Contato</a>
                    </li>
                    <?php
                        require_once 'verifica-logado-cliente.php';

                        if(verificarLogado()==true){
                            include '../components/logout-button.php';
                        }else{
                            include '../components/login-button.php';
                        }
                    ?>
                </ul>
                </div>
            </div>
        </nav>    
    </header>
    <main>
    <?php

                if(!isset($_SESSION['carrinho'])){
                    $_SESSION['carrinho'] = array();
                }
            
                //adiciona produto
                if(isset($_GET['acao'])){
                    if(verificarLogado()==true){
                        //adicionar ao carrinho
                        if($_GET['acao'] == 'add'){
                            $id = intval($_GET['id']);
                            if(!isset($_SESSION['carrinho'][$id])){
                                $_SESSION['carrinho'][$id] = 1;
                            }else{
                                $_SESSION['carrinho'][$id] += 1;
                            }
                            echo '
                                <script>
                                    alert("Produto adicionado ao carrinho!");
                                    window.location = "produtos.php";
                                </script>
                            ';
                        }
                        //remover
                        if($_GET['acao'] == 'del'){
                            $id = intval($_GET['id']);
                            if(isset($_SESSION['carrinho'][$id])){
                                unset($_SESSION['carrinho'][$id]);
                            }
                        }
                    }else{
                        echo('
                            <script>
                                alert("Faça login para adicionar ou remover itens ao carrinho!");
                                window.location = "../login.php";
                            </script>
                        ');
                    }

                }


        ?>



        <?php

            require '../model/conexao.php';
            require '../global.php';

            if(count($_SESSION['carrinho']) == 0){
                
                echo '<br><h3 class="text-center"> Não há produtos no carrinho ainda.</h3><br>';
                echo'<p class="text-center w-responsive mx-auto mb-5">Clique aqui para adicionar jogos ao seu carrinho : <a href="produtos.php">Comprar jogos<i class="fa-solid fa-cart-shopping"></i></a></p>';
            }else{
                echo '<br><h3 class="text-center"> Carrinho</h3><br>';
                echo'<p class="text-center w-responsive mx-auto mb-5">Aqui está seu carrinho de compras! Adicione ou remova itens de acordo com sua necessidade.<br>
                Clique aqui para adicionar mais jogos ao seu carrinho: <a href="produtos.php">Comprar jogos<i class="fa-sharp fa-solid fa-cart-plus"></i></a><br>
                Caso você deseja finalizar compra, clique aqui: <a href="finalizar-compras.php">Finalizar compras <i class="fa-solid fa-calendar-check"></i></a></p>';
                echo '<div class="container text-center d-flex justify-content-center">';
                echo '<div class="row d-flex justify-content-center " style="display: justify-contents;">';
                $control = 0;
                $total = 0;
                foreach($_SESSION['carrinho'] as $id => $qtd){
                    $conexao = Conexao::conectar();
                    $querySelect = "SELECT nomeproduto, precoproduto, fotoproduto, descproduto
                                     FROM tbproduto WHERE idproduto = ".$id;
                    $resultado = $conexao->query($querySelect);
                    $lista = $resultado->fetchAll();

                    $produto = new Produto();
                    foreach ($lista as $p){
                        $produto->setNome($p['nomeproduto']);
                        $produto->setPreco($p['precoproduto']);
                        $produto->setFoto($p['fotoproduto']);
                        $produto->setDescricao($p['descproduto']);
                    }
                    $idp = $produto->getId();
                    $nome = $produto->getNome();
                    $foto = $produto->getFoto();
                    $preco = number_format($produto->getPreco(),2,',','.');
                    $sub = number_format($produto->getPreco() * $qtd,2,',','.');
                    $subtotal = intval($sub);
                    $total += $subtotal;
                    if($control == 3){
                        echo '<div class="row d-flex justify-content-center ">';
                        $control = 0;
                    }
                    if(!empty($nome)){
                        echo'
                        <div class="col">
                            <div class="card" style="width: 18rem; margin-bottom:20px;margin-left:40px;">
                            <img src="../'.$foto.'" class="card-img-top" style="height:170px;"alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center">'.$nome.'</h5>
                                <p class="card-text text-center">Preço único: R$'.$preco.'</p>
                                <p class="card-text text-center"> Quantidade: x'.$qtd.'</p>
                                <h2 class="text-center">R$'.$sub.'</h2>
                                <div class="row">
                                    <div class="col">
                                        <a href="?acao=del&id='.$id.'" class="btn btn-outline-danger" style="width:100%;"> <i class="fa fa-trash"></i> Remover  </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> ';
                    $control++;
                    }
                    $_SESSION['total'] = $total;
                }
            }
        ?>
        <br>


    </main>
    <footer class="text-center text-lg-start bg-white text-muted">
    <section class="d-flex justify-content-center" style="left:50%;">
        <br>
        <br>
        <div>
        <a href="" class="me-4 link-secondary">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="me-4 link-secondary">
            <i class="fab fa-twitter"></i>
        </a>
        <a href="" class="me-4 link-secondary">
            <i class="fab fa-google"></i>
        </a>
        <a href="" class="me-4 link-secondary">
            <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="me-4 link-secondary">
            <i class="fab fa-linkedin"></i>
        </a>
        <a href="" class="me-4 link-secondary">
            <i class="fab fa-github"></i>
        </a>
        </div>
    </section>
    <hr>
    <section class="">
        <div class="container text-center text-md-start mt-5">
        <div class="row mt-3">
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold mb-4">
                <i class="fas fa-gem me-3 text-secondary"></i>FireHouse
            </h6>
            <p>
                FireHouse é uma empresa fictícia com finalidade didática <br>
                CRUD | PHP - JS - HTML - CSS  
            </p>
            </div>
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold mb-4">
                Categoria
            </h6>
            <p>
                <a href="#!" class="text-reset">RPG - Ação</a>
            </p>
            <p>
                <a href="#!" class="text-reset">Hack and Slash</a>
            </p>
            <p>
                <a href="#!" class="text-reset">Corrida</a>
            </p>
            </div>
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold mb-4">
                Utilidades
            </h6>
            <p>
                <a href="#!" class="text-reset">Termos de privacidade</a>
            </p>
            <p>
                <a href="#!" class="text-reset">Equipe FireHouse</a>
            </p>
            </div>
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <h6 class="text-uppercase fw-bold mb-4">Contato</h6>
            <p><i class="fas fa-home me-3 text-secondary"></i> São Paulo SP 0800-00, BR</p>
            <p>
                <i class="fas fa-envelope me-3 text-secondary"></i>
                firehouse@fire.com
            </p>
            <p><i class="fas fa-phone me-3 text-secondary"></i> + 01 4002-8922</p>
            <p><i class="fas fa-print me-3 text-secondary"></i> + 01 4002-8922</p>
            </div>
        </div>
        </div>
    </section>
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
        © 2022 Copyright:
        <a class="text-reset fw-bold" href="https://mdbootstrap.com/">FireHouse.com</a>
    </div>

    </footer>
    <script src="https://kit.fontawesome.com/41960ad43e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script>
       $('ul.nav li.dropdown').hover(function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
            }, function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
            });
    </script>
  </body>
</html>