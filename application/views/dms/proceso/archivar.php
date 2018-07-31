<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="page-header">
					<h1>
						Archivar ruta
						<div class="pull-right">
							Ruta Nro: <?= $id_ruta; ?>
						</div>
					</h1>
				</div>					
			</div> 	
			<form action="<?= base_url(); ?>dms/archivar_action" id="NuevoRespuesta" enctype="multipart/form-data" method="POST" accept-charset="utf-8">

				<input type="hidden" name="idproveido" id="inputIdProveido" class="form-control" value="<?= $idproveido?>">
				<input type="hidden" name="id_ruta" id="inputidruta" class="form-control" value="<?= $id_ruta?>">

				<div class="col-md-12">
					<div class="form-group">
						<label for="fecha">FECHA</label>
						<input type="text" name="fecha" value="<?= date('Y-m-d'); ?>" class="form-control" readonly="readonlyoff">
					</div>
					<div class="form-group">
						<label for="remitente">REMITENTE:</label>
						<input type="text" name="remitente"  value=" <?= $AutorNombre.' - '. $AutorCargo?>" class="form-control" placeholder="Remitente" readonly="readonly">
					</div>					 
					<div class="form-group">
						<label for="referencia">REFERENCIA:</label>						
						<input type="text" name="referencia" id="referencia" class="form-control" size="5" maxlength="500" readonly="readonly" value="<?= $procedencia?>">
					</div>
					<div class="form-group">
						<label for="textareaProveido">ASUNTO:</label>
						<textarea name="asunto" id="textareaProveido" class="form-control" rows="4" required="required" placeholder="Destinatario -> Accion -> Nro de Informe -> Solicitud"></textarea>
					</div>
					<div class="pull-right">						 
						<div class="form-group">                
							<button type="submit" class="btn btn-success btn-lg" id="btnEnviar">Archivar</button>
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