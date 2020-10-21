<?php
    $p = null;
    $p["cabecalho"] = array( "Usuario", "Imagem", "Filme", "Nota", "Titulo", "Descrição");

    include "conexao.php";

    $sql = "SELECT * FROM view_avaliacao_filme ORDER BY filme";

    $resultado = $conexao->query($sql);

    foreach($resultado as $linha){
        $p["dados"][]=$linha;
    }
    $p["nome"] = "Avaliacao_Filme";
?>