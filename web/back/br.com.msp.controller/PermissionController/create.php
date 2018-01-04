<?php
    session_start();
    require('../../../classloader.php');
    header('Content-type: application/json; charset=UTF-8');

    ClassLoader::load();
    
    $service = new PermissionService();

    $permission = new Permission();
    $permission->setDescription($_POST['description']);
    $permission->setRules($_POST['rules']);

    $login = $_SESSION['login'];
    $password = $_SESSION['password'];

    echo $service->createPermission($permission, $login, $password);
?>