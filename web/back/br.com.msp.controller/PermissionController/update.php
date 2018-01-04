<?php
    session_start();
    require('../../../classloader.php');
    header('Content-type: application/json; charset=UTF-8');

    ClassLoader::load();
    
    $service = new PermissionService();

    $permission = new Permission();
    $permission->setId($_POST['id']);
    $permission->setDescription($_POST['description']);
    $permission->setRules($_POST['rules']);
    
    $login = $_SESSION['login'];
    $password = $_SESSION['password'];

    echo $service->updatePermission($permission, $login, $password);
?>