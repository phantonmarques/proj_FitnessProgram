<!DOCTYPE html>
<html>
	<head>
		<title>Exclusão de Usuários</title>
	</head>
	<body>
		<?php 
			$redirecionar = "espacocliente.php";
			  
			if($_GET['id'] != "" && $_GET['id'] != null){
				$query = "DELETE FROM programloja WHERE id = ".$_GET['id']."";
				$conn = mysqli_connect("localhost","root","","programloja");
				
				if (mysqli_query($conn,$query)) {
					echo "<script>alert('Usuário deletado com sucesso!'); location.href='espacocliente.php';</script>";
				}else{
					echo "<script>alert('Erro, id não cadastrada ou inexistente!'); location.href='espacocliente.php';</script>";
				}
			}else{
				echo "<script>alert('Erro, id não cadastrada ou inexistente!'); location.href='espacocliente.php';</script>";
			}
		?>
	</body>
 </html>