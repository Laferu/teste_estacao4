<?php session_start(); ?>
<?php include "config/BD.class.php"; ?>
<?php
	$navi = $_SERVER['HTTP_USER_AGENT'];
	//if(strpos($navi, 'MSIE') == true){
		//$atual = (isset($_GET['pg'])) ? $_GET['pg'] : 'ie';
	//}
	//else{
		$atual = (isset($_GET['pg'])) ? $_GET['pg'] : 'home';
	//}
	$permissao = array('home', 'processos', 'erro');
	$pasta = 'include';
	$caminho = "http://localhost/teste_estacao4/";
	if(substr_count($atual, '/') > 0){
			$atual = explode('/', $atual);
			$pagina = (file_exists("{$pasta}/".$atual[0].'.php') && in_array($atual[0], $permissao)) ? $atual[0] : 'erro';
	}else{
			$pagina = (file_exists("{$pasta}/".$atual.'.php') && in_array($atual, $permissao)) ? $atual : 'erro';
			$id = 0;
	} ?>
<?php settype($_GET['id'], "int"); ?>
<?php include("{$pasta}/{$pagina}.php"); ?>