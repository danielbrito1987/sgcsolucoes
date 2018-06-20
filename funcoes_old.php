    <?php
function url_amigavel($string){
	$string = str_replace(' ','-',$string);
	$pattern = array("/ã|á|a|â|a|Á|A|Â|A/","/é|e|e|E|É|E/","/í|i|î|I|Í|Î/","/ó|o|ô|o|Ó|O|Ô|O/","/ú|u|u|U|Ú|U/","/Ç|ç/","/['.\]}{\$:\[)(?!;?§*#%@&^~,\/]/");
	$replace = array("a","e","i","o","u","c","");
	$string = preg_replace($pattern,$replace,$string);
	$string = strtolower($string);
	return $string.'.html';
}

function url_amigavel2($string){
	$string = str_replace(' ','-',$string);
	$pattern = array("/ã|á|a|â|a|Á|A|Â|A/","/é|e|e|E|É|E/","/í|i|î|I|Í|Î/","/ó|o|ô|o|Ó|O|Ô|O/","/ú|u|u|U|Ú|U/","/Ç|ç/","/['.\]}{\$:\[)(?!;?§*#%@&^~,\/]/");
	$replace = array("a","e","i","o","u","c","");
	$string = preg_replace($pattern,$replace,$string);
	$string = strtolower($string);
	return $string;
}

function strtolower_utf8($string){ 
  $convert_to = array( 
    "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", 
    "v", "w", "x", "y", "z", "à", "á", "â", "ã", "ä", "å", "æ", "ç", "è", "é", "ê", "ë", "ì", "í", "î", "ï", 
    "ð", "ñ", "ò", "ó", "ô", "õ", "ö", "ø", "ù", "ú", "û", "ü", "ý", "а", "б", "в", "г", "д", "е", "ё", "ж", 
    "з", "и", "й", "к", "л", "м", "н", "о", "п", "р", "с", "т", "у", "ф", "х", "ц", "ч", "ш", "щ", "ъ", "ы", 
    "ь", "э", "ю", "я" 
  ); 
  $convert_from = array( 
    "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", 
    "V", "W", "X", "Y", "Z", "À", "Á", "Â", "Ã", "Ä", "Å", "Æ", "Ç", "È", "É", "Ê", "Ë", "Ì", "Í", "Î", "Ï", 
    "Ð", "Ñ", "Ò", "Ó", "Ô", "Õ", "Ö", "Ø", "Ù", "Ú", "Û", "Ü", "Ý", "А", "Б", "В", "Г", "Д", "Е", "Ё", "Ж", 
    "З", "И", "Й", "К", "Л", "М", "Н", "О", "П", "Р", "С", "Т", "У", "Ф", "Х", "Ц", "Ч", "Ш", "Щ", "Ъ", "Ъ", 
    "Ь", "Э", "Ю", "Я" 
  ); 

  return str_replace($convert_from, $convert_to, $string); 
} 

function converte_data($dataz){
    if(strstr($dataz, "/")){
        $A = explode("/",$dataz);
        $V_dataz = $A[2]."-".$A[1]."-".$A[0];
    }else{
        $A = explode("-",$dataz);
        $V_dataz = $A[2]."/".$A[1]."/".$A[0];
    }
    return $V_dataz;
}

function calc_idade($data_nasc){
	$data_nasc=explode('/',$data_nasc);
	$data=date('d/m/Y');
	$data=explode('/',$data);
	$anos=$data[2]-$data_nasc[2];
	if($data_nasc[1] > $data[1])
		return $anos-1;
	
	if($data_nasc[1] == $data[1])
		if($data_nasc[0] <= $data[0]) {
			return $anos;
			break;
		
		}else{
			return $anos-1;
			break;
		}

	if($data_nasc[1] < $data[1])
		return $anos;
}

