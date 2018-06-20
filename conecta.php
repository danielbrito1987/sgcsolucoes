<?php

//if($_SERVER['HTTP_HOST'] == "192.168.2.208:8080" || $_SERVER['HTTP_HOST'] == "localhost:8080"){	
if($_SERVER['HTTP_HOST'] == "127.0.0.1" || $_SERVER['HTTP_HOST'] == "localhost"){
	$nome_servidor="127.0.0.1";
	$usuario_bd="root";
	$senha_bd="";
	$nome_bd="sgcsolucoes";
	$path = "http://localhost/sgc";
	$path_painel = "http://localhost/sgc/painel";
	$path_email  = "everson@rdweb.com.br";
}else{
	$nome_servidor="mysql.db3.net2.com.br";
	$usuario_bd="sgcsolucoes";
	$senha_bd="lj89y8fTYFDTRD4s";
	$nome_bd="sgcsolucoes";
	$path = "http://sgcsolucoes.com.br";
	$path_painel  = "http://sgcsolucoes.com.br/painel";
	$path_email  = "suporte@sgcsolucoes.com.br";
} 

$con = mysql_connect($nome_servidor,$usuario_bd,$senha_bd) or die (mysql_error());
mysql_select_db($nome_bd,$con) or die (mysql_error());

?>

