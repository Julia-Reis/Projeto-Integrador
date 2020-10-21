<?php
    $p = null;
    $p["cabecalho"] = array("Imagem","Nome Lançamento", "Data", "Temporadas", "Genero", "Classificacao", "Sinopse");

    include "conexao.php";

    $sql = "SELECT id_lancamento, imagem, nome, data, duracao_temporada, genero, classificacao, sinopse  FROM lancamento WHERE tipo='s' ORDER BY nome";

    $resultado = $conexao->query($sql);

    foreach($resultado as $linha){
        $p["dados"][]=$linha;
    }
    $p["nome"] = "lancamento";
?>