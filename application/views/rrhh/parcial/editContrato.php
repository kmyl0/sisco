<form method="POST" action="<?= base_url().'rrhh/contrato/'.$action; ?>" id="frmEditContrato">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title">Editar Contrato</h4>
	</div>
	<div class="modal-body">
		<input type="hidden" name="idcontrato" id="idcontrato" class="form-control" value="<?= $Contrato->idcontrato;?>">		
		<input type="hidden" name="id_contratante" id="id_contratante" class="form-control" value="<?= $Contrato->id_contratante;?>">
		<input type="hidden" name="id_usuario" id="id_usuario" class="form-control" value="<?= $Contrato->id_empleado;?>">
		<div class="form-group">
			<label for="LugarTrabajo">Lugar Trabajo</label>
			<select name="LugarTrabajo" class="form-control" id="LugarTrabajo">				
	    		<option value="La Paz" 		<?php if ($Contrato->LugarTrabajo == "La Paz"): ?> 		selected	<?php endif ?> >La Paz</option>
	    		<option value="Cochabamba"	<?php if ($Contrato->LugarTrabajo == "Cochabamba"): ?> 	selected	<?php endif ?> >Cochabamba</option>
	    		<option value="Santa Cruz" 	<?php if ($Contrato->LugarTrabajo == "Santa Cruz"): ?> 	selected	<?php endif ?> >Santa Cruz</option>
	    		<option value="Oruro" 		<?php if ($Contrato->LugarTrabajo == "Oruro"): ?> 		selected	<?php endif ?> >Oruro</option>
	    		<option value="Potosi" 		<?php if ($Contrato->LugarTrabajo == "Potosi"): ?> 		selected	<?php endif ?> >Potosi</option>
	    		<option value="Beni"  		<?php if ($Contrato->LugarTrabajo == "Beni"): ?> 		selected	<?php endif ?> >Beni</option>
	    		<option value="Pando" 		<?php if ($Contrato->LugarTrabajo == "Pando"): ?> 		selected	<?php endif ?> >Pando</option>
	    		<option value="Sucre" 		<?php if ($Contrato->LugarTrabajo == "Sucre"): ?> 		selected	<?php endif ?> >Sucre</option>
	    		<option value="Tarija" 		<?php if ($Contrato->LugarTrabajo == "Tarija"): ?> 		selected	<?php endif ?> >Tarija</option>
	    	</select>
		</div>
		<div class="form-group">
			<label for="fechaIngreso">Fecha de ingreso</label>
			<div class='input-group' id='dtpFechaIngreso'>
				<span class="input-group-addon">
		            <span class="glyphicon glyphicon-calendar"></span>
		        </span>						
				<input type="text" class="form-control" id="fechaIngreso" name="fechaIngreso" placeholder="Fecha de ingreso" value="<?= $Contrato->fechaIngreso; ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="fechaSalida">Fecha de salida</label>						
			<div class='input-group' id='dtpFechaSalida'>
				<span class="input-group-addon">
		            <span class="glyphicon glyphicon-calendar"></span>
		        </span>	
				<input type="text" class="form-control" id="fechaSalida" name="fechaSalida" placeholder="Fecha de Salida" value="<?= $Contrato->fechaSalida; ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="cuentaBanco">Nro De Cuenta</label>						
			<input type="text" class="form-control" id="cuentaBanco" name="cuentaBanco" placeholder="Nro De Cuenta" value="<?= $Contrato->cuentaBanco; ?>">
		</div>
		<div class="form-group">
			<label for="nombreBanco">Nombre del Banco que depende la cuenta</label>						
			<input type="text" class="form-control" id="nombreBanco" name="nombreBanco" placeholder="Nombre del Banco que depende la cuenta" value="<?= $Contrato->nombreBanco; ?>">
		</div>
		<div class="form-group">
			<label for="estado"> Estado del Contrato</label>						
			<select name="estado" class="form-control" id="estado">
				<option value="VIGENTE" <?php if ($Contrato->estado == "VIGENTE"): ?> selected 	<?php endif ?> >Contrato Vigente</option>
				<option value="VENCIDO" <?php if ($Contrato->estado == "VENCIDO"): ?> selected	<?php endif ?> >Contrato Vencido</option>
	    	</select>
		</div>		
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Guardar</button>
	</div>
</form>	
<script type="text/javascript">	
$(document).ready(function() {	
	$('#frmEditContrato').bootstrapValidator({
		framework: 'bootstrap',
		message: 'Este valor no es valido',
		live: 'enabled',
		feedbackIcons: {
            validating: 'glyphicon glyphicon-refresh'
        },
        fields:{
        	LugarTrabajo: {
        		validators:{
        			notEmpty:{
        				message:'El lugar de trabajo es un dato requerido'
        			}
        		}
        	},
        	fechaIngreso:{        		
        		validators:{
        			notEmpty:{
        				message:'La fecha de ingreso es un dato requerido'
        			}
        		}
        	}
        }
	});
	$('#dtpFechaIngreso').datetimepicker({
        viewMode: 'years',
        format: 'YYYY/MM/DD'
    });
    $('#dtpFechaSalida').datetimepicker({
        viewMode: 'years',
        format: 'YYYY/MM/DD'
    });
});
</script>