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
        logoutClient();
    }
    function logoutClient(){
        if (file_exists('../logout.php')) {
            include "../logout.php";
        }
        if (file_exists('logout.php')) {
            include "logout.php";
        }
    }
?>