<?php
if($atual[1] == "formNovoProduto"){
	$nome = utf8_decode($_POST["nome"]);
	$descricao = utf8_decode($_POST["descricao"]);
	$preco = $_POST["preco"];
	$stmte = $pdo->prepare("INSERT INTO produtos(nome, descricao, preco) VALUES(?, ?, ?)");
	$stmte->bindParam(1, $nome, PDO::PARAM_STR);
	$stmte->bindParam(2, $descricao, PDO::PARAM_STR);
	$stmte->bindParam(3, $preco, PDO::PARAM_STR);
	$executa = $stmte->execute();
	if($executa) {
		echo "Item cadastrado com sucesso!";
	}else{
		echo "Erro";

	}
}
if($atual[1] == "formEditarProduto"){
	$id = $_POST["id"];
	$nome = utf8_decode($_POST["nome"]);
	$descricao = utf8_decode($_POST["descricao"]);
	$preco = $_POST["preco"];
	$stmte = $pdo->prepare("UPDATE produtos SET nome='".$nome."', descricao='".$descricao."', preco='".$preco."' WHERE id='".$id."'");
	$executa = $stmte->execute();
	if($executa) {
		echo "Item editado com sucesso!";
	}
}

if($atual[1] == "formExcluirProduto"){
	$id = $_POST["id"];
	$stmte = $pdo->prepare("DELETE FROM produtos WHERE id=?");
	$stmte->bindParam(1, $id, PDO::PARAM_INT);
	$executa = $stmte->execute();
	if($executa) {
			echo "Item xcluído com sucesso!";
	}
}
?>