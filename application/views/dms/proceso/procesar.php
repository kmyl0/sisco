<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="page-header">
					<h1>
						Emitir documento
						<div class="pull-right">
							Ruta Nro: <?= $id_ruta; ?>
						</div>
					</h1>
				</div>					
			</div> 	
			<form action="<?= base_url();?>dms/procesar_action" id="NuevoRespuesta" enctype="multipart/form-data" method="POST" accept-charset="utf-8">

				<input type="hidden" name="idproveido" id="inputIdProveido" class="form-control" value="<?= $idproveido?>">
				<input type="hidden" name="id_ruta" id="inputidruta" class="form-control" value="<?= $id_ruta?>">
				
				<div class="col-md-12">
					<div class="form-group">
						<label for="cite">CITE:</label>
						<input type="text" name="cite" value="<?php echo $AutorSigla.' - '. $AutorNroinforme; ?>" class="form-control" readonly="off">
					</div> 
					<div class="form-group">
						<label for="fecha">FECHA:</label>
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
						<?php if (isset($UsuariosPadres)): ?>
								<optgroup label="Conducto Regular Superior">
									<?php foreach ($UsuariosPadres as $padre): ?>
										<option value=" <?= $padre->idusuario; ?> ">
											<?= $padre->nombres." ".$padre->apellidoPaterno." ".$padre->apellidoMaterno." - ".$padre->cargo; ?>
										</option>
									<?php endforeach ?>
								</optgroup>
						<?php endif ?>
						<?php if (isset($UsuariosHermanos)): ?>
								<optgroup label="Conducto Regular Medio">
									<?php foreach ($UsuariosHermanos as $hermano): ?>
										<?php if ($hermano->idusuario != $AutorId): ?>
											<option value=" <?= $hermano->idusuario; ?> ">
											<?= $hermano->nombres." ".$hermano->apellidoPaterno." ".$hermano->apellidoMaterno." - ".$hermano->cargo; ?>
										</option>
										<?php endif ?>
									<?php endforeach ?>
								</optgroup>
						<?php endif ?>
						<?php if (isset($UsuariosHijos)): ?>
								<optgroup label="Conducto Regular Inferior">
									<?php foreach ($UsuariosHijos as $hijo): ?>
										<option value=" <?= $hijo->idusuario; ?> ">
											<?= $hijo->nombres." ".$hijo->apellidoPaterno." ".$hijo->apellidoMaterno." - ".$hijo->cargo; ?>
										</option>
									<?php endforeach ?>
								</optgroup>
						<?php endif ?>
						</select> 
					</div>  				
					<div class="form-group">
						<label for="referencia">REFERENCIA:</label>						
						<input type="text" name="referencia" id="referencia" class="form-control" size="5" maxlength="500" readonly="True" value="<?= $procedencia?>">
					</div>
					<div class="form-group">
						<label for="asunto"> *ASUNTO: (MÁXIMO 500 CARACTERES) </label>          
						<textarea name="asunto" id="asunto" class="form-control" required rows="5"></textarea>					
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
			referencia : {
				validators : {
					notEmpty:{
						message: 'Referencia es un dato requerido'
					},
					stringLength: {
						message: 'La referencia debe tener entre 5 a 500 carácteres',
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
						message: 'El Asunto debe tener entre 5 a 500 carácteres',
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
});
</script>