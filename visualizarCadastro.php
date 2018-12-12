<!DOCTYPE html>
<html>
	<head>
		<title>Visualizar Aluno</title>
		<script>
			function voltarPagina(){
				location.href='espacocliente.php';
			}
		</script>
		<style>
			.divInfAlunos {
				width:70%;
				background-color: #e9e9e9;
				margin: 0px auto;
				padding-left: 40px;
				padding-top: 20px;
				font-family: Arial, sans-serif;
				border-style: solid;
				border-left: 20px solid blue;
				border-radius: 10px;
				position: relative;
				overflow:hidden;
			}
			
			#legendaInf {
				text-align: center;
				font-family: Arial, sans-serif;
				font-size: 25px;
				padding-bottom: 40px;
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
			#divFundo {
				width: 100%;
				height: 100%;
			}
			
			#divFundo img{
				width: 100%;
				height: 150%;
				position:absolute;
				margin-top: -10px;
				margin-left: -10px;
				opacity:0.5;
			}
			
			body, html {
				width: 97%;
			}
		</style>
	</head>
	<body>
		<div id="divFundo">
			<img src="https://enotasgw.com.br/blog/wp-content/uploads/2018/07/softwares-para-academia.jpg" alt="" />
	
			<?php 
				//CONEXÃO BANCO DE DADOS
				$connection = mysqli_connect("localhost","root","", "programloja");
				//CONSULTAR BANCO
				$aux = mysqli_query($connection, "SELECT * FROM programloja");
				//CRIAR ATRIBUTO CAPTURANDO O ID ENVIADO PELO LINK
				$idAluno = $_GET['id'];	
				
				//OBTEM UMA LINHA DO RESULTADO COMO UMA MATRIZ ASSOCIATIVA, NUMÉRICA OU AMBAS.
				while($dado = $aux->fetch_array()){
					$dados[] = $dado;
				}		
				
				//PERCORRE A MATRIZ $dados 
				foreach ($dados as $dados){
					//ENCONTRA O INDICE SELECIONADO NO VISUALIZAR
					if ($dados['id'] == $idAluno){
						//INSERE AS INFORMAÇÕES NA TELA
						echo "<div class='divInfAlunos'>";
						echo "<legend id='legendaInf'>Informações Aluno</legend>";
						echo "Nome: ";
						echo $dados['nome'];
						echo "<br><br>";
						echo "Data Nascimento: ";
						echo $dados['idade'];
						echo "<br><br>";
						echo "Gênero: ";
						
						if ($dados['genero'] == 'M'){
							echo "Masculino";
						}else {
							echo "Feminino";
						}					
						
						echo "<br><br>";
						echo "E-mail: ";
						echo $dados['email'];
						echo "<br><br>";
						echo "Cidade: ";
						echo $dados['cidade'];
						echo "<br><br>";
						echo "Endereço: ";
						echo $dados['endereco'];
						echo "<br><br>";
						echo "Peso atual: ";
						echo $dados['peso'], "kg";
						echo "<br><br>";
						echo "Altura: ";
						echo $dados['altura'], "m";
						echo "<br><br>";
						echo "Objetivo: ";
						echo $dados['objetivo'];
						echo "<br><br>";
						echo "Dias de Treino: ";
						echo $dados['dtreino'], " dias por semana";
						echo "<br><br>";
						echo "Percentual de Gordura: ";
						echo $dados['iac'], "%";
						echo "<br><br><br><br>";
						echo "Dicas: ";
						echo "<br><br>";
					
						//CALCULO DIETA RECOMENDADA
						$iac = $dados['iac'];
						calcularPercentual($iac);
					
						echo "<br>";
					
						//CALCULO DE DIVISÃO DE TREINO DOS DIAS DA SEMANA
						$dtreino = $dados['dtreino'];
						calcularTreinoIdeal($dtreino);
					
						echo "<br>";
					
						//CALCULO IMC
						$peso = $dados['peso'];
						$altura = $dados['altura'];
						calcularIMC($peso, $altura);
					
						echo "<br><br><br>";
					
						echo "<input type='submit' value='Voltar' class='btn' onclick='voltarPagina();' />";
						echo "<br><br>";
					
						echo "</div>";	
					}
				}
			
				function calcularPercentual($iac){	
					if ($iac >= 12){
						echo "- Para esse percentual de gordura é recomendado uma dieta para definição corporal!";
					}else{
						echo "- Para esse percentual de gordura é recomendado uma dieta para hipertrofia!";				
					}
				}
			
				function calcularTreinoIdeal($dtreino){
					if ($dtreino == 6){
						echo "- A divisão ideal para quantidade de dias que irá treinar é ABCDEF ou ABCABC.";
					}else if ($dtreino == 5){
						echo "- A divisão ideal para quantidade de dias que irá treinar é ABCDE ou ABCAB (Na semana seguinte começa com CABCA e assim sucessivamente).";
					}else if ($dtreino == 4){
						echo "- A divisão ideal para quantidade de dias que irá treinar é ABCD ou ABCA (Na semana seguinte começa com BCAB e assim sucessivamente).";
					}else if ($dtreino == 3){
						echo "- A divisão ideal para quantidade de dias que irá treinar é ABC ou GVT (Treino de alta intensidade que promove a hipertrofia e força em apenas 3 dias de treino por semana.)";
					}else if ($dtreino == 2){
						echo "- A divisão ideal para quantidade de dias que irá treinar é AB.";
					}else if ($dtreino == 1){
						echo "- A divisão ideal para quantidade de dias que irá treinar é todos os musculos.";
					}else {
						echo "- Aluno precisa criar vergonha na cara e ir treinar!";
					}
				}
			
				function calcularIMC($peso, $altura){	
					$imc = $peso / ($altura*2);
				
					if ($imc < 17){
						echo "- Aluno está com o IMC muito abaixo do peso!";
					}else if ($imc > 16 && $imc < 18.50){
						echo "- Aluno está com o IMC abaixo do peso!";
					}else if ($imc > 18.49 && $imc < 25){
						echo "- Aluno está com o IMC com o peso ideal!";
					}else if ($imc > 24.99 && $imc < 30){
						echo "- Aluno está com o IMC um pouco acima do peso ideal!";
					}else if ($imc > 29.99 && $imc < 35){
						echo "- Aluno está com o IMC com o peso Obesidade I!";
					}else if ($imc > 34.99 && $imc < 40){
						echo "- Aluno está com o IMC com o peso Obesidade II (severa)!";
					}else {
						echo "- Aluno está com o IMC com o peso Obesidade III (mórbida)!";
					}
				}
			?>  
		</div>
	</body>
</html>

