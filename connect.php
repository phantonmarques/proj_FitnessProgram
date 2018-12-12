<?php
	$conn = [
		'host' => 'localhost', 
		'user' => 'root', 
		'pass' => '', 
		'data' => 'programloja', 
	];

	$mysqli = new mysqli($conn['host'], $conn['user'], $conn['pass'], $conn['data']);
	
	if ($mysqli->connect_error) {
		die('Error de conexão (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
	}
?>

