var showService= null;

function togglePelicula() {
    if($('.pelicula').css('display') == 'none') {
        $('.pelicula').fadeIn();
    }
    else {
        $('.pelicula').fadeOut();
    }
}

function toggleNavBar() {
    if($('#navbar-toggle-btn').css('display') == 'none') {
        setTimeout(function() {
            $('#navbar-toggle-btn').show();
        },300);
    }
    else {
        setTimeout(function() {
            $('#navbar-toggle-btn').hide();
        },150);
    }
    $('.navbar').toggle('slide');
    togglePelicula();
}

function active(item) {
    if(item == 'resumo') {
        fillResumo();
    }
    if(item == 'sobre') {
        fillSobre();
    }
    if(item == 'fotos') {
        fillFotos();
    }
    if(item == 'videos') {
        fillVideos();
    }

    $('.menus p').removeClass('menu-active');
    $('.menus p#'+item+'').addClass('menu-active');

    $('.resumo').hide();
    $('.sobre').hide();
    $('.fotos').hide();
    $('.videos').hide();

    clearTimeout(showService);

    $('html').animate({scrollTop: $('.menus')}, 600);

    showService = setTimeout(function() {
        $('.'+item).fadeIn();
    },200);
}

function changePage(page) {
    if(page == 'contos') {
        window.location.href = 'https://play.google.com/store/apps/details?id=com.sexlog.sexlogcam&hl=pt_BR';
    }
    else {
        $('html').animate({scrollTop: $('.menus')}, 600);
        window.open('http://'+window.location.host+'/'+page,'_self');
        window.location.reload();
    }
}

function appendToContatos(contatos) {
    $('.navbar .contatos').html('');
    $('.navbar .contatos').text('');

    contatos.forEach(contato => {
        var item = '';
        if(contato.nome != 'blogger' && contato.nome != 'sexlog') {
            if(contato.nome == 'email') {
                contato.nome = 'envelope';
                contato.link = 'mailto:'+contato.link;
            }
            item += '<a href="'+contato.link+'" class="'+contato.nome+'">';

            var hasSquare = '';
            if(contato.nome == 'facebook' || contato.nome == 'twitter') {
                hasSquare = '-square';
            }
            else if(contato.nome == 'twitter') {
                hasSquare = '-square';
            }

            item += '   <i class="fa fa-'+contato.nome+hasSquare+'" aria-hidden="true"></i>';
            item += '</a>';
        }
        else {
            item += '<div onclick="window.location.href = \''+contato.link+'\'" class="'+contato.nome+'">';
            item += '</div>';
        }
        $('.navbar .contatos').append(item);
    });
}

function fillContatos() {
    var contatos = [];

    var contato1 = new Contato();
    contato1.id = 1;
    contato1.nome = 'facebook';
    contato1.link = 'https://www.facebook.com';
    contatos.push(contato1);

    var contato2 = new Contato();
    contato2.id = 2;
    contato2.nome = 'twitter';
    contato2.link = 'https://www.twitter.com';
    contatos.push(contato2);

    var contato3 = new Contato();
    contato3.id = 3;
    contato3.nome = 'instagram';
    contato3.link = 'https://www.instagram.com';
    contatos.push(contato3);

    var contato4 = new Contato();
    contato4.id = 4;
    contato4.nome = 'whatsapp';
    contato4.link = 'https://api.whatsapp.com/send?1=pt_BR&phone=5581986613538';
    contatos.push(contato4);

    var contato5 = new Contato();
    contato5.id = 5;
    contato5.nome = 'blogger';
    contato5.link = 'https://www.blogger.com/about/?r=1-null_user';
    contatos.push(contato5);

    var contato6 = new Contato();
    contato6.id = 6;
    contato6.nome = 'sexlog';
    contato6.link = 'https://www.sexlog.com/u/nudssubmissa';
    contatos.push(contato6);

    var contato7 = new Contato();
    contato7.id = 7;
    contato7.nome = 'email';
    contato7.link = 'douglasf.filho@gmail.com';
    contatos.push(contato7);

    appendToContatos(contatos);
}

