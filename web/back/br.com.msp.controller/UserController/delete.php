<?php
    session_start();
    require('../../../classloader.php');
    header('Content-type: application/json; charset=UTF-8');

    ClassLoader::load();
    
    $service = new UserService();

    $user = new User();
    $user->setId($_POST['id']);
    
    $login = $_SESSION['login'];
    $password = $_SESSION['password'];

    echo $service->deleteUser($user, $login, $password);
?>