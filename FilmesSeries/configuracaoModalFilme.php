<?php

$p["id"] = "Filme";
$p["titulo"] = "Filme";

// SELECIONA A IMAGEM DO FILME
$p["divRow"][0] = '
		 <div class="card-body">
				<img id="foto_login" src="img/logo.png">
				<legend id="legenda">Cadastro de Filme</legend>
				  <div class="custom-file">
					  <input type="file" class="custom-file-input" name="foto" id="foto" lang="pt-BR">
					  <label class="custom-file-label">Imagem do Filme</label>
				  </div>
';

// NOME DO FILME
$p["divRow"][1] = '
		<div class="form-group">
		<br>
			<label>Nome Filme</label>
			<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do filme...">
		</div>
';

$p["divRow"][2] = '
		<div class="form-group">
			<label>Ano</label>
			<input type="number" class="form-control" name="ano" id="ano" placeholder="Ano...">
		</div>
';

// GENERO DO FILME
$p["divRow"][3] = '
	<label>Genero</label>
		<select name="genero" class="custom-select">
			<option selected>Genero</option>
			<option>Ação</option>
			<option>Comédia</option>
			<option>Comédia romântica</option>
			<option>Drama</option>
			<option>Fantasia</option>
			<option>Ficção científica</option>
			<option>Religioso</option>
			<option>Romance</option>
			<option>Suspense</option>
			<option>Terror</option>
		</select>
';

// DURACAO
$p["divRow"][4] = '
	<div class="form-group">
		<label>Duracao</label>
		<input type="number" class="form-control" name="duracao" id="duracao" placeholder="Duracao em min Ex: 103">
	</div>
';

// CLASSIFICAO INDICATIVA
$p["divRow"][5] = '
	<label>Classificação indicativa</label>
		<select name="classificacao" class="custom-select">
			<option selected>Classificação indicativa</option>
			<option>LIVRE</option>
			<option>10</option>
			<option>12</option>
			<option>14</option>
			<option>16</option>
			<option>18</option>
		</select>
	';

// SINOPSE
$p["divRow"][6] = '
		<div class="form-group">
			<label>Sinopse</label>
			<textarea class="form-control" name="sinopse" id="sinopse" placeholder="Sinopse"></textarea>
		</div>
	</div>
';
?>