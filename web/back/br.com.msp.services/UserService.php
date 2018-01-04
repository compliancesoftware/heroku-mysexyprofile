<?php
    class UserService{
        private $permissionDao = null;
        private $userDao = null;

        public function __construct() {
            $this->permissionDao = new PermissionDao();
            $this->userDao = new UserDao();
        }

        public function retrieveUsers($login, $password) {
            $authenticatedUser = $this->userDao->authenticateUser($login, $password);
            if($authenticatedUser != null) {
                if(get_class($authenticatedUser) != 'ResponseMessage') {
                    $users = $this->userDao->retrieveUsers();
                    if($users != null && (count($users) > 0)) {
                        if(get_class($users) != 'ResponseMessage') {
                            return Jsonify::arrayToJson($users);
                        }
                        else {
                            return $users->serialize();
                        }
                    }
                    else {
                        $message = new ResponseMessage();
                        $message->setMessage('Error: Nenhum usuário encontrado.');
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

        public function getUserById($id, $login, $password) {
            $authenticatedUser = $this->userDao->authenticateUser($login, $password);
            if($authenticatedUser != null) {
                if(get_class($authenticatedUser) != 'ResponseMessage') {
                    $user = $this->userDao->getUserById();
                    return $user;
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

        public function createUser($user, $login, $password) {
            $authenticatedUser = $this->userDao->authenticateUser($login, $password);
            if($authenticatedUser != null) {
                if(get_class($authenticatedUser) != 'ResponseMessage') {
                    $response = $this->userDao->persistUser($user);
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

        private function isAdmin($user) {
            $isAdmin = false;
            $permission = new Permission();
            $permission = $this->permissionDao->getPermissionById($user->getPermission());
            $rules = $permission->getRules();
            $hasAdmRule = strpos($rules, 'Administrador');
            if($hasAdmRule !== false) {
                $isAdmin = true;
            }
            
            return $isAdmin;
        }

        private function canUpdate($user) {
            $canUpdate = false;

            $userToUpdate = $this->userDao->getUserById($user->getId());

            if($this->isAdmin($userToUpdate) && $this->isAdmin($user)) {
                $canUpdate = true;
            }
            else if(!$this->isAdmin($userToUpdate)) {
                $canUpdate = true;
            }
            else {
                $count = 0;
                
                $users = $this->userDao->retrieveUsers();
    
                foreach($users as $user) {
                    if($this->isAdmin($user)) {
                        $count++;
                    }
                }
    
                if($count > 1) {
                    $canUpdate = true;
                }
            }

            return $canUpdate;
        }

        private function canDelete($user) {
            $canDelete = false;

            $user = $this->userDao->getUserById($user->getId());
            
            $count = 0;
            
            $users = $this->userDao->retrieveUsers();

            foreach($users as $user) {
                if($this->isAdmin($user)) {
                    $count++;
                }
            }

            if($count > 1) {
                $canDelete = true;
            }

            return $canDelete;
        }

        public function updateUser($user, $login, $password) {
            $authenticatedUser = $this->userDao->authenticateUser($login, $password);
            if($authenticatedUser != null) {
                if(get_class($authenticatedUser) != 'ResponseMessage') {
                    if($this->canUpdate($user)) {
                        $response = $this->userDao->updateUser($user);
                        return $response->serialize();
                    }
                    else {
                        $message = new ResponseMessage();
                        $message->setMessage('Error: Deve haver ao menos um usuário Administrador.');
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

        public function deleteUser($user, $login, $password) {
            $authenticatedUser = $this->userDao->authenticateUser($login, $password);
            if($authenticatedUser != null) {
                if(get_class($authenticatedUser) != 'ResponseMessage') {
                    if($this->canDelete($user)) {
                        $response = $this->userDao->deleteUser($user);
                        return $response->serialize();
                    }
                    else {
                        $message = new ResponseMessage();
                        $message->setMessage('Error: Deve haver ao menos um usuário Administrador.');
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

        public function authenticate($login, $password) {
            $found = $this->userDao->authenticateUser($login, $password);
            if($found != null) {
                $className = get_class($found);

                if($className != 'ResponseMessage') {
                    $message = new ResponseMessage();
                    $message->setMessage('Seja bem vindo '.$found->getName());
                    $message->setStatus(ResponseMessage::STATUS_OK);

                    $lastAccess = new DateTime();
                    $lastAccessAsString = $lastAccess->format('Y-m-d H:i:s');
                    $found->setLastAccess($lastAccessAsString);

                    $this->updateUser($found, $login, $password);

                    return $message->serialize();
                }
                else {
                    return $found->serialize();
                }
            }
            else {
                $message = new ResponseMessage();
                $message->setMessage('Erro: Usuário ou senha inválidos.');
                $message->setStatus(ResponseMessage::STATUS_ERROR);
                return $message->serialize();
            }
        }
    }
    
?>