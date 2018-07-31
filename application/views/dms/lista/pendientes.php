<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="page-header">
					<h1>Pendientes</h1>
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
									<th>Cite</th>
									<th>Proveido</th>
									<th>Documento</th>
									<th>Adjunto</th>
									<th>Opciones</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($Proveidos as $proveido): ?>
									<?php if (($proveido->id_estado_proveido == '2' || $proveido->id_estado_proveido == '3') && $proveido->id_proceso_proveido == ''): ?>
										<tr>
											<td><a class="btn btn-primary btn-block" href="<?= base_url();?>dms/view/<?= $proveido->id_ruta;?>"><?= $proveido->id_ruta; ?></a></td>
											<td><small><?= $proveido->nombres." ".$proveido->apellidoPaterno." ".$proveido->apellidoMaterno; ?></small></td>
											<td><small><?= $proveido->cite?></small></td>
											<td style="max-width: 500px"><small><?= $proveido->asunto; ?></small></td>
											<td><small><?= $proveido->documento; ?></small></td>
											<td>
												<?php if ($proveido->adjunto_externo != ""): ?>
													<a href="<?= base_url(); ?>/dms/viewinforme/<?= $proveido->adjunto_externo; ?>" class="btn btn-info">Descargar</a>
												<?php endif ?>
											</td>
											<td>
												<!-- Single button -->
												<div class="dropup">
													<button type="button" class="btn btn-default btn-block dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<span class="fa fa-send "></span>
													</button>
												    <ul class="dropdown-menu dropdown-menu-right">
													    <li>
													    	<form action="<?= base_url(); ?>dms/operacion/derivar" method="POST" id="frmDerivar">
																<input type="hidden" name="proceso" id="inputProceso" class="form-control" value="3">
																<input type="hidden" name="idproveido" id="inputIdproveido" class="form-control" value="<?= $proveido->idproveido; ?>">
																<input type="hidden" name="id_ruta" id="inputIdproveido" class="form-control" value="<?= $proveido->id_ruta; ?>">
																<input type="hidden" name="referencia" id="inputReferencia" class="form-control" value="<?= $proveido->procedencia; ?>">
																<button type="submit" class="btn btn-link">Derivar</button>
															</form>
													    </li>
													    <li>
													    	<form action="<?= base_url(); ?>dms/operacion/emitir" method="POST" id="frmProcesar">
																<input type="hidden" name="proceso" id="inputProceso" class="form-control" value="3">
																<input type="hidden" name="idproveido" id="inputIdproveido" class="form-control" value="<?= $proveido->idproveido; ?>">
																<input type="hidden" name="id_ruta" id="inputIdproveido" class="form-control" value="<?= $proveido->id_ruta; ?>">
																<input type="hidden" name="referencia" id="inputProcedencia" class="form-control" value="<?= $proveido->procedencia; ?>">
																<button type="submit" class="btn btn-link">Emitir Documento</button>
															</form>
													    </li>
													    <li>
													    	<form action="<?= base_url(); ?>dms/operacion/archivar" method="POST" id="frmArchivar" >
																<input type="hidden" name="proceso" id="inputProceso" class="form-control" value="3">
																<input type="hidden" name="idproveido" id="inputIdproveido" class="form-control" value="<?= $proveido->idproveido; ?>">
																<input type="hidden" name="id_ruta" id="inputIdproveido" class="form-control" value="<?= $proveido->id_ruta; ?>">
																<input type="hidden" name="referencia" id="inputProcedencia" class="form-control" value="<?= $proveido->procedencia; ?>">
																<button type="submit" class="btn btn-link">Archivar</button>
															</form>
													    </li>
													</ul>
												</div>
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
		},
		stateSave: true
	});
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
