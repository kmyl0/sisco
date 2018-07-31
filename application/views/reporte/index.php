<div class="container">
	<div class="page-header">		
		<h1>Reportes: <small></small></h1>
	</div>
	<div class="col-md-12">
		<form method="POST" action="<?= base_url();?>reporte/buscar_action" class="form-group" id="frmBuscarReporte">
			<div class="form-group">
				<input type="search" name="txtBuscar" id="txtBuscar" class="form-control" placeholder="Buscar" required>						
			</div>
			<div class="form-group">			
				<label class="checkbox-inline"><input type="checkbox" name="tipoBusqueda[]" value="0">Numero de ruta</label>				
				<label class="checkbox-inline"><input type="checkbox" name="tipoBusqueda[]" value="1">Referencia</label>
				<label class="checkbox-inline"><input type="checkbox" name="tipoBusqueda[]" value="2">Resumen</label>			
				<label class="checkbox-inline"><input type="checkbox" name="tipoBusqueda[]" value="3">Autor</label>				
			</div>
			<div class="form-group">
				<button class="btn btn-success" type="submit">Buscar</button>		
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	$('#frmBuscarReporte').bootstrapValidator({
		framework: 'bootstrap',
		message: 'Este valor no es valido',
		feedbackIcons: {
			validating: 'glyphicon glyphicon-refresh'
		},
		fields : {
			txtBuscar : {
				validators : {
					notEmpty:{
						message: 'Buscar es un dato requerido'					
					}
				}
			},
			'tipoBusqueda[]' : {
				validators : {
					notEmpty :{
						message : 'Elija una opcion de busqueda'
					}
				}
			}
		}
	});
	$("td:contains('<?= $busqueda;?>')").css("background", "#002525");
});
</script>
