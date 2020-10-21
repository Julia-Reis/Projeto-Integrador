<?php

$p["id"] = "Usuario";
$p["titulo"] = "Usuario";

// SELECIONA A IMAGEM DO FILM
$p["divRow"][0] = '
		 <div class="card-body">
			<img id="foto_login" src="img/logo.png">
			<legend id="legenda">Cadastre-Se</legend>	  
			<div class="form-group">
				<label>Nome </label>
				<input type="text" class="form-control" name="nome_cadastro" id="nome_cadastro" placeholder="Nome...">
			</div>
';

// EMAIL
$p["divRow"][1] = '
		<div class="form-group">
			<label>Email</label>
			<input type="email" class="form-control" name="email_cadastro" id="email_cadastro" placeholder="Email">
		</div>
';

// SENHA
$p["divRow"][2] = '
	<div class="form-group">
		<label>Senha</label>
		<input type="password" class="form-control" name="senha_cadastro" id="senha_cadastro">
	</div>
</div>
';
?>