function appendToResumos(resumos) {
    $('.resumo').html('');
    $('.resumo').text('');

    resumos.forEach(resumo => {
        var item = '<div onclick="changePage(\''+resumo.link+'\');" class="resumo-item no-select">'+
                   '    <p class="resumo-titulo">'+resumo.titulo+'</p>';
        
        if(resumo.link == '#fotos') {
            item += '   <div class="resumo-icone"><i class="fa fa-camera" aria-hidden="true"></i></div>';
        }
        else if(resumo.link == 'contos') {
            item += '   <div class="resumo-icone">';

            item += '       <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"'+
                    '       	xmlns:xlink="http://www.w3.org/1999/xlink"'+
                    '       	x="0px"'+
                    '       	y="0px"'+
                    '       	viewBox="0 0 42.996 42.996"'+
                    '       	style="enable-background:new 0 0 42.996 42.996;"'+
                    '          fill="inherit"'+
                    '       	xml:space="preserve">'+
                    '       	<g id="pencil">'+
                    '       		<g>'+
                    '       			<path d="M34.661,15.314l1.417-1.423l-0.021-0.021l0.021-0.021l-1.417-1.409l-0.014,0.014L26.29,4.06l0.131-0.132l-1.504-1.423'+
                    '       				L24.83,2.593l-0.088-0.088l-1.417,1.423l0.093,0.093L0,27.707v11.33h10.986L34.64,15.292L34.661,15.314z M10.156,37.024H2.004'+
                    '       				v-8.483l17.921-18.065l8.341,8.378L10.156,37.024z M29.684,17.432L21.34,9.05l3.536-3.565l8.353,8.39L29.684,17.432z'+
                    '       				 M41.173,35.784c-0.011,0.023-1.073,2.274-3.141,2.642c-1.692,0.299-3.69-0.686-5.928-2.933c-2.49-2.501-5.128-3.696-7.847-3.565'+
                    '       				c-4.156,0.208-6.883,3.499-6.997,3.639l1.549,1.277c0.023-0.027,2.302-2.751,5.564-2.906c2.125-0.098,4.245,0.902,6.313,2.979'+
                    '       				c2.366,2.378,4.628,3.577,6.738,3.576c0.33,0,0.656-0.03,0.978-0.088c3.103-0.565,4.533-3.652,4.592-3.783L41.173,35.784z"/>'+
                    '       		</g>'+
                    '       	</g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>'+
                    '       </svg>';
            
            item += '   </div>';
        }
        else if(resumo.link == '#videos') {
            item += '   <div class="resumo-icone"><i class="fa fa-video-camera" aria-hidden="true"></i></div>';
        }
        item += '    <p onclick="changePage(\''+resumo.link+'\');" class="resumo-link">Dá uma espiadinha</p>'+
                '    <p class="resumo-data">'+resumo.data+'</p>'+
                '</div>';
        $('.resumo').append(item);
    });
}

function fillResumo() {
    var resumos = [];

    var resumo1 = new Resumo();
    resumo1.titulo = 'Acabei de postar um conto quentíssimo, vem conferir...';
    resumo1.link = 'contos';
    resumo1.data = '23/12/2017 00:09';
    resumos.push(resumo1);

    var resumo2 = new Resumo();
    resumo2.titulo = 'Olha só a foto que acabei de postar...';
    resumo2.link = '#fotos';
    resumo2.data = '23/12/2017 00:09';
    resumos.push(resumo2);

    var resumo3 = new Resumo();
    resumo3.titulo = 'Olha só o vídeo que acabei de postar...';
    resumo3.link = '#videos';
    resumo3.data = '23/12/2017 00:09';
    resumos.push(resumo3);

    appendToResumos(resumos);
}

function appedToSobre(sobre) {
    $('.sobre').html('');
    $('.sobre').text('');

    var item = '<div class="sobre-item">';
    if(sobre.nome != null && sobre.nome != '') {
        item += '    <p><i class="fa fa-female" aria-hidden="true"></i> '+sobre.nome+'</p>';
    }
    if(sobre.idade != null && sobre.idade != ''){
        item += '    <p>'+sobre.idade+' anos</p>';
    }
    if(sobre.signo != null && sobre.signo != ''){
        item += '    <p>'+sobre.signo+'<small>(signo)</small></p>';
    }
    if(sobre.altura != null && sobre.altura != ''){
        item += '    <p>'+sobre.altura+'m</p>';
    }
    if(sobre.peso != null && sobre.peso != ''){
        item += '    <p>'+sobre.peso+'kg</p>';
    }
    item += '    <div class="atributos">';

    var atributos = sobre.atributos.split(';');

    atributos.forEach(atributo => {
        item += '        <p class="atributo">'+atributo+'</p>';
    });

    item += '    </div>' +
            '</div>';

    $('.sobre').append(item);
}

