<?php

	session_start();
	
	// SÓ O ADMIM PODE ALTERAR
	if($_SESSION["usuario"]["permissao"]=="1"){

	header("Content-Type: application/json");

	include "conexao.php";
	$id_filme = $_POST["id"];
	$nome = $_POST["nome"];
	$ano = $_POST["ano"];
	$duracao = $_POST["duracao"];
	$genero = $_POST["genero"];
	$sinopse = $_POST["sinopse"];
	$classificacao = $_POST["classificacao"];

	$update = "UPDATE filme SET nome='$nome', ano='$ano', duracao='$duracao', genero='$genero', sinopse='$sinopse', classificacao='$classificacao' WHERE id_filme='$id_filme'";

	$conexao->query($update);

	$select = "SELECT * FROM filme ORDER BY nome";

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