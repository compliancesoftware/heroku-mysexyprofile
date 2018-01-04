<?php
    class Matter {
        private $id = null;
        private $name = null;
        private $teacher = null;
        private $created_at = null;
        private $updated_at = null;
        private $created_by = null;
        private $updated_by = null;
        
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

        public function getTeacher() {
            return $this->teacher;
        }

        public function setTeacher($teacher) {
            $this->teacher = $teacher;
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

        public function getCreatedBy() {
            return $this->created_by;
        }

        public function setCreatedBy($created_by) {
            $this->created_by = $created_by;
        }

        public function getUpdatedBy() {
            return $this->updated_by;
        }

        public function setUpdatedBy($updated_by) {
            $this->updated_by = $updated_by;
        }
        
        public function serialize() {
            $str = json_encode($this->read());
            $str = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
                return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
            }, $str);
            $str = str_replace('"teacher":{}','"teacher":'.$this->teacher->serialize(),$str);
            $str = str_replace('"permission":{}','"permission":'.$this->teacher->permission->serialize(),$str);

            $str = str_replace('"created_by":{}','"created_by":'.$this->created_by->serialize(),$str);
            $str = str_replace('"permission":{}','"permission":'.$this->created_by->permission->serialize(),$str);

            $str = str_replace('"updated_by":{}','"updated_by":'.$this->updated_by->serialize(),$str);
            $str = str_replace('"permission":{}','"permission":'.$this->updated_by->permission->serialize(),$str);
            return $str;
        }

        public function read() {
            return get_object_vars($this);
        }

        public function entityName() {
            return 'matter';
        }
    }
?>