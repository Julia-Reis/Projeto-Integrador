<?php
    $p = null;
    $p["cabecalho"] = array("Imagem", "Usuario", "Filme", "Nota", "Titulo", "Descrição", "Spoiler");

    include "conexao.php";

    $sql = "SELECT * FROM view_avaliacao_filme ORDER BY filme";

    $resultado = $conexao->query($sql);

    foreach($resultado as $linha){
        $p["dados"][]=$linha;
    }
    $p["nome"] = "AvaliacaoFilme";
?>