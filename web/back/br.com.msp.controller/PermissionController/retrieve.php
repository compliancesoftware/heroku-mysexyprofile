<?php
    session_start();
    require('../../../classloader.php');
    header('Content-type: application/json; charset=UTF-8');

    ClassLoader::load();
    
    $service = new PermissionService();

    $login = $_SESSION['login'];
    $password = $_SESSION['password'];

    echo $service->retrievePermissions($login, $password);
?>