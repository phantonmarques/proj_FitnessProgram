<?php
	SESSION_START();
	$_SESSION["titulo"] = "Fitness Program";  echo "<input type='submit' class='btn' id='btnLogout' value='Logout' onclick='logoutRedirecionar()' />";
	require 'cab.php';
	require 'connect.php';
?>
<html>
	<head>
		<title>Pagina Inicial</title>
		<script> 
			function logoutRedirecionar(){
				location.href="index.php";
			}
		</script>
		<style>
			table, th, td {
				padding: 5px;
			}
			.tdTable {
				height: 50px;
				width: 25%
			}
			tr:nth-child(even) {
				background-color: #E8E8E8;
			}
			.tdlink:hover {
				background-color: gray;
				border: 1px solid black;
				text-decoration:none;
			}
			a:link {
				text-decoration:none;
				color: black;
			}
			.tdInicial {
				background-color: gray;
				height: 50px;
				width: 30%
			}
			.btn {
				border:none;
				color: white;
				background-color: black;
				padding:8px 16px;
				vertical-align:middle;
				cursor:pointer;
				float:right;
			}
			.btn:hover {
				background-color:gray;
			}
			
		</style>
	</head>
	<body>
		<?php 
			$connection = mysqli_connect("localhost","root","", "programloja");
			$aux = mysqli_query($connection, "SELECT * FROM programloja");
			$n = mysqli_num_rows($aux);

			if ($n > 0){
				echo "<div>";
				echo "<table align='center'>";
				echo "<tr class='tdInicial'><td>Identificador</td><td>Nome</td><td>Data Nascimento</td><td>E-mail</td></tr>";
				
				while($dado = $aux->fetch_array()){
					$dados[] = $dado;
				}		
				
				//POPULA A TABLE COM OS DADOS CRIADOS NO BANCO
				foreach ($dados as $dados){
					echo "<tr>";
					echo "<td class='tdTable'>".$dados['id']."</td>";
					echo "<td class='tdTable'>".$dados['nome']."</td>";
					echo "<td class='tdTable'>".$dados['idade']."</td>";
					echo "<td class='tdTable'>".$dados['email']."</td>";
					echo "<td class='tdLink'><a href=".'visualizarCadastro.php?id='.$dados['id'].">Visualizar</a></td>";
					echo "<td class='tdLink'><a href=".'editarCadastro.php?id='.$dados['id'].">Editar</a></td>";
					echo "<td class='tdLink'><a href=".'apagarCadastro.php?id='.$dados['id'].">Apagar</a></td>";
					echo "</tr>";
				}
			}else{
				echo "Nenhum dado salvo ainda!!!<br />";
			}
			echo "</table>";
			echo "</div>";
			
			//BOTÃO PARA CADASTRAR ALUNOS
			echo "<div>";
			echo "<form action='cadastro.php' method='GET'>"; 
			echo "<input type='submit' class='btn' id='btnCadastrar' value='Cadastrar Cliente'>";
			echo "</form>";
			echo "</div>";
		
			//ENCERRA CONSULTA
			$aux->close();
		
			//ENCERRA CONEXÃO
			$mysqli->close();
		?>
		
		<!-- PULA LINHA -->
		<br>

	</body>
</html>
	