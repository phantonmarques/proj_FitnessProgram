<html>
<body>
	<!-- ENVIA E-MAIL, FUN��O MAIL() -->
	<?php
		$email = $POST_['email'];
		if($email == 'revolt_car@hotmail.com'){
		$to      = 'revolt_car@hotmail.com';
		$subject = 'Requisi��o de senha do usu�rio';
		$message = 'Seu usu�rio �: admin \n E sua senha �: admin' ;
		$headers = "From: '.$email .' \r\n";
		'Reply-To: revolt_car@hotmail.com' . "\r\n" ;
		'X-Mailer: PHP/' . phpversion();
		$envio = mail($to, $subject, $message, $headers);
		if($envio)
		{
			echo "Seus dados de usu�rio foram enviados para o email com sucesso!";
		}else {
			echo "Sua mensagem n�o foi enviada";
		}
		}else {
			echo "E-mail n�o cadastrado";
		}
	?>
	<!-- VOLTA A PAGINA INICIAL -->
	<form action="index.php" method="POST">
	<input type="submit" value="Inicio">
	</form>
</body>
</html>