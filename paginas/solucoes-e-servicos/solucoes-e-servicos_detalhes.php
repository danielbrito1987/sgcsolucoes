<?php


// ######### TEXTO PRINCIPAL
$sql_texto_principal = "SELECT id,imagem_principal,texto_principal,imagem_fundo FROM servicos_texto WHERE id='1'";
$texto_principal = mysql_fetch_assoc(mysql_query($sql_texto_principal));


$sql_detalhes = "
SELECT 
	id,
	data,
	imagem,
	imagem_fundo,
	titulo,
	subtitulo,
	texto 
FROM 
	servicos 
WHERE 
	status='1' and 
	id='".abs($_GET['id'])."' 
LIMIT 1";

$sql_detalhes = mysql_query($sql_detalhes) or die (mysql_error());
$detalhes = mysql_fetch_assoc($sql_detalhes);


$titulo_registro 	= $detalhes['titulo'];
$imagem_registro 	= $path_painel.'/arquivos/servicos/'.$detalhes['imagem'];
$descricao_registro = limitarTexto(htmlspecialchars(strip_tags($detalhes['texto'])),160);



// #### DICAS RELACIONADAS
$servicos_relacionadas = array();
$sql_servicos_relacionadas = "
SELECT id,imagem,titulo,texto FROM servicos WHERE status='1' and id<>'".abs($_GET['id'])."' ORDER BY rand() LIMIT 4";


$sql_servicos_relacionadas = mysql_query($sql_servicos_relacionadas) or die (mysql_error());
while($linha_servicos_relacionadas = mysql_fetch_assoc($sql_servicos_relacionadas)){
	$servicos_relacionadas[] = $linha_servicos_relacionadas;
}



mysql_query("INSERT INTO servicos_visualizacoes (data,registro,cliente) VALUES (NOW(),'".abs($_GET['id'])."','".abs($_SESSION['dados_cliente']['id'])."')");


// ####### PARCEIROS ######### 
$parceiros_home = array();
$sql_parceiros_home = "SELECT id,titulo,arquivo,site FROM parceiros WHERE status='1' ORDER BY id DESC";
$sql_parceiros_home = mysql_query($sql_parceiros_home);
while($linha_parceiros_home = mysql_fetch_assoc($sql_parceiros_home)){
	$parceiros_home[] = $linha_parceiros_home;
}

$tpl->assign('parceiros_home',$parceiros_home);
$tpl->assign('texto_principal',$texto_principal);
$tpl->assign('detalhes',$detalhes);
$tpl->assign('galeria_fotos',$galeria_fotos);
$tpl->assign('galeria_videos',$galeria_videos);
$tpl->assign('pacotes_relacionados',$pacotes_relacionados);
$tpl->assign('servicos_relacionadas',$servicos_relacionadas);
$tpl->assign('titulo_registro',$titulo_registro);
$tpl->assign('descricao_registro',$descricao_registro);

$pagina = "paginas/solucoes-e-servicos/solucoes-e-servicos_detalhes.tpl.php";

?>