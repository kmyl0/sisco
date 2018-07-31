<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="page-header">
					<h1>
						Emitir documento
						<div class="pull-right">
							Ruta Nro: <?= $idRutaProxima; ?>
						</div>
					</h1>
				</div>					
			</div> 	
			<form action="<?= base_url();?>dms/nuevo/documento" id="NuevoRespuesta" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
				<div class="col-md-12">
					<div class="form-group">
						<label for="cite">CITE:</label>
						<input type="text" name="cite" value="<?php echo $RemitenteSigla.' - '. $RemitenteNroInforme; ?>" class="form-control" readonly="readonly">
					</div> 
					<div class="form-group">
						<label for="fecha">FECHA:</label>
						<input type="text" name="fecha" value="<?= date('Y-m-d'); ?>" class="form-control" readonly="readonly">
					</div>
				         
					<div class="form-group">
						<label for="remitente">REMITENTE:</label>
						<input type="text" name="remitente"  value=" <?= $RemitenteNombre.' - '. $RemitenteCargo?>" class="form-control" readonly="readonly">
					</div>
					<div class="form-group">
						<label for="destinatario">DESTINATARIO:</label>
						<select class="form-control" name="destinatario" data-bv-notempty data-bv-notempty-message="Destinatario es un dato requerido">
                            <option value=""></option>
                            <?php foreach ($DestinatariosTodos as $Destinatarios): ?>
								<?php if ($Destinatarios->nombre != $RemitenteNombre): ?>
									<option value=" <?= $Destinatarios->idusuario; ?> ">
										<?= $Destinatarios->nombre." - ".$Destinatarios->cargo; ?>
									</option>
								<?php endif ?>
							<?php endforeach ?>
						</select> 
					</div>  				
					<div class="form-group">
						<label for="procedencia">*REFERENCIA: (MÁXIMO 100 CARACTERES)</label>						
						<input type="text" name="procedencia" value="<?= set_value('procedencia'); ?>" id="procedencia" class="form-control" size="5" maxlength="99" required>
					</div>
					<div class="form-group">
						<label for="asunto"> *PROVEIDO: (MÁXIMO 500 CARACTERES)</label>          
						<textarea name="asunto" id="asunto" class="form-control" rows="5" maxlength="499" required><?= set_value('asunto'); ?></textarea>					
					</div>
					<div class="pull-left">
						<div class="form-group" data-toggle="tooltip" title="DOCUMENTOS WORD, EXCEL, POWER POINT Y PDF TAMAÑO MAXIMO 1MB!">
							<input type="checkbox" id="chkSiEnviarAdjunto" name="sienviaradjunto" value="TRUE" checked/>
							<a href="#" >
								<label for="adjunto_externo">ADJUNTAR EXTERNO </label>
							</a>
							<input type="file" id="adjuntarExterno" name="adjunto_externo" title="DOCUMENTOS WORD, EXCEL, POWER POINT Y PDF TAMAÑO MAXIMO 1MB!">
							<p class="help-block">DOCUMENTOS WORD Y PDF TAMAÑO MAXIMO 1MB!</p>
						</div>
					</div>
					<div class="pull-right">
						<div class="form-group">                
							<button type="submit" class="btn btn-success btn-lg" id="btnEnviar">Emitir</button>
						</div> 
					</div>                    
				</div>  
			</div>
		</form>
        <?php echo validation_errors('<div class="alert alert-danger">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>'); ?>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();   
});
$(document).ready(function() {
	$('#NuevoRespuesta').bootstrapValidator({
		framework: 'bootstrap',
		message: 'Este valor no es valido',
		feedbackIcons: {
			validating: 'glyphicon glyphicon-refresh'
		},
		fields : {
            destinatario :{

            },
			referencia : {
				validators : {
					notEmpty:{
						message: 'Referencia es un dato requerido'
					},
					stringLength: {
						message: 'La referencia debe tener entre 5 a 500 carácteres',
						max: 99,
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
						message: 'El Asunto debe tener entre 5 a 500 carácteres',
						max: 499,
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
});
</script>