function altura_imagem_noticias(){
    $('.img').each(function(a,b){
        $(b).css('height',($(b).width() * 0.675));
    });
}

function header_fixo(){
	var scroll = $(window).scrollTop();

	if(scroll > $('#header').height()){
		$('#header').addClass('fixed');
	}else{
		$('#header').removeClass('fixed');
	}
}

$(function(){
	header_fixo();
    altura_imagem_noticias();
});

$(window).resize(function(){
    altura_imagem_noticias();
})

$(window).scroll(function(){
	header_fixo();
});



$(function(){
    
    $('[data-toggle="tooltip"]').tooltip();

    $('#slick-destaques-main').slick({
        dots: true,
        infinite: true,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 4000
    });

    $('#slick-parceiros-main').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            },{
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },{
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

	// ######### SUBMENU PRINCIPAL
	$('#menu-principal > ul > li').mouseenter(function(){
		var link = $(this).find('a').eq(0);
		link.addClass('active');
		$(this).find('ul').fadeIn(100);
	
	}).mouseleave(function(){
		$(this).find('a').removeClass('active');
		$(this).find('ul').fadeOut(100);
	});
});