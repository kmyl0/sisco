<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="page-header">
					<h1>
						Derivar documento
						<div class="pull-right">
							Ruta Nro: <?= $id_ruta; ?>
						</div>
					</h1>
				</div>					
			</div> 	
			<form action="<?= base_url();?>dms/derivar" enctype="multipart/form-data" method="POST" accept-charset="utf-8" id="NuevoRespuesta">

				<input type="hidden" name="idproveido" id="inputIdProveido" class="form-control" value="<?= $idproveido?>">
				<input type="hidden" name="id_ruta" id="inputidruta" class="form-control" value="<?= $id_ruta?>">

				<div class="col-md-12">
					<div class="form-group">
						<label for="fecha">FECHA</label>
						<input type="text" name="fecha" value="<?= date('Y-m-d'); ?>" class="form-control" readonly="off">
					</div>
					<div class="form-group">
						<label for="remitente">REMITENTE:</label>
						<input type="text" name="remitente"  value="<?= $Remitente->nombres.' '.$Remitente->apellidoPaterno.' '.$Remitente->apellidoMaterno.' - '.$Remitente->cargo ; ?>" class="form-control" placeholder="Remitente" readonly="True">
					</div>
					<div class="form-group">
						<label for="inputDestintario">DESTINATARIO:</label>
						<select class="form-control" name="destinatario" id="inputDestintario" required="required">					
							<option value=""></option>
							<?php if (isset($Destinatarios)): ?>
								<?php foreach ($Destinatarios as $destinatario): ?>
									<?php if ($destinatario->idusuario != $Remitente->idusuario): ?>
										<option value=" <?= $destinatario->idusuario; ?> ">
											<?= $destinatario->nombre." - ".$destinatario->cargo; ?>
										</option>
									<?php endif ?>
								<?php endforeach ?>
							<?php endif ?>
						</select> 
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" value="TRUE" name="siEnviarCorreo">
							Enviar a su correo
						</label>
					</div>
					<hr>
					<div class="form-group">
						<label for="referencia">REFERENCIA:</label>						
						<input type="text" name="referencia" id="referencia" class="form-control" size="5" maxlength="500" readonly="True" value="<?= $referencia; ?>">
					</div>
					<div class="form-group">
						<label for="inputProveido">PROVEIDO:</label>
						<textarea name="proveido" id="inputProveido" class="form-control" rows="4" required="required" value="<?= set_value('proveido'); ?>"></textarea>
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
			destinatario : {
				validators :{
					notEmpty:{
						message: 'destinatario es un dato requerido'
					}
				}
			},
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
			proveido : {
				validators : {
					notEmpty:{
						message: 'Proveido es un dato requerido'
					},
					stringLength: {
						message: 'Proveido debe tener entre 5 a 500 carácteres',
						max: 500,
						min: 5
					}
				}
			}		
		}
	});
});
</script>