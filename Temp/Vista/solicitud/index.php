<div class="container">
	<div class="page-header">
		<h1>Solicitudes</h1>
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
						<th>Fecha</th>
						<th>Proveedor</th>
						<th>Usuario</th>
						<th>Total</th>
						<th>Estado</th>
						<th>
							<a href="<?= base_url()?>solicitud/add" role="button" class="btn btn-success">
								<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
							</a>
						</th>
					</tr>
				</thead>
				<tbody>
			<?php foreach ($Solicitudes as $solicitud): ?>
					<tr>			
						<td><?= $solicitud->idsolicitud_cabecera ?></td>
						<td><?= $solicitud->fecha; ?></td>
						<td><?= $solicitud->proveedor; ?> </td>
						<td><?= $solicitud->usuario ;?></td>
						<td><?= $solicitud->total; ?></td>
						<td>
							<?php if ($solicitud->estado == 1): ?>
								<span class="label label-primary">Activo</span>
							<?php endif ?>
							<?php if ($solicitud->estado == 2): ?>
								<span class="label label-warning">Cerrado</span>
							<?php endif ?>
							<?php if ($solicitud->estado == 3): ?>
								<span class="label label-default">Anulado</span>
							<?php endif ?>
						</td>
						<td>
							<a href="<?= base_url()."solicitud/view/".$solicitud->idsolicitud_cabecera; ?>" title="Ver Todo">
								<span class="glyphicon glyphicon-eye-open"></span>
							</a>
							<a href="<?= base_url()."solicitud/edit/".$solicitud->idsolicitud_cabecera; ?>" title="Modificar">
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