<?php

	session_start();
	
	// SÓ O ADMIM PODE INSERIR LANÇAMENTOS
	if($_SESSION["usuario"]["permissao"]=="1"){


	header("Content-Type: application/json");

	include "conexao.php";
	$id_lancamento = $_POST["id"];
	$nome = $_POST["nome"];
	$data = $_POST["data"];
	$id = $_POST["id"];

	$update = "UPDATE lancamentos SET nome='$nome', data='$data' WHERE id_lancamento='$id_lancamento'";

	$conexao->query($update);

	$select = "SELECT * FROM lancamento ORDER BY nome";

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