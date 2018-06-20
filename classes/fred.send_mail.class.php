<?php

/**

___________                  .___           .__                   .___       _________                  __                 
\_   _____/______   ____   __| _/___________|__| ____  ____     __| _/____   \_   ___ \_____    _______/  |________  ____  
 |    __) \_  __ \_/ __ \ / __ |/ __ \_  __ \  |/ ___\/  _ \   / __ |/ __ \  /    \  \/\__  \  /  ___/\   __\_  __ \/  _ \ 
 |     \   |  | \/\  ___// /_/ \  ___/|  | \/  \  \__(  <_> ) / /_/ \  ___/  \     \____/ __ \_\___ \  |  |  |  | \(  <_> )
 \___  /   |__|    \___  >____ |\___  >__|  |__|\___  >____/  \____ |\___  >  \______  (____  /____  > |__|  |__|   \____/ 
     \/                \/     \/    \/              \/             \/    \/          \/     \/     \/                      

	Script para envio de e-mails
	Copyright (c) 2011-2012 Frederico Marques de Castro (fredericodecastro.com.br)
	Free Licence
	Version: 1.6.1 (2013-03-08)
	Dependences: phpmailer
		
*/

	define('EMAIL_CONTATO','atendimento@aliancaimoveis.com');
	define('EMAIL_DISPARO','disparo@aliancaimoveis.com');
	define('SEU_NOME','Aliança Imóveis');
	
	
	/* ###################################################################
	###############                                        ###############
	###############     NÃO EDITE NADA DAQUI PRA BAIXO     ###############
	###############  A MENOS QUE SAIBA O QUE ESTÁ FAZENDO  ###############
	###############                                        ###############
	################################################################### */
	
	
	/*
	 * O método abaixo envia utilizando um servidor SMTP que pode ou não ser autenticado.
	 * Lembrando que se o não autenticado só vai funcionar se o servidor smtp permitir envio anonimo.
	 */
	function sendMail($de, $para, $assunto, $mensagem)
	{
		if(empty($de)) $de = EMAIL_DISPARO;
		if(empty($para)) $para = EMAIL_CONTATO;
		if(empty($assunto)) $assunto = "Assunto";
		if(empty($mensagem)) $mensagem = "Mensagem";

		// Muda a codificação para iso-8859-1 caso não seja
		// if(mb_detect_encoding($mensagem) == "UTF-8") $mensagem = utf8_decode($mensagem);
		// if(mb_detect_encoding($assunto) == "UTF-8") $assunto = utf8_decode($assunto);
		
		// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
		if(!class_exists("PHPMailer")) include("phpmailer/class.phpmailer.php");
		
		// Inicia a classe PHPMailer
		$mail = new PHPMailer();
		
		/*
		 * Dados do servidor e tipo de conexão para envio sem autenticação
		 */
		/**/
		//$mail->IsSMTP(); // Define que a mensagem será SMTP
		$mail->IsMail();
		$mail->Host = "localhost"; // Endereço do servidor SMTP (caso queira utilizar a autenticação, utilize o host smtp.seudomínio.com.br)
		//$mail->SMTPSecure = "tls"; // Forma de autenticação, os valores são "", "ssl" ou "tls"
		/**/
		
		/*
		 * Dados do servidor e tipo de conexão para envio com o gMail
		 **/
		/*
		$mail->Port = 465; // Porta padrão
		$mail->SMTPAuth = true; // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
		$mail->Username = 'seuemail@gmail.com'; // Usuário do servidor SMTP
		$mail->Password = 'suasenha123'; // Senha do servidor SMTP
		$mail->IsSMTP(); // Define que a mensagem será SMTP
		$mail->Host = "smtp.gmail.com"; // Endereço do servidor SMTP (caso queira utilizar a autenticação, utilize o host smtp.seudomínio.com.br)
		$mail->SMTPSecure = "ssl"; // Forma de autenticação, os valores são "", "ssl" ou "tls"
		/**/
		
		// Define o remetente
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->From = EMAIL_DISPARO; // Seu e-mail
		$mail->Sender = EMAIL_DISPARO; // Seu e-mail
		$mail->FromName = SEU_NOME; // Seu nome
		
		$mail->AddReplyTo($de, "Remetente");
		
		// Define os destinatário(s)
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		if(strpos($para,";"))
		{
			// mais de um destinatário
			$para = explode(";", $para);
			foreach($para as $email)
				if(!empty($email))
					$mail->AddAddress($email);

		}
		else // apenas 1 destinatário
			$mail->AddAddress($para);
		
		// Define os dados técnicos da Mensagem
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
		$mail->CharSet = 'UTF-8'; // Charset da mensagem (opcional)
		
		// Define a mensagem (Texto e Assunto)
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->Subject  = $assunto; // Assunto da mensagem
		$mail->Body = $mensagem; // Mensagem
		
		// Define os anexos (opcional)
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		//$mail->AddAttachment("/home/login/documento.pdf", "novo_nome.pdf");  // Insere um anexo
		
		// Envia o e-mail
		$enviado = $mail->Send();
		
		// Limpa os destinatários e os anexos
		$mail->ClearAllRecipients();
		$mail->ClearAttachments();
		
		// Exibe uma mensagem de resultado
		return $enviado;
	}
	
	
	/*
	 * Esse método utiliza a norma RFC 822 e php mail
	 * Este método deve funcionar na maioria das hospedagens que aceitam envio com php mail
	 */
	function sendMailWithoutPEAR($de, $para, $assunto, $mensagem)
	{
		if(empty($de)) $de = EMAIL_CONTATO;
		if(empty($para)) $para = EMAIL_CONTATO;
		if(empty($assunto)) $assunto = "Assunto";
		if(empty($mensagem)) $mensagem = "Mensagem";
		
		// Muda a codificação para iso-8859-1 caso não seja
		if(mb_detect_encoding($mensagem) == "UTF-8") $mensagem = utf8_decode($mensagem);
		if(mb_detect_encoding($assunto) == "UTF-8") $assunto = utf8_decode($assunto);
		
		if(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
		else if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux

		$headers = "MIME-Version: 1.1" . $quebra_linha;
		$headers .= "Content-type: text/html; charset=iso-8859-1" . $quebra_linha;
		$headers .= "From: " . SEU_NOME . "<" . EMAIL_DISPARO . ">" . $quebra_linha;
		$headers .= "Return-Path: " . EMAIL_DISPARO . $quebra_linha;
		$headers .= "Reply-To: " . $de . $quebra_linha;
		
		return mail(str_replace(";",",",$para), $assunto, $mensagem, $headers, "-r" . EMAIL_DISPARO);
	}

?>