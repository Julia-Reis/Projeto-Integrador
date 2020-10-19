<?php
    $p = null;
    $p["cabecalho"] = array("Nome do Usuario","Nome Filme/Série", "Nota", "Titulo","Resenha");

    include "conexao.php";

    $sql = "SELECT * FROM avaliacao_filme ORDER BY nome";

    $resultado = $conexao->query($sql);

    foreach($resultado as $linha){
        $p["dados"][]=$linha;
    }
?>