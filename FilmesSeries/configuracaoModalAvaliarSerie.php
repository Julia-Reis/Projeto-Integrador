<?php

$p["id"] = "AvaliarSerie";
$p["titulo"] = "AvaliarSerie";

// NOME DA SERIE
$p["divRow"][0] = '
	<div class="card-body">
		<img id="foto_login" src="img/logo.png">
		<legend id="legenda">Avaliar Série</legend>
			<div class="form-group">	                            
			<select name="cod_serie" class="form-control">
				<option>::Selecione Serie::</option>';
			require_once "conexao.php";

			$select = "SELECT id_serie, nome FROM serie ORDER BY nome";
			$resultado = $conexao->query($select);
			foreach($resultado as $linha){
				$p["divRow"][0] .= '<option value="'.$linha["id_serie"].'">'.$linha["nome"].'</option>'; 
			}
            
$p["divRow"][0] .= '
        </select>
</div>';

// NOTA DA AVALIAÇÃO DA SERIE
$p["divRow"][2] = '
	<div class="form-group">
		<label>Temporada</label>
		<input type="number" class="form-control" min="1" max="1" step="1" name="temporada" id="temporada" placeholder="Temporada">
	</div>
';

// NOTA DA AVALIAÇÃO DA SERIE
$p["divRow"][3] = '
	<div class="form-group">
		<label>Nota</label>
		<input type="number" class="form-control" min="0" max="5" step="1" name="nota" id="nota" placeholder="Nota">
	</div>
';

// TITULO DA AVALIAÇÃO DA SERIE
$p["divRow"][4] = '
	<div class="form-group">
		<label>Titulo da Descrição</label>
		<input type="text" class="form-control" name="data" id="data">
	</div>
';
// RESENHA DA SERIE
$p["divRow"][5] = '
	<div class="form-group">
		<label>Resenha</label>
		<textarea class="form-control" placeholder="O que você achou?"></textarea>
	</div>
</div>
';

?>