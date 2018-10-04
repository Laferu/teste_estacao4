<?php
	$pdo = new PDO("mysql:host=localhost;dbname=teste_estacao4", "root", "");
	if(!$pdo) {
		die("Erro ao criar a conexão");
	}
?>