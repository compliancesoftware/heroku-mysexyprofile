<?php
    require('../../../classloader.php');
    header('Content-type: application/json; charset=UTF-8');

    ClassLoader::load();
    
    // $service = new PerfilService();

    // $perfil = new Perfil();
    // $perfil->setNome('Keyla Sales');
    // $perfil->setSenha('admin');
    // $perfil->setEmail('keyla.sales@gmail.com');

    // $cover = base64_encode(file_get_contents('../../../resources/images/cover/cover.jpg'));

    // $perfil->setCapa($cover);

    // $icon = base64_encode(file_get_contents('../../../resources/images/profile/profile.jpg'));

    // $perfil->setIcone($icon);
    // $perfil->setCidade('Recife');
    // $perfil->setEstado('Pernambuco');
    // $perfil->setLatitude('-8.063583');
    // $perfil->setLongitude('-34.871192');
    // $perfil->setIdade(26);
    // $perfil->setSigno('Peixes');
    // $perfil->setAltura(1.71);
    // $perfil->setPeso(69.0);
    // $atributos = 'Modelo Panicat;Anal;Oral;Massagem Tantrica;Lisinha;69;'.
    //                   'Final Feliz Oral;Final Feliz Anal;Menage Masculino;Menage Feminino;'.
    //                   'Festinha com casal(ele/ele ou ele/ela ou ela/ela);'.
    //                   'Orgia;Namoradinha;Secretária executiva (fetiche);GangBang;Swing;Glory Hole';
    // $perfil->setAtributos($atributos);

    // echo $service->createPerfil($perfil);

    $message = new ResponseMessage();
    echo $message->serialize();
?>