<?php
    class MatterService{
        private $matterDao = null;
        private $userDao = null;

        public function __construct() {
            $this->matterDao = new MatterDao();
            $this->userDao = new UserDao();
        }

        public function retrieveMatters($login, $password) {
            $authenticatedUser = $this->userDao->authenticateUser($login, $password);
            if($authenticatedUser != null) {
                if(get_class($authenticatedUser) != 'ResponseMessage') {
                    $matters = $this->matterDao->retrieveMatters();
                    if($matters != null && (count($matters) > 0)) {
                        if(get_class($matters) != 'ResponseMessage') {
                            return Jsonify::arrayToJson($users);
                        }
                        else {
                            return $matters->serialize();
                        }
                    }
                    else {
                        $message = new ResponseMessage();
                        $message->setMessage('Error: Nenhuma matéria cadastrada.');
                        $message->setStatus(ResponseMessage::STATUS_ERROR);
        
                        return $message->serialize();
                    }
                }
                else {
                    $message = new ResponseMessage();
                    $message->setMessage('Error: Falha de autenticação.');
                    $message->setStatus(ResponseMessage::STATUS_ERROR);
    
                    return $message->serialize();
                }
            }
            else {
                $message = new ResponseMessage();
                $message->setMessage('Error: Falha de autenticação.');
                $message->setStatus(ResponseMessage::STATUS_ERROR);

                return $message->serialize();
            }
        }

        public function createMatter($matter, $login, $password) {
            $authenticatedUser = $this->userDao->authenticateUser($login, $password);
            if($authenticatedUser != null) {
                if(get_class($authenticatedUser) != 'ResponseMessage') {
                    $matter->setCreatedBy($authenticatedUser);
                    $matter->setUpdatedBy($authenticatedUser);
                    $response = $this->matterDao->persistMatter($matter);
                    return $response->serialize();
                }
                else {
                    $message = new ResponseMessage();
                    $message->setMessage('Error: Falha de autenticação.');
                    $message->setStatus(ResponseMessage::STATUS_ERROR);
    
                    return $message->serialize();
                }
            }
            else {
                $message = new ResponseMessage();
                $message->setMessage('Error: Falha de autenticação.');
                $message->setStatus(ResponseMessage::STATUS_ERROR);

                return $message->serialize();
            }
        }

        public function updateMatter($matter, $login, $password) {
            $authenticatedUser = $this->userDao->authenticateUser($login, $password);
            if($authenticatedUser != null) {
                if(get_class($authenticatedUser) != 'ResponseMessage') {
                    $matter->setUpdatedBy($authenticatedUser);
                    $response = $this->matterDao->updateMatter($matter);

                    return $response->serialize();
                }
                else {
                    $message = new ResponseMessage();
                    $message->setMessage('Error: Falha de autenticação.');
                    $message->setStatus(ResponseMessage::STATUS_ERROR);
    
                    return $message->serialize();
                }
            }
            else {
                $message = new ResponseMessage();
                $message->setMessage('Error: Falha de autenticação.');
                $message->setStatus(ResponseMessage::STATUS_ERROR);

                return $message->serialize();
            }
        }

        public function deleteMatter($matter, $login, $password) {
            $authenticatedUser = $this->userDao->authenticateUser($login, $password);
            if($authenticatedUser != null) {
                if(get_class($authenticatedUser) != 'ResponseMessage') {
                    $response = $this->matterDao->deleteMatter($matter);
                    return $response->serialize();
                }
                else {
                    $message = new ResponseMessage();
                    $message->setMessage('Error: Falha de autenticação.');
                    $message->setStatus(ResponseMessage::STATUS_ERROR);
    
                    return $message->serialize();
                }
            }
            else {
                $message = new ResponseMessage();
                $message->setMessage('Error: Falha de autenticação.');
                $message->setStatus(ResponseMessage::STATUS_ERROR);

                return $message->serialize();
            }
        }

    }
    
?>