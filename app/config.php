<?php 

	// banco de dados
	$servername = "gustav0meira.cloud";
	$username = "u868458939_easyrecruit";
	$password = "u868458939_easyrecruit";
	$dbname = "easyrecruit";

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
	    die("Falha na conexão: " . $conn->connect_error);
	}

?>