<?php
//Tratamento de variaveis globais com register_globals on
function clearRequest(){
	//variaveis recebidas por POST ou GET que sao do tipo inteiro
	$varInt = array('id','detalhes','ref');
	
	//REQUEST
	foreach($_REQUEST as $k => $v){
		if(in_array($k,$varInt))
		$_REQUEST[$k] = abs($v); $$k = abs($v); continue;
		
		$_REQUEST[$k] = mysql_real_escape_string($v);
		$$k = mysql_real_escape_string($v);
	}
	
	//GET
	foreach($_GET as $k => $v){
		if(in_array($k,$varInt))
		$_GET[$k] = abs($v); continue;
		
		$_GET[$k] = mysql_real_escape_string($v);
	}
	
	
	//POST
	foreach($_POST as $k => $v){
		if(in_array($k,$varInt))
		$_POST[$k] = abs($v); continue;
		
		$_POST[$k] = mysql_real_escape_string($v);
	}
}

?>