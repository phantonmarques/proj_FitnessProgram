<html>
<body>
	<!-- ENVIA E-MAIL, FUNÇÃO MAIL() -->
	<?php
		$email = $POST_['email'];
		if($email == 'revolt_car@hotmail.com'){
		$to      = 'revolt_car@hotmail.com';
		$subject = 'Requisição de senha do usuário';
		$message = 'Seu usuário é: admin \n E sua senha é: admin' ;
		$headers = "From: '.$email .' \r\n";
		'Reply-To: revolt_car@hotmail.com' . "\r\n" ;
		'X-Mailer: PHP/' . phpversion();
		$envio = mail($to, $subject, $message, $headers);
		if($envio)
		{
			echo "Seus dados de usuário foram enviados para o email com sucesso!";
		}else {
			echo "Sua mensagem não foi enviada";
		}
		}else {
			echo "E-mail não cadastrado";
		}
	?>
	<!-- VOLTA A PAGINA INICIAL -->
	<form action="index.php" method="POST">
	<input type="submit" value="Inicio">
	</form>
</body>
</html>