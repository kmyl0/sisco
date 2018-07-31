<form method="POST" action="<?= base_url().'rrhh/relacion/'.$action; ?>"  id="frmAddRelacion">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title">Editar Relacion Familiar</h4>
	</div>
	<div class="modal-body">
		<input type="hidden" name="idrelacionFamiliar" id="inputIdrelacionFamiliar" class="form-control" value="<?= $Relacion->idrelacionFamiliar; ?>">
		<div class="form-group">
			<label for="TipoRelacion">Tipo de relación</label>
			<select name="TipoRelacion" class="form-control" id="TipoRelacion">
	    		<option value="Padre" 		<?php if ($Relacion->TipoRelacion == "Padre"): ?> 		selected <?php endif ?> >Padre</option>
	    		<option value="Madre" 		<?php if ($Relacion->TipoRelacion == "Madre"): ?> 		selected <?php endif ?> >Madre</option>
	    		<option value="Conyugue" 	<?php if ($Relacion->TipoRelacion == "Conyugue"): ?> 	selected <?php endif ?> >Conyugue</option>
	    		<option value="Hijo(a)" 	<?php if ($Relacion->TipoRelacion == "Hijo(a)"): ?> 	selected <?php endif ?> >Hijo(a)</option>	    		
	    		<option value="Sobrino(a)" 	<?php if ($Relacion->TipoRelacion == "Sobrino(a)"): ?> 	selected <?php endif ?> >Sobrino(a)</option>
	    		<option value="Tio(a)" 		<?php if ($Relacion->TipoRelacion == "Tio(a)"): ?> 		selected <?php endif ?> >Tio(a)</option>	    		
	    		<option value="Amigo(a)" 	<?php if ($Relacion->TipoRelacion == "Amigo(a)"): ?> 	selected <?php endif ?> >Amigo(a)</option>
	    		<option value="Abuelo(a)"	<?php if ($Relacion->TipoRelacion == "Abuelo(a)"): ?> 	selected <?php endif ?> >Abuelo(a)</option>
	    		<option value="Nieto(a)" 	<?php if ($Relacion->TipoRelacion == "Nieto(a)"): ?> 	selected <?php endif ?> >Nieto(a)</option>
	    	</select>
		</div>
		<div class="form-group">
			<label for="nombres">Nombre Completo</label>						
			<input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombre Completo" value="<?= $Relacion->nombres; ?>">
		</div>
		<div class="form-group">
			<label for="codigoSeguro">Codigo Seguro</label>						
			<input type="text" class="form-control" id="codigoSeguro" name="codigoSeguro" placeholder="Codigo Seguro" value="<?= $Relacion->codigoSeguro; ?>">
		</div>
		<div class="form-group">
			<label for="domicilio">Domicilio</label>						
			<input type="text" class="form-control" id="domicilio" name="domicilio" placeholder="Domicilio" value="<?= $Relacion->domicilio; ?>">
		</div>
		<div class="form-group">
			<label for="telefono">Teléfono</label>						
			<input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" value="<?= $Relacion->telefono; ?>">
		</div>
		<div class="form-group">
			<label for="celular">Celular</label>						
			<input type="text" class="form-control" id="celular" name="celular" placeholder="Celular" value="<?= $Relacion->celular; ?>">
		</div>
		<input type="hidden" name="estado" id="estado" class="form-control" value="1">
		<input type="hidden" name="id_usuario" id="id_usuario" class="form-control" value="<?=$Relacion->id_usuario?>">		
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Guardar</button>
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