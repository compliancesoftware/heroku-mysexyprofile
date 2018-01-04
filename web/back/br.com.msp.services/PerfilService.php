<?php
    class PerfilService{
        private $perfilDao = null;

        public function __construct() {
            $this->perfilDao = new PerfilDao();
        }

        public function createPerfil($perfil) {
            $response = $this->perfilDao->createPerfil($perfil);
            return $response->serialize();
        }

        public function retrievePerfil() {
            return $this->perfilDao->retrievePerfil()->serialize();
        }

        public function authenticate($login, $senha) {
            $authenticated = $this->perfilDao->authenticate($login, $senha);
            $message = new ResponseMessage();

            if($authenticated != null) {
                $_SESSION['logado'] = $authenticated->serialize();
                $message->setMessage('Olá, '.$authenticated->getNome().'!');
                $message->setStatus(ResponseMessage::STATUS_OK);
            }
            else {
                $message->setMessage('Usuário ou senha incorretos.');
            }

            return $message->serialize();
        }
    }
    
?>