function nome_mes($mes){
	switch($mes){
		case "01":$retorno = ($_SESSION['idioma'] == 'en' ? "January" 	: "Janeiro");	break;
		case "02":$retorno = ($_SESSION['idioma'] == 'en' ? "February" 	: "Fevereiro");	break;
		case "03":$retorno = ($_SESSION['idioma'] == 'en' ? "March" 	: "Março");		break;
		case "04":$retorno = ($_SESSION['idioma'] == 'en' ? "April" 	: "Abril");		break;
		case "05":$retorno = ($_SESSION['idioma'] == 'en' ? "May" 		: "Maio");		break;
		case "06":$retorno = ($_SESSION['idioma'] == 'en' ? "June" 		: "Junho");		break;
		case "07":$retorno = ($_SESSION['idioma'] == 'en' ? "July" 		: "Julho");		break;
		case "08":$retorno = ($_SESSION['idioma'] == 'en' ? "August" 	: "Agosto");	break;
		case "09":$retorno = ($_SESSION['idioma'] == 'en' ? "September" : "Setembro");	break;
		case "10":$retorno = ($_SESSION['idioma'] == 'en' ? "October" 	: "Outubro");	break;
		case "11":$retorno = ($_SESSION['idioma'] == 'en' ? "November" 	: "Novembro");	break;
		case "12":$retorno = ($_SESSION['idioma'] == 'en' ? "December" 	: "Dezembro");	break;
	}
	return $retorno;;
}

function nome_mes_abreviado($mes){
	switch($mes){
		case "01":$retorno = ($_SESSION['idioma'] == 'en' ? "January" 	: "Jan");	break;
		case "02":$retorno = ($_SESSION['idioma'] == 'en' ? "February" 	: "Fev");	break;
		case "03":$retorno = ($_SESSION['idioma'] == 'en' ? "March" 	: "Mar");		break;
		case "04":$retorno = ($_SESSION['idioma'] == 'en' ? "April" 	: "Abr");		break;
		case "05":$retorno = ($_SESSION['idioma'] == 'en' ? "May" 		: "Mai");		break;
		case "06":$retorno = ($_SESSION['idioma'] == 'en' ? "June" 		: "Jun");		break;
		case "07":$retorno = ($_SESSION['idioma'] == 'en' ? "July" 		: "Jul");		break;
		case "08":$retorno = ($_SESSION['idioma'] == 'en' ? "August" 	: "Ago");	break;
		case "09":$retorno = ($_SESSION['idioma'] == 'en' ? "September" : "Set");	break;
		case "10":$retorno = ($_SESSION['idioma'] == 'en' ? "October" 	: "Out");	break;
		case "11":$retorno = ($_SESSION['idioma'] == 'en' ? "November" 	: "Nov");	break;
		case "12":$retorno = ($_SESSION['idioma'] == 'en' ? "December" 	: "Dez");	break;
	}
	return $retorno;;
}

function diasemana($dataxxx)
{
    $diasemana = date("w", strtotime($dataxxx));
    
    
    
    switch ($diasemana) {
        case "0":
            $diasemana = "Domingo";
            break;
        case "1":
            $diasemana = "Segunda-Feira";
            break;
        case "2":
            $diasemana = "Terça-Feira";
            break;
        case "3":
            $diasemana = "Quarta-Feira";
            break;
        case "4":
            $diasemana = "Quinta-Feira";
            break;
        case "5":
            $diasemana = "Sexta-Feira";
            break;
        case "6":
            $diasemana = "Sábado";
            break;
    }
    
    return "$diasemana";
}


function limitarTexto($texto, $limite, $quebra = true) {
  $tamanho = strlen($texto);

  // Verifica se o tamanho do texto й menor ou igual ao limite
  if ($tamanho <= $limite) {
	  $novo_texto = $texto;
  // Se o tamanho do texto for maior que o limite
  } else {
	  // Verifica a opзгo de quebrar o texto
	  if ($quebra == true) {
		  $novo_texto = trim(substr($texto, 0, $limite)).'...';
	  // Se nгo, corta $texto na ъltima palavra antes do limite
	  } else {
		  // Localiza o ъtlimo espaзo antes de $limite
		  $ultimo_espaco = strrpos(substr($texto, 0, $limite), ' ');
		  // Corta o $texto atй a posiзгo localizada
		  $novo_texto = trim(substr($texto, 0, $ultimo_espaco)).'...';
	  }
  }

  // Retorna o valor formatado
  return $novo_texto;
}


function paginacao($pagina_atual,$parametros_url,$total_artigos = 0, $artigos_por_pagina = 10, $offset = 5, $url_atual = ''){    
    $numero_de_paginas = ceil( $total_artigos / $artigos_por_pagina );
	$secao = $_GET['secao'];
	if ($url_atual == ''){
    	$url_atual = 'http://'.$_SERVER['SERVER_NAME']."/".$secao."/";

	}
	
    if(strstr($url_atual,'?')){
        $explode_url = explode('?',$url_atual);
        $url_atual = $explode_url[0];
    }
    
    if($numero_de_paginas > 1){
		if(!empty($_GET['pagina'])){
			$pagina_atual = (int)$_GET['pagina'];
		}
		
		$paginas = null;

		$disabled_aterior = "";
		if($pagina_atual == 1){
			$disabled_aterior = "disabled";
		}
		
		if(($pagina_atual) >= 1){
			$paginas .= "<li class='".$disabled_aterior."'><a href='".$url_atual.$parametros_url.(!empty($parametros_url) ? "&" : "?")."pagina=".($pagina_atual - 1)."' aria-label='Anterior'><span aria-hidden='true'>&laquo;</span></a></li>";
		}
		
		
		for($i=($pagina_atual - 1); $i < ($pagina_atual) + $offset; $i++){
			if($i <= $numero_de_paginas && $i > 0){
				$pagina = $i;
				$estilo = null;
				
				if($i == $pagina_atual){
					$estilo = ' class="active" ';
				}
				
				$paginas .= "<li $estilo><a href='".$url_atual.$parametros_url.(!empty($parametros_url) ? "&" : "?")."pagina=".$pagina."'>$pagina</a></li>";
		 
			}
		}

		$disabled_proxima = "";
		if(($pagina_atual) == $numero_de_paginas){
			$disabled_proxima = "disabled";
		}
		
		if(($pagina_atual) <= $numero_de_paginas){
			$paginas .= "<li class='".$disabled_proxima."'><a href='".$url_atual.$parametros_url.(!empty($parametros_url) ? "&" : "?")."pagina=".($pagina_atual + 1)."' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li>";
		}
		
		$retorno = "
		<center>
			<nav style='text-align:center;'>
				<ul class='pagination pagination-lg'>
					".$paginas."
				</ul>
			</nav>
		</center>
		";
	
	}else{
		$retorno = '';
	}
    
    return $retorno;				
    
}



function clearName($str)
{
   
    $pattern = array(
        "/á|à|â|ã|Á|À|Â|Ã/",
        "/é|è|ê|È|É|Ê/",
        "/í|ì|î|Ì|Í|Î/",
        "/ó|ò|ô|õ|Ó|Ò|Ô|Õ/",
        "/ú|ù|û|Ù|Ú|Û/",
        "/Ç|ç/",
        "/[:?!@#$%&;^~,\/]/"
    );
    $replace = array(
        "A",
        "E",
        "I",
        "O",
        "U",
        "C",
        ""
    );
    $str     = preg_replace($pattern, $replace, $str);
    
    return $str;
}




function embed_bootstrap($embed,$formato){
	// 16by9 -- 4by3
	
	$codigo = reset(explode('"',end(explode('src="',$embed))));

	$retorno = "
	<div style='width:100%; max-width:600px; display:block; margin:0px auto;'>
		<div class='embed-responsive embed-responsive-".$formato."'>
			<iframe class='embed-responsive-item' src='".$codigo."'></iframe>
		</div>
	</div>";

	return $retorno;
}



function tamanho($valor){
$i=0;
$tipos = array(" B", " KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");
while (($valor/1024)>1) {
$valor=$valor/1024;
$i++;
}
return substr($valor,0,strpos($valor,'.')+4).$tipos[$i];
}

?>

