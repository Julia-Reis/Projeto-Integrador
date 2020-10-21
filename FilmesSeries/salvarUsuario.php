<?php
	
	session_start();

	include "conexao.php";

	header("Content-Type: application/json");

	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$senha = $_POST["senha"];
	$permissao = 2;

	$insert = "INSERT INTO usuario(nome,email,senha,permissao) VALUES ('$nome','$email','$senha', '$permissao')";

	$conexao->query($insert);
	
	$select = "SELECT id_usuario, nome, email, permissao FROM usuario
                WHERE email=:email AND senha=:senha";
    
    $stmt = $conexao->prepare($select);

    $stmt->bindValue(":email",$email);
    $stmt->bindValue(":senha",$senha);

    $stmt->execute();

        $linha = $stmt->fetch();
        $_SESSION["usuario"]=$linha; 
        
        $tabela['erro'] = 0;
		echo json_encode($tabela);
?>