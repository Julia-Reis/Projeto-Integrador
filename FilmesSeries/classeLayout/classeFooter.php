<?php

    class Footer{
        private $titulo; //
        private $id_titulo; //

        public function __construct($parametros){
            $this->titulo = $parametros["titulo"];
            $this->id_titulo = $parametros["id_titulo"];
        }

        public function exibe(){
				if(($_SESSION["usuario"]["permissao"]=="1" && (basename($_SERVER['PHP_SELF'],'.php')=="filmes" 
						|| basename($_SERVER['PHP_SELF'],'.php')=="series" || basename($_SERVER['PHP_SELF'],'.php')=="lancamentos"))|| 
					$_SESSION["usuario"]["permissao"]=="2" && (basename($_SERVER['PHP_SELF'],'.php')=="avaliarFilme"
						|| basename($_SERVER['PHP_SELF'],'.php')=="avaliarSerie")){
				echo '
				<footer class="row">
					<div class="col-sm-6">
						<button type="button" class="btn btn-primary"
							data-toggle="modal" data-target="#novo'.$this->id_titulo.'">
							Novo(a) '.$this->titulo.'
						</button>
					</div>
				</footer>
			 </div><!-- fecha o container aberto na classe Cabecalho -->
				';
				}
		}
    }
?>