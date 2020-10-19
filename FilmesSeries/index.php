<?php
    include "classeLayout/classeLayout.php";

        include "configuracaoCabecalho.php";                                       
        $cabecalho = new Cabecalho($p);
        $cabecalho->exibe();

        echo '
		<div class="index" style="opacity: 0.5;">
			<div class="card-body" id="home">
                <h3 class="text-center">Seja Bem vindo ao<br />Assistiu? Comentou!</h3>
			</div>
        </div>';

        $rodape = new Rodape();
        $rodape->exibe();
?>