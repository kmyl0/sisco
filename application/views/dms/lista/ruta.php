<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h1>Rutas</h1>
				</div>	
			</div>
			<div class="col-md-12">
				<div class="panel panel-default" >
					<div class="panel-heading">
						<h3 class="panel-title">Lista completa</h3>
					</div>					
				<?php if ($Rutas == NULL): ?>		
					<div class="panel-body">
						<strong>No existen Rutas</strong>
					</div>
				<?php else: ?>
					<table id="tblRutas" class="table table-hover display compact">
						<thead>
							<tr>
								<th>NUR</th>
								<th>Referencia</th>
								<th>Enviado</th>								
								<th>Recibido</th>
								<th>Se encuentra</th>
								<th>Proveído</th>
							</tr>
						</thead>
							<tbody>
							<?php foreach ($Rutas as $ruta): ?>
								<tr>
									<td><a class="btn btn-primary btn-block" href="<?= base_url();?>dms/view/<?= $ruta->idruta;?>"><?= $ruta->idruta; ?></a></td>
									<td><?= $ruta->procedencia; ?></td>
									<td><?= $ruta->fecha_iniciada?></td>								
									<td><?= $ruta->fecha_procesada; ?></td>
									<td><?= $ruta->area; ?></td>
									<td>
										<?php if ($ruta->id_estado_proveido == '1'): ?>
											<span class="label label-info">REMITIDO</span>
										<?php endif ?>
										<?php if ($ruta->id_estado_proveido == '2'): ?>
											<span class="label label-warning">ACEPTADO</span>
										<?php endif ?>
										<?php if ($ruta->id_estado_proveido == '3'): ?>
											<span class="label label-primary">OPERANDO</span>
										<?php endif ?>
										<?php if ($ruta->id_estado_proveido == '4'): ?>
											<span class="label label-default">CONCLUIDO</span>
										<?php endif ?>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				<?php endif; ?>	
				</div>
			</div>			
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	$('#tblRutas').DataTable({
		"language" : {
			"url" : "<?= base_url()?>assets/json/Spanish.json"
		},
		stateSave: true
	});	
});
</script>


