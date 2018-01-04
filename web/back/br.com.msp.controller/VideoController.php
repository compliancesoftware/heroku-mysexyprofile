<?php
    header("Content-Type: video/mp4");
    header("Content-Transfer-Encoding: binary");
    header("Content-Disposition: inline; filename=video.mp4");
    
    $path = '../../resources/apresentacao.mp4';
    //$type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    //$video = 'data:image/' . $type . ';base64,' . base64_encode($data);
    $video = base64_encode($data);
    
    $decodedVideo = base64_decode($video);

    print $decodedVideo;

    exit;
?>