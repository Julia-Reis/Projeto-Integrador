<?php
	include "conexao.php";
	
	$id_temporada = $_POST["id_temporada"];
	
	$select = 'SELECT quantidade from temporada where id_temporada = $id_temporada';
	
	$resultado=$conexao->query($select);
	
	foreach($resultado as $linha){
		$temporada = $linha["quantidade"];
	}
	
	echo $temporada;
?>