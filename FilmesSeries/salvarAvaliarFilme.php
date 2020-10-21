<?php
	
	session_start();
	
	if($_SESSION["usuario"]["permissao"]=="2"){
	
		include "conexao.php";

		header("Content-Type: application/json");
		
		$cod_filme = $_POST["cod_filme"];
		$cod_usuario = $_SESSION["usuario"]["id_usuario"];
		$titulo = $_POST["titulo"];
		$nota = $_POST["nota"];
		$descricao = $_POST["descricao"];

		$insert = "INSERT INTO avaliacao_filme(cod_usuario,cod_filme,titulo,nota,descricao) VALUES ('$cod_usuario','$cod_filme','$titulo','$nota','$descricao')";

		$conexao->query($insert);

		$select = "SELECT * FROM view_avaliacao_filme ORDER BY filme";

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