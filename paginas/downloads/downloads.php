<?php

include_once('../../conecta.php');
include_once('../../funcoes.php');

$num_por_pagina = 21;
if(empty($_GET['pagina'])){$_GET['pagina'] = 1;}
$primeiro_registro = (abs($_GET['pagina']) * $num_por_pagina) - $num_por_pagina;



// ######### REGISTROS #########
$downloads = array();
$sql_downloads = "SELECT * FROM downloads_tipos WHERE id in (select tipo from downloads) ORDER BY nome ASC";
$total_downloads = mysql_num_rows(mysql_query($sql_downloads));
$sql_downloads = mysql_query($sql_downloads." LIMIT ".$primeiro_registro.", ".$num_por_pagina."") or die (mysql_error());
while($linha_downloads = mysql_fetch_assoc($sql_downloads)){
	$downloads[] = $linha_downloads;
}


$paginacao = paginacao($_GET['pagina'],"",$total_downloads, $num_por_pagina);


// ######### TEXTO PRINCIPAL
$sql_texto_principal = "SELECT id,imagem_principal,texto_principal,imagem_fundo FROM downloads_texto WHERE id='1'";
$texto_principal = mysql_fetch_assoc(mysql_query($sql_texto_principal));


// ####### PARCEIROS ######### 
$parceiros_home = array();
$sql_parceiros_home = "SELECT id,titulo,arquivo,site FROM parceiros WHERE status='1' ORDER BY id DESC";
$sql_parceiros_home = mysql_query($sql_parceiros_home);
while($linha_parceiros_home = mysql_fetch_assoc($sql_parceiros_home)){
	$parceiros_home[] = $linha_parceiros_home;
}

$tpl->assign('parceiros_home',$parceiros_home);
$tpl->assign('texto_principal',$texto_principal);
$tpl->assign('downloads',$downloads);

$tpl->assign('paginacao',$paginacao);

$pagina = "paginas/downloads/downloads.tpl.php";

mysql_close();

?>