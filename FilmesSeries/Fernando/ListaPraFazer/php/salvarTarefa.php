<?php
    header('Access-Control-Allow-Origin: *');
    header("Content-Type: application/json; charset=UTF-8");

    $id = $_POST["id"];
    $texto = $_POST["descricao"];
    $status = $_POST["status"];
    $data = $_POST["data"];
    $id_usuario = $_POST["id_usuario"];

    $dataFormat = $date = date("Y-m-d H:i:s",strtotime(str_replace('/','-',$data)));
        
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
    if($id == 0){
        $sql = "INSERT INTO tarefas (texto, status, data, id_usuario) VALUES 
            ('$texto', $status, '$dataFormat', $id_usuario)";
    }else{
        $sql = "UPDATE tarefas SET texto='$texto', status=$status, data='$dataFormat' WHERE id=$id";
    }
    
    // executa a query
    $conn->query($sql);
    
    $conn->close();
    
    header("Location: listaprafazer.php");
?>