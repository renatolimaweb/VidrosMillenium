<?php
// Passando os dados obtidos pelo formulário para as variáveis abaixo
$nomeremetente     = $_POST['name'];
$emailremetente    = trim($_POST['email']);
$emaildestinatario = trim($_POST['email_destinatario']);
// Digite seu e-mail aqui, lembrando que o e-mail deve estar em seu servidor web
$assunto           = $_POST['subject'];
$mensagem          = $_POST['message'];

/* Montando a mensagem a ser enviada no corpo do e-mail. */
$mensagemHTML = '
<strong>Formulário de Contato</strong> 
<p>
<b>Nome:</b> '.$nomeremetente.'<br>
<b>E-Mail:</b> '.$emailremetente.'<br>
<b>Assunto:</b> '.$assunto.'<br>
<b>Mensagem:</b> '.$mensagem.'</p>
<hr>';

// O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
// O return-path deve ser ser o mesmo e-mail do remetente.
$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "From: $emailremetente\r\n";
// remetente
$headers .= "Return-Path: $emaildestinatario \r\n";
// return-path
$envio = mail($emaildestinatario, $assunto, $mensagemHTML, $headers);
if($envio){ ?>
	<SCRIPT language="JavaScript">
		alert("Mensagem enviada com sucesso!");
		location.href="contact.php";
	</script>
<? } else { ?>
	<SCRIPT language="JavaScript">
		alert("Ocorreu um erro ao enviar a mensagem");
		location.href="contact.php";
	</script>
<? } ?>