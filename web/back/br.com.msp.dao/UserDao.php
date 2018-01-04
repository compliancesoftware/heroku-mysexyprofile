<?php
    class UserDao extends Dao{
        public function __construct() {
            parent::__construct();
        }

        private function restructPermission($user) {
            $permissionDao = new PermissionDao();
            $user->setPermission($permissionDao->getPermissionById($user->getPermission()));
            return $user;
        }

        public function retrieveUsers() {
            $user = new User();
            $users = parent::retrieve($user);
            foreach($users as &$user) {
                $user = $this->restructPermission($user);
            }

            return $users;
        }

        public function getUserById($id) {
            $user = new User();
            $user = parent::getById($id, $user);
            
            $user = $this->restructPermission($user);

            return $user;
        }

        public function authenticateUser($nameOrEmail, $password) {
            try {
                $object = new User();
                $object->setName($nameOrEmail);
                $object->setPassword($password);
                $class = get_class($object);
                $entity = $object->entityName();
                
                $connection = $this->conn;
                if($connection != null) {
                    $statement = $connection->prepare('SELECT * FROM '.strtolower($entity).' WHERE (name = :name or email = :email) and password = :password');
                    $statement->bindParam(':name',$object->getName());
                    $statement->bindParam(':email',$object->getName());
                    $statement->bindParam(':password',$object->getPassword());
                    $statement->execute();
                    $statement->setFetchMode(PDO::FETCH_CLASS, $class);
                    $found = $statement->fetch();

                    $found = $this->restructPermission($found);

                    return $found;
                }
                else {
                    return $this->message;
                }
            } catch(Exception $e) {
                $mensagem = $this->message;
                $mensagem->setMessage('Error: '.$e->getMessage());
                $mensagem->setStatus(ResponseMessage::STATUS_ERROR);
                return $mensagem;
            }
        }

        public function persistUser($user) {
            $dateTime = new DateTime();
            $now = $dateTime->format('Y-m-d H:i:s');
            $user->setCreatedAt($now);
            $user->setUpdatedAt($now);
            $user->setLastAccess($now);

            return parent::persist($user);
        }

        public function updateUser($user) {
            $updatedAt = new DateTime();
            $updatedAtAsString = $updatedAt->format('Y-m-d H:i:s');
            $user->setUpdatedAt($updatedAtAsString);
            return parent::update($user);
        }

        public function deleteUser($user) {
            return parent::delete($user);
        }
    }
?>