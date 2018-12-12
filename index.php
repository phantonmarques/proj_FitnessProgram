<?php
	SESSION_START();
	$_SESSION["titulo"] = "Fitness Program";
	require 'cab.php';
	setcookie("Data", time(), time()+36000);
?>

<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Program Fitness</title>
		<style>
			#botaoLogin {
				border:none;
				color: white;
				background-color: black;
				padding:8px 16px;
				vertical-align:middle;
				cursor:pointer;
			}
			#botaoLogin:hover {
				background-color:gray;
			}
		</style>
	</head>
	<body>
	<br><br><br><br><br><br><br><br><br><br><br><br>
	<!-- ENVIA PARA A PAGINA DE USUÁRIO -->
	<form action="verificarLogin.php" method="POST">
	<table align='center'>
		<th></th>
			<tr>
			<td>Usu&aacute;rio: </td>
			<td><input type="text" name="user" placeholder="Informe seu usu&aacute;rio" value="<?php if(isset($_GET['user'])){ echo $_GET['user'];}?>"></td>
			</tr><tr>
			<td>Senha: </td>
			<td><input type="password" name="password" placeholder="Informe seu senha" value="<?php if(isset($_GET['password'])){ echo $_GET['password'];}?>"> </td>
			</tr>
			<!-- VAI PARA A PAGINA DE RECUPERAÇÃO DE SENHA -->
			<td><a href="recuperarUsuario.php">Esqueceu sua senha?</a></td>
			<tr></tr>
			<td><input type="submit" id="botaoLogin" name="botaoLogin" value="Login"></td>
		<th></th>
	</table>
	</form>
</body>
</html>

	