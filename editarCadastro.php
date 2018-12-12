<?php
	SESSION_START();
	$_SESSION["titulo"] = "Editar Cadastro";
	require 'cab.php';
	require 'connect.php';
?>

<html>
	<head>
		<title>Cadastro Aluno</title>
		<script>
			window.addEventListener("load", function () {
				var datnasc = document.getElementById("campDataNasc");
	 
				datnasc.addEventListener('change', function() {
					var campDataNasc = new Date(this.value);
					
					if (isDate_(this.value) && campDataNasc.getFullYear() > 1900)
						document.getElementById("campIdade").value = calculateAge(this.value) + " anos";
				});
			});
			
			document.addEventListener('DOMContentLoaded', function () {
				var datnasc = document.getElementById("campDataNasc").value;
	 			var campDataNasc = new Date(datnasc);
					
				if (isDate_(datnasc) && campDataNasc.getFullYear() > 1900)
					document.getElementById("campIdade").value = calculateAge(datnasc) + " anos";

			});

			function calculateAge(dobString) {
				var dob = new Date(dobString);
				var currentDate = new Date();
				var currentYear = currentDate.getFullYear();
				var birthdayThisYear = new Date(currentYear, dob.getMonth(), dob.getDate());
				var age = currentYear - dob.getFullYear();
				
				if (birthdayThisYear > currentDate) {
					age--;
				}
				return age;
			}

			function calcular(campDataNasc) {
				var campDataNasc = document.form.nascimento.value;
				var partes = campDataNasc.split("/");
				var junta = partes[2] + "-" + partes[1] + "-" + partes[0];
				document.form.campIdade.value = (calculateAge(junta));
			}

			var isDate_ = function(input) {
				var status = false;
	
				if (!input || input.length <= 0) {
					status = false;
				}else{
					var result = new Date(input);
					
					if (result == 'Invalid Date') {
						status = false;
					}else{
						status = true;
					}
				}
				return status;
			}
			
			function voltarPagina(){
				location.href='espacocliente.php';
			}
			
			function validarCampos(){
				if (formCadastro.campNome.value == ""){
					alert("Campos sem preenchimento, favor verifique!");
					formCadastro.campNome.focus();
					return false;
				}else if (formCadastro.campDataNasc.value == ""){
					alert("Campos sem preenchimento, favor verifique!");
					formCadastro.campDataNasc.focus();
					return false;
				}else if (formCadastro.campEmail.value == ""){
					alert("Campos sem preenchimento, favor verifique!");
					formCadastro.campEmail.focus();
					return false;
				}else if (formCadastro.campCidade.value == "Selecione"){
					alert("Selecione uma cidade!");
					formCadastro.campCidade.focus();
					return false;
				}else if (formCadastro.campEndereco.value == ""){
					alert("Campos sem preenchimento, favor verifique!");
					formCadastro.campEndereco.focus();
					return false;
				}else if (formCadastro.campPeso.value == ""){
					alert("Campos sem preenchimento, favor verifique!");
					formCadastro.campPeso.focus();
					return false;
				}else if (formCadastro.campAltura.value == ""){
					alert("Campos sem preenchimento, favor verifique!");
					formCadastro.campAltura.focus();
					return false;
				}else if (formCadastro.campDTreino.value == ""){
					alert("Campos sem preenchimento, favor verifique!");
					formCadastro.campDTreino.focus();
					return false;
				}else if (formCadastro.campIAC.value == ""){
					alert("Campos sem preenchimento, favor verifique!");
					formCadastro.campIAC.focus();
					return false;
				}else if (formCadastro.campObj.value == ""){
					alert("Campos sem preenchimento, favor verifique!");
					formCadastro.campObj.focus();
					return false;
				}else{
					formCadastro.submit();
				}
			}

		</script> 
		<style>
			.btn {
				border:none;
				color: white;
				background-color: black;
				padding:5px 16px;
				vertical-align:middle;
				cursor:pointer;
				float:right;
			}
			.btn:hover {
				background-color:gray;
			}
			
			div {
				width: 30%;
				padding: 10px;
			}
						
			fieldset {
				background-color:#F5F5F5;
				box-shadow: 1px 1px 1px 1px;
				border-radius:5px;
			}
			
			input {
				margin: 5px;
			}
			
			.campNome {
				width: 270px;
				margin-left: 26px;
			}
	
			.campDataNasc {
				width: 220px;
			}
			
			.campIdade {
				width: 270px;
				margin-left: 30px;
			}
			
			.campEmail {
				width: 270px;
				margin-left:22px;
			}
			
			.campCidade {
				width: 270px;
				margin-left: 20px;
			}
			
			.campEndereco {
				width: 270px;
			}
			
			.campPeso {
				width: 270px;
				margin-left: 35px;
			}
			
			.campAltura {
				width: 270px;
				margin-left: 25px;
			}
			
			.campDTreino {
				width: 236px;
			}
			
			.campIAC {
				width: 126px;
			}
			
			.campObj {
				width: 270px ;
				margin-left: 10px;
			}
			
			fieldset#fieldCadAluno {
				width:1020px;
				height:700px;
				margin: 0px auto;
				
			}
			
			fieldset#fieldInfAluno {
				width: 120%;
				margin-left:300px;
				
			}
			
			fieldset#fieldInfCad {
				width: 120%;
				margin-left:300px;
				
			}
			
			legend#legendCad {
				font-weight: bold;
				font-size: 30px;
				text-align: center;
			}
			
			input#botaoEnviar{
				margin-top:150px;
			}
			
			input#botaoVoltar {
				margin-right:10px;
				margin-top:98px;
			}
			
		</style>
	</head>
	<body>
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
				//CRIA E ATRIBUI VARIAVEIS
						$nomeAluno = $dados['nome'];
						$idadeAluno = $dados['idade'];
						$generoAluno = $dados['genero'];
						$emailAluno = $dados['email'];
						$cidadeAluno = $dados['cidade'];
						$enderecoAluno = $dados['endereco'];
						$pesoAluno = $dados['peso'];
						$alturaAluno = $dados['altura'];
						$objetivoAluno = $dados['objetivo'];
						$dTreinoAluno = $dados['dtreino'];
						$iacAluno = $dados['iac'];
				}
			}
			
			function verificarMasculino($generoAluno){
				if ($generoAluno == 'M'){
					echo "checked";
				}
			}
			
			function verificarFem($generoAluno){
				if ($generoAluno == 'F'){
					echo "checked";
				}
			}
		?>
		
		<!-- Formulário Cadastro de Alunos da Academia -->
		<fieldset id="fieldCadAluno">
			<legend id="legendCad">Cadastro Aluno</legend>
			<form name="formCadastro"action='validarEdicao.php' onsubmit="validarCampos(this); return false;" method='POST'>
				<table>
					<div id="infCad">
						<fieldset id="fieldInfCad">
							<legend><b>Informa&#231;&#245;es Pessoais</b></legend>
							<input type="hidden" name="campID" id="campID" value="<?php echo $idAluno ?>" />
							<label>Nome: </label> <input class="campNome" type="text" name="campNome" value="<?php echo $nomeAluno ?>" placeholder="Informe nome do aluno" /> <br>
							<label>Data Nascimento: </label> <input class="campDataNasc" type="date" name="campDataNasc" id="campDataNasc" value="<?php echo date("Y-m-d", strtotime($idadeAluno)) ?>" /> <br>
							<label>Idade: </label> <input class="campIdade" type="num" name="campIdade" id="campIdade" disabled /> <br>
							<label>G&ecirc;nero: </label> <input class="campGenero" type="radio" name="campGenero" value="M" <?php verificarMasculino($generoAluno); ?> /> Masculino
													<input class="campGenero" type="radio" name="campGenero" value="F" <?php verificarFem($generoAluno); ?> /> Feminino <br> 
							<label>E-mail: </label> <input class="campEmail" type="email" name="campEmail" value="<?php echo $emailAluno ?>" placeholder="Informe email" /> <br>
							<label>Cidade: </label> <select class="campCidade" name="campCidade">
														<option>Selecione</option>
														<option value="Araucaria" <?=($cidadeAluno == 'Araucaria')?'selected':'' ?> >Araucária</option>
														<option value="Colombo" <?=($cidadeAluno == 'Colombo')?'selected':'' ?> >Colombo</option>
														<option value="Curitiba" <?=($cidadeAluno == 'Curitiba')?'selected':'' ?> >Curitiba</option>
														<option value="Pinhais" <?=($cidadeAluno == 'Pinhais')?'selected':'' ?> >Pinhais</option>
													</select> <br>
							<label>Endere&#231;o: </label> <input class="campEndereco" type="text" name="campEndereco" value="<?php echo $enderecoAluno ?>" placeholder="Informe endereço do aluno" /> <br>
						</fieldset>
					</div>
					<div id="infAluno">
						<fieldset id="fieldInfAluno">
							<legend><b>Informa&#231;&#245;es Aluno</b></legend>
							<input name="seu_campo" type="hidden" id="seu_campo" value="id do user" />
							<label>Peso: </label> <input class="campPeso" type="number" min="1.00" max="500.99" step="0.01" name="campPeso" value="<?php echo $pesoAluno ?>" placeholder="Informe o peso" /> <br>
							<label>Altura: </label> <input class="campAltura" type="number" min="0.00" max="3.99" step="0.01" name="campAltura" value="<?php echo $alturaAluno ?>" placeholder="Informe a altura" /> <br>
							<label>Dias de Treino: </label> <input class="campDTreino" type="number" min="1" max="7" name="campDTreino" value="<?php echo $dTreinoAluno ?>" placeholder="Informe os dias de treino"/> <br>
							<label>Indice de Adiposidade Corporal: </label> <input class="campIAC" type="number" min="1.00" max="50.99" step="0.01" name="campIAC" value="<?php echo $iacAluno ?>" placeholder="Informe percentual gordura"/> <br>
							<label>Objetivo: </label> <input class="campObj" type="text" min="1" max="15" name="campObj" value="<?php echo $objetivoAluno ?>" placeholder="Informe o objetivo" /> <br>			
						</fieldset>
					</div>
				</table>

				<br>

				<input type="submit" id="botaoEnviar" class="btn" value="Enviar">

			</form>

			<!-- VOLTA AO INICIO DA PAGINA --><br><br>
			<input type="submit" id="botaoVoltar" class="btn" value="Voltar" onclick="voltarPagina()">
		</fieldset>
	</body>
</html>