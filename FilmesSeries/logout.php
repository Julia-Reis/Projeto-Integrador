<?php

	session_start();

	session_destroy();

	//unset($_SESSION["permissao"]);

	header("location: login.php");

?>