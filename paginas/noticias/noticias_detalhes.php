<?php


$sql_detalhes = "SELECT id,data,imagem,imagem_fundo,titulo,subtitulo,fonte,texto,DATE_FORMAT(data,'%d/%m/%Y') as strData FROM noticias WHERE status='1' and id='".abs($_GET['id'])."' LIMIT 1";

$sql_detalhes = mysql_query($sql_detalhes) or die (mysql_error());
$detalhes = mysql_fetch_assoc($sql_detalhes);

$titulo_registro 	= $detalhes['titulo'];
$imagem_registro 	= $path_painel.'/arquivos/noticias/'.$detalhes['imagem'];
$descricao_registro = limitarTexto(htmlspecialchars(strip_tags($detalhes['texto'])),160);



// #### GALERIA DE FOTOS
$galeria_fotos = array();
$sql_galeria_fotos = "SELECT imagem,legenda FROM noticias_fotos WHERE registro='".abs($_GET['id'])."' ORDER BY ordem ASC";
$sql_galeria_fotos = mysql_query($sql_galeria_fotos) or die (mysql_error());
while($linha_galeria_fotos = mysql_fetch_assoc($sql_galeria_fotos)){
	$galeria_fotos[] = $linha_galeria_fotos;
}



// #### GALERIA DE VÍDEOS
$i=0;
$galeria_videos = array();
$sql_galeria_videos = "SELECT video,legenda FROM noticias_videos WHERE registro='".abs($_GET['id'])."' ORDER BY ordem ASC";
$sql_galeria_videos = mysql_query($sql_galeria_videos) or die (mysql_error());
while($linha_galeria_videos = mysql_fetch_assoc($sql_galeria_videos)){
	$galeria_videos[$i] = $linha_galeria_videos;
	$galeria_videos[$i]['video'] = end(explode('?v=',$linha_galeria_videos['video']));
	$i++;
}




// #### DICAS RELACIONADAS
$noticias_relacionadas = array();
$sql_noticias_relacionadas = "SELECT id,data,imagem,titulo,subtitulo,texto FROM noticias WHERE status='1' and id<>'".abs($_GET['id'])."' ORDER BY data DESC LIMIT 4";

$sql_noticias_relacionadas = mysql_query($sql_noticias_relacionadas) or die (mysql_error());
while($linha_noticias_relacionadas = mysql_fetch_assoc($sql_noticias_relacionadas)){
	$noticias_relacionadas[] = $linha_noticias_relacionadas;
}


$titulo_registro = $detalhes['titulo'];

mysql_query("INSERT INTO noticias_visualizacoes (data,registro,cliente) VALUES (NOW(),'".abs($_GET['id'])."','".abs($_SESSION['dados_cliente']['id'])."')");


// ######### TEXTO PRINCIPAL
$sql_texto_principal = "SELECT id,imagem_principal,texto_principal,imagem_fundo FROM noticias_texto WHERE id='1'";
$texto_principal = mysql_fetch_assoc(mysql_query($sql_texto_principal));


// ####### PARCEIROS ######### 
$parceiros_home = array();
$sql_parceiros_home = "SELECT id,titulo,arquivo,site FROM parceiros WHERE status='1' ORDER BY id DESC";
$sql_parceiros_home = mysql_query($sql_parceiros_home);
while($linha_parceiros_home = mysql_fetch_assoc($sql_parceiros_home)){
	$parceiros_home[] = $linha_parceiros_home;
}

$tpl->assign('texto_principal',$texto_principal);
$tpl->assign('parceiros_home',$parceiros_home);
$tpl->assign('detalhes',$detalhes);
$tpl->assign('galeria_fotos',$galeria_fotos);
$tpl->assign('galeria_videos',$galeria_videos);
$tpl->assign('pacotes_relacionados',$pacotes_relacionados);
$tpl->assign('noticias_relacionadas',$noticias_relacionadas);

$pagina = "paginas/noticias/noticias_detalhes.tpl.php";

?>