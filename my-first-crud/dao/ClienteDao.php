<?php

    require_once '../global.php';

    
    class ClienteDao{

        public static function cadastrar($cliente){
            $conexao = Conexao::conectar();

            $queryInsert = "INSERT INTO tbcliente(nomecliente,cpfcliente,emailcliente,
                                                senhacliente,logradourocliente,numlogcliente,
                                                compcliente,bairrocliente,cidadecliente,
                                                ufcliente,cepcliente,datacliente,
                                                usuariocliente)
                            VALUES(?,?,?,
                                   ?,?,?,
                                   ?,?,?,
                                   ?,?,?,
                                   ?)";
            
            $prepareStatement = $conexao->prepare($queryInsert);
            
            $prepareStatement->bindValue(1, $cliente->getNome());
            $prepareStatement->bindValue(2, $cliente->getCpf());
            $prepareStatement->bindValue(3, $cliente->getEmail());
            $prepareStatement->bindValue(4, $cliente->getSenha());
            $prepareStatement->bindValue(5, $cliente->getLogradouro());
            $prepareStatement->bindValue(6, $cliente->getNumero());
            $prepareStatement->bindValue(7, $cliente->getComplemento());
            $prepareStatement->bindValue(8, $cliente->getBairro());
            $prepareStatement->bindValue(9, $cliente->getCidade());
            $prepareStatement->bindValue(10, $cliente->getUf());
            $prepareStatement->bindValue(11, $cliente->getCep());
            $prepareStatement->bindValue(12, $cliente->getData());
            $prepareStatement->bindValue(13, $cliente->getUsuario());

            try{
                $prepareStatement->execute();
                echo('
                <script>
                    alert("Cadastrado com sucesso!");
                    window.location = "../login.php";
                </script>
            ');
                return 'Cadastrou';
                
            }catch(Exception $e){
                echo('
                    <script>
                        alert("Ocorreu um erro ao se cadastrar: '.$e.' :(");
                    </script>
                ');
            }
        }

        public static function deletar($cliente){
            $conexao = Conexao::conectar();

            $queryDelete= "DELETE FROM tbcliente
                            WHERE idcliente = ?";
            
            $prepareStatement = $conexao->prepare($queryDelete);
            
            $prepareStatement->bindValue(1, $cliente->getId());

            try{
                $prepareStatement->execute();
                return 'Você banius este usuário.';
            }catch(Exception $e){
                echo('<script>alert("Não é possivel banir este usuário");</script>');
            }
        }


        
        public static function listar(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idcliente, nomecliente ,datacliente, usuariocliente, emailcliente
                            FROM tbcliente";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;   
        }
    }
?>