<?php include "verifica-logado-admin.php"; ?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Painel Administração</title>
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
                    <a class="nav-link active" href="index-admin.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="form-categoria.php" aria-current="page">Categoria</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="form-produto.php">Jogos</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="cliente-lista.php">Clientes</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="lista-venda.php">Vendas</a>
                    </li>
                    <!-- Example single danger button -->
                    <div class="btn-group">
                    <form>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirm">
                        <span>Logout </span><i class="fa-solid fa-right-from-bracket"></i>
                    </button>
                    </form>
                    <div class="modal fade" id="confirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Encerrar sessão</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Você deseja finalizar sessão?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <form method="post">
                            <button type="submit" name="btn-logout" class="btn btn-danger" >
                            Sair
                    </button>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
                    <?php
                        if(array_key_exists('btn-logout', $_POST)){
                            logoutAdmin();
                        }
                        function logoutAdmin(){
                            include "logout-admin.php";
                        }
                    ?>
                    </div>
                </ul>
                </div>
            </div>
        </nav>    
    </header>
    <main>
    <br>
        <div class="row">
            <div class="col">
                <div class="card" style="width: 40rem; height: 45rem; margin: 0 auto 0 auto;">
                    <div class="card-body">
                        <h4 class="h1-responsive font-weight-bold text-center my-4">Jogos</h2>
                        <p class="text-center">Aqui você poderá cadastrar os jogos da sua loja.</p>
                        <hr>

                        <form action="cadastra-produto.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col">
                                    <label for="inputNome">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do produto">
                                </div>
                                <div class="col">
                                    <label for="inputPreco">Preço</label>
                                    <input type="text" class="form-control" id="preco" name="preco" placeholder="0,00" onchange="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <br>
                                    <label>Descrição</label>
                                    <input type="text" name="descricao" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                    <div class="col">
                                        <br>
                                        <?php
                                                require_once '../global.php';
                                                try {
                                                    $listacategoria = CategoriaDao::listar();
                                                } catch(Exception $e) {
                                                    echo '<pre>';
                                                        print_r($e);
                                                    echo '</pre>';
                                                    echo $e->getMessage();
                                                }
                                            ?>
    
                                        <label for="inputCat">Categoria</label>
                                        <select id="categoria" name="categoria" class="form-control">
                                            <option selected>Escolher...</option>
                                            <?php foreach($listacategoria as $categoria){ ?>
                                            <option value="<?php echo $categoria['idcategoria'];?>">
                                                <?php echo  $categoria['nomecategoria'];?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                            </div>
                            <?php
                            ?>
                            <div class="row">
                                <div class="col">
                                    <br>
                                    <label for="inputPic">Foto do item</label>
                                    
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" accept="image/*" class="custom-file-input" id="foto" name="foto" aria-describedby="inputGroupFile01" onchange="loadFile(event)">
                                            <label class="custom-file-label" for="inputGroupFile01">Escolher arquivo</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div style="height:170PX">
                                    <div class="card" style="width: 18rem; margin: 0 auto 0 auto;">
                                            <img id="output" class="card-img-top" style="height:180px;"/>
                                        </div>
                                        <script>
                                            var loadFile = function(event) {
                                                var output = document.getElementById('output');
                                                output.src = URL.createObjectURL(event.target.files[0]);
                                                output.onload = function() {
                                                URL.revokeObjectURL(output.src) // free memory
                                                }
                                            };
                                    </script>   
                                </div>            
                            <div class="row">
                                <div class="col">
                                    <br>
                                    <button type="button" class="btn btn-primary" style="width:100%; " data-bs-toggle="modal" data-bs-target="#cadastrar">Cadastrar</button>
                                </div>
                            </div>
                            <div class="modal fade" id="cadastrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Cadastrar item</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Você deseja realizar o cadastro deste produto?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-success" >
                                        Cadastrar
                                    </button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                    </div>
                    
                </div>
            </div>
        </div>
        <br>
        <?php
                    //require_once '../dao/ProdutoDao.php';
                    try {
                        $listaproduto = ProdutoDao::listar();
                    } catch(Exception $e) {
                        echo '<pre>';
                            print_r($e);
                        echo '</pre>';
                        echo $e->getMessage();
                    }
                ?>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" width='80px'>Foto</th>
                            <th scope="col">Nome do Produto</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($listaproduto as $produto){ ?>
                        <tr>
                            <th scope="row"><?php echo $produto['idproduto']; ?></th>
                            <td> <img src="../<?php echo $produto['fotoproduto']; ?>"  width="50%"></td>
                            <td><?php echo $produto['nomeproduto']; ?></td>
                            <td><?php echo $produto['precoproduto']; ?> </td>
                            <td><?php echo $produto['nomecategoria']; ?> </td>
                            <td>
                            <button type="button" class="btn btn-warning text-light" data-bs-toggle="modal" data-bs-target="#editar<?php echo $produto['idproduto'];?>">
                            <span>Editar </span> <i class="fa fa-pencil"></i>
                            </button>
                            
                            <form method="post" action="edita-produto.php">
                            <div class="modal fade" id="editar<?php echo $produto['idproduto']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Editar item</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                            <label for="inputNome">Nome</label>
                                            <input type="text" class="form-control" name="editNome" placeholder="Nome do produto">
                                        </div>
                                        <div class="col">
                                            <label for="inputPreco">Preço</label>
                                            <input type="text" class="form-control" name="editPreco" placeholder="0,00" onchange="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <br>
                                            <label>Descrição</label>
                                            <input type="text" name="editDescricao" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                            <div class="col">
                                                <br>
                                                <?php
                                                        require_once '../global.php';
                                                        try {
                                                            $listacategoria = CategoriaDao::listar();
                                                        } catch(Exception $e) {
                                                            echo '<pre>';
                                                                print_r($e);
                                                            echo '</pre>';
                                                            echo $e->getMessage();
                                                        }
                                                    ?>
            
                                                <label for="inputCat">Categoria</label>
                                                <select id="categoria" name="editCategoria" class="form-control">
                                                    <option selected>Escolher...</option>
                                                    <?php foreach($listacategoria as $categoria){ ?>
                                                    <option value="<?php echo $categoria['idcategoria'];?>">
                                                        <?php echo  $categoria['nomecategoria'];?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                    </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-warning" name="del" value="<?php echo $produto['idproduto'];?>" >
                                        Atualizar
                                    </button>
                                </div>
                                </div>
                            </div>
                            </div>
                            </form>

                            </td>
                            <td>
                                <button type="button" class="btn btn-danger text-light" data-bs-toggle="modal" data-bs-target="#deletar<?php echo $produto['idproduto']; ?>">
                                <span>Exluir </span> <i class="fa fa-trash"></i>
                                </button>

                                <div class="modal fade" id="deletar<?php echo $produto['idproduto']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Excluir item</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Você deseja deletar este item permanentemente?
                                    </div>
                                    <div class="modal-footer">
                                    <form method="post" action="deleta-produto.php">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-danger" name="del" value="<?php echo $produto['idproduto']; ?>" >
                                            Deletar
                                        </button>
                                    </form>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
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
  </body>
</html>
