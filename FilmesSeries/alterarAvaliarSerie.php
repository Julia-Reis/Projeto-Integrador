<?php

	session_start();
	
	// SÓ O USUARIO PODE ALTERAR
	if($_SESSION["usuario"]["permissao"]=="2"){


	header("Content-Type: application/json");

	include "conexao.php";
	$id_avaliacao_serie = $_POST["id"];
	$nome = $_POST["nome"];
	$nota = $_POST["nota"];
	$titulo = $_POST["titulo"];
	$descricao = $_POST["descricao"];
	$spoiler = $_POST["spoiler"];

	$update = "UPDATE avaliacao_serie SET nome='$nome', nota='$nota', titulo='$titulo', descricao='$descricao', spoiler='$spoiler' WHERE id_avaliacao_serie='$id_avaliacao_serie'";

	$conexao->query($update);

	$select = "SELECT * FROM avaliacao_serie ORDER BY nome";

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