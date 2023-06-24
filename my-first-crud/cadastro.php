<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-ligh t" >
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><i class="fa-solid fa-fire"></i> FireHouse</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mr-auto" style="margin-left: auto;">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Menu</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="page-client/produtos.php">Jogos</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="index.php#sobre">Sobre</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="index.php#contato">Contato</a>
                    </li>
                    <?php
                        require_once 'page-client/verifica-logado-cliente.php';

                        if(verificarLogado()==true){
                            include 'components/logout-button.php';
                        }else{
                            include 'components/login-button.php';
                        }
                    ?>
                </ul>
                </div>
            </div>
        </nav>    
    </header>
    <main>
        <br>
        <div class="row">
            <div class="col">
            <h2 class="h1-responsive font-weight-bold text-center my-4">Cadastro</h2>
                <div class="card" style="width: 40rem; height: 43rem; margin: 0 auto 0 auto;">
                    <div class="card-body">
                    <form method="post" action="page-client/cadastra-cliente.php">
                    <div class="row">
                            <div class="col">
                            <div class="mb-3">
                                <label for="lblNome" class="form-label">Nome completo</label>
                                <input type="text" class="form-control" id="txtNome" name="txtNome">
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                <label for="lblDataNasc" class="form-label">Data de Nascimento</label>
                                <input type="date" class="form-control" id="txtData" name="txtData">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="lblCpf" class="form-label">CPF</label>
                                <input type="text" class="form-control" id="txtCpf" name="txtCpf">
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="lblRua" class="form-label">Rua</label>
                                    <input type="text" class="form-control" id="txtLogradouro" name="txtLogradouro">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="lblBairro" class="form-label">Bairro</label>
                                    <input type="text" class="form-control" id="txtBairro" name="txtBairro">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="lblCidade" class="form-label">Cidade</label>
                                    <input type="text" class="form-control" id="txtCidade" name="txtCidade">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="lblComp" class="form-label">Comp.</label>
                                    <input type="text" class="form-control" id="txtComplemento" name="txtComplemento">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="lblNumero" class="form-label">Numero</label>
                                    <input type="number" class="form-control" id="txtNumero" name="txtNumero">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="lblCep" class="form-label">CEP</label>
                                    <input type="text" class="form-control" id="txtCep" name="txtCep">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="txtUf" class="form-label">UF</label>
                                    <select class="form-select" aria-label="Default select example" name="txtUf">
                                        <option value="AC">Acre</option>
                                        <option value="AL">Alagoas</option>
                                        <option value="AP">Amapá</option>
                                        <option value="AM">Amazonas</option>
                                        <option value="BA">Bahia</option>
                                        <option value="CE">Ceará</option>
                                        <option value="DF">Distrito Federal</option>
                                        <option value="ES">Espírito Santo</option>
                                        <option value="GO">Goiás</option>
                                        <option value="MA">Maranhão</option>
                                        <option value="MT">Mato Grosso</option>
                                        <option value="MS">Mato Grosso do Sul</option>
                                        <option value="MG">Minas Gerais</option>
                                        <option value="PA">Pará</option>
                                        <option value="PB">Paraíba</option>
                                        <option value="PR">Paraná</option>
                                        <option value="PE">Pernambuco</option>
                                        <option value="PI">Piauí</option>
                                        <option value="RJ">Rio de Janeiro</option>
                                        <option value="RN">Rio Grande do Norte</option>
                                        <option value="RS">Rio Grande do Sul</option>
                                        <option value="RO">Rondônia</option>
                                        <option value="RR">Roraima</option>
                                        <option value="SC">Santa Catarina</option>
                                        <option value="SP">São Paulo</option>
                                        <option value="SE">Sergipe</option>
                                        <option value="TO">Tocantins</option>
                                        <option value="EX">Estrangeiro</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Usuario</label>
                                <input type="text" class="form-control" id="txtUsuario" name="txtUsuario">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleInputEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="txtEmail" name="txtEmail" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">Não compartilharemos seu email.</div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                <label for="exampleInputEmail" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="txtSenha" name="txtSenha" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">Escolha uma senha forte.</div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Confirmar senha</label>
                                <input type="password" class="form-control" id="txtConfirmar" name="txtConfirmar">
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                            <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="aceito" id="check" name="checked">
                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                        li e concordo com os termos de privacidade
                                    </label>
                                    </div>
                                    <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-light me-md-2" type="button"><a href="index.php" style="text-decoration: none;">Cancelar</a></button>
                                    <button class="btn btn-primary" type="submit">Cadastrar</button>
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
        <p class="text-center w-responsive mx-auto mb-5"><br>Alguma dúvida? Nossa equipe garante 100% a segurança de seus dados pessoais!</p>
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