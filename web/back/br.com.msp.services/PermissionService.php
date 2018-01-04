<?php
    class PermissionService{
        private $dao = null;
        private $userDao = null;

        public function __construct() {
            $this->dao = new PermissionDao();
            $this->userDao = new UserDao();
        }

        public function retrievePermissions($login, $password) { 
            $authenticatedUser = $this->userDao->authenticateUser($login, $password);
            if($authenticatedUser != null) {
                if(get_class($authenticatedUser) != 'ResponseMessage') {
                    $permissions = $this->dao->retrievePermissions();
                    if(get_class($permissions) != 'ResponseMessage') {
                        return Jsonify::arrayToJson($permissions);
                    }
                    else {
                        return $permissions->serialize();
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

        public function createPermission($permission, $login, $password) {
            $authenticatedUser = $this->userDao->authenticateUser($login, $password);
            if($authenticatedUser != null) {
                if(get_class($authenticatedUser) != 'ResponseMessage') {
                    $response = $this->dao->persistPermission($permission);
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

        public function updatePermission($permission, $login, $password) {
            $authenticatedUser = $this->userDao->authenticateUser($login, $password);
            if($authenticatedUser != null) {
                if(get_class($authenticatedUser) != 'ResponseMessage') {
                    $response = $this->dao->updatePermission($permission);
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

        public function deletePermission($permission, $login, $password) {
            $authenticatedUser = $this->userDao->authenticateUser($login, $password);
            if($authenticatedUser != null) {
                if(get_class($authenticatedUser) != 'ResponseMessage') {
                    $response = $this->dao->deletePermission($permission);
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