<div class="btn-group">
<button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    <span>Login </span><i class="fa fa-user"></i>
</button>
<ul class="dropdown-menu">
    <li><a class="dropdown-item" href="<?php if(file_exists('../login.php')){echo('../login.php');}
                                             if(file_exists('login.php')){echo('login.php');}?>">Login</a></li>
    <li><a class="dropdown-item" href="<?php if(file_exists('../cadastro.php')){echo('../cadastro.php');}
                                             if(file_exists('cadastro.php')){echo('cadastro.php');}?>">Cadastrar-se</a></li>
    <li><a class="dropdown-item" href="<?php if(file_exists('../page-admin/login-admin.php')){echo('../page-admin/login-admin.php');}
                                             if(file_exists('page-admin/login-admin.php')){echo('page-admin/login-admin.php');}?>">Administrador</a></li>
</ul>
</div>