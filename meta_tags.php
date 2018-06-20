<?php

$og_site_name 	= 'SGC - Soluções';
$description    = 'A SGC Soluções é uma empresa que oferece soluções completas e inovadoras em Tecnologia da Informação ,
	sendo reconhecida pelo mercado como um parceiro estratégico na busca da melhoria contínua dos serviços de TI de nossos clientes.';

$og_type 		= "article";
$og_url 		= $path."/";
$og_image       = $path."/imagens/logo_facebook.jpg";
	
	

switch($_GET['secao']){
	// #################### PAGINA INICIAL ###############
	case '':
		$titulo_pagina 	= 'SGC - Soluções completas e inovadoras em Tecnologia da Informação';
	break;


	// #################### SOBRE ###############
	case 'sobre':		 
		$titulo_pagina = "Sobre | SGC - Soluções";
		$og_url 	   = $path."/sobre/";
	break;	
	
	// #################### PARCEIROS ###############
	case 'parceiros':		 
		$titulo_pagina 	= "Parceiros | SGC - Soluções";
		$og_url 		= $path."/parceiros/";
	break;	

	// #################### DOWNLOAD ###############
	case 'downloads':		 
		$titulo_pagina 	= "Downloads | SGC - Soluções";
		$og_url 		= $path."/downloads/";
	break;	

	// #################### CONTATO ###############
	case 'contato':		 
		$titulo_pagina 	= "Contato | SGC - Soluções";
		$og_url 		= $path."/contato/";
	break;	

	
    // #################### NOTICIAS ###############
	case 'solucoes-e-servicos':
		if($_GET['titulo'] == ''){
		  $titulo_pagina 	= "Soluções e Serviços | SGC - Soluções";
		  $og_url 		= $path."/solucoes-e-servicos/";
        
		}else{
			$titulo_pagina 	= $titulo_registro . " | SGC - Soluções";
            $og_url 		= $path."/solucoes-e-servicos/".$_GET['id']."/".$_GET['titulo'];
			$og_image		= $imagem_registro;
			$og_title 		= $titulo_pagina;
			$description    = $descricao_registro;
			$og_description = $description;
		}
	break;	


    // #################### NOTICIAS ###############
	case 'noticias':
		if($_GET['titulo'] == ''){
		  $titulo_pagina 	= "Notícias | SGC - Soluções";
		  $og_url 		= $path."/noticias/";
        
		}else{
			$titulo_pagina 	= $titulo_registro." | SGC - Soluções";
            $og_url 		= $path."/noticias/".$_GET['id']."/".$_GET['titulo'];
			$og_image		= $imagem_registro;
			$og_title 		= $titulo_pagina;
			$description    = $descricao_registro;
			$og_description = $description;
		}
	break;		
}

if(!empty($titulo_facebook)){
	$og_title 		= $titulo_facebook;
}else{
	$og_title 		= $titulo_pagina;
}

//$og_title 		= $titulo_pagina;
$og_description = $description;



?>