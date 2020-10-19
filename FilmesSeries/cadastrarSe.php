<?php
    include "classeLayout/classeLayout.php";

    include "configuracaoCabecalho.php";                                       
    $cabecalho = new Cabecalho($p);
    $cabecalho->exibe();
	
	echo '
	 <div class="card" id="telaLogin">
		<div class="card-body" id="form_cadastrar">
			<form name="form_cadastrar" method="post" action="salvarUsuario.php">
			  <img id="img_login" class="mb-4 mx-auto" src="img/logo.png" alt="" width="72" height="72">
			  
			  <h1 class="h3 mb-3">Cadastrar-Se</h1>

			  <label>Nome</label>
			  <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome..." required autofocus>
			
			  <label>Email</label>
			  <input type="email" id="email" name="email" class="form-control" placeholder="Email..." required autofocus>

			  <label>Senha</label>
			  <input type="password" id="senha" name="senha" class="form-control" placeholder="senha" required>

			  <button type="submit" id="cadastrar" class="btn btn-info">Casdastrar</button>
			</form>
		</div>
	</div>
';
    $rodape = new Rodape();
    $rodape->exibe();

?>