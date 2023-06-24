<?php
    // require_once '../model/Categoria.php';
    // require_once '../model/Conexao.php';

    require_once '../global.php';

    class CategoriaDao{

        public static function cadastrar($categoria){
            $conexao = Conexao::conectar();

            $queryInsert = "INSERT INTO tbcategoria(nomecategoria)
                            VALUES(?)";
            
            $prepareStatement = $conexao->prepare($queryInsert);
            
            $prepareStatement->bindValue(1, $categoria->getNome());

            $prepareStatement->execute();
            return 'Cadastrou';
        }

        public static function deletar($categoria){
            $conexao = Conexao::conectar();

            $queryDelete= "DELETE FROM tbcategoria
                            WHERE idcategoria = ?";
            
            $prepareStatement = $conexao->prepare($queryDelete);
            
            $prepareStatement->bindValue(1, $categoria->getId());

            try{
                $prepareStatement->execute();
                return 'Apagou';
            }catch(Exception $e){
                echo('<script>alert("Não é possivel deletar categoria pois há produtos registrado com este item!");</script>');
            }

        }

        public static function editar($categoria){
            $conexao = Conexao::conectar();

            $queryUpdate = "UPDATE tbcategoria
                            SET nomecategoria = ?
                            WHERE idcategoria = ?";

            $prepareStatement = $conexao->prepare($queryUpdate);

            $prepareStatement->bindValue(1, $categoria->getNome());
            $prepareStatement->bindValue(2, $categoria->getId());

            try{
                $prepareStatement->execute();
                return 'Editou';
            }catch(Exception $e){
                echo('<script>alert("Não é possivel editar categoria pois há produtos registrado com este item!");</script>');
            }
        }

        public static function listar(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idcategoria, nomecategoria 
                            FROM tbcategoria";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;   
        }
    }
?>