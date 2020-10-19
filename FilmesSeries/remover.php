<?php
    include "conexao.php";

    $tabela = $_POST["tabela"];
    $valor = $_POST["id"];
                   
    $delete = "DELETE FROM $tabela WHERE id_$tabela='$valor'";

    $conexao->query($delete);

    echo "1";
?>