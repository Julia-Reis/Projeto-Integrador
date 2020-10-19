<?php

	session_start();
	
	// SÓ O ADMIM PODE ALTERAR
	if($_SESSION["usuario"]["permissao"]=="1"){


	header("Content-Type: application/json");

	include "conexao.php";
	$id_serie = $_POST["id"];
	$nome = $_POST["nome"];
	$ano = $_POST["ano"];
	$genero = $_POST["genero"];
	$sinopse = $_POST["sinopse"];
	$classificacao = $_POST["classificacao"];
	$temporada	= $_POST["temporada"];

	$update = "UPDATE serie SET nome='$nome', ano='$ano', genero='$genero', sinopse='$sinopse', classificacao='$classificacao', temporada='$temporada' WHERE id_serie='$id_serie'";

	$conexao->query($update);

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