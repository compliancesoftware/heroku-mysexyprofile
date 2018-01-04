<?php
    class MatterDao extends Dao{
        public function __construct() {
            parent::__construct();
        }

        private function restructMatter($matter) {
            $userDao = new UserDao();
            $matter->setTeacher($userDao->getUserById($matter->getTeacher()));
            $matter->setCreatedBy($userDao->getUserById($matter->getCreatedBy()));
            $matter->setUpdatedBy($userDao->getUserById($matter->getUpdatedBy()));
            
        }

        public function retrieveMatters() {
            $matter = new Matter();
            $matters = parent::retrieve($matter);

            foreach($matters as &$item) {
                $item = $this->restructMatter($item);
            }

            return $matters;
        }

        public function getMatterById($id) {
            $matter = new Matter();
            $matter = parent::getById($id, $matter);
            $matter = $this->restructMatter($matter);
            return $matter;
        }

        public function persistMatter($matter) {
            $dateTime = new DateTime();
            $now = $dateTime->format('Y-m-d H:i:s');
            $matter->setCreatedAt($now);

            return parent::persist($matter);
        }

        public function updateMatter($matter) {
            $dateTime = new DateTime();
            $now = $dateTime->format('Y-m-d H:i:s');
            $matter->setUpdatedAt($now);
            
            return parent::update($matter);
        }

        public function deleteMatter($matter) {
            return parent::delete($matter);
        }
    }
?>