<!DOCTYPE html>
<html>
	<head>
		<title>Atualização de Cadastro</title>
	</head>
	<body>
		<?php 
			$redirecionar = "espacocliente.php";
			
			if($_POST['campNome'] != ""){
				$query = "UPDATE programloja set nome = '".$_POST['campNome']."', idade = '".$_POST['campDataNasc']."', genero = '".$_POST['campGenero']."', email = '".$_POST['campEmail']."', cidade = '".$_POST['campCidade']."', endereco = '".$_POST['campEndereco']."', altura = '".$_POST['campAltura']."', dtreino = '".$_POST['campDTreino']."', iac = '".$_POST['campIAC']."', objetivo = '".$_POST['campObj']."', peso = '".$_POST['campPeso']."' where nome = '".$_POST['campNome']."' and id = '".$_POST['campID']."' ";
				$conn = mysqli_connect("localhost", "root", "","programloja");
				echo $query;
				if (mysqli_query($conn,$query)) {
					echo "<script>alert('Usuário atualizado com sucesso!'); location.href='espacocliente.php';</script>";
				}else{
					echo "<script>alert('Erro, dados fornecidos não corretos, tente novamente!'); location.href='espacocliente.php';</script>";
				}
			}else{
				echo "<script>alert('Erro, dados fornecidos não corretos, tente novamente!'); location.href='espacocliente.php';</script>";
			}			
		?>  					
	</body>
</html>
