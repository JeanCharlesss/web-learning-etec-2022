<?php   
    require_once 'Categoria.php';

    class Produto{
        private $id;
        private $nome;
        private $preco;
        private $foto;
        private $descricao;
        private $quantidade;
        private $categoria;

        public function __construct(){
            $this->categoria = new Categoria();
        }

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

        public function setPreco($preco){
            $this->preco = $preco;
        }

        public function getPreco(){
            return $this->preco;
        }

        public function setFoto($foto){
            $this->foto = $foto;
        }

        public function getFoto(){
            return $this->foto;
        }

        public function getCategoria(){
            return $this->categoria;
        }
        public function setCategoria($categoria){
            $this->categoria = $categoria;
        }
        public function getDescricao(){
            return $this->descricao;
        }
        public function setDescricao($descricao){
            $this->descricao = $descricao;
        }
        public function getQuantidade(){
            return $this->quantidade;
        }
        public function setQuantidade($quantidade){
            $this->quantidade = $quantidade;
        }
    }
?>