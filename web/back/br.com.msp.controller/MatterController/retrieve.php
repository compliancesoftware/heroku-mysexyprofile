<?php
    session_start();
    require('../../../classloader.php');
    
    header('Content-type: application/json; charset=UTF-8');

    ClassLoader::load();
    
    $service = new MatterService();

    $login = 'Administrador';
    $password = 'admin';

    echo $service->retrieveMatters($login, $password);
?>