<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="page-header">
					<h1>Proveidos <small>Todos los elementos</small></h1>
				</div>	
			</div>			
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">			
				<div class="panel panel-default" >
					<div class="panel-heading">
						<h3 class="panel-title">Lista completa</h3>
					</div>					
					<?php if ($Proveidos == NULL):?>
						<div class="panel-body">
							<strong>No existen Proveidos</strong>
						</div>
					<?php else: ?>
						<table class="table table-hover display compact" id="tblProveido">
							<thead>
								<tr>
									<th>NUR</th>									
									<th>Remitente</th>
									<th>Recibido:</th>
									<th>Cite:</th>
									<th>Referencia</th>
									<th>Proveido</th>
									<th>Adjunto Externo</th>									
									<th>Opciones</th>					
								</tr>
							</thead>
							<tbody>
								<?php foreach ($Proveidos as $proveido): ?>
									<?php if ($proveido->id_estado_proveido == '4' || $proveido->id_estado_proveido == '1'): ?>			
										<tr>
											<td><a class="btn btn-primary btn-block" href="<?= base_url();?>dms/view/<?= $proveido->id_ruta;?>"><?= $proveido->id_ruta; ?></a></td>
											<td><?= $proveido->nombres." ".$proveido->apellidoPaterno." ".$proveido->apellidoMaterno; ?></td>
											<td><?= $proveido->fecha_remitido?></td>
											<td><?= $proveido->cite?></td>
											<td><small><?= $proveido->procedencia; ?></small></td>
											<td><small><?= $proveido->asunto; ?></small></td>
											<td>
												<?php if ($proveido->adjunto_externo != ""): ?>
													<a href="<?= base_url(); ?>/dms/viewinforme/<?= $proveido->adjunto_externo; ?>" class="btn btn-info">Descargar</a>
												<?php endif ?>
											</td>
											<td>
												<?php if ($proveido->id_proceso_proveido == '1'): ?>
													<span class="label label-default">Derivacion</span>	
												<?php endif ?>
												<?php if ($proveido->id_proceso_proveido == '2'): ?>
													<span class="label label-default">Emisión de Documento</span>
												<?php endif ?>
												<?php if ($proveido->id_proceso_proveido == '4'): ?>
													<span class="label label-default">Aviso</span>
												<?php endif ?>	
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
	$('#tblProveido').DataTable({
		"language" : {
			"url" : "<?= base_url()?>assets/json/Spanish.json"
		}
	});
});
</script>