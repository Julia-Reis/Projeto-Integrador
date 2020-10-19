<?php
    $p = null;
    $p["cabecalho"] = array("Imagem", "Nome", "Ano", "Duracao(min)", "Genero", "Classificação", "Sinopse");

    include "conexao.php";

    $sql = "SELECT id_filme, foto, nome, ano, duracao, genero, classificacao, sinopse FROM filme ORDER BY nome";

    $resultado = $conexao->query($sql);

    foreach($resultado as $linha){
        $p["dados"][]=$linha;
    }
	
	$p["nome"] = "filme";
?>