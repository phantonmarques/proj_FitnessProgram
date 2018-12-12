<!-- COOKIE PARA REGISTRAR A DATA E A HORA.-->
<?php
	echo '<H2>'.$_SESSION['titulo'].'</H2>';
	date_default_timezone_set('America/Sao_Paulo');
	if (isset($_COOKIE["Data"])){
		echo "Seu ultimo acesso foi em ".date('d.m.Y H:i:s', $_COOKIE["Data"])."<hr>";
	} else
		echo 'Nao ha registro de acesso anterior.<br/><hr>';
?>