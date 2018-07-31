<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="page-header">
					<h1>
						Nuevo Documento
						<div class="pull-right">
							Número de ruta probable: <?= $id_ruta; ?>
						</div>
					</h1>
				</div>					
			</div>
			<form action="<?= base_url();?>dms/operacion/nuevo" id="NuevoRespuesta" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
				<div class="col-md-3">
					<div class="form-group">
						<label for="inputRutaTipo">TIPO:</label>
						<select name="rutaTipo" id="inputRutaTipo" class="form-control" required="required">
							<option value=""></option>							
							<?php foreach ($RutasTipos as $tipos): ?>
								<option value=" <?= $tipos->idruta_tipo; ?> ">
									<?= $tipos->nombre; ?>
								</option>									
							<?php endforeach ?>							
						</select>					
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="inputCite">CITE:</label>
						<select name="cite" id="inputCite" class="form-control" required="required">
							<option value=""></option>							
							<?php foreach ($Cites as $cite): ?>									
								<option value=" <?= $cite->idarea; ?> ">
									<?= $cite->sigla." - ".$cite->nroinforme."/".date('Y'); ?>
								</option>
							<?php endforeach ?>							
						</select>						
					</div>
				</div>				
				<div class="col-md-3">
					<div class="form-group">
						<label for="inputTipoDocumento">DOCUMENTO:</label>
						<select name="tipoDocumento" id="inputTipoDocumento" class="form-control" required="required">
							<option value=""></option>							
							<?php foreach ($TipoDocumentos as $documento): ?>									
								<option value=" <?= $documento->idtipo_documento; ?> ">
									<?= $documento->nombre; ?>
								</option>									
							<?php endforeach ?>							
						</select>						
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="fecha">FECHA</label>
						<input type="text" name="fecha" value="<?= date('Y-m-d'); ?>" class="form-control" readonly="off">
					</div>
				</div>
				<div class="col-md-12">					
					<div class="form-group">
						<label for="remitente">RECEPCIONISTA:</label>
						<input type="text" name="remitente"  value=" <?= $Remitente->nombres.' '.$Remitente->apellidoPaterno.' '.$Remitente->apellidoMaterno.' - '.$Remitente->cargo ; ?> " class="form-control" placeholder="Remitente" readonly="True">
					</div>
					<div class="form-group">
						<label for="inputDestintario">DESTINATARIO:</label>
						<select class="form-control" name="destinatario" id="inputDestintario">					
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
					<div class="form-group">
						<label for="inputConCopia">CON COPIA:</label>
						<select class="form-control" name="conCopia[]" id="inputConCopia" multiple="multiple" style="width: 97%;">					
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
					<hr>
					<div class="form-group">
						<label for="referencia">REFERENCIA:</label>						
						<input type="text" name="referencia" id="referencia" class="form-control" size="5" maxlength="100" value="<?= set_value('referencia'); ?>">
					</div>
					<div class="form-group">
						<label for="proveido">PROVEIDO:</label>
						<textarea name="proveido" id="proveido" class="form-control" rows="4" required="required" maxlength="500" value="<?= set_value('proveido'); ?>"></textarea>
					</div>
						<?php echo validation_errors('<div class="alert alert-danger">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>'); ?>					
					<div class="pull-left">
						<div class="form-group">
							<input type="checkbox" id="chkSiEnviarAdjunto" name="sienviaradjunto" value="TRUE" checked/>
							<label for="adjunto_externo">ADJUNTAR EXTERNO:</label>							
							<input type="file" id="adjuntarExterno" name="adjunto_externo">
							<small>WORD, EXCEL, POWER POINT Y PDF TAMAÑO MAXIMO 1MB!</small>
						</div>
					</div>	
					<div class="pull-right">						 
						<div class="form-group">                
							<button type="submit" class="btn btn-success btn-lg" id="btnEnviar">Enviar</button>
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
			rutaTipo : {
				validators :{
					notEmpty:{
						message: 'Tipo de Ruta es un dato requerido'
					}
				}
			},
			cite : {
				validators :{
					notEmpty:{
						message: 'El Cite es un dato requerido'
					}
				}
			},
			tipoDocumento : {
				validators :{
					notEmpty:{
						message: 'Tipo De Documento es un dato requerido'
					}
				}
			},
			destinatario : {
				validators :{
					notEmpty:{
						message: 'Destinatario es un dato requerido'
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
			},	
			adjunto_externo : {
				validators : {
					notEmpty: {
						message: 'Selecciona un adjunto'
					},
					file: {
						extension: 'docx,doc,pdf,xls,xlsx,ppt,pptx',
						type: 'application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword,application/pdf,application/vnd.openxmlformats-officedocument.presentationml.presentation,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.presentation',
						maxSize: 1000000,
						message: 'El archivo seleccionado no es valido'
					}      
				}
			},
			sienviaradjunto : {
				validator:{
					callback : {
						function(value, validator, $field) 
						{
							if ($('#chkSiEnviarAdjunto').prop('checked')) 
							{
								$('#btnEnviar').attr('disabled', false);
								return true;                    			 
							}
							else
							{
								return value !== '';
							}
						}
					}
				}
			}
		}
	});
	$('#chkSiEnviarAdjunto').click(function(){
	   $('#adjuntarExterno').attr('disabled',!this.checked);
	});
	$("#inputConCopia").multipleSelect({
        filter: true
    });	
});
</script>