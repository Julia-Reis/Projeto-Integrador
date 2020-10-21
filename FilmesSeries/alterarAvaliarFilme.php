<?php

	session_start();
	
	// SÓ O USUARIO PODE ALTERAR
	if($_SESSION["usuario"]["permissao"]=="2"){


	header("Content-Type: application/json");

	include "conexao.php";
		$cod_filme = $_POST["cod_filme"];
		$cod_usuario = $_SESSION["usuario"]["id_usuario"];
		$titulo = $_POST["titulo"];
		$nota = $_POST["nota"];
		$descricao = $_POST["descricao"];
		$spoiler = $_POST["spoiler"];

	
	
		$update = "UPDATE avaliacao_filme SET nome='$nome', nota='$nota', titulo='$titulo', descricao='$descricao', spoiler='$spoiler' WHERE id_avaliacao_filme='$id_avaliacao_filme'";
	}
	$conexao->query($update);

	$select = "SELECT * FROM avaliacao_filme ORDER BY nome";

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