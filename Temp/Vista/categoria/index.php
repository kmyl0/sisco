<div class="container">
	<div class="page-header">
	  <h1>Categorias</h1>
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
						<th><a href="<?= base_url()?>categoria/add" role="button" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($Categorias as $categoria): ?>
					<tr>
						<td><?= $categoria->idcategoria; ?></td>
						<td><?= $categoria->nombre; ?></td>
						<td>
					<?php if ($categoria->estado == 1): ?>
							<a href="<?= base_url()."categoria/changeState/".$categoria->idcategoria."/0"; ?>" title="Inhabilitar">
								<span class="glyphicon glyphicon-remove"></span>
							</a>
					<?php else: ?>
							<a href="<?= base_url()."categoria/changeState/".$categoria->idcategoria."/1"; ?>" title="Habilitar">
								<span class="glyphicon glyphicon-ok"></span>
							</a>
					<?php endif; ?>
							<a href="<?= base_url()."categoria/edit/".$categoria->idcategoria; ?>" title="Modificar">
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