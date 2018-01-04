<?php
    session_start();
    require('../../../classloader.php');
    header('Content-type: application/json; charset=UTF-8');

    ClassLoader::load();
    
    $service = new UserService();

    $user = new User();
    $user->setId($_POST['id']);
    $user->setName($_POST['name']);
    $user->setPassword($_POST['password']);
    $user->setPhone1($_POST['phone1']);
    $user->setPhone2($_POST['phone2']);
    $user->setEmail($_POST['email']);
    $user->setPermission($_POST['permission']);
    
    $userToUpdate = $service->getUserById($user->getId(), $login, $password);
    $user->setCreatedAt($userToUpdate->getCreatedAt());
    $user->setLastAccess($userToUpdate->getLastAccess());

    $login = $_SESSION['login'];
    $password = $_SESSION['password'];

    echo $service->updateUser($user, $login, $password);
?>