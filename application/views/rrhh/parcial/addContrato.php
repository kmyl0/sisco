<form method="POST" action="<?= base_url().'rrhh/contrato/'.$action; ?>" id="frmAddContrato">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title">Nuevo contrato de: <?= $Usuario->nombres." ".$Usuario->apellidoPaterno." ".$Usuario->apellidoMaterno ?></h4>
	</div>
	<div class="modal-body">
		<input type="hidden" name="id_usuario" id="id_usuario" class="form-control" value="<?=$Usuario->idusuario?>">
		<input type="hidden" name="id_contratante" id="id_contratante" class="form-control" value="<?=$idContratante?>">
		<div class="form-group">
			<label for="LugarTrabajo">Lugar Trabajo</label>
			<select name="LugarTrabajo" class="form-control" id="LugarTrabajo">
				<option value="">--SELECCIONE UN LUGAR DE TRABAJO--</option>
	    		<option value="La Paz">La Paz</option>
	    		<option value="Cochabamba">Cochabamba</option>
	    		<option value="Santa Cruz">Santa Cruz</option>
	    		<option value="Oruro">Oruro</option>
	    		<option value="Potosi">Potosi</option>
	    		<option value="Beni">Beni</option>
	    		<option value="Pando">Pando</option>
	    		<option value="Sucre">Sucre</option>
	    		<option value="Tarija">Tarija</option>
	    	</select>
		</div>
		<div class="form-group">
			<label for="fechaIngreso">Fecha de ingreso</label>
			<div class='input-group' id='dtpFechaIngreso'>
				<span class="input-group-addon">
		            <span class="glyphicon glyphicon-calendar"></span>
		        </span>						
				<input type="text" class="form-control" id="fechaIngreso" name="fechaIngreso" placeholder="Fecha de ingreso">
			</div>
		</div>
		<div class="form-group">
			<label for="fechaSalida">Fecha de salida</label>						
			<div class='input-group' id='dtpFechaSalida'>
				<span class="input-group-addon">
		            <span class="glyphicon glyphicon-calendar"></span>
		        </span>	
				<input type="text" class="form-control" id="fechaSalida" name="fechaSalida" placeholder="Fecha de Salida">
			</div>
		</div>
		<div class="form-group">
			<label for="cuentaBanco">Nro De Cuenta</label>						
			<input type="text" class="form-control" id="cuentaBanco" name="cuentaBanco" placeholder="Nro De Cuenta">
		</div>
		<div class="form-group">
			<label for="nombreBanco">Nombre del Banco que depende la cuenta</label>						
			<input type="text" class="form-control" id="nombreBanco" name="nombreBanco" placeholder="Nombre del Banco que depende la cuenta">
		</div>
		<div class="form-group">
			<label for="estado"> Estado del Cotrato</label>						
			<select name="estado" class="form-control" id="estado">
				<option value="VIGENTE">Contrato Vigente</option>
				<option value="VENCIDO">Contrato Vencido</option>
	    	</select>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Añadir contrato</button>
	</div>
</form>	
<script type="text/javascript">	
$(document).ready(function() {	
	$('#frmAddContrato').bootstrapValidator({
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