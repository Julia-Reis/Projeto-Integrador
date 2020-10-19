<?php
    header('Access-Control-Allow-Origin: *');
    header("Content-Type: application/json; charset=UTF-8");

    $id = $_POST["id"];
    
    // definições de host, database, usuário e senha
    $host = "localhost";
    $db   = "listaprafazer";
    $user = "root";
    $pass = "";
    // conecta ao banco de dados
    $conn = new mysqli($host, $user, $pass, $db); 
    $conn->set_charset("utf8");

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    } 

    // cria a instrução SQL que vai remover os dados
    $sql = "DELETE FROM tarefas WHERE id=$id";
    
    // executa a query
    $conn->query($sql);
    
    $conn->close();
?>