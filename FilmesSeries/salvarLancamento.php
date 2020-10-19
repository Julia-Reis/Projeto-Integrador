<?php
	
	session_start();
	
	if($_SESSION["usuario"]["permissao"]=="1"){

	include "conexao.php";

	header("Content-Type: application/json");
	
/*	
	$nome_arquivo = @date("Ymdhis").$_FILES["imagem"]["name"];
	$local = "img/img_upload/".$nome_arquivo;
	// tira o arquivo da pasta temporaria  para a pasta definitiva
	if(move_uploaded_file($_FILES["imagem"]["tmp_name"], $local)){
		$upload = true;
	}
	else{
		$upload = false;
	}
*/	
	
	
	$tipo = $_POST["tipo"];
	
	if($tipo == 'f'){
		
		$nome_arquivo = @date("Ymdhis").$_FILES["imagem_filme"]["name"];
		$local = "img/img_upload/".$nome_arquivo;
		// tira o arquivo da pasta temporaria  para a pasta definitiva
		if(move_uploaded_file($_FILES["imagem_filme"]["tmp_name"], $local)){
			$upload = true;
		}
		else{
			$upload = false;
		}
		$imagem = "<img src=\"img/img_upload/$nome_arquivo\" class=\"imagem\"/>";
		
		$duracao_temporada = $_POST["duracao_filme"];
		
		$nome = $_POST["nome_filme"];
		$genero = $_POST["genero_filme"];
		$sinopse = $_POST["sinopse_filme"];
		$classificacao = $_POST["classificacao_filme"];
		$data = $_POST["data_filme"];
	}
	else{
		
		$nome_arquivo = @date("Ymdhis").$_FILES["imagem_serie"]["name"];
		$local = "img/img_upload/".$nome_arquivo;
		// tira o arquivo da pasta temporaria  para a pasta definitiva
		if(move_uploaded_file($_FILES["imagem_serie"]["tmp_name"], $local)){
			$upload = true;
		}
		else{
			$upload = false;
		}
		$imagem = "<img src=\"img/img_upload/$nome_arquivo\" class=\"imagem\"/>";
		
		$duracao_temporada = $_POST["temporada_serie"];
		
		$nome = $_POST["nome_serie"];
		$genero = $_POST["genero_serie"];
		$sinopse = $_POST["sinopse_serie"];
		$classificacao = $_POST["classificacao_serie"];
		$data = $_POST["data_serie"];
	}
	$insert = "INSERT INTO lancamento(imagem,nome,data,duracao_temporada,genero,sinopse,classificacao,tipo)
			VALUES ('$imagem','$nome','$data','$duracao_temporada','$genero','$sinopse', '$classificacao', '$tipo')";
	
	
	
	$conexao->query($insert);

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