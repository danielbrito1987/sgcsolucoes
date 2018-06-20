var url_site = window.location.origin;
if (url_site != 'http://192.168.2.208:8080') {
    url_site = url_site + "/website";
} else {
    url_site = url_site + "/chamoun";
}

$(function(){

    google.maps.event.addDomListener(window, 'load', initialize);
    
    $('#marcadores-mapa a').click(function(){
        var elemento = $(this);
    });


    $('#tour_virtual').click(function(){
        $('#marcadores-mapa a').removeClass('active');
        
        var latitude = parseFloat($("#map").attr("data-latitude"));
        var longitude = parseFloat($("#map").attr("data-longitude"));

        if($('#map').attr('data-modo') == 'maps'){
            var fenway = {lat: latitude, lng:longitude};

            var panorama = new google.maps.StreetViewPanorama(
                document.getElementById('map'), {
                    position: fenway,
                    sensor:true,
                    pov:{
                        heading: 34,
                        pitch: 0
                    }
                }
            );
            
            map.setStreetView(panorama);
            $('#map').attr('data-modo','street_view');
            $('#mapa').hide();
            $('#streetview').show();

        
        }else{
            var myOptions = {
                zoom: 15,
                animation: google.maps.Animation.DROP,
                center: new google.maps.LatLng(latitude, longitude,14.77) ,
                mapTypeId: google.maps.MapTypeId.ROADMAP 
            }

            map = new google.maps.Map(document.getElementById('map'), myOptions);
            marcadores[0] = new Array(latitude, longitude,'<strong>'+$('#map').attr('data-endereco')+'</strong>');
            aplicaRaio(1);

            $('#map').attr('data-modo','maps');
            $('#mapa').show();
            $('#streetview').hide();

            var ativo = marcadores[0];
            var point = new google.maps.LatLng(ativo[0], ativo[1]);
            createMarker(point, 'title', ativo[2], map, 1);
            map.setCenter(point);
            map.setZoom(18);
        }
    }); 


    $('#marcadores-mapa a').click(function(){
        var opcao = $(this).attr('data-valor');
        
        var tipos = [];
        
        if($(this).hasClass('active')){
            $(this).removeClass('active');

        }else{
            $(this).addClass('active');
        }

        if($('#marker-gym').hasClass('active')){tipos.push("gym");}
        if($('#marker-bank').hasClass('active')){tipos.push("bank");}
        if($('#marker-school').hasClass('active')){tipos.push("school");}
        if($('#marker-pharmacy').hasClass('active')){tipos.push("pharmacy");}
        if($('#marker-hospital').hasClass('active')){tipos.push("hospital");}
        if($('#marker-bakery').hasClass('active')){tipos.push("bakery");}
        if($('#marker-shopping_mall').hasClass('active')){tipos.push("shopping_mall");}
        if($('#marker-grocery_or_supermarket').hasClass('active')){tipos.push("grocery_or_supermarket");}

        marcar_mapa(tipos);
    });    
});



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



var map,service;
var marcadores = new Array();
var marcadoresAtivos = [];
var info = [];
var markers = [];
var curr_infw;
var locais = new Array();

function initialize(){
    var latitude = document.getElementById("map").attributes.getNamedItem("data-latitude").value;
    var longitude = document.getElementById("map").attributes.getNamedItem("data-longitude").value;


    geocoder = new google.maps.Geocoder();

    var myOptions = {
        zoom: 11,
        animation: google.maps.Animation.DROP,
        center: new google.maps.LatLng(latitude, longitude,14.77),
        mapTypeId: google.maps.MapTypeId.ROADMAP 
    };

    map = new google.maps.Map(document.getElementById('map'), myOptions);

    marcadores[0] = new Array(latitude, longitude,'<strong>'+$('#map').attr('data-endereco')+'</strong>');
 
    google.maps.event.addListener(map,'center_changed',function(){
        var location = map.getCenter();
    });

    aplicaRaio(1);
    service = new google.maps.places.PlacesService(map);
            

    var ativo = marcadores[0];
    var point = new google.maps.LatLng(ativo[0], ativo[1]);
    createMarker(point, 'title', ativo[2], map, 1);
    map.setCenter(point);
    map.setZoom(18);
}

function inArray(needle, haystack) {
    var length = haystack.length;
    for(var i = 0; i < length; i++) {
        if(haystack[i] == needle) return true;
    }
    return false;
}



 function DeleteMarkers() {
    //Loop through all the markers and remove
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(null);
    }
    markers = [];
};


function marcar_mapa(tipos){
    var latitude = document.getElementById("map").attributes.getNamedItem("data-latitude").value;
	var longitude = document.getElementById("map").attributes.getNamedItem("data-longitude").value;

	var request = {
        location: new google.maps.LatLng(latitude, longitude,14.77),
        radius: '500',
        types: tipos
    };

    DeleteMarkers();

    service.nearbySearch(request, function(results, status){
        if(status == google.maps.places.PlacesServiceStatus.OK) {
        	for (var i = 0; i < results.length; i++) {
                var place = results[i];
                var type = place.types[0];


                if(inArray(type,tipos)){
                	var marker = new google.maps.Marker({
	                    map: map,
	                    title: ''+place.name+'',
	                    position: place.geometry.location,
	                    icon: "http://192.168.2.152/lopes/site/imagens/icon-"+type+".png"
	                });
	               
                    markers.push(marker);

	                if(typeof locais[type] == 'undefined')
	                    locais[type] = new Array();

	                var point = new google.maps.LatLng(place.geometry.location.lat, place.geometry.location.lng);
	                
	                if(typeof marcadores == 'undefined')
	                
	                createMarker(point, title, content, map,icon);
	            }
            }
        }
    });
}


function createMarker(point, title, content, map, ativo){
	var icone = url_site+'/imagens/marker.png';
    
    var marker = new google.maps.Marker({
        position: point,
        map: map,
        title: title,
        icon: icone
    });

    var infowindow = new google.maps.InfoWindow({content: content});

    if(ativo == 1){
        if(curr_infw) { curr_infw.close();}
        curr_infw = infowindow;
        infowindow.open(map, marker);
    }

    google.maps.event.addListener(marker, 'click', function() {
        toggleBounce();
        if(curr_infw) { curr_infw.close();}
        curr_infw = infowindow;
        infowindow.open(map, marker);
    });

    marcadores.push(marker);

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

