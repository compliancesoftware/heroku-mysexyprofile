<?php
    require('../../../classloader.php');
    
    header('Content-type: application/json; charset=UTF-8');

    ClassLoader::load();
    
    $_SESSION['logado'] = '';

    $mensagem = new ResponseMessage();
    $mensagem->setMessage('Você saiu.');
    $mensagem->setStatus(ResponseMessage::STATUS_OK);
    
    echo $mensagem->serialize();
?>