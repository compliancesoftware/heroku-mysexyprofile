<?php
    require('../../../classloader.php');
    
    header('Content-type: application/json; charset=UTF-8');

    ClassLoader::load();
    
    $service = new PerfilService();

    // $login = $_POST['login'];
    // $password = $_POST['senha'];

    $login = 'keyla.sales@gmail.com';
    $password = 'admin';

    $response = $service->authenticate($login, $password);

    echo $response;
?>