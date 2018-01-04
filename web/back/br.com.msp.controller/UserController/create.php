<?php
    session_start();
    require('../../../classloader.php');
    header('Content-type: application/json; charset=UTF-8');

    ClassLoader::load();
    
    $service = new UserService();

    $user = new User();
    $user->setName($_POST['name']);
    $user->setPassword($_POST['password']);
    $user->setPhone1($_POST['phone1']);
    $user->setPhone2($_POST['phone2']);
    $user->setEmail($_POST['email']);
    $user->setPermission($_POST['permission']);

    $login = $_SESSION['login'];
    $password = $_SESSION['password'];

    echo $service->createUser($user, $login, $password);
?>