<?php
    header('Access-Control-Allow-Origin: *');
    header("Content-Type: application/json; charset=UTF-8");

    // recupera usuario da requisicao
    $id_usuario = $_GET["id_usuario"];
    
    // definições de host, database, usuário e senha
    $host = "localhost:3307";
    $db   = "run";
    $user = "root";
    $pass = "usbw";
	
    // conecta ao banco de dados
    $conn = new mysqli($host, $user, $pass, $db); 
    $conn->set_charset("utf8");

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    } 

    // cria a instrução SQL que vai selecionar os dados
    $sql = "SELECT * FROM corridas WHERE id_usuario=$id_usuario";
	
    // executa a query
    $result = $conn->query($sql);
    
    $outp = array();
    $outp = $result->fetch_all(MYSQLI_ASSOC);

    echo json_encode($outp);
    
    $conn->close();
    
?>