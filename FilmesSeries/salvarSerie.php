<?php

	session_start();
	
	if($_SESSION["usuario"]["permissao"]=="1"){

	include "conexao.php";

	header("Content-Type: application/json");

	$nome = $_POST["nome"];
	$ano = $_POST["ano"];
	$genero = $_POST["genero"];
	$sinopse = $_POST["sinopse"];
	$classificacao = $_POST["classificacao"];
	$temporada = $_POST["temporada"];

	$insert = "INSERT INTO serie(nome,ano,genero,sinopse,classificacao,temporada) VALUES ('$nome','$ano','$genero','$sinopse', '$classificacao', '$temporada')";

	$conexao->query($insert);

	$select = "SELECT * FROM serie ORDER BY nome";

	$resultado = $conexao->query($select);

	foreach($resultado as $linha){
		$tabela[] = $linha;
	}
	
	$tabela['erro'] = 0;
	echo json_encode($tabela);
	}
	else{
		$tabela['erro'] = 1;
		echo json_encode($tabela);
	}
?>