<?php
include_once('../../funcoes.php');
include_once('../../conecta.php');
include_once('../../classes/ITemplate.class.php');

$tpl = new ITemplate();

$sql_institucional = "SELECT texto_principal,imagem_fundo,imagem_principal FROM a_empresa WHERE id='1'";
$institucional = mysql_fetch_assoc(mysql_query($sql_institucional));


// ####### PARCEIROS ######### 
$parceiros_home = array();
$sql_parceiros_home = "SELECT id,titulo,arquivo,site FROM parceiros WHERE status='1' ORDER BY id DESC";
$sql_parceiros_home = mysql_query($sql_parceiros_home);
while($linha_parceiros_home = mysql_fetch_assoc($sql_parceiros_home)){
	$parceiros_home[] = $linha_parceiros_home;
}

$descricao_registro = limitarTexto(htmlspecialchars(strip_tags($institucional['texto_principal'])),160);

$pagina = "../paginas/sobre/sobre.tpl.php";

$tpl->assign('parceiros_home',$parceiros_home);
$tpl->assign('institucional',$institucional);
$tpl->assign('descricao_registro',$descricao_registro);
$tpl->assign('pagina', $pagina);
include_once('../sobre/sobre.tpl.php');
?>