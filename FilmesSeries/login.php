<?php
    include "classeLayout/classeLayout.php";

    include "configuracaoCabecalho.php";                                       
    $cabecalho = new Cabecalho($p);
    $cabecalho->exibe();
	
	echo '
	 <div class="card" id="telaLogin">
		<div class="card-body" id="form_login">
			<form name="form_login" method="post" action="autenticaLogin.php">
			  <img id="img_login" class="mb-4 mx-auto" src="img/logo.png" alt="" width="72" height="72">
			  
			  <h1 class="h3 mb-3 text-center">Login</h1>
			  
			  <label class="sr-only">Email</label>
			  <input type="email" id="email" name="email" class="form-control" placeholder="Email..." required autofocus>
			  
			  <label  class="sr-only">Senha</label>
			  <input type="password" id="senha" name="senha" class="form-control" placeholder="senha" required>
			   
			  <button type="button" id="login" class="btn btn-primary" >Entrar</button>
			  
			  <button type="button" class="btn btn-default btn-cadastrar btn-dark " data-toggle="modal" data-target="#novoUsuario">Cadastrar</button>
			  
			</form>
		</div>
	</div>
';
	include "configuracaoModalCadastrar.php";
	$modal = new Modal($p);
	$modal->exibe();

    $rodape = new Rodape();
    $rodape->exibe();

?>