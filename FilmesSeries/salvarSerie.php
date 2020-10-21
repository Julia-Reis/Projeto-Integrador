<?php

	session_start();
	
	if($_SESSION["usuario"]["permissao"]=="1"){

	include "conexao.php";

	header("Content-Type: application/json");
	
	$nome_arquivo = @date("Ymdhis").$_FILES["foto"]["name"];
	$local = "img/img_upload/".$nome_arquivo;
	// tira o arquivo da pasta temporaria  para a pasta definitiva
	if(move_uploaded_file($_FILES["foto"]["tmp_name"], $local)){
		$upload = true;
	}
	else{
		$upload = false;
	}
	$foto = "<img src=\"img/img_upload/$nome_arquivo\" class=\"imagem\"/>";
	$nome = $_POST["nome"];
	$ano = $_POST["ano"];
	$genero = $_POST["genero"];
	$sinopse = $_POST["sinopse"];
	$classificacao = $_POST["classificacao"];
	$temporada = $_POST["temporada"];

	$insert = "INSERT INTO serie(foto,nome,ano,genero,sinopse,classificacao,temporada) VALUES ('$foto','$nome','$ano','$genero','$sinopse', '$classificacao', '$temporada')";

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