<!DOCTYPE html>
<html lang='pt-BR'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' />
        <meta http-equiv='X-UA-Compatible' content='ie=edge'>

        <link rel="apple-touch-icon" sizes="57x57" href="resources/icon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="resources/icon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="resources/icon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="resources/icon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="resources/icon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="resources/icon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="resources/icon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="resources/icon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="resources/icon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="resources/icon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="resources/icon/icon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="resources/icon/icon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="resources/icon/icon-16x16.png">
        <link rel="manifest" href="resources/icon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="resources/icon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <title>Keyla.com</title>

        <link rel='stylesheet' href='resources/js/jquery-ui.structure.css' />
        <link rel='stylesheet' href='resources/js/jquery-ui.theme.css' />
        <link rel='stylesheet' href='resources/js/jquery-ui.css' />
        <link rel='stylesheet' type='text/css' href='resources/js/slick/slick.css'/>
        <link rel='stylesheet' type='text/css' href='resources/js/slick/slick-theme.css'/>
        <link rel='stylesheet' type='text/css' href='resources/css/main.css'/>
        <link rel='stylesheet' type='text/css' href='resources/css/fontawesome/css/font-awesome.css'/>


        <script src='resources/js/jquery.js'></script>
        <script src='resources/js/jquery-ui.js'></script>
        <script type='text/javascript' src='resources/js/slick/slick.js'></script>
        <script type='text/javascript' src='resources/js/models/contato.js'></script>
        <script type='text/javascript' src='resources/js/models/resumo.js'></script>
        <script type='text/javascript' src='resources/js/models/sobre.js'></script>
        <script type='text/javascript' src='resources/js/models/resposta.js'></script>
        <script type='text/javascript' src='resources/js/models/comentario.js'></script>
        <script type='text/javascript' src='resources/js/models/foto.js'></script>
        <script type='text/javascript' src='resources/js/models/video.js'></script>
        <script type='text/javascript' src='resources/js/main.js'></script>

    </head>
    <body>
        <div class="page">
            <div id="navbar-toggle-btn" class="navbar-toggle-btn">
                <i class="fa fa-navicon" aria-hidden="true"></i>
            </div>
            <div class="navbar">
                <div class="navbar-toggle-btn">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </div>
                <div class="nav-item" id="link-home">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <p>Home</p>
                </div>
                <div class="nav-item" id="link-fotos">
                    <i class="fa fa-camera" aria-hidden="true"></i>
                    <p>Fotos</p>
                </div>
                <div class="nav-item" id="link-videos">
                    <i class="fa fa-video-camera" aria-hidden="true"></i>
                    <p>Vídeos</p>
                </div>
                <div class="nav-item" id="link-baixe-app" onclick="window.location.href = 'https://play.google.com/store/apps/details?id=com.sexlog.sexlogcam&hl=pt_BR';">
                    <i class="fa fa-check-square-o" aria-hidden="true"></i>
                    <p>Baixe o App</p>
                </div>
                <div class="nav-item" id="link-contato">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <p>Contato</p>
                </div>
                <div class="contatos"></div>
                <div class="nav-footer">
                    <p>by:</p>
                    <a href="http://compliancehome.herokuapp.com/">Compliance Software&reg;</a>
                </div>
            </div>
            <div class="content">
                <div class="pelicula"></div>
                <div class="header">
                    <div class="header-img"></div>
                    <p>Keyla Sales</p>
                </div>
                <div class="cover"></div>
                <div class="menus">
                    <p id="resumo" class="menu-active"><i class="fa fa-file-text" aria-hidden="true"></i> Resumo</p>
                    <p id="sobre"><i class="fa fa-commenting" aria-hidden="true"></i> Sobre</p>
                    <p id="fotos"><i class="fa fa-camera" aria-hidden="true"></i> Fotos</p>
                    <p id="videos"><i class="fa fa-video-camera" aria-hidden="true"></i> Vídeos</p>
                </div>
                <div class="content-render">
                    <div class="resumo">
                        
                    </div>
                    <div class="sobre">
                        
                    </div>
                    <div class="fotos">
                        <p>Fotos:</p>
                    </div>
                    <div class="videos">
                        <p>Videos:</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>