<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="page-header">
					<h1>
						Derivar documento
					</h1>
				</div>					
			</div> 	
			<form action="<?= base_url();?>dms/derivar_action" id="NuevoRespuesta" enctype="multipart/form-data" method="POST" accept-charset="utf-8">

				<input type="hidden" name="idproveido" id="inputIdProveido" class="form-control" value="<?= $idproveido?>">
				<input type="hidden" name="id_ruta" id="inputidruta" class="form-control" value="<?= $id_ruta?>">

				<div class="col-md-12">
					<div class="form-group">
						<label for="fecha">FECHA</label>
						<input type="text" name="fecha" value="<?= date('Y-m-d'); ?>" class="form-control" readonly="off">
					</div>
					<div class="form-group">
						<label for="remitente">REMITENTE:</label>
						<input type="text" name="remitente"  value=" <?= $AutorNombre.' - '. $AutorCargo?>" class="form-control" placeholder="Remitente" readonly="True">
					</div>
					<div class="form-group">
						<label for="destinatario">DESTINATARIO:</label>
						<select class="form-control" name="destinatario" data-bv-notempty data-bv-notempty-message="Destinatario es un dato requerido">
						<option value=""></option>
							<?php if (isset($Usuarios)): ?>
								<?php foreach ($Usuarios as $usuario): ?>
									<?php if ($usuario->nombre != $AutorNombre): ?>
										<option value=" <?= $usuario->idusuario; ?> ">
											<?= $usuario->nombre." - ".$usuario->cargo; ?>
										</option>
									<?php endif ?>
								<?php endforeach ?>
							<?php endif ?>
						</select> 
					</div>  
					<div class="form-group">
						<label for="referencia">REFERENCIA:</label>						
						<input type="text" name="referencia" id="referencia" class="form-control" size="5" maxlength="500" readonly="True" value="<?= $procedencia?>">
					</div>
					<div class="form-group">
						<label for="textareaProveido">PROVEIDO:</label>
						<textarea name="asunto" id="textareaProveido" class="form-control" rows="4" required="required" placeholder="Destinatario -> Accion -> Nro de Informe -> Solicitud"></textarea>
					</div>
					<div class="pull-right">						 
						<div class="form-group">                
							<button type="submit" class="btn btn-success btn-lg" id="btnEnviar">Derivar</button>
						</div> 
					</div>
				</div>  				
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	$('#NuevoRespuesta').bootstrapValidator({
		framework: 'bootstrap',
		message: 'Este valor no es valido',
		feedbackIcons: {
			validating: 'glyphicon glyphicon-refresh'
		},
		fields : {
			referencia : {
				validators : {
					notEmpty:{
						message: 'Referencia es un dato requerido'
					},
					stringLength: {
						message: 'Referencia debe tener entre 5 a 100 carácteres',
						max: 100,
						min: 5
					}
				}
			},	
			asunto : {
				validators : {
					notEmpty:{
						message: 'Asunto es un dato requerido'
					},
					stringLength: {
						message: 'Asunto debe tener entre 5 a 500 carácteres',
						max: 500,
						min: 5
					}
				}
			}		
		}
	});
});
</script>