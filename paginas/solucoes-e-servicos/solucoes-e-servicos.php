<?php

$num_por_pagina = 8;
if(empty($_GET['pagina'])){$_GET['pagina'] = 1;}
$primeiro_registro = (abs($_GET['pagina']) * $num_por_pagina) - $num_por_pagina;


// ######### REGISTROS #########
$servicos = array();
$sql_servicos = "SELECT id,imagem,titulo,texto,subtitulo FROM servicos WHERE status='1' ORDER BY ordem ASC";
$total_servicos = mysql_num_rows(mysql_query($sql_servicos));
$sql_servicos = mysql_query($sql_servicos." LIMIT ".$primeiro_registro.", ".$num_por_pagina."") or die (mysql_error());
while($linha_servicos = mysql_fetch_assoc($sql_servicos)){
	$servicos[] = $linha_servicos;
}


// ######### TEXTO PRINCIPAL
$sql_texto_principal = "SELECT id,imagem_principal,texto_principal,imagem_fundo FROM servicos_texto WHERE id='1'";
$texto_principal = mysql_fetch_assoc(mysql_query($sql_texto_principal));


$paginacao = paginacao($_GET['pagina'],"",$total_servicos, $num_por_pagina);


// ####### PARCEIROS ######### 
$parceiros_home = array();
$sql_parceiros_home = "SELECT id,titulo,arquivo,site FROM parceiros WHERE status='1' ORDER BY id DESC";
$sql_parceiros_home = mysql_query($sql_parceiros_home);
while($linha_parceiros_home = mysql_fetch_assoc($sql_parceiros_home)){
	$parceiros_home[] = $linha_parceiros_home;
}

$tpl->assign('parceiros_home',$parceiros_home);
$tpl->assign('servicos',$servicos);
$tpl->assign('texto_principal',$texto_principal);
$tpl->assign('paginacao',$paginacao);

$pagina = "paginas/solucoes-e-servicos/solucoes-e-servicos.tpl.php";


?>