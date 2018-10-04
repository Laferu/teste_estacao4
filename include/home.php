<?php header('Content-Type: text/html; charset=utf-8'); ?><!DOCTYPE html">
<html lang="pt-br" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit-no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" type="text/css" href="<?php echo $caminho; ?>plugins/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $caminho; ?>css/estilo.css" />
<title>Teste Estação 4</title>
</head>
<body>
	<head>
		<div class="container text-center mt-5">
			<h1>Teste Estação 4</h1>
		</div>
	</head>
	<div class="container text-center">
		<div class="row justify-content-center mt-5">
			<div class="col-sm-6">
				<h3>Produtos</h3>
				<div class="list-group">
					<a href="#" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#modalEditarProduto">
				Cras justo odio
					</a>
					<?php
						$stmte = $pdo->prepare("SELECT * FROM produtos ORDER BY nome");
						$executa = $stmte->execute();
						if($executa) {
							while($produto = $stmte->fetchObject()){
					?>
					<a href="#" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#modalEditarProduto<?php echo $produto->id; ?>"><?php echo $produto->nome; ?></a>
					<?php } } ?>
				</div>
			</div>
		</div>
		<div class="row mt-2">
			<div class="col-sm-12">
				<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalNovoProduto">Novo Produto</a>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modalNovoProduto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="row justify-content-center mt-5">
					<div class="col-sm-12 col-md-10 col-lg-10">
						<h3 class="text-center mb-3">Cadastrar Produto</h3>
						<form id="formNovoProduto" method="post" action="http://localhost/teste_estacao4/processos/formNovoProduto" enctype="multipart/form-data">
							<div class="form-row">
								<div class="form-group col-sm-12">
									<label for="inputNome">Nome</label><input type="text" class="form-control" id="inputNome" name="nome" placeholder="Nome" required="required" />
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-sm-12">
									<label for="inputDescricao">Descrição</label><textarea id="inputDescricao" class="form-control" name="descricao" placeholder="Descrição" rows="5" required="required"></textarea>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-sm-12">
									<label for="inputPreco">Preço</label><input type="text" class="form-control" id="inputPreco" name="preco" placeholder="Preço" required="required" />
								</div>
							</div>
							<div class="form-row text-right">
								<div class="col-sm-12">
									<button type="button" class="btn btn-secundary">Fechar</button>
									<button type="submit" class="btn btn-primary">Adicionar</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
		$stmte = $pdo->prepare("SELECT * FROM produtos ORDER BY nome");
		$executa = $stmte->execute();
		if($executa) {
			while($produto = $stmte->fetchObject()){
	?>
	<div class="modal fade modalEditarProduto" id="modalEditarProduto<?php echo $produto->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="row justify-content-center mt-5">
					<div class="col-sm-12 col-md-10 col-lg-10">
						<h3 class="text-center mb-3">Editar Produto</h3>
						<form class="formEditarProduto" id="formEditarProduto<?php echo $produto->id; ?>" method="post" action="http://localhost/teste_estacao4/processos/formEditarProduto" enctype="multipart/form-data">
							<div class="form-row">
								<input class="inputID d-none" name="id" value="<?php echo $produto->id; ?>">
								<div class="form-group col-sm-12">
									<label for="inputEditNome<?php echo $produto->id; ?>">Nome</label><input type="text" class="form-control inputNome" id="inputEditNome<?php echo $produto->id; ?>" name="nome" placeholder="Nome" value="<?php echo $produto->nome; ?>" required="required" />
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-sm-12">
									<label for="inputEditDescricao<?php echo $produto->id; ?>">Descrição</label><textarea id="inputEditDescricao<?php echo $produto->id; ?>" class="form-control inputDescricao" name="descricao" placeholder="Descrição" rows="5" required="required"><?php echo $produto->descricao; ?></textarea>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-sm-12">
									<label for="inputEditPreco">Preço</label><input type="text" class="form-control inputPreco" id="inputEditPreco<?php echo $produto->id; ?>" name="preco" placeholder="Preço" value="<?php echo $produto->preco; ?>" required="required" />
								</div>
							</div>
							<div class="form-row">
								<div class="col-sm-6">
									<button type="button" class="btn btn-danger buttonExcluirProduto" value="<?php echo $produto->id; ?>">Excluir</button>
								</div>
								<div class="col-sm-6 text-right">
									<button type="button" type="button" class="btn btn-secundary" data-dismiss="modal">Fechar</button>
									<button type="submit" type="submit" class="btn btn-primary">Editar</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } } ?>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo $caminho; ?>plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#formNovoProduto').submit(function(formNovoProduto){
		formNovoProduto.preventDefault();
		var nome = $('#inputNome').val();
		var descricao = $('#inputDescricao').val();
		var preco = $('#inputPreco').val();
		$.ajax({
    		data: {
    			nome: nome,
    			descricao: descricao,
    			preco: preco
    		},
    		type: 'POST',
    		url: 'http://localhost/teste_estacao4/processos/formNovoProduto'
			}).done(function(msg){
				alert('Ajax terminou de ser executado');
		});
	});

	$('.formEditarProduto').submit(function(formEditarProduto){
		formEditarProduto.preventDefault();
		var id = $('.inputID', this).val();
		var nome = $('.inputNome', this).val();
		var descricao = $('.inputDescricao', this).val();
		var preco = $('.inputPreco', this).val();
		$.ajax({
    		data: {
    			id: id,
    			nome: nome,
    			descricao: descricao,
    			preco: preco
    		},
    		type: 'POST',
    		url: 'http://localhost/teste_estacao4/processos/formEditarProduto'
			}).done(function(msg){
				alert('Ajax terminou de ser executado');
		});
	});
	$('.buttonExcluirProduto').click(function(buttonExcluirProduto){
		buttonExcluirProduto.preventDefault();
		var id = $(this).val();
		$.ajax({
    		data: {
    			id: id
    		},
    		type: 'POST',
    		url: 'http://localhost/teste_estacao4/processos/formExcluirProduto'
			}).done(function(msg){
				alert('Ajax terminou de ser executado');
		});
	});
});
</script>
</body>
</html>