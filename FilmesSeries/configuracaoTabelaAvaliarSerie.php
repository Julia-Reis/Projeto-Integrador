<?php
    $p = null;
    $p["cabecalho"] = array("Usuario", "Imagem", "Serie", "Titulo", "Temporada", "Nota", "Descrição", "Spoiler");

    include "conexao.php";

    $sql = "SELECT * FROM view_avaliacao_serie ORDER BY serie";

    $resultado = $conexao->query($sql);

    foreach($resultado as $linha){
        $p["dados"][]=$linha;
    }
    $p["nome"] = "Avaliacao_Serie";
?>