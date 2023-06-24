<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommerce | Página principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <header style="display:fixed;">
        <nav class="navbar navbar-expand-lg bg-light">
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
                    <a class="nav-link" href="#sobre">Sobre</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#contato">Contato</a>
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
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="img/layout/slide11.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Exclusividades</h5>
                <p>Aqui você encontra os destaques da nova geração e jogue jogos exclusivos com alta qualidade e desempenho.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="img/layout/slide22.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Promoção</h5>
                <p>Se depare com promoções imperdíveis de até 50% de desconto e desfrute um mar de variedades</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="img/layout/slide33.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Nostalgia</h5>
                <p>Ao comprar itens exclusivos receba brindes como jogos de gerações anteriores para alimentar nossa nostalgia.</p>
            </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
        <br>

        <section >
            <h3 class="text-center">Produtos Destaque</h3>
            <br>
            <div class="container text-center d-flex justify-content-center">
                <div class="row d-flex justify-content-center ">
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <img src="img/layout/naruto.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Naruto Online</h5>
                                <p class="card-text"> Único jogo de RPG online oficial do Naruto. Baseado no Mangá e Anime, o RPG online da OASIS.</p>
                                <a href="#" class="btn btn-outline-primary">Visualizar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                        <img src="img/layout/among.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Among Us</h5>
                                    <p class="card-text"> Among Us foi inspirado no jogo em grupo da vida real Mafia, e no filme de ficção científica The Thing.</p>
                                    <a href="#" class="btn btn-outline-primary">Visualizar</a>
                                </div>
                            </div>
                        </div>
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                        <img src="img/layout/minecraft.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Minecraft</h5>
                                    <p class="card-text"> Sandbox e sobrevivência que não possui objetivos, permitindo a exploração total. </p>
                                    <a href="#" class="btn btn-outline-primary">Visualizar</a>
                                </div>
                            </div>
                        </div>
                </div>
                </div>
                <br>
                <br>
                <div class="container text-center d-flex justify-content-center">
                    <div class="row d-flex justify-content-center ">
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                            <img src="img/layout/skyrim.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Skyrim</h5>
                                        <p class="card-text">RPG que mantém a jogabilidade de mundo aberto encontrada na série The Elder Scrolls.</p>
                                        <a href="#" class="btn btn-outline-primary">Visualizar</a>
                                    </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                            <img src="img/layout/deadby.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Dead By Daylight</h5>
                                        <p class="card-text"> Jogado em um modo um contra quatro, onde há assassinos e sobreviventes.</p>
                                        <a href="#" class="btn btn-outline-primary">Visualizar</a>
                                    </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                            <img src="img/layout/171.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">171</h5>
                                        <p class="card-text">Nicolau Souza, um trabalhador que precisa se defender de criminosos que agrediram seu irmão.</p>
                                        <a href="#" class="btn btn-outline-primary">Visualizar</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

        </section>
        <br>
        <hr>
        <section>
            <h3 class="text-center" id="sobre">Sobre nós</h3>
            <br>
            <div class="container text-center d-flex justify-content-center">
                <div class="row d-flex justify-content-center ">
                        <div class="col">
                        <div class="card" style="width: 18rem;">
                    <img src="img/dev/pietro.png" class="card-img-top"  style="height: 150px;width:285px; margin-top:5px;">
                    <div class="card-body">
                        <h5>Pietro Henrique</h5>
                        <p class="card-text">Olhar técnico com abstrações artísticas, o Soldado de alto escalão que combate com as margens, o próprio inimigo do CSS!</p>
                    </div>
                    </div>
                        </div>
                        <div class="col">
                        <div class="card" style="width: 18rem;">
                    <img src="img/dev/jean.png" class="card-img-top" style="height: 150px;width:285px; margin-top:5px;">
                    <div class="card-body">
                        <h5>Jean Charles</h5>
                        <p class="card-text">O Guerreiro que pensa atras das cenas, ninguém é capaz de parar esta fera. Faz o impossivel até mesmo sem suas mãos!</p>
                    </div>
                    </div>
                        </div>
                        <div class="col">
                        <div class="card" style="width: 18rem;">
                    <img src="img/dev/vinicius.png" class="card-img-top" style="height: 150px;width:285px; margin-top:5px;">
                    <div class="card-body">
                        <h5>Vinicius Matheus</h5>
                        <p class="card-text">Conhecido por sua paciência e compaixão ao próximo, uni-vós! Responsável por proteger "nossos" dados secretos.</p>
                    </div>
                    </div>
                    <br>
                </div>
            </div>
            
        </section>
        <section>
        <br>
        <hr>
        <h3 class="h1-responsive font-weight-bold text-center my-4" id="contato">Contato</h3>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5">Você possui alguma duvida?Por favor, não hesite em entrar em contato com nós. Nossa equipe fará o possível para te ajudar!</p>
        <div class="card" style="width: 35rem; margin: 0 auto 0 auto;">
            <div class="card-body">
            <form>
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">Não iremos compartilhar seu email.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputSubject" class="form-label">Assunto</label>
                    <input type="text" class="form-control" id="exampleInputSubject">
                </div>
                <div class="mb-3">
                    <label for="exampleInputMessage" class="form-label">Mensagem</label>
                    <textarea class="form-control" id="exampleFormMessage" rows="5"></textarea>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary" type="submit">Enviar</button>
                </div>
                </form>
            </div>
        </div>
        <br>
        </section>
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