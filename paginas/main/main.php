<?php


$erro = 0;

if(!empty($_POST) && $_GET['acao'] == 'news'){
    $input_nome          = stripslashes($_POST["input_nome_news"]);
    $input_email         = stripslashes($_POST["input_email_news"]);    
    
        
    if(empty($input_nome) || empty($input_email)){
        $mensagem_resultado = "<script>swal('','Preencha os campos corretamente!', 'error')</script>";
                //print "<script language='javascript'>alert('Preencha os campos corretamente!');location.href='".$path."'</script>"; 

    } if (mysql_num_rows(mysql_query("SELECT * FROM emails where email='$_POST[input_email_news]' ;"))>0) {
        $mensagem_resultado = "<script>swal('','Esse Email já está Cadastrado!', 'error')</script>";
                //print "<script language='javascript'>alert('Esse Email já está Cadastrado!');location.href='".$path."'</script>"; 
       

    }else{

        
        
            $assunto = "Cadastro de Newsletter do Site SGC - Soluções";
			$assunto =utf8_decode($assunto);

              //require("$path_painel/PHPMailer_v5.1/class.phpmailer.php");

            $mail = new PHPMailer();

			  include("config_email.php");

			  $mail->SetFrom(''.$input_email.'', ''.$input_nome.'');
			  $mail->AddAddress(''.$path_email.'', ''.$assunto.'');
			  $mail->AddReplyTo(''.$input_email.'', ''.$input_nome.'');

			  $mail->AddBCC("everson@rdweb.com.br", "Everson Montibeller");

              
              //$mail = new PHPMailer();

              //$mail->IsHTML(true); // send as HTML
              //$mail->IsSMTP(); // send via SMTP
              //$mail->SMTPDebug = false;
              //$mail->SetLanguage("br", "phpmailer/language/");

              //$mail->SMTPAuth   = true; // enable SMTP authentication
              // $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
              //$mail->Host       = "smtp.otimaatacado.com.br"; // sets GMAIL as the SMTP server
              //$mail->Port       = 587; // set the SMTP port for the GMAIL server
              //$mail->Username   = "admin@otimaatacado.com.br"; // GMAIL username
              //$mail->Password   = "otima16123@"; // GMAIL password

              //$mail->Host       = "smtp.sendgrid.net"; // sets GMAIL as the SMTP server
              //$mail->Port       = 587; // set the SMTP port for the GMAIL server*/
              //$mail->Username   = "eversonmontibeller"; // GMAIL username
              //$mail->Password   = "cmvES3004"; // GMAIL password

              //$mail->SetFrom(''.$input_email.'', ''.$input_nome.'');
              //$mail->AddAddress(''.$path_email.'', ''.$path.'');
              //$mail->AddReplyTo(''.$input_email.'', ''.$input_nome.'');

              //$mail->AddBCC("everson@rdweb.com.br", "Everson Montibeller");

              $mail->Subject = $assunto;

              $mail->Body = "

            <html xmlns='http://www.w3.org/1999/xhtml'>
            <head>
            <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
            <title>".$assunto."</title>
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
                                                            <legend style='font-weight:bold; color:#1B74BB;'>Dados</legend>
                                                            <strong>Nome:</strong> ".utf8_decode($input_nome)."<br />
                                                            <strong>Email:</strong> ".utf8_decode($input_email)."<br />
                                                            
                                                        </fieldset>
                                                        
                                                        

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

                
            mysql_query("INSERT INTO emails (data,nome,email,categoria) VALUES (NOW(),'".$input_nome."','".$input_email."','1')")or die (mysql_error());
            
            if ($mail->Send()) {                

                $mensagem_resultado = '<script>swal("","Email cadastrado com sucesso!", "success");</script>'; 
                
                //print "<script language='javascript'>alert('Email cadastrado com sucesso');location.href='".$path."'</script>";        
            
            }else{
                $erro = 1;
                $mensagem_resultado = '<script>swal("","Erro ao enviar e-mail!", "error");</script>';
            }
            
        

    
}
}


// ####### banners_principais ######### 
$banners_principais = array();
$sql_banners_principais = "SELECT * FROM banners_principais WHERE status='1' ORDER BY ordem ASC LIMIT 4";
$sql_banners_principais = mysql_query($sql_banners_principais);
while($linha_banners_principais = mysql_fetch_assoc($sql_banners_principais)){
	$banners_principais[] = $linha_banners_principais;
}


// ######### a_empresa
$sql_institucional = "SELECT titulo_home,texto_home FROM a_empresa WHERE id='1'";
$institucional = mysql_fetch_assoc(mysql_query($sql_institucional));



// ######### servicos_texto
$sql_servicos_texto = "SELECT * FROM servicos_texto WHERE id='1'";
$servicos_texto = mysql_fetch_assoc(mysql_query($sql_servicos_texto));



// ######### SERVICOS
$servicos = array();
$sql_servicos = "SELECT id,titulo,subtitulo,imagem FROM servicos WHERE status='1' ORDER BY rand() LIMIT 4";
$sql_servicos = mysql_query($sql_servicos) or die (mysql_error());
while($linha_servicos = mysql_fetch_assoc($sql_servicos)){
	$servicos[] = $linha_servicos;
}


// ####### NOTICIAS ######### 
$noticias = array();
$sql_noticias = "SELECT id,data,titulo,subtitulo,texto,imagem FROM noticias WHERE status='1' ORDER BY data DESC,id DESC LIMIT 6";
$sql_noticias = mysql_query($sql_noticias);
while($linha_noticias = mysql_fetch_assoc($sql_noticias)){
	$noticias[] = $linha_noticias;
}


// ####### PARCEIROS ######### 
$parceiros_home = array();
$sql_parceiros_home = "SELECT id,titulo,arquivo,site FROM parceiros WHERE status='1' ORDER BY id DESC";
$sql_parceiros_home = mysql_query($sql_parceiros_home);
while($linha_parceiros_home = mysql_fetch_assoc($sql_parceiros_home)){
	$parceiros_home[] = $linha_parceiros_home;
}

$tpl->assign('parceiros_home',$parceiros_home);
$tpl->assign('servicos_texto',$servicos_texto);
$tpl->assign('institucional',$institucional);
$tpl->assign('servicos',$servicos);
$tpl->assign('noticias',$noticias);
$tpl->assign('banners_principais',$banners_principais);
$tpl->assign('parceiros',$parceiros);
$tpl->assign('mensagem_resultado', $mensagem_resultado);
$tpl->assign('erro', $erro);

$pagina = "paginas/main/main.tpl.php";

?>