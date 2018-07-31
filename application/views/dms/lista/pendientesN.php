<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="page-header">
					<h1>Enviados Pendientes de Recepción</h1>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="panel panel-default" >
					<div class="panel-heading">
						<h3 class="panel-title">Lista de Enviados y no Recibidos</h3>
					</div>
					<?php if ($ProveidosN == NULL):?>
						<div class="panel-body">
							<strong>No existen Proveidos No Recepcionados</strong>
						</div>
					<?php else: ?>
						<table class="table table-hover display compact" id="tblProveido2">
							<thead>
								<tr>
									<th>NUR</th>
									<th>Remitente</th>
									<th>Cite</th>
									<th>Proveido</th>
									<th>Documento</th>
							<!--		<th>Adjunto</th> -->
									<th>Fecha de Envío</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($ProveidosN as $proveidoN): ?>
									<?php if ($proveidoN->id_estado_proveido == '1' && $proveidoN->id_proceso_proveido == ''): ?>
										<tr>
											<td><a class="btn btn-primary btn-block" href="<?= base_url();?>dms/view/<?= $proveidoN->id_ruta;?>"><?= $proveidoN->id_ruta; ?></a></td>
											<td><small><?= $proveidoN->nombres." ".$proveidoN->apellidoPaterno." ".$proveidoN->apellidoMaterno; ?></small></td>
											<td><small><?= $proveidoN->cite?></small></td>
											<td style="max-width: 500px"><small><?= $proveidoN->asunto; ?></small></td>
											<td><small><?= $proveidoN->documento; ?></small></td>
								<!--			<td>
												<?php if ($proveidoN->adjunto_externo != ""): ?>
													<a href="<?= base_url(); ?>/dms/viewinforme/<?= $proveidoN->adjunto_externo; ?>" class="btn btn-info">Descargar</a>
												<?php endif ?>
											</td> -->
											<td>
												<small><?= $proveidoN->fecha_remitido; ?></small>
												<!-- Single button -->
											</td>
										</tr>
									<?php endif ?>
								<?php endforeach; ?>
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

	$('#tblProveido2').DataTable({
		"language" : {
			"url" : "<?= base_url()?>assets/json/Spanish.json"
		},
		stateSave: true
	});
	// CKEDITOR.replace( 'resumen', {
// 	language: 'es',
// 	uiColor: '#bbbbbb',
// });
});
</script>
