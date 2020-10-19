<?php
    header('Access-Control-Allow-Origin: *');
    header("Content-Type: application/json; charset=UTF-8");

    if(isset($_POST['query'])){
        $keyword = strval($_POST['query']);
    }

    if(isset($_GET['query'])){
        $keyword = strval($_GET['query']);
    }

    $search_param = "%$keyword%";
    
    if(isset($_POST['id_usuario'])){
        $id_usuario = $_POST["id_usuario"];
    }
    
    if(isset($_GET['id_usuario'])){
        $id_usuario = $_GET["id_usuario"];
    }

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
    
    if(isset($_POST['id_usuario'])){
        $sql = "SELECT * FROM corridas WHERE id_usuario=$id_usuario 
            and quilometro LIKE \"$search_param\"";		
        $result = $conn->query($sql);
        if($result){
            $outp = array();
            $outp = $result->fetch_all(MYSQLI_ASSOC);
            if (sizeof($outp) > 0) {
                foreach($outp as $row) {
                    $texto[] = $row["quilometro"];
                }
                echo json_encode($texto);
            }
        }
    }
    
    if(isset($_GET['id_usuario'])){
        $sql = "SELECT * FROM corridas WHERE id_usuario=$id_usuario and quilometro LIKE \"$search_param\"";		
        $result = $conn->query($sql);
        
        $outp = array();
        $outp = $result->fetch_all(MYSQLI_ASSOC);

        echo json_encode($outp);
    }



	$conn->close();
    
?>