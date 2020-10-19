<?php

$p["id"] = "AvaliarFilme";
$p["titulo"] = "AvaliarFilme";

// NOME DO FILME
$p["divRow"][0] = '
<div class="card-body">
	<img id="foto_login" src="img/logo.png">
		<legend>Avaliar Filme</legend>
		<div class="form-group">	                            
			<select name="cod_filme" class="form-control">
				<option>::Selecione Filme::</option>';
			require_once "conexao.php";

			$select = "SELECT id_filme, nome FROM filme ORDER BY nome";
			$resultado = $conexao->query($select);
			foreach($resultado as $linha){
				$p["divRow"][0] .= '<option value="'.$linha["id_filme"].'">'.$linha["nome"].'</option>'; 
			}
            
$p["divRow"][0] .= '
			</select>
		</div>';

// NOTA DA AVALIAÇÃO DO FILME
$p["divRow"][1] = '
	<div class="form-group">
		<label>Nota</label>
		<input type="number" class="form-control" min="0" max="5" step="1" name="nota" id="nota" placeholder="Nota">
	</div>
';

// TITULO DA AVALIAÇÃO DE FILME
$p["divRow"][2] = '
	<div class="form-group">
		<label>Titulo da Descrição</label>
		<input type="text" class="form-control" name="titulo" id="titulo">
	</div>
';

// DESCRICÃO DA AVALIAÇÃO DE FILME
$p["divRow"][3] = '
	<div class="form-group">
		<label>Descrição</label>
		<textarea name="descricao" class="form-control" placeholder="O que você achou?"></textarea>
	</div>
';

// BOTÃO CONTEM SPOILER
$p["divRow"][4] = '
	<div class="form-group">
		<div class="custom-control custom-switch">
			<input type="checkbox" class="custom-control-input" name="spoiler" id="spoiler">
			<label class="custom-control-label" for="spoiler">Contem spoiler ?</label>
		</div>
	</div>
</div>';
?>