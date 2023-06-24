<?php
    // require_once '../model/Produto.php';
    // require_once '../model/Conexao.php';

    require_once '../global.php';

    class ProdutoDao{

        public static function cadastrar($produto){
            $conexao = Conexao::conectar();

            $queryInsert = "INSERT INTO tbProduto(nomeProduto, precoProduto, idCategoria, descproduto)
                            VALUES(?,?,?,?)";
            
            $prepareStatement = $conexao->prepare($queryInsert);
            
            $prepareStatement->bindValue(1, $produto->getNome());
            $prepareStatement->bindValue(2, $produto->getPreco());
            $prepareStatement->bindValue(3, $produto->getCategoria()->getId());
            $prepareStatement->bindValue(4, $produto->getDescricao());

            $prepareStatement->execute();
            return 'Cadastrou';
        }
        public static function deletar($produto){
            $conexao = Conexao::conectar();

            $queryDelete= "DELETE FROM tbproduto
                            WHERE idproduto = ?";
            
            $prepareStatement = $conexao->prepare($queryDelete);
            
            $prepareStatement->bindValue(1, $produto->getId());

            try{
                $prepareStatement->execute();
                return 'Apagou';
            }catch(Exception $e){
                echo('<script>alert("Não é possivel deletar este item!");</script>');
            }
        }

        public static function editar($produto){
            $conexao = Conexao::conectar();

            $queryUpdate = "UPDATE tbproduto
                            SET nomeproduto = ?, precoproduto = ?, idcategoria = ?, descproduto =? 
                            WHERE idproduto = ?";

            $prepareStatement = $conexao->prepare($queryUpdate);

            $prepareStatement->bindValue(1, $produto->getNome());
            $prepareStatement->bindValue(2, $produto->getPreco());
            $prepareStatement->bindValue(3, $produto->getCategoria());
            $prepareStatement->bindValue(4, $produto->getDescricao());
            $prepareStatement->bindValue(5, $produto->getId());

            try{
                $prepareStatement->execute();
                echo('<script>alert("bebebeebe");</script>');
                return 'Editou';
            }catch(Exception $e){
                echo('<script>alert("Não é possivel editar categoria pois há produtos registrado com este item!");</script>');
            }
        }

        public static function consultarId($produto){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idproduto FROM tbproduto WHERE nomeproduto LIKE '".$produto->getNome()."'";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            foreach ($lista as $produto)
                $id = $produto['idproduto'];
            return $id;   
        }

        public static function atualizarFoto($produto){
            $conexao = Conexao::conectar();

            $queryInsert = "UPDATE tbProduto
                            SET fotoproduto = ?
                            WHERE idproduto = ?";
            
            $prepareStatement = $conexao->prepare($queryInsert);
            
            $prepareStatement->bindValue(1, $produto->getFoto());
            $prepareStatement->bindValue(2, $produto->getId());

            try{
                $prepareStatement->execute();
                echo('<script>alert("uhull");</script>');
            }catch(Exception $e){
                echo('<script>alert("melda");</script>');
            }
            return 'Atualizou';
        }

        public static function listar(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idproduto, nomeproduto, precoproduto, fotoproduto, nomecategoria , descproduto
                            FROM tbproduto INNER JOIN tbcategoria ON tbproduto.idcategoria = tbcategoria.idcategoria";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;   
        }

        public static function consultarDados($produto){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT nomeproduto, precoproduto, fotoproduto, descproduto
                             FROM tbproduto WHERE idproduto = ".$produto->getId();
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            foreach ($lista as $p){
                $produto->setNome($p['nomeproduto']);
                $produto->setPreco($p['precoproduto']);
                $produto->setFoto($p['fotoproduto']);
                $produto->setDescricao($p['descproduto']);
            }
            return $produto;   
        }

        public static function listarQuantidade($id){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT COUNT(idproduto) AS qtde FROM tbproduto
                            WHERE idcategoria = ".$id;
            $resultado = $conexao->query($querySelect);
            $num = $resultado->fetchAll();
            foreach ($num as $n)
                return $n['qtde'];  

        }
        
        public static function random_color($start = 0x000000, $end = 0xFFFFFF) {
            return sprintf('#%06x', mt_rand($start, $end));
        }

        public static function contar(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT COUNT(idproduto) AS qtde FROM tbproduto";
            $resultado = $conexao->query($querySelect);
            $num = $resultado->fetchAll();
            foreach ($num as $n)
                return $n['qtde'];   
        }

        
    }
?>