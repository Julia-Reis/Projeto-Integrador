<?php
	include "valida_cookies.inc";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Lista Pra Fazer</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="../css/listaprafazer.css">
	<link rel="stylesheet"
        href="https://fonts.googleapis.com/icon?family=Material+Icons" />
</head>
	<body>
	<div class="container">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top"> 
            <!-- logotipo / brand -->
            <a href="index.html" class="navbar-brand logotipo">
                <img src="../img/checklist.png" alt="Logotipo do Lista Pra Fazer" />
            </a>

            <!-- botão que aparece quando a tela for pequena -->
            <button class="navbar-toggler" type="button"
                data-toggle="collapse" data-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="">
						Tarefas novas</a></li>
                    <li class="nav-item"><a class="nav-link" href="">
						Tarefas em aberto</a></li>
                    <li class="nav-item"><a class="nav-link" href="">
						Tarefas concluídas</a></li>
                </ul>
                <div class="btn-group">
                    <button type="button" data-toggle="dropdown"
                        class="btn btn-secondary dropdown-toggle"
                        aria-haspopup="true" aria-expanded="false">
                        Minha conta
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <button class="dropdown-item" type="button">
							<?php echo $_COOKIE["nome_usuario"];?>
                        </button>
                        <button class="dropdown-item" type="button">
                            Alterar Perfil
                        </button>
                        <button class="dropdown-item" type="button" id="btnLogout">
                            Sair
                        </button>
                    </div>
                </div>
            </div>
        </nav>
	
		
		<div class="container">
		<ol class="breadcrumb bread migalha">
			<li class="breadcrumb-item">
				<a href="">Início</a>
			</li>
			<li class="breadcrumb-item active">
				Lista de Tarefas Pra Fazer
			</li>
		</ol>
		<div class="row cabecalho">
			<div class="col-xs-12 col-md-6">
				<h1>Lista de Tarefas</h1>
			</div>
			<div class="col-xs-12 col-md-4 col-md-offset-2 busca">
				<div class="input-group">
					<input type="text" name="busca" id="busca" class="form-control typeahead" 
							placeholder="Pesquisar pela descrição da tarefa">
					<span class="input-group-btn">
						<button type="button" class="btn btn-default" id="btnBuscar">
							<i class="material-icons">search</i>
						</button>
					</span>
				</div>
			</div>
		</div>
		
		<div class="table-responsive">
			<table class="dados-list table table-striped table-bordered table-hover" 
				id="tarefa-list">
				<thead>
				  <tr>
					<th>Código</th>
					<th>Data</th>
					<th>Descrição</th>
					<th>Status</th>
					<th></th>
				  </tr>
				</thead>
				<tbody >
				</tbody>
			</table>

			<footer class="row">
				<div class="col-sm-6">
					<button class="btn btn-primary" data-toggle="modal" data-target="#NovaTarefa">
						Nova Tarefa</button>
				</div>
			</footer>
		</div>

		<div class="modal fade" id="NovaTarefa">
		<div class="modal-dialog">
		  <div class="modal-content">
		  <div class="modal-header">
			  <h5 class="modal-title">Nova Tarefa</h5>
			  <button type="button" class="close" data-dismiss="modal" 
			  aria-label="Fechar">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<form action="salvarTarefa.php" method="post">

				<input type="hidden" name="id_usuario" id="id_usuario" 
					value="<?php echo $_COOKIE["id_usuario"];?>" />		
				<input type="hidden" name="id" id="id" value="0" />

				<div class="modal-body">
					<div class="row">
                        <div class="form-group col-sm-6 col-12">
							<label for="descricao">Descrição</label>
							<input type="text" name="descricao" id="descricao"
								class="form-control" required />
						</div>
					</div>
					
					<div class="row">
						<div class="form-group col-sm-6 col-12">
							<label class="control-label" for="status">Status</label>
							<select id="status" name="status" class="form-control">
								<option value="">Selecione...</option>
								<option value="1">Nova</option>
								<option value="2">Em Andamento</option>
								<option value="3">Finalizada</option>
							</select>
						</div>
						<div class="form-group col-sm-6 col-12">
							<label class="control-label" for="data">Data de Entrega</label>
							<div class="input-group date" data-provide="datepicker" 
								data-date-language="pt-BR">
								<input type="text" name="data" id="data" class="form-control">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-th"></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="reset" class="btn btn-danger">Limpar</button>
					<button type="submit" class="btn btn-primary">Salvar</button>
				</div>
			</form>
		  </div>
		</div>
	</div> 

	<script src='../js/jquery-3.3.1.min.js' type='text/javascript'></script>
	<script src='../js/popper.min.js'></script>
	<script src='../js/jquery.cookie.js'></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/bootstrap-datepicker.min.js"></script>
	<script src="../js/bootstrap-datepicker.pt-BR.min.js"></script>
	<script src='../js/listaprafazer.js'></script>
	<script src="../js/typeahead.js"></script>
	</body>
</html>