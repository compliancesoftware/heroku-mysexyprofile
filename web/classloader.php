<?php
    session_start();
    
    class ClassLoader {
        public static function load() {
            require '../../../back/br.com.msp.models/Perfil.php';
        
            require '../../../back/br.com.msp.dao.utils/DatabaseProps.php';
            require '../../../back/br.com.msp.dao.utils/Jsonify.php';
            require '../../../back/br.com.msp.dao.utils/ResponseMessage.php';
            require '../../../back/br.com.msp.dao.utils/Dao.php';

            require '../../../back/br.com.msp.dao/PerfilDao.php';
        
            require '../../../back/br.com.msp.services/PerfilService.php';
        }
    }
?>