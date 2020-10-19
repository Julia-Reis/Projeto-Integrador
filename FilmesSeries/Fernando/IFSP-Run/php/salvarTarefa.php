<?php
    header('Access-Control-Allow-Origin: *');
    header("Content-Type: application/json; charset=UTF-8");

    $id = $_POST["id"];
    $quilometro = $_POST["quilometro"];
    $duracao = $_POST["duracao"];
    $caloria = $_POST["caloria"];
    $id_usuario = $_POST["id_usuario"];
        
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

    // cria a instrução SQL que vai inserir os dados
    if($id == 0){
        $sql = "INSERT INTO corridas (quilometro, duracao, caloria, id_usuario) VALUES 
            ('$quilometro', $duracao, '$caloria', '$id_usuario')";
    }else{
        $sql = "UPDATE corridas SET quilometro='$quilometro', duracao=$duracao, caloria='$caloria' WHERE id=$id";
    }
    
    // executa a query
    $conn->query($sql);
    
    $conn->close();
    
    header("Location: listaprafazer.php");
?>