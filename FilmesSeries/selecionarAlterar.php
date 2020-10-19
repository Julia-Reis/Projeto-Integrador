<?php
	header("Content-Type: Application/json");
	include("conexao.php");

	$tabela = $_POST["tabela"];
	$id = $_POST["id"];

	$select = "SELECT * FROM $tabela WHERE id_$tabela='$id';";

	$resultado = $conexao->query($select);

	foreach($resultado as $i=>$l){
		$m[] = $l;
	}

	echo json_encode($m);

?>