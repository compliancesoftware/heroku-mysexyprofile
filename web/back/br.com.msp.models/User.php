<?php
    class User {
        private $id = null;
        private $name = null;
        private $password = null;
        private $phone1 = null;
        private $phone2 = null;
        private $email = null;
        private $foto = null;
        private $permission = null;
        private $created_at = null;
        private $updated_at = null;
        private $last_access = null;
        
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getPassword() {
            return $this->password;
        }

        public function setPassword($password) {
            $pass = base64_encode(crypt($password, '$5$rounds=5000$cryptingallstringwiththis$'));
            $this->password = $pass;
        }

        public function getPhone1() {
            return $this->phone1;
        }

        public function setPhone1($phone1) {
            $this->phone1 = $phone1;
        }

        public function getPhone2() {
            return $this->phone2;
        }

        public function setPhone2($phone2) {
            $this->phone2 = $phone2;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function getFoto() {
            return $this->foto;
        }

        public function setFoto($foto) {
            $this->foto = $foto;
        }

        public function getPermission() {
            return $this->permission;
        }

        public function setPermission($permission) {
            $this->permission = $permission;
        }

        public function getCreatedAt() {
            return $this->created_at;
        }

        public function setCreatedAt($created_at) {
            $this->created_at = $created_at;
        }

        public function getUpdatedAt() {
            return $this->updated_at;
        }

        public function setUpdatedAt($updated_at) {
            $this->updated_at = $updated_at;
        }

        public function getLastAccess() {
            return $this->last_access;
        }

        public function setLastAccess($last_access) {
            $this->last_access = $last_access;
        }
        
        public function serialize() {
            $str = json_encode($this->read());
            $str = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
                return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
            }, $str);
            $str = str_replace('"permission":{}','"permission":'.$this->permission->serialize(),$str);
            return $str;
        }

        public function read() {
            return get_object_vars($this);
        }

        public function entityName() {
            return 'user';
        }
    }
?>