function fillSobre() {
    var url = window.location.protocol+'//'+window.location.host+'/back/br.com.msp.controller/PerfilController/verify.php';
    var data = {};
    var dataType = 'json';
    $.get(url,data,function(response) {
        var sobre = new Sobre();
        sobre.nome = response.nome;
        sobre.idade = response.idade;
        sobre.signo = response.signo;
        sobre.altura = response.altura;
        sobre.peso = response.peso;
        sobre.atributos = response.atributos;

        appedToSobre(sobre);
    },dataType);
}

function appendToFotos(fotos) {
    $('.fotos').html('');
    $('.fotos').text('');

    fotos.forEach(foto => {
        var item = '<div id="foto-'+foto.id+'" class="fotos-item no-select">'+
                   '    <div class="imagem" style="background-image: url(\''+foto.foto+'\')"></div>'+
                   '    <p class="autor-legenda">'+foto.autor+' <small> '+foto.data+'</small></p>'+
                   '    <p class="legenda">'+foto.legenda+'</p>';
        
        if(foto.comentarios.length > 0) {
            if(foto.comentarios.length > 1) {
                item += '    <p class="comentarios-titulo" >'+foto.comentarios.length+' Comentários <i class="fa fa-chevron-down" aria-hidden="true" onclick="toggleComentarios(event);"></i></p>';
            }
            else {
                item += '    <p class="comentarios-titulo" >'+foto.comentarios.length+' Comentário <i class="fa fa-chevron-down" aria-hidden="true" onclick="toggleComentarios(event);"></i></p>';
            }
            item += '    <div class="comentarios">';

            foto.comentarios.forEach(comentario => {
                item += '       <div  id="comentario-'+comentario.id+'"class="comentario-item">';
                item += '           <p class="autor">'+comentario.autor+' <small>'+comentario.data+'</small></p>';
                item += '           <p class="comentario">'+comentario.comentario+'</p>';
                
                if(comentario.respostas.length > 0) {
                    item += '           <p class="respostas-titulo">'+comentario.respostas.length+'<i class="fa fa-commenting-o" aria-hidden="true"></i><i class="fa fa-chevron-down" aria-hidden="true" onclick="toggleRespostas(event);"></i></p>';
                    item += '           <div  id="respostas-'+comentario.id+'"class="respostas-container">';
    
                    comentario.respostas.forEach(resposta => {
                        item += '               <div class="resposta-'+resposta.id+'">';
                        item += '                   <p class="autor">'+resposta.autor+' <small>'+resposta.data+'</small></p>';
                        item += '                   <p class="comentario">'+resposta.comentario+'</p>';
                        item += '               </div>';
                    });
    
                    item += '           </div>';
                }
    
                item += '       </div>';
            });

            item += '    </div>';
        }

        item += '</div>';

        $('.fotos').append(item);
    });
}

function fillFotos() {
    var foto1 = new Foto();
    foto1.id = 1;
    foto1.foto = 'resources/images/cover/resumo.jpg';
    foto1.legenda = 'Presentinho do amigo Ronaldinho';
    foto1.autor = 'Keyla Sales';
    foto1.data = '25/12/2017 16:30';
    
    var comentario1 = new Comentario();
    comentario1.id = 1;
    comentario1.autor = 'Ronaldo Junior';
    comentario1.comentario = 'Você ficou perfeita meu amor. Hoje tem...';
    comentario1.data = '25/12/2017 16:36';

    var resposta1 = new Resposta();
    resposta1.id = 1;
    resposta1.autor = 'Keila Sales';
    resposta1.comentario = 'Obrigado meu bem...combina bem com minha pele de seda que você ama beijar.';
    resposta1.data = '25/12/2017 16:45';

    comentario1.respostas.push(resposta1);

    foto1.comentarios.push(comentario1);

    var foto2 = new Foto();
    foto2.id = 2;
    foto2.foto = 'resources/images/cover/resumo2.jpg';
    foto2.legenda = 'Pronta pra ação';
    foto2.autor = 'Keyla Sales';
    foto2.data = '28/12/2017 09:30';
    
    var comentario2 = new Comentario();
    comentario2.id = 2;
    comentario2.autor = 'Ronaldo Junior';
    comentario2.comentario = 'É desse jeito que eu gosto';
    comentario2.data = '28/12/2017 10:00';

    var resposta2 = new Resposta();
    resposta2.id = 2;
    resposta2.autor = 'Keila Sales';
    resposta2.comentario = 'Sei bem do que você gosta.';
    resposta2.data = '28/12/2017 10:02';
    comentario2.respostas.push(resposta2);
    
    var resposta3 = new Resposta();
    resposta3.id = 3;
    resposta3.autor = 'Ronaldo Junior';
    resposta3.comentario = 'Sou seu maior fã';
    resposta3.data = '28/12/2017 10:03';
    comentario2.respostas.push(resposta3);

    var comentario3 = new Comentario();
    comentario3.id = 3;
    comentario3.autor = 'Edson Costa';
    comentario3.comentario = 'Maravilhosa';
    comentario3.data = '28/12/2017 10:01';

    foto2.comentarios.push(comentario2);
    foto2.comentarios.push(comentario3);

    var fotos = [];
    fotos.push(foto1);
    fotos.push(foto2);

    appendToFotos(fotos);
}

