<?php

    $sgbd = "mysql";
    $local = "localhost:3307";
    $nome_bd = "comentaai";
    $usuario = "root";
    $senha = "usbw";

    $conexao = new PDO("$sgbd:host=$local;dbname=$nome_bd;charset=utf8",$usuario,$senha);

?>