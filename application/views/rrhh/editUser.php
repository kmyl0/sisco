<form method="POST" action="<?= base_url(); ?>rrhh/editUser_proccess" id="frmAcceso">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title"><?= $DatosPersonales->nombres." ".$DatosPersonales->apellidoPaterno." ".$DatosPersonales->apellidoMaterno ?></h4>
	</div>
	<div class="modal-body">
		<input type="hidden" name="idusuario" id="idusuario" class="form-control" value="<?=$DatosPersonales->idusuario?>">
		<div class="form-group">
			<label for="estado">Estado</label>
			<select name="estado" id="estado" class="form-control" >
				<option value="1" 	<?php if ($DatosPersonales->estado == 1): ?> selected<?php endif ?> >HABILITADO</option>
				<option value="0" 	<?php if ($DatosPersonales->estado == 0): ?> selected<?php endif ?> >DESABILITADO</option>
	    	</select>
		</div>
		<div class="form-group">
			<label for="email">Identificación (Email)</label>						
			<input type="text" class="form-control" id="email" name="email" placeholder="Identificación" value="<?= $DatosPersonales->email ?>">
		</div>
		<div class="form-group">
			<label for="password">Autenticación (Contraseña)</label>
			<input type="text" class="form-control" id="password" name="password" placeholder="Autenticación" value="<?= $DatosPersonales->password ?>">
		</div>
		<div class="form-group">
			<label for="cargo">Cargo *</label>
			<select name="cargo" class="form-control" id="cargo">
				<?php foreach ($Cargos as $cargo): ?>
					<option value="<?= $cargo->idcargo; ?>" <?php if ($DatosPersonales->cargo == $cargo->nombre): ?> selected <?php endif ?> ><?= $cargo->nombre; ?></option>
				<?php endforeach ?>		        		
	    	</select>
		</div>
		<div class="form-group">
			<label for="area">Area *</label>
			<select name="area" class="form-control" id="area">
			<?php foreach ($Areas as $area): ?>
				<option value="<?= $area->idarea?>" <?php if ($DatosPersonales->area == $area->nombre): ?> selected <?php endif ?> ><?= $area->nombre; ?></option>
			<?php endforeach ?>
	    	</select>
		</div>
		<div class="form-group">
			<label for="dependencia">Dependencia *</label>
			<select name="dependencia" class="form-control" id="dependencia">
			<?php foreach ($Cargos as $cargo): ?>
				<option value="<?= $cargo->idcargo; ?>" <?php if ($DatosPersonales->dependencia == $cargo->nombre): ?> selected <?php endif ?> ><?= $cargo->nombre; ?></option>				        			
		    <?php endforeach ?>		        		
	    	</select>
		</div>
		<legend>Configuracion de acceso</legend>
		<div class="form-group">
			<label for="rol">Rol</label>
			<select name="rol" class="form-control" id="rol">
				<option value="ADMINISTRADOR" 	<?php if ($DatosPersonales->rol == 'ADMINISTRADOR'): ?> selected<?php endif ?> >ADMINISTRADOR</option>
				<option value="USUARIO" 		<?php if ($DatosPersonales->rol == 'USUARIO'): ?> 		selected<?php endif ?> >USUARIO</option>
				<option value="EMPLEADO" 		<?php if ($DatosPersonales->rol == 'EMPLEADO'): ?> 		selected<?php endif ?> >EMPLEADO</option>
	    	</select>
		</div>
		<div class="form-group">
			<label for="cfgConductoRegular">Conducto Regular</label>						
			<select name="cfgConductoRegular" class="form-control" id="cfgConductoRegular">
				<option value="1" 	<?php if ($DatosPersonales->cfgConductoRegular == '1'): ?> selected<?php endif ?> >Global</option>
				<option value="0" 	<?php if ($DatosPersonales->cfgConductoRegular == '0'): ?> selected<?php endif ?> >Jerarquia</option>
	    	</select>
		</div>
		<div class="form-group">
			<label for="cfgNuevoInforme">Nuevo informe</label>						
			<select name="cfgNuevoInforme" class="form-control" id="cfgNuevoInforme">
				<option value="1" 	<?php if ($DatosPersonales->cfgNuevoInforme == '1'): ?> selected<?php endif ?> >Activado</option>
				<option value="0" 	<?php if ($DatosPersonales->cfgNuevoInforme == '0'): ?> selected<?php endif ?> >Desactivado</option>
	    	</select>
		</div>
		<div class="form-group">
			<label for="codigoBiometrico">ID Biométrico</label>
			<input type="text" class="form-control" id="codigoBiometrico" name="codigoBiometrico" placeholder="ID Biométrico" value="<?= $DatosPersonales->codigoBiometrico ?>">
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Guardar Cambios</button>
	</div>
</form>	
<script type="text/javascript">	
$(document).ready(function() {	
	$('#frmAcceso').bootstrapValidator({
		framework: 'bootstrap',
		message: 'Este valor no es valido',
		live: 'enabled',
		feedbackIcons: {
            validating: 'glyphicon glyphicon-refresh'
        },
        fields:{
        	email: {
        		validators:{
        			notEmpty:{
        				message:'El email es un dato requerido'
        			},
        			emailAddress: {
                        message: 'No es un correo electronico'
                    }
        		}
        	},
        	password:{        		
        		validators:{
        			notEmpty:{
        				message:'La contraseña es un dato requerido'
        			}
        		}
        	}
        }
	});
});
</script>