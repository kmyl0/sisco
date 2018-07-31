<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="page-header">
					<h1>Archivados</h1>
				</div>	
			</div>			
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">			
				<div class="panel panel-default" >
					<div class="panel-heading">
						<h3 class="panel-title">Lista completa</h3>
					</div>					
					<?php if ($Archivados == NULL):?>
						<div class="panel-body">
							<strong>No existen Proveidos</strong>
						</div>
					<?php else: ?>
						<table class="table table-hover display compact" id="tblArchivado">
							<thead>
								<tr>
									<th>NUR</th>
									<th>Fecha:</th>
									<th>Referencia</th>
									<th>Proveido</th>
									<th>Adjunto Externo</th>									
									<th>Acción</th>					
								</tr>
							</thead>
							<tbody>
								<?php foreach ($Archivados as $archivado): ?>
									<?php if ($archivado->id_proceso_proveido == 3 && $archivado->id_estado_proveido == 1): ?>
										<tr>
											<td>
												<a class="btn btn-primary btn-block" href="<?= base_url();?>dms/view/<?= $archivado->id_ruta;?>">
													<?= $archivado->id_ruta; ?>
												</a>
											</td>
											<td><?= $archivado->fecha_remitido?></td>
											<td><small><?= $archivado->procedencia; ?></small></td>
											<td><small><?= $archivado->asunto; ?></small></td>
											<td>
												<?php if ($archivado->adjunto_externo != ""): ?>
													<a href="<?= base_url(); ?>/dms/viewinforme/<?= $archivado->adjunto_externo; ?>" class="btn btn-info"><span class="fa fa-download"></span></a>
												<?php endif ?>
											</td>
											<td>
												<form action="<?= base_url(); ?>dms/operacion/recuperar" method="POST" role="form" class="form-inline">
													<input type="hidden" name="proceso" id="inputProceso" class="form-control" value="2">
													<input type="hidden" name="idproveido" id="inputIdproveido" class="form-control" value="<?= $archivado->idproveido; ?>">
													<input type="hidden" name="id_ruta" id="inputIdproveido" class="form-control" value="<?= $archivado->id_ruta; ?>">
													<button type="submit" class="btn btn-success btn-block">Recuperar</button>
												</form>	
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
	$('#frmDerivar').each(function(index){
		$(this).submit(function(event) {
			if(!confirm("DESEA CONTINUAR CON LA DERIVACION")) return false;
		});
	});
	$('#frmProcesar').each(function(index){
		$(this).submit(function(event) {
			if(!confirm("DESEA CONTINUAR CON EL PROCESAMIENTO DE UN CITE")) return false;
		});
	});
	$('#frmArchivar').each(function(index){
		$(this).submit(function(event) {
			if(!confirm("DESEA CONTINUAR CON LA ARCHIVACION")) return false;
		});
	});
	$('#tblArchivado').DataTable({
		"language" : {
			"url" : "<?= base_url()?>assets/json/Spanish.json"
		},
		stateSave: true
	});
});
</script>