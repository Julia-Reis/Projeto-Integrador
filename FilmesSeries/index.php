<?php
    include "classeLayout/classeLayout.php";

        include "configuracaoCabecalho.php";                                       
        $cabecalho = new Cabecalho($p);
        $cabecalho->exibe();

        echo '
		<div class="index" style="opacity: 0.7;">
			<div class="card-body" id="home">
                
			</div>
        </div>';

        $rodape = new Rodape();
        $rodape->exibe();
?>