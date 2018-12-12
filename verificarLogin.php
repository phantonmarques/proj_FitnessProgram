<!-- FUNÇÃO EM PHP PARA VALIDAR O LOGIN, SE ESTIVER CERTO REDIRECIONA
SE CASO ESTIVER ERRADO, VOLTA A PAGINA DE LOGON -->
<?php 
	$user = $_POST['user'];
	$password = $_POST['password'];
	
	if($user == 'admin' && $password == 'admin'){
		echo "<script>alert('Voc\u00ea ser\u00e1 redirecionado para o espa\u00e7o cliente em instantes...'); location.href='espacocliente.php';</script>";
	}else {
		echo "<script>alert('Usu\u00e1rio ou senha incorretas!'); location.href='index.php';</script>";
	}
?>
