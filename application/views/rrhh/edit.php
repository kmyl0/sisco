<div class="container">
	<div class="page-header">
		<h1>Editar usuario
		</h1>
	</div>
	<div class="row-fluid">
		<div class="alert alert-success alert-dismissable collapse" id="Confirm">
			<button type="button" class="close" id="CloseConfirm">&times;</button>
			<strong>Estado: </strong>Datos Guardados Correctamente
		</div>	
	</div>
	<div class="col-md-12">
		<div id="configuracionAcceso"> <!-- Datos de Acceso -->
			<form method="POST" action="<?= base_url(); ?>user/edit_access" id="frmAcceso">
				<input type="hidden" name="idusuario" id="idusuario" class="form-control" value="<?=$DatosPersonales->idusuario?>">
				<div class="form-group">
					<label for="estado">Estado</label>
					<select name="estado" id="estado" class="form-control" >
						<option value="1" 	<?php if ($DatosPersonales->estado == 1): ?> selected<?php endif ?> >HABILITADO</option>
						<option value="0" 	<?php if ($DatosPersonales->estado == 0): ?> selected<?php endif ?> >DESABILITADO</option>
		        	</select>
				</div>
				<div class="form-group">
					<label for="identificacion">Identificación (Email)</label>						
					<input type="text" class="form-control" id="identificacion" name="email" placeholder="Identificación" value="<?= $DatosPersonales->email ?>">
				</div>
				<div class="form-group">
					<label for="autenticacion">Autenticación (Contraseña)</label>
					<input type="text" class="form-control" id="autenticacion" name="password" placeholder="Autenticación" value="<?= $DatosPersonales->password ?>">
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
					<label for="cargo">Area *</label>
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
				<div class="form-group">
					<label for="rol">Rol</label>
					<select name="rol" class="form-control" id="rol">
						<option value="ADMINISTRADOR" 	<?php if ($DatosPersonales->rol == 'ADMINISTRADOR'): ?> selected<?php endif ?> >ADMINISTRADOR</option>
						<option value="USUARIO" 		<?php if ($DatosPersonales->rol == 'USUARIO'): ?> 		selected<?php endif ?> >USUARIO</option>
						<option value="EMPLEADO" 		<?php if ($DatosPersonales->rol == 'EMPLEADO'): ?> 		selected<?php endif ?> >EMPLEADO</option>
		        	</select>
				</div>
				<legend>Configuracion de acceso</legend>
				<div class="form-group">
					<label for="cfgConductoRegular">Nivel de envios</label>						
					<select name="cfgConductoRegular" class="form-control" id="cfgConductoRegular">
						<option value="1" 	<?php if ($DatosPersonales->cfgConductoRegular == '1'): ?> selected<?php endif ?> >Global</option>
						<option value="0" 	<?php if ($DatosPersonales->cfgConductoRegular == '0'): ?> selected<?php endif ?> >Jerarquia</option>
		        	</select>
				</div>
				<button type="submit" class="btn btn-success" id="btnGuardarAcceso">Guardar</button>
			</form>
		</div><!-- FIN: Datos Acceso -->			
	</div>
</div>	

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
    // $(document).ready(function() {    	
    //     $('#dtpFechaIngresoPersonal').datetimepicker({
    //         viewMode: 'years',
    //         format: 'YYYY/MM/DD'
    //     });
    //     $('#dtpfechaSalidaPersonal').datetimepicker({
    //         viewMode: 'years',
    //         format: 'YYYY/MM/DD'
    //     });
    //     $('#dtpfechaIngresoProfesion').datetimepicker({
    //         viewMode: 'years',
    //         format: 'YYYY/MM/DD'
    //     });
    //     $('#dtpfechaSalidaProfesion').datetimepicker({
    //         viewMode: 'years',
    //         format: 'YYYY/MM/DD'
    //     });
    //     $('#dtpfechaInicioExperiencia').datetimepicker({
    //         viewMode: 'years',
    //         format: 'YYYY/MM/DD'
    //     });
    //     $('#dtpfechafinExperiencia').datetimepicker({
    //         viewMode: 'years',
    //         format: 'YYYY/MM/DD'
    //     });
    //     


    // 
    // });
</script>