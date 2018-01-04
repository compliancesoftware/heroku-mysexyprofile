<?php
    class PermissionDao extends Dao{
        public function __construct() {
            parent::__construct();
        }

        public function retrievePermissions() {
            $permission = new Permission();
            return parent::retrieve($permission);
        }

        public function getPermissionById($id) {
            $permission = new Permission();
            return parent::getById($id, $permission);
        }

        public function persistPermission($permission) {
            return parent::persist($permission);
        }

        public function updatePermission($permission) {
            return parent::update($permission);
        }

        public function deletePermission($permission) {
            return parent::delete($permission);
        }
    }
?>