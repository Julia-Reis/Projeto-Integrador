<?php
	
	session_start();
	
	if($_SESSION["usuario"]["permissao"]=="2" ){ // A PERMISSÃO == 2 PQ SÓ O USUARIO TEM ACESSO A ELA
	
		include "conexao.php";

		header("Content-Type: application/json");
		
		$cod_serie = $_POST["serie"];
		$cod_usuario = $_SESSION["usuario"]["id_usuario"];
		$temporada = $_POST["temporada"]; // AINDA NÃO TEM A COLUNA TEMPORADA NO BANCO DE DADOS
		$titulo = $_POST["titulo"];
		$nota = $_POST["nota"];
		$descricao = $_POST["descricao"];

		$insert = "INSERT INTO avaliacao_serie(cod_serie,cod_usuario,titulo,nota,descricao) VALUES ('$cod_serie','$cod_usuario', '$titulo','$nota','$temporada', '$descricao')";

		$conexao->query($insert);

		$select = "SELECT * FROM view_avaliacao_serie ORDER BY serie";

		$resultado = $conexao->query($select);

		foreach($resultado as $linha){
			$tabela[] = $linha;
		}

		$tabela['erro'] = 0;
		echo json_encode($tabela);
		
	}else{
		$tabela['erro'] = 1;
		echo json_encode($tabela);
	}
?>