function appendToVideos(videos) {
    $('.videos').html('');
    $('.videos').text('');

    videos.forEach(video => {
        var item = '<div id="video-'+video.id+'" class="videos-item no-select">'+
                   '    <video src="'+video.source+'" controls controlsList="nodownload">Carregando...</video>'+
                   '    <p class="autor-legenda">'+video.autor+' <small> '+video.data+'</small></p>'+
                   '    <p class="legenda">'+video.legenda+'</p>'+
                   '</div>';
        
        $('.videos').append(item);
    });
}

function fillVideos() {
    var video1 = new Video();
    video1.id = 1;
    video1.source = '/back/br.com.msp.controller/VideoController.php';
    video1.legenda = 'É assim que funciona...';
    video1.autor = 'Keyla Sales';
    video1.data = '25/12/2017 16:30';
    
    var videos = [];
    videos.push(video1);

    appendToVideos(videos);
}

function toggleComentarios(event) {
    var fotoId = $(event.target).parent().parent().attr('id');
    if($(event.target).hasClass('fa-chevron-down')) {
        $(event.target).removeClass('fa-chevron-down').addClass('fa-chevron-up');
    }
    else {
        $(event.target).removeClass('fa-chevron-up').addClass('fa-chevron-down');
    }
    if($('#'+fotoId+' .comentarios').css('display') != 'none') {
        $('#'+fotoId+' .comentarios').slideUp();
    }
    else {
        $('#'+fotoId+' .comentarios').slideDown();
    }
}

function toggleRespostas(event) {
    var comentarioId = $(event.target).parent().parent().attr('id');
    if($(event.target).hasClass('fa-chevron-down')) {
        $(event.target).removeClass('fa-chevron-down').addClass('fa-chevron-up');
    }
    else {
        $(event.target).removeClass('fa-chevron-up').addClass('fa-chevron-down');
    }
    if($('#'+comentarioId+' .respostas-container').css('display') != 'none') {
        $('#'+comentarioId+' .respostas-container').slideUp();
    }
    else {
        $('#'+comentarioId+' .respostas-container').slideDown();
    }
}

$('document').ready(function(){
    $('.navbar-toggle-btn').click(function(){
        toggleNavBar();
    });

    $('#link-contato').click(function(){
        if($('.contatos').css('display') == 'none') {
            $('.contatos').slideDown();
        }
        else {
            $('.contatos').slideUp();
        }
    });

    $('.pelicula').click(function(){
        if($('.pelicula').css('display') != 'none') {
            toggleNavBar();
        }
    })

    $('.menus p').click(function(event) {
        var item = event.target.id;
        active(item);
    });

    $('#link-home').click(function(){
        changePage('');
    });

    $('#link-fotos').click(function(){
        toggleNavBar();
        active('fotos');
    });

    $('#link-videos').click(function(){
        toggleNavBar();
        active('videos');
    });

    $(window).scroll(function(){

        var transformation = (window.scrollY/3);
        var opacity = (176 - window.scrollY)/176;

        $('.header').css('transform','translateY('+transformation+'px)');
        $('.cover').css('transform','translateY('+transformation+'px)');

        $('.header').css('opacity',''+opacity);
        $('.cover').css('opacity',''+opacity);

        if(window.scrollY >= 179) {
            $('.menus').css('position','fixed');
            $('.menus').css('margin-top','2rem');
            $('.menus').css('top','0');
            $('.menus').css('left','0');
            $('.content-render').css('padding-top','3.5rem');
            $('#navbar-toggle-btn').css('background-color','black');
        }
        else {
            $('.menus').css('position','relative');
            $('.menus').css('margin-top','0.3rem');
            $('.menus').css('top','unset');
            $('.menus').css('left','unset');
            $('.content-render').css('padding-top','');
            $('#navbar-toggle-btn').css('background-color','transparent');
        }
    });

    if(window.location.href.indexOf('#fotos') >= 0) {
        active('fotos');
    }

    if(window.location.href.indexOf('#videos') >= 0) {
        active('videos');
    }
    
    fillContatos();
    fillResumo();
});