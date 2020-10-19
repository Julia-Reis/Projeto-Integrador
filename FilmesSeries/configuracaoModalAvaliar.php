<?php

$p["id"] = "Avaliar";
$p["titulo"] = "Avaliar";

// SELECIONA FILME OU SERIE
$p["divRow"][0] = '
	<div class="row">
		<div class="form-group col-sm-8 col-8">
			<img id="foto_login" src="img/logo.png">
				<legend>Avaliar</legend>
					<select name="opcao" class="custom-select">
						<option selected>Filme ou Série?</option>
						<option value="1">Filme</option>
						<option value="2">Série</option>
					</select>
		</div>
	</div>
';

// SELECIONA O NOME DA SÉRIE OU DO FILME
$p["divRow"][1] = '
	<div class="row">
		<div class="form-group col-sm-8 col-8">
			<select name="nome_filme_serie" class="custom-select">
				<option>Nome do Filme/Serie</option>
				<option selected>TEM QUE FAZER UMA CONEXAO COM O BANCO DE DADOS,
				ARQUIVO configuracaoModalAvaliar.php</option>
			</select>
		</div>
	</div>';

// TITULO DA RESENHA
$p["divRow"][2] = '
	<div class="row">
		<div class="form-group col-sm-8 col-8">
			<label>Título</label>
			<input type="text" class="form-control" id="" placeholder="Titulo da resenha">
		</div>
	</div>
';

// NOTA
$p["divRow"][3] = '
	<div class="row">
		<div class="form-group col-sm-8 col-8">
			<label>Nota</label>
			<input type="number" class="form-control" name="nota" id="nota" min="0.0" max ="5.0" step="0.5">
		</div>
	</div>
	
';

// RESENHA
$p["divRow"][4] = '
	<div class="row">
		<div class="form-group col-sm-8 col-8">
			<label>Resenha</label>
			<textarea class="form-control" placeholder="O que você achou?"></textarea>
		</div>
</div>';

// BOTÃO CONTÉM SPOILER
$p["divRow"][5] = '
	<div class="row">
		<div class="form-group col-sm-8 col-8">
			<div class="custom-control custom-switch">
				<input type="checkbox" class="custom-control-input" id="customSwitch1">
				<label class="custom-control-label" for="customSwitch1">Contem spoiler ?</label>
			</div>
		</div>
</div>';
?>