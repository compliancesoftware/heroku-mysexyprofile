<?php
    require('../../../classloader.php');
    
    header('Content-type: application/json; charset=UTF-8');

    ClassLoader::load();
    
    $service = new PerfilService();

    // $logado = $service->retrievePerfil();

    $logado = new Perfil();
    $logado->setId(1);
    $logado->setNome('Keyla Sales');
    $logado->setSenha('<secret>');
    $logado->setEmail('keyla.sales@gmail.com');

    $cover = base64_encode(file_get_contents('../../../resources/images/cover/cover.jpg'));

    $logado->setCapa($cover);

    $icon = base64_encode(file_get_contents('../../../resources/images/profile/profile.jpg'));

    $logado->setIcone($icon);
    $logado->setCidade('Recife');
    $logado->setEstado('Pernambuco');
    $logado->setLatitude('-8.063583');
    $logado->setLongitude('-34.871192');
    $logado->setIdade(26);
    $logado->setSigno('Peixes');
    $logado->setAltura(1.71);
    $logado->setPeso(69.0);
    $atributos = 'Modelo Panicat;Anal;Oral;Massagem Tantrica;Lisinha;69;'.
                      'Final Feliz Oral;Final Feliz Anal;Menage Masculino;Menage Feminino;'.
                      'Festinha com casal(ele/ele ou ele/ela ou ela/ela);'.
                      'Orgia;Namoradinha;Secretária executiva (fetiche);GangBang;Swing;Glory Hole';
    $logado->setAtributos($atributos);
    
    echo $logado->serialize();
?>