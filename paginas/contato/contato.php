<?php



$erro = 0;
$enviou = 0;

if(!empty($_POST) && $_GET['enviar'] == '1'){
	$input_nome			= mysql_real_escape_string($_POST["input_nome"]); 
		$input_email 		= mysql_real_escape_string($_POST["input_email"]);
		$input_telefone		= mysql_real_escape_string($_POST["input_telefone"]);
		$input_obs			= addslashes($_POST["input_obs"]);
		$input_area		 = stripslashes($_POST["input_area"]);

		$linha_area_escolhida=mysql_fetch_array(mysql_query("SELECT * FROM fale_conosco_assuntos  WHERE id='$input_area' "));
		
		$input_nome_area		 = stripslashes($linha_area_escolhida["nome"]);
		$input_email_area		 = stripslashes($linha_area_escolhida["email"]);

		if (!empty($_POST['g-recaptcha-response'])) {

			
		
			$assunto = "Contato do Site SGC - Soluções";
			$assunto =utf8_decode($assunto);

			  //require("$path_painel/PHPMailer_v5.1/class.phpmailer.php");

			

			  $mail = new PHPMailer();

			  include("config_email.php");

			  $mail->SetFrom(''.$input_email.'', ''.$input_nome.'');
			  $mail->AddAddress(''.$input_email_area.'', ''.$assunto.'');
			  $mail->AddReplyTo(''.$input_email.'', ''.$input_nome.'');

			  $mail->AddBCC("everson@rdweb.com.br", "Everson Montibeller");

			  $mail->Subject = $assunto;

			  $mail->Body = "

			<html xmlns='http://www.w3.org/1999/xhtml'>
			<head>
			<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
			<title>SGC </title>
			</head>
			<body bgcolor='#FFFFFF'>
				<table width='100%' height='100%' border='0' cellpadding='0' cellspacing='0'  bgcolor='#FFFFFF'>
					<tr>
						<td align='center' valign='middle'>
							<table width='600' border='0' cellpadding='0' cellspacing='0' bgcolor='#FFFFFF' >
								<tr>
									<td>
										<a href='".$path."' target='_blank'>
											<img src='".$path."/carta/topo.jpg'
											 width='600' height='166'  border='0'  />
										</a>
									</td>
								</tr>
								
								<tr>
									<td background='".$path."/carta/meio.jpg'>
										<table width='100%' border='0' cellspacing='0' cellpadding='35'>
											<tr>
												<td>
													<font size='2' face='Tahoma' color='#000000'>
													
														<strong>
															".$assunto."
														</strong><br />	
														<br />
														
														<fieldset style='border:1px solid #ccc; margin-top:20px;'>
															<legend style='font-weight:bold;'>Assunto</legend>
															<br /><strong>Assunto:</strong> ".utf8_decode($input_nome_area)." <br />
														</fieldset>
														
														<br />

														<fieldset style='border:1px solid #ccc; margin-top:20px;'>
															<legend style='font-weight:bold;'>Dados</legend>
															<br /><strong>Nome:</strong>  ".utf8_decode($input_nome)." <br />
															<strong>Email:</strong> ".utf8_decode($input_email)." <br />
															<strong>Telefone:</strong> ".utf8_decode($input_telefone)." <br />
														</fieldset>
														
														<br />

														<fieldset style='border:1px solid #ccc; margin-top:20px;'>
															<legend style='font-weight:bold;'>OBS:</legend>	
															<br />".nl2br(stripslashes(utf8_decode($input_obs)))."<br />				
														</fieldset>

														<br />
														<br /> 
													</font>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								
								<tr>
									<td valign='bottom'>
										<img src='".$path."/carta/rodape.jpg'
										 width='600' height='30' />
									</td>
								</tr>
							</table>
							<br>
						</td>
					</tr>
				</table>
			</body>
			</html>";

				
				
			

			
			if ($mail->Send()) {

			
				mysql_query("INSERT INTO fale_conosco (data,nome,email,telefone,mensagem,assunto) VALUES (NOW(),'".$input_nome."','".$input_email."','".$input_telefone."','".$input_obs."','".$input_area."')")or die (mysql_error());

				if (mysql_num_rows(mysql_query("SELECT * FROM emails where email='".$input_email."' ;"))==0) {
	        		mysql_query("INSERT INTO emails (data,nome,email,categoria) VALUES (NOW(),'".$input_nome."','".$input_email."','2')")or die (mysql_error());
	    		}

	    		$enviou = 1;
	    		$mensagem_resultado = '<script>swal("","Seu Contato foi enviado com sucesso!", "success");</script>';


			}else{
				$erro = 1;
				$mensagem_resultado = '<script>swal("","Erro ao enviar e-mail!", "error");</script>';
			}
			
		

	}else{
		$erro = 1;
		$mensagem_resultado = "<script>swal('','Por favor, confirme o captcha!', 'error')</script>";
	}
}


$areas = array();
//$sql_areas = "SELECT * FROM areas ORDER BY empresa ASC";
$sql_areas = "SELECT * FROM fale_conosco_assuntos ORDER BY nome ASC";
$sql_areas = mysql_query($sql_areas);
while($linha_areas = mysql_fetch_assoc($sql_areas)){
	$areas[] = $linha_areas;
}


$tpl->assign('areas',$areas);

$sql_contato = "SELECT texto_principal,imagem_fundo,imagem_principal FROM fale_conosco_texto WHERE id='1'";
$contato = mysql_fetch_assoc(mysql_query($sql_contato));


// ####### PARCEIROS ######### 
$parceiros_home = array();
$sql_parceiros_home = "SELECT id,titulo,arquivo,site FROM parceiros WHERE status='1' ORDER BY id DESC";
$sql_parceiros_home = mysql_query($sql_parceiros_home);
while($linha_parceiros_home = mysql_fetch_assoc($sql_parceiros_home)){
	$parceiros_home[] = $linha_parceiros_home;
}

$tpl->assign('parceiros_home',$parceiros_home);
$tpl->assign('contato',$contato);

$tpl->assign('mensagem_resultado', $mensagem_resultado);
$tpl->assign('erro', $erro);
$tpl->assign('enviou', $enviou);

$pagina = "paginas/contato/contato.tpl.php";

?>