<?php

$p["id"] = "Lancamento";
$p["titulo"] = "Lancamento";

// SELECIONA A IMAGEM DO FILME
$p["divRow"][0] = '
	<div class="card-body">
	
		<img id="foto_login" src="img/logo.png">
			<legend>Cadastro de Filme</legend>
			<div class="custom-control custom-radio">
			  <input type="radio" value="f" name="tipo" class="custom-control-input" id="f">
			  <label class="custom-control-label" for="f">Filme</label>
			</div>
			<div class="custom-control custom-radio">
			  <input type="radio" value="s" name="tipo" class="custom-control-input" id="s">
			  <label class="custom-control-label" for="s">Serie</label>
			</div>
			<div class="filme">

';


$p["divRow"][1] = '
				  <div class="custom-file">
					  <input type="file" class="custom-file-input" name="imagem_filme" id="imagem_filme" lang="pt-BR">
					  <label class="custom-file-label">Imagem do Filme</label>
				  </div>
';

// NOME DO FILME
$p["divRow"][2] = '
		<div class="form-group">
		<br>
			<label>Nome Filme</label>
			<input type="text" class="form-control" name="nome_filme" id="nome_filme" placeholder="Nome do filme...">
		</div>
';

$p["divRow"][3] = '
		<div class="form-group">
			<label>Data de Lançamento</label>
			<input type="date" class="form-control" name="data_filme" id="data_filme">
		</div>
';

// GENERO DO FILME
$p["divRow"][4] = '
	<label>Genero</label>
		<select name="genero_filme" class="custom-select">
			<option selected>Genero</option>
			<option>Ação</option>
			<option>Comédia</option>
			<option>Comédia romântica</option>
			<option>Drama</option>
			<option>Ficção científica</option>
			<option>Religioso</option>
			<option>Romance</option>
			<option>Suspense</option>
			<option>Terror</option>
		</select>
';

// DURACAO
$p["divRow"][5] = '
	<div class="form-group">
		<label>Duracao</label>
		<input type="number" class="form-control" name="duracao_filme" id="duracao_filme" placeholder="Duracao em min Ex: 103">
	</div>
';

// CLASSIFICAO INDICATIVA
$p["divRow"][6] = '
	<label>Classificação indicativa</label>
		<select name="classificacao_filme" class="custom-select">
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
$p["divRow"][7] = '
		<div class="form-group">
			<label>Sinopse</label>
			<textarea class="form-control" name="sinopse_filme" id="sinopse_filme" placeholder="Sinopse"></textarea>
		</div>
	</div>
';

// SELECIONA A IMAGEM DA SERIE
$p["divRow"][8] = '
		<div class="serie">
				  <div class="form-group">
					  <div class="custom-file">
						  <input type="file" class="custom-file-input" name="imagem_serie" id="imagem_serie" lang="pt-BR">
						  <label class="custom-file-label">Imagem da Serie</label>
					  </div>
				  </div>
';

// NOME DA SERIE
$p["divRow"][9] = '
		<div class="form-group">
			<br>
			<label>Nome</label>
			<input type="text" class="form-control" name="nome_serie" id="nome_serie" placeholder="Nome...">
		</div>
';

// ANO
$p["divRow"][10] = '
		<div class="form-group">
			<label>Data de Lançamento</label>
			<input type="date" class="form-control" name="data_serie" id="data_serie">
		</div>
';

// GENERO DA SERIE
$p["divRow"][11] = '
		<label>Genero</label>
		<select name="genero_serie" class="custom-select">
			<option selected>Genero</option>
			<option>Ação</option>
			<option>Comédia</option>
			<option>Comédia romântica</option>
			<option>Drama</option>
			<option>Ficção científica</option>
			<option>Religioso</option>
			<option>Romance</option>
			<option>Suspense</option>
			<option>Terror</option>
		</select>
';

// CLASSIFICAO INDICATIVA
$p["divRow"][12] = '
	<label>Classificação indicativa</label>
		<select name="classificacao_serie" class="custom-select">
			<option selected>Classificação indicativa</option>
			<option>LIVRE</option>
			<option>10</option>
			<option>12</option>
			<option>14</option>
			<option>16</option>
			<option>18</option>
		</select>
	';


// TEMPORADAS
$p["divRow"][13] = '
	<div class="form-group">
	<br>
		<label>Temporadas</label>
		<input type="number" class="form-control" name="temporada_serie" id="temporada_serie">
	</div>
';


// SINOPSE
$p["divRow"][14] = '
		<div class="form-group">
			<label>Sinopse</label>
			<textarea class="form-control" name="sinopse_serie" id="sinopse_serie" placeholder="Sinopse"></textarea>
		</div>
	</div>
	</div>
';
?>