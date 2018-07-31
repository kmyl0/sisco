<div class="container">
	<div class="page-header">
	  <h1>Areas</h1>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Lista Completa</h3>
			</div>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Nombre</th>
						<th>Sigla</th>
						<th>Nro informe</th>
						<th>
							<a class="btn btn-primary" data-toggle="modal" href='#modal-id'>
								<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
							</a>
						</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($Areas as $area): ?>
					<tr>
						<td><?= $area->idarea; ?></td>
						<td><?= $area->nombre; ?></td>
						<td><?= $area->sigla; ?></td>
						<td><?= $area->nroinforme; ?></td>
						<td>
					<?php if ($area->estado == 1): ?>
							<a href="<?= base_url()."area/changeState/".$area->idarea."/0"; ?>" title="Inhabilitar">
								<span class="glyphicon glyphicon-remove"></span>
							</a>
					<?php else: ?>
							<a href="<?= base_url()."area/changeState/".$area->idarea."/1"; ?>" title="Habilitar">
								<span class="glyphicon glyphicon-ok"></span>
							</a>
					<?php endif; ?>
							<a href="<?= base_url()."area/edit/".$area->idarea; ?>" title="Modificar">
								<span class="glyphicon glyphicon-pencil"></span>
							</a>
						</td>
					</tr>
				<?php endforeach ?>				
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
				<form method="POST" action="<?= base_url();?>categoria/add" id="frmNuevoUsuario">
					<input type="hidden" name="estado" value="1">
					<div class="form-group">
						<label for="nombre">Nombre *</label>
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Añadir Categoria</button>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>