<?php
    session_start();
    require('../../../classloader.php');
    
    header('Content-type: application/json; charset=UTF-8');

    ClassLoader::load();
    
    $service = new UserService();

    $login = $_POST['login'];
    $password = $_POST['senha'];

    $response = $service->authenticate($login, $password);
    
    if(strpos($response, '"status":"Ok"') !== false) {
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;
    }

    echo $response;
?>