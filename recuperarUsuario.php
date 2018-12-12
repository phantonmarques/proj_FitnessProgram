<?php 
	SESSION_START();
	$_SESSION["titulo"] = "Recuperar Senha";
	require 'cab.php';
?>
<html>
	<head>
		<title>Recuperar senha</title>
		<style>
			input[type="submit"] {
				border:none;
				color: white;
				background-color: black;
				padding:8px 16px;
				vertical-align:middle;
				cursor:pointer;
				float:right;
			}
			input[type="submit"]:hover {
				background-color:gray;
			}
		</style>
		<script>
			function voltarPagina(){
				location.href='index.php';
			}
		</script>	
	</head>
	<body>
		<br><br><br><br><br><br><br><br><br><br><br><br>
		
		<!-- VAI PARA A FUNÇÃO PHP MAIL() -->
		
		<form action="enviarMail.php" method="POST">
			<table align='center'>
				<tr>
					<td>Email: <input type="email" name="user" placeholder="Informe e-mail cadastrado" value="<?php if(isset($_GET['email'])){ echo $_GET['email'];}?>"></td>
				</tr><tr>
					<td><input id="botaoEnviar" type="submit" value="Enviar"></td>
				</tr>
			</table>
		</form>
		
		<br><br><br><br><br><br><br>
		
		<!-- VOLTA AO INICIO DA PAGINA -->
		<input type="submit" id="botaoVoltar" value="Voltar" onclick="voltarPagina()">
	</body>
</html>