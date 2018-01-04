<?php
    session_start();
    require('../../../classloader.php');
    header('Content-type: application/json; charset=UTF-8');

    ClassLoader::load();
    
    $service = new PermissionService();

    $permission = new Permission();
    $permission->setId($_POST['id']);
    
    $login = $_SESSION['login'];
    $password = $_SESSION['password'];

    echo $service->deletePermission($permission, $login, $password);
?>