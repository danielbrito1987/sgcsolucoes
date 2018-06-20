

<section id="section-parceiros-main">
    <div class="container">
        <div class="row">
            <div class="col-md-1 col-sm-1 col-xs-2 hidden-lg">
                <a href="javascript:;" id="voltar-slick-parceiros-main" onClick="$('#slick-parceiros-main .slick-prev').click();">
                    <img src="<?=$data['path']?>/imagens/seta-voltar.png" alt="Voltar">
                </a>
            </div>

            <div class="col-lg-12 col-md-10 col-sm-10 col-xs-8">
                <div id="slick-parceiros-main">
                    <?php if(count($data['parceiros_home']) > 0){ ?>
                        <?php $C=5; foreach($data['parceiros_home'] as $linha){ ?>
                            <a href="<?=(!empty($linha['site']) ? $linha['site'] : 'javascript:;')?>" <?php if(!empty($linha['site'])){ ?>target="blank"<?php } ?>>
                                <img src="<?=$data['path_painel']?>/arquivos/parceiros/<?=$linha['arquivo']?>" class="img-responsive wow rotateIn" data-wow-delay="0.<?=$C?>s" alt="<?=$linha['titulo']?>">
                            </a>
                        <?php $C++; } ?>
                    <?php } ?>
                </div>
            </div>

            <div class="col-md-1 col-sm-1 col-xs-2 hidden-lg">
                <a href="javascript:;" id="avancar-slick-parceiros-main" onClick="$('#slick-parceiros-main .slick-next').click();">
                    <img src="<?=$data['path']?>/imagens/seta-avancar.png" alt="Avançar">
                </a>
            </div>
        </div>
    </div>
</section>


<footer id="footer">
    <div id="bg1-footer">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-delay="0.5s">
                <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4 box">
                    <a href="https://api.whatsapp.com/send?phone=5527999990342&text=Olá,%20SGC!" class="hidden-sm hidden-md hidden-lg" data-toggle="tooltip" data-placement="right" title="Contato Whatsapp">
                        <img src="<?=$data['path']?>/imagens/icon-whatsapp.png" alt="Contato whatsapp">
                        <strong>(27)</strong>
                        <span>99999-0342</span>
                    </a>
                    <a href="tel:+5527999990342" class="hidden-xs" data-toggle="tooltip" data-placement="right" title="Contato Celular">
                        <img src="<?=$data['path']?>/imagens/icon-whatsapp.png" alt="Contato Celular" >
                        <strong >(27)</strong>
                        <span >99999-0342</span>
                    </a>
                </div>

                 
                
                <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4 box">
                    <a href="tel:+552731090341" data-toggle="tooltip" data-placement="left" title="Contato Fixo"><img src="<?=$data['path']?>/imagens/icon-tel.png" alt="Contato Fixo">
                    <strong>(27)</strong>
                    <span>3109-0341</span></a>
                </div>
                
                <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4 box">
                    <a href="https://www.facebook.com/sgcsolucoes/" target="blank" data-toggle="tooltip" data-placement="left" title="Facebook">
                        <img src="<?=$data['path']?>/imagens/icon-facebook.png" alt="facebook">
                        <span>/sgcsolucoes</span>
                    </a>
                </div>

                 
            </div>
        </div>
    </div>

    <!--<div id="box-mapa-footer">
        <div class='content-container embed-container maps mapa'>
            <div id="map"></div>
        </div>
    </div>-->

    <div id="bg2-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 wow bounceInLeft" data-wow-delay="0.6s">
                    <div id="copyright">Copyright 2018 - SGC Soluções - Todos os direitos reservados</div>
                </div>

                <div class="col-md-6 wow bounceInRight" data-wow-delay="0.6s">
                    <a href="http://www.rdweb.com.br" target="blank" id="link-rd">
                        <span>Desenvolvido por</span>
                        <img src="<?=$data['path']?>/imagens/logo-rd.png" alt="RDWEB">
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>


<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADWaNBS1i49hKzTO2ceP8WMLw1kzK9X4Y"></script>

<script type="text/javascript">
var map;
var marcadores = new Array();
var marcadoresAtivos = [];
var info = [];
var curr_infw;
var image = 'imagens/marker.png';

marcadores[0]  = new Array(-20.28776, -40.306993,'<strong>Digitronic</strong>');

if(typeof(Number.prototype.toRad) === "undefined"){
    Number.prototype.toRad = function(){
        return this * Math.PI / 180;
    }
}

function initialize() {
    geocoder = new google.maps.Geocoder();
    var myOptions = {
        zoom: 16,
        animation: google.maps.Animation.DROP,
        center: new google.maps.LatLng(-20.28776, -40.306993,4.77)
    };

    map = new google.maps.Map(document.getElementById('map'), myOptions);

    google.maps.event.addListener(map, 'center_changed', function() {
        var location = map.getCenter();
    });

    aplicaRaio(1);
}


google.maps.event.addDomListener(window, 'load', initialize);


function createMarker(point, title, content, map, ativo){
    var marker = new google.maps.Marker({
        position: point,
        map: map,
        title: title,
        icon: image
    });

    var infowindow = new google.maps.InfoWindow({content: content});

    if(ativo == 1){
        if(curr_infw) { curr_infw.close();}
        curr_infw = infowindow;
        infowindow.open(map, marker);
    }

    google.maps.event.addListener(marker, 'click', function() {
        if(curr_infw) { curr_infw.close();}
        curr_infw = infowindow;
        infowindow.open(map, marker);
    });
    return marker;
};

function getPosAtual(){
    navigator.geolocation.getCurrentPosition(function(position){
        var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

        var marker = new google.maps.Marker({
            position: pos,
            map: map,
            icon: image
        });

        map.setCenter(pos);
    });
}

function aplicaRaio(raio){
    if(marcadoresAtivos){
        marcadoresAtivos.length = 0;
    }

    var count, i, calcLat, calcLon, mediaLat, mediaLon;
    count =  marcadores.length-1;
    i=0;
    j=0;
    calcLat = 0;
    calcLon = 0;

    var location = map.getCenter();
    var latIni = location.lat();
    var lngIni = location.lng();

    for(i; i <= count; i++){
        var point = new google.maps.LatLng(marcadores[i][0], marcadores[i][1]);
        var title = marcadores[i][3];
        var content = marcadores[i][2];
        calcLat += marcadores[i][0];
        calcLon += marcadores[i][1];

        marcadoresAtivos[j] = createMarker(point, title, content, map);
        j++;
    }
}

function getCenter(){
    map.getCenter();
}



 

 

var onMapMouseleaveHandler = function (event) {  
    var that = $(this);  
    that.on('click', onMapClickHandler);  
    that.off('mouseleave', onMapMouseleaveHandler);  
    that.find('#map').css("pointer-events", "none");  
}

var onMapClickHandler = function (event) {  
    var that = $(this);  
    that.off('click', onMapClickHandler);  
    that.find('#map').css("pointer-events", "auto");  
    that.on('mouseleave', onMapMouseleaveHandler);  
}
 
$('.maps.embed-container').on('click', onMapClickHandler); 
</script>-->