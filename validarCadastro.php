<!DOCTYPE html>
<html>
	<head>
		<title>Confirmação Cadastro</title>
	</head>
	<body>
		<?php 
			$redirecionar = "espacocliente.php";
			
			if($_POST['campNome'] != ""){
				$query = "INSERT INTO programloja(nome, idade, genero, email, cidade, endereco, altura, dtreino, iac, objetivo, peso) VALUES ('".$_POST['campNome']."', '".$_POST['campDataNasc']."', '".$_POST['campGenero']."', '".$_POST['campEmail']."', '".$_POST['campCidade']."', '".$_POST['campEndereco']."', '".$_POST['campAltura']."', '".$_POST['campDTreino']."', '".$_POST['campIAC']."', '".$_POST['campObj']."', '".$_POST['campPeso']."')";
				$conn = mysqli_connect("localhost", "root", "","programloja");
        
				if (mysqli_query($conn,$query)) {
					echo "<script>alert('Usuário cadastrado com sucesso!'); location.href='espacocliente.php';</script>";
				}else{
					echo "<script>alert('Erro, dados fornecidos não corretos, tente novamente!'); location.href='espacocliente.php';</script>";
				}
			}else{
				echo "<script>alert('Erro, dados fornecidos não corretos, tente novamente!'); location.href='espacocliente.php';</script>";
			}			
		?>  					
	</body>
</html>
