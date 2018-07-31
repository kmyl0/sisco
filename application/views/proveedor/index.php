<div class="container">
	<div class="page-header">
	  <h1>Proveedores</h1>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Lista Completa</h3>				
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Nombre</th>
						<th>NIT</th>
						<th>Direccion</th>
						<th>Telefono</th>
						<th>Observación</th>
						<th>
							<a href="<?= base_url()?>proveedor/add" role="button" class="btn btn-success">
								<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
							</a>
						</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($Proveedores as $proveedor): ?>
					<tr>
						<td><?= $proveedor->idproveedor; ?></td>
						<td><?= $proveedor->nombre; ?></td>
						<td><?= $proveedor->nit ?></td>
						<td><?= $proveedor->direccion; ?></td>
						<td><?= $proveedor->telefono; ?></td>
						<td><?= $proveedor->observacion; ?></td>
						<td>
					<?php if ($proveedor->estado == 1): ?>
							<a href="<?= base_url()."proveedor/disable/".$proveedor->idproveedor; ?>" title="Inhabilitar">
								<span class="glyphicon glyphicon-remove"></span>
							</a>
					<?php else: ?>
							<a href="<?= base_url()."proveedor/enable/".$proveedor->idproveedor; ?>" title="Habilitar">
								<span class="glyphicon glyphicon-ok"></span>
							</a>
					<?php endif; ?>
							<!-- <a href="<?= base_url()."proveedor/view/".$proveedor->idproveedor; ?>" title="Ver Todo">
								<span class="glyphicon glyphicon-eye-open"></span> -->
							</a>
							<a href="<?= base_url()."proveedor/edit/".$proveedor->idproveedor; ?>" title="Modificar">
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