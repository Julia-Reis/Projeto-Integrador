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
		$spoiler = $_POST["spoiler"];

		$insert = "INSERT INTO avaliacao_filme(cod_usuario,cod_filme,titulo,nota,descricao,spoiler) VALUES ('$cod_usuario','$cod_filme','$titulo','$nota','$descricao','$spoiler')";

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