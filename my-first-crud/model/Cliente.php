<?php
    class Cliente{
        private $id;
        private $nome;
        private $cpf;
        private $email;
        private $senha;
        private $logradouro;
        private $numero;
        private $complemento;
        private $bairro;
        private $cidade;
        private $uf;
        private $cep;
        private $usuario;
        private $data;

        public function setId($id){
            $this->id = $id;
        }
        public function getId(){
            return $this->id;
        }
        public function setNome($nome){
            $this->nome = $nome;
        }
        public function getNome(){
            return $this->nome;
        }
        public function setCpf($cpf){
            $this->cpf = $cpf;
        }
        public function getCpf(){
            return $this->cpf;
        }
        public function setEmail($email){
            $this->email = $email;
        }
        public function getEmail(){
            return $this->email;
        }
        public function setSenha($senha){
            $this->senha = $senha;
        }
        public function getSenha(){
            return $this->senha;
        }
        public function setLogradouro($logradouro){
            $this->logradouro = $logradouro;
        }
        public function getLogradouro(){
            return $this->logradouro;
        }
        public function setNumero($numero){
            $this->numero = $numero;
        }
        public function getNumero(){
            return $this->numero;
        }
        public function setComplemento($complemento){
            $this->complemento = $complemento;
        }
        public function getComplemento(){
            return $this->complemento;
        }
        public function setBairro($bairro){
            $this->bairro = $bairro;
        }
        public function getBairro(){
            return $this->bairro;
        }
        public function setCidade($cidade){
            $this->cidade = $cidade;
        }
        public function getCidade(){
            return $this->cidade;
        }
        public function setUf($uf){
            $this->uf = $uf;
        }
        public function getUf(){
            return $this->uf;
        }
        public function setCep($cep){
            $this->cep = $cep;
        }
        public function getCep(){
            return $this->cep;
        }
        public function setUsuario($usuario){
            $this->usuario = $usuario;
        }
        public function getUsuario(){
            return $this->usuario;
        }
        public function setData($data){
            $this->data = $data;
        }
        public function getData(){
            return $this->data;
        }
        
    }
?>