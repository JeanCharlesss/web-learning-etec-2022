<?php
    // require_once '../model/Categoria.php';
    // require_once '../model/Conexao.php';

    require_once '../global.php';

    class LoginDao{
        public static function verificar($cliente){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idcliente
                            FROM tbcliente 
                            WHERE usuariocliente = '".$cliente->getUsuario()."' AND senhacliente = '".$cliente->getSenha()."'";
            $resultado = $conexao->query($querySelect);
            $cliente = $resultado->fetchAll();

            return $cliente;   
        }
    }

?>