<?php

ini_set('display_errors',0);

//session_start();
include_once('./classes/clearRequest.php');
include_once('./classes/url.class.php');
include_once('./classes/ITemplate.class.php');
include_once('conecta.php');
include_once('./PHPMailer_v5.1/class.phpmailer.php');
include_once('funcoes.php');

mysql_query("SET CHARACTER SET utf8");

$tpl = new ITemplate();

// URL AMIGAVEL
if($_SERVER['HTTP_HOST'] == "localhost"){
    $url_amigavel = new URL('sgc');

}else{
    $url_amigavel = new URL('');
}

$url = $url_amigavel->defineValores();

$url_atual = 'http://localhost/sgc/';
$url_atual = str_replace('http://localhost/','http://localhost:8080/',$url_atual);

if(strstr($url_atual,'?')){
    $explode_url = explode('?',$url_atual);
    $url_atual = $explode_url[0];
    $paramentros_atuais = "?".$explode_url[1];
}


//######## VERIRIFICAR SE A SEÇÃO PASSADA É VÁLIDA #########

$secao = $_GET['secao'];
$id = $_GET['id'];
$titulo = $_GET['titulo'];




if(empty($secao)){
    include "./paginas/main/main.php";
    $secao = 'main';	

}else{
    $secoes = array('sobre','noticias','solucoes-e-servicos','contato','parceiros','downloads','area-cliente');
    if(in_array($secao, $secoes)){
        if(!empty($_GET['titulo'])){
            $sufixo = "_detalhes";
        
        }else{
            $sufixo = "";
        }
		    
        $existe_template = file_exists("paginas/" . $secao . "/" . $secao.$sufixo.".php");
        if(in_array($secao, $secoes) && $existe_template == true) {
            include "./paginas/" . $secao . "/" . $secao . $sufixo . ".php";
        
        }else{
            echo "<script>location.href='" . $path . "/erro.php';</script>";
        }
    }
}

include_once("meta_tags.php");


$tpl->assign('path', $path); 
$tpl->assign('path_painel', $path_painel);

$tpl->assign('secao', $secao);
$tpl->assign('pagina', $pagina);

$tpl->assign('paramentros_atuais',$paramentros_atuais);
$tpl->assign('url_atual',$url_atual);
$tpl->assign('mensagem_resultado',$mensagem_resultado);

$tpl->assign('sugestoes',$sugestoes);
$tpl->assign('keywords', $keywords);
$tpl->assign('description', $description);
$tpl->assign('og_type', $og_type);
$tpl->assign('og_title', $og_title);
$tpl->assign('og_url', $og_url);
$tpl->assign('og_site_name', $og_site_name);
$tpl->assign('og_description', $og_description);
$tpl->assign('og_image', $og_image);

$tpl->assign('url_atual',$url_atual);
$tpl->assign('idiomas',$idiomas);
$tpl->assign('site',$site);
$tpl->assign('titulo_pagina', $titulo_pagina);
$tpl->display('index.tpl.php');

mysql_close();

?>
