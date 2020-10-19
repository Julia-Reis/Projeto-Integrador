<?php

	session_start();
	
	if(!isset($_SESSION["usuario"]["permissao"])){
		if(basename($_SERVER['PHP_SELF'],'.php')=="lancamentos" || basename($_SERVER['PHP_SELF'],'.php')=="index" || basename($_SERVER['PHP_SELF'],'.php')!="cadastrarSe"){
			$_SESSION["usuario"]["permissao"] = 0;
		}
		else{
			header("location: login.php");
		}
	}
	else{
		if($_SESSION["usuario"]["permissao"] == 0){
			if(basename($_SERVER['PHP_SELF'],'.php')!="lancamentos" && basename($_SERVER['PHP_SELF'],'.php')!="index"){
				header("location: login.php");
			}
		}
	}



?>