<!DOCTYPE html>
<html lang="en">
<head>
	<title><?=$data['titulo_pagina']?></title>
	<meta charset="UTF-8">
	<meta name="description" content="HALO photography portfolio template">
	<meta name="keywords" content="photography, portfolio, onepage, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Metas para o Facebook -->
	<meta property="og:type"        content="<?=$data['og_type']?>" />
	<meta property="og:title"       content="<?=$data['og_title']?>" />
	<meta property="og:url"         content="<?=$data['og_url']?>" />
	<meta property="og:site_name"   content="<?=$data['og_site_name']?>" />
	<meta property="og:description" content="<?=$data['og_description']?>" />
	<meta property="og:image"       content="<?=$data['og_image']?>" />
	<meta property="og:image:type"  content="image/jpeg" />
	<meta property="og:image:width"   content="190" />
	<meta property="og:image:height"  content="190" />
	<!-- Favicon -->   
	<link href="imagens/favicon.png" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>

	<script src='https://www.google.com/recaptcha/api.js'></script>

	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body data-pagina="<?=($_GET['secao'] == '' ? "main" : $_GET['secao'])?><?=(!empty($_GET['titulo']) ? "_detalhes" : "")?>">
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!--############################ TOPO ############################-->
    <?php include_once("includes/topo/topo.tpl.php"); ?>
	<!--############################ TOPO ############################-->

	<!--############################ SITE ############################-->
    <?php include_once($data['pagina']); ?>
    <!--############################ SITE ############################-->


	<!--############################ RODAPE ############################-->
    <?php include_once( "includes/rodape/rodape.tpl.php"); ?>
    <!--############################ RODAPE ############################-->

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-44120875-1', 'sgcsolucoes.com.br');
	  ga('send', 'pageview');

	</script>
	
	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/mixitup.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>