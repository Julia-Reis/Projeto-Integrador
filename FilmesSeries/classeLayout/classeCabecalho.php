<?php
    class Cabecalho{

        private $logo;
        private $alt_logo;
        private $links;

        public function __construct($parametros){
            $this->logo = $parametros["logo"];
            $this->alt_logo = $parametros["alt_logo"];
            $this->links = $parametros["links"];
        }

        public function exibe(){
			if(basename($_SERVER['PHP_SELF'],'.php')!="login"){
				include "validacaoUsuario.php";
			}
            echo '
			<!DOCTYPE html>
				<html lang="pt-BR">
				<head>
					<meta charset="utf-8">
					<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
					<!-- Bootstrap CSS -->
					<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
					<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
					<link rel="stylesheet" href="css/css.css">
					<link rel="shortcut icon" type="image/png" href="img/favicon.png">
					<title>Assistiu? Comentou!</title>
				</head>
				<body id="fundo">
				<div class="container">
				<nav class="navbar navbar-expand-lg navbar-dark">
				  <a class="navbar-brand" href="index.php"><img id="logo" src="'.$this->logo.'" alt="'.$this->alt_logo.'"></a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				  </button>
						<div class="collapse navbar-collapse" id="menu">
                        <ul class="navbar-nav">
						';
                        if(basename($_SERVER['PHP_SELF'],'.php')!="login"){
                         
                            foreach($this->links as $i=>$l){
                                echo '<li class="nav-item">
                                        <a class="nav-link" href="'.$l["link"].'">'.
                                        $l["label"]
                                        .'</a>
                                     </li>';
                            }  
							if($_SESSION["usuario"]["permissao"] == 0){
								echo '
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										  Entrar
										</a>
										<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										  <a class="dropdown-item" href="login.php">Login</a>
										  <a class="dropdown-item" href="cadastrarSe.php">Cadastre-Se</a>
										</div>
									 </li>
							';
							}
							else{
								echo '
										<li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											  Meu Perfil
											</a>
											<div class="dropdown-menu" aria-labelledby="navbarDropdown">
												<span class="dropdown-item"><b>Bem vind@, '.$_SESSION["usuario"]["nome"].'</b></span>
											  <a class="dropdown-item" href="#">Alterar dados</a>
											  <a class="dropdown-item" href="logout.php">Sair</a>
											</div>
										 </li>
								';
							}
						}      
                    echo '</ul> 
                    </div>
                </nav>';
        }

    }
?>