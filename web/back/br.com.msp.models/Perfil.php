<?php
    class Perfil {
        private $id = null;
        private $nome = null;
        private $senha = null;
        private $email = null;
        private $capa = null;
        private $icone = null;
        private $cidade = null;
        private $estado = null;
        private $latitude = null;
        private $longitude = null;
        private $idade = null;
        private $signo = null;
        private $altura = null;
        private $peso = null;
        private $atributos = null;
        
        public function setId($id) {
            $this->id = $id;
        }
        
        public function getId() {
            return $this->id;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }
        
        public function getNome() {
            return $this->nome;
        }

        public function setSenha($senha) {
            $this->senha = $senha;
        }
        
        public function getSenha() {
            return $this->senha;
        }

        public function setEmail($email) {
            $this->email = $email;
        }
        
        public function getEmail() {
            return $this->email;
        }

        public function setCapa($capa) {
            $this->capa = $capa;
        }
        
        public function getCapa() {
            return $this->capa;
        }

        public function setIcone($icone) {
            $this->icone = $icone;
        }
        
        public function getIcone() {
            return $this->icone;
        }

        public function setCidade($cidade) {
            $this->cidade = $cidade;
        }
        
        public function getCidade() {
            return $this->cidade;
        }

        public function setEstado($estado) {
            $this->estado = $estado;
        }
        
        public function getEstado() {
            return $this->estado;
        }

        public function setLatitude($latitude) {
            $this->latitude = $latitude;
        }
        
        public function getLatitude() {
            return $this->latitude;
        }

        public function setLongitude($longitude) {
            $this->longitude = $longitude;
        }
        
        public function getLongitude() {
            return $this->longitude;
        }

        public function setIdade($idade) {
            $this->idade = $idade;
        }
        
        public function getIdade() {
            return $this->idade;
        }

        public function setSigno($signo) {
            $this->signo = $signo;
        }
        
        public function getSigno() {
            return $this->signo;
        }

        public function setAltura($altura) {
            $this->altura = $altura;
        }
        
        public function getAltura() {
            return $this->altura;
        }

        public function setPeso($peso) {
            $this->peso = $peso;
        }
        
        public function getPeso() {
            return $this->peso;
        }

        public function setAtributos($atributos) {
            $this->atributos = $atributos;
        }
        
        public function getAtributos() {
            return $this->atributos;
        }

        public function serialize() {
            $str = json_encode($this->read());
            $str = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
                return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
            }, $str);
            return $str;
        }

        public function read() {
            return get_object_vars($this);
        }

        public function entityName() {
            return 'perfil';
        }
    }
?>