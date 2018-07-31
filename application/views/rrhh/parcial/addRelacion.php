<form method="POST" action="<?= base_url().'rrhh/relacion/'.$action; ?>"  id="frmAddRelacion">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title">Nueva Relacion Familiar de: <?= $Usuario->nombres." ".$Usuario->apellidoPaterno." ".$Usuario->apellidoMaterno ?></h4>
	</div>
	<div class="modal-body">
		<div class="form-group">
			<label for="TipoRelacion">Tipo de relación</label>
			<select name="TipoRelacion" class="form-control" id="TipoRelacion">
				<option value="">--SELECCIONE TIPO DE RELACIÓN--</option>
	    		<option value="Padre">Padre</option>
	    		<option value="Madre">Madre</option>
	    		<option value="Conyugue">Conyugue</option>
	    		<option value="Hijo(a)">Hijo(a)</option>	    		
	    		<option value="Sobrino(a)">Sobrino(a)</option>
	    		<option value="Tio(a)">Tio(a)</option>	    		
	    		<option value="Amigo(a)">Amigo(a)</option>
	    		<option value="Abuelo(a)">Abuelo(a)</option>
	    		<option value="Nieto(a)">Nieto(a)</option>
	    	</select>
		</div>
		<div class="form-group">
			<label for="nombres">Nombre Completo</label>						
			<input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombre Completo">
		</div>
		<div class="form-group">
			<label for="codigoSeguro">Codigo Seguro</label>						
			<input type="text" class="form-control" id="codigoSeguro" name="codigoSeguro" placeholder="Codigo Seguro">
		</div>
		<div class="form-group">
			<label for="domicilio">Domicilio</label>						
			<input type="text" class="form-control" id="domicilio" name="domicilio" placeholder="Domicilio">
		</div>
		<div class="form-group">
			<label for="telefono">Teléfono</label>						
			<input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono">
		</div>
		<div class="form-group">
			<label for="celular">Celular</label>						
			<input type="text" class="form-control" id="celular" name="celular" placeholder="Celular">
		</div>
		<input type="hidden" name="estado" id="estado" class="form-control" value="1">
		<input type="hidden" name="id_usuario" id="id_usuario" class="form-control" value="<?=$Usuario->idusuario?>">		
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Añadir Relacion Familiar</button>
	</div>
</form>	
<script type="text/javascript">	
$(document).ready(function() {	
	$('#frmAddRelacion').bootstrapValidator({
		framework: 'bootstrap',
		message: 'Este valor no es valido',
		live: 'enabled',
		feedbackIcons: {
            validating: 'glyphicon glyphicon-refresh'
        },
        fields:{
        	nombres: {
        		validators:{
        			notEmpty:{
        				message:'El Nombre Completo es un dato requerido'
        			}
        		}
        	}
        }
	});
	$('#dtpfecha').datetimepicker({
        viewMode: 'years',
        format: 'YYYY/MM/DD'
    });
});
</script>