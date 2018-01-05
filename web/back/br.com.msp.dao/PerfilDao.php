<?php
    class PerfilDao extends Dao{
        public function __construct() {
            parent::__construct();
        }

        public function retrievePerfil() {
            $perfil = new Perfil();
            $perfis = parent::retrieve($perfil);
            if(!is_array($perfis) && get_class($perfis) == 'ResponseMessage') {
                $perfil = $perfis;
            }
            else {
                $perfil = $perfis[0];
            }
            return $perfil;
        }

        public function authenticate($email, $password) {
            $perfil = $this->retrievePerfil();
            $mensagem = new ResponseMessage();
            if($perfil->getEmail() == $email && $perfil->getSenha() == $password) {
                $perfil->setSenha('<secret>');
            }
            else {
                $perfil = null;
            }

            return $perfil;
        }

        public function createPerfil($perfil) {
            return parent::persist($perfil);
        }

        public function updatePerfil($perfil) {
            return parent::update($perfil);
        }

    }
?>