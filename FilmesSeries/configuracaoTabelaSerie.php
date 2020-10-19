<?php
    $p = null;
    $p["cabecalho"] = array("Imagem","Nome", "Ano", "Genero", "Classificação", "Temporada", "Sinopse");

    include "conexao.php";

    $sql = "SELECT * FROM serie ORDER BY nome";

    $resultado = $conexao->query($sql);

    foreach($resultado as $linha){
        $p["dados"][]=$linha;
    }
	$p["nome"] = "serie";
?>