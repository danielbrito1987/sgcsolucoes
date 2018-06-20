<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- FAVICON -->
<link rel="SHORTCUT ICON" href="<?=$data['path']?>/imagens/favicon.png" />
<link rel="icon" type="image/png" href="<?=$data['path']?>/imagens/favicon.png" />

<meta name="theme-color" content="#d70c79">
<meta name="msapplication-navbutton-color" content="#d70c79">

<title><?=$data['titulo_pagina']?></title>

<!-- Metas para o Google -->
<meta name="description" content="<?=$data['description']?>">
<meta name="keywords" content="<?=$data['keywords']?>" />

<!-- Metas para o Facebook -->
<meta property="og:type"        content="<?=$data['og_type']?>" />
<meta property="og:title"       content="<?=$data['og_title']?>" />
<meta property="og:url"         content="<?=$data['og_url']?>" />
<meta property="og:site_name"   content="<?=$data['og_site_name']?>" />
<meta property="og:description" content="<?=$data['og_description']?>" />
<meta property="og:image"       content="<?=$data['og_image']?>" />
<meta property="og:image:type"  content="image/jpeg" />
<meta property="og:image:width"     content="200" />
<meta property="og:image:height"    content="200" />


<!-- ESTILO CSS -->

<link href="<?=$data['path']?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="<?=$data['path']?>/js/slick/slick.css">
<link rel="stylesheet" href="<?=$data['path']?>/css/estilo.css">
<link rel="stylesheet" href="<?=$data['path']?>/css/mobile.css">
<link rel="stylesheet" href="<?=$data['path']?>/js/sweetalert/dist/sweetalert.css">


<script src="<?=$data['path']?>/js/jquery.1.11.2.min.js"></script>
<script src="<?=$data['path']?>/js/jquery.maskedinput-1.2.2.js" type="text/javascript"></script>
<script src="<?=$data['path']?>/js/sweetalert/dist/sweetalert-dev.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<script>
$(function(){
    setTimeout(function(){
        $('body').animate({
            opacity:1,
        },700,function(){
            <?=$data['mensagem']?>
        });
    },200);
});
</script>

<script src='https://www.google.com/recaptcha/api.js'></script>

</head>

<body style="opacity:0;" class="<?=($_GET['secao'] != '' ? 'pagina-interna' : '')?> <?=(!empty($_GET['titulo']) ? 'detalhes' : '')?>" data-pagina="<?=($_GET['secao'] == '' ? "main" : $_GET['secao'])?><?=(!empty($_GET['titulo']) ? "_detalhes" : "")?>">

<div id="envolve-site">
    <!--############################ TOPO ############################-->
    <?php include_once("includes/topo/topo.tpl.php"); ?>
    <!--############################ TOPO ############################-->

    <!--############################ SITE ############################-->
    <?php include_once($data['pagina']); ?>
    <!--############################ SITE ############################-->

    <!--############################ RODAPE ############################-->
    <?php include_once( "includes/rodape/rodape.tpl.php"); ?>
    <!--############################ RODAPE ############################-->
</div>

<script src="<?=$data['path']?>/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=$data['path']?>/js/slick/slick.min.js"></script>
<script src="<?=$data['path']?>/js/parallax/parallax.min.js" type="text/javascript"></script>

<script src="<?=$data['path']?>/js/scripts.js"></script>


<link rel="stylesheet" href="<?=$data['path']?>/js/wow-master/animate.css">
<script src="<?=$data['path']?>/js/wow-master/dist/wow.min.js"></script>
<script> new WOW().init();</script>

<?=$data['mensagem_resultado']?>
<script type="text/javascript" src="<?=$data['path']?>/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="<?=$data['path']?>/js/jquery.validate.min.js"></script>


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-44120875-1', 'sgcsolucoes.com.br');
  ga('send', 'pageview');

</script>

<!--<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.5&appId=1443358502652079";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
-->
</body>
</html>
