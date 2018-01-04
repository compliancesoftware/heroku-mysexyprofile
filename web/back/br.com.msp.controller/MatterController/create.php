<?php
    require('../../../classloader.php');
    header('Content-type: application/json; charset=UTF-8');

    ClassLoader::load();
    
    $service = new MatterService();

    $matter = new Matter();
    $user->setName('Matéria Teste');
    $user->setPassword('teste');
    $user->setPhone1('81988874815');
    $user->setPhone2('81996729491');
    $user->setEmail('douglas.f.filho@accenture.com');
    $user->setPermission(1);

    $login = 'Administrador';
    $password = 'admin';

    echo $service->createUser($user, $login, $password);
?>