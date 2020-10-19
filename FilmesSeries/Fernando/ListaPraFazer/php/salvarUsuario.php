<?php
    header('Access-Control-Allow-Origin: *');
    header("Content-Type: application/json; charset=UTF-8");

    $nome = $_POST["nome"];
    $nome_usuario = $_POST["nome_usuario"];
    $senha = $_POST["senha"];
    $email = $_POST["email"];
        
    // definições de host, database, usuário e senha
    $host = "localhost:3307";
    $db   = "listaprafazer";
    $user = "root";
    $pass = "usbw";
	
    // conecta ao banco de dados
    $conn = new mysqli($host, $user, $pass, $db); 
    $conn->set_charset("utf8");

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    } 

    // cria a instrução SQL que vai inserir os dados
    $sql = "INSERT INTO usuarios (usuario, senha, nome, email) VALUES 
            ('$nome_usuario', '$senha', '$nome', '$email')";
    
    // executa a query
    $conn->query($sql);
    
    $conn->close();
    
    header("Location: ../login.html");
?>