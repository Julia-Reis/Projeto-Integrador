<?php

    class Modal{
        private $id;
        private $titulo;
        private $divRow;


        public function __construct($parametros){
            $this->id = $parametros["id"];
            $this->titulo = $parametros["titulo"];
            $this->divRow = $parametros["divRow"];
        }
		
			
			public function exibe(){
				
				echo '
					<div class="modal" tabindex="-1" role="dialog" id="novo'.$this->id.'">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Novo '.$this->titulo.'</h5>
								<button type="button" class="close" data-dismiss="modal" 
								aria-label="Fechar">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form name="f" value="'.$this->id.'">
								<div class="modal-body">';									                    
							 
								foreach($this->divRow as $i=>$d){
									echo $d;
								}

							echo' 
							   </div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
									<button id="inserir" type="button" class="inserir btn btn-primary">Salvar</button>
								</div>
							</form>
							</div>
						</div>
					</div>
				';
			}
    }

?>