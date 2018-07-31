<script type="text/javascript">
$(document).ready(function() {
	$('#frmNuevoUsuario').bootstrapValidator({
		framework: 'bootstrap',
        message: 'Este valor no es valido',
        feedbackIcons: {
            validating: 'glyphicon glyphicon-refresh'
        },
        fields : {
            email : {
                validators : {
                    notEmpty : {
                        message : 'El correo es un dato requerido'
                    },
                    emailAddress : {
                        message : 'El correo no esta en un formato conocido'
                    }
                }
            },
            password : {
                validators : {
                    notEmpty : {
                        message : 'La contraseña es un dato requerido'
                    }
                }
            },
            cargo: {
            	validators: {
            		notEmpty: {
            			message: 'El cargo es un dato requerido'
            		}
            	}
            },
            area: {
            	validators: {
            		notEmpty: {
            			message: 'El departamento es un dato requerido'
            		}
            	}
            },
            dependencia: {
            	validators: {
            		notEmpty: {
            			message: 'El dependencia es un dato requerido'
            		}
            	}
            }
        }
    });
});
</script>
<div class="container">
	<div class="page-header">
		<h1>Nuevo Usuario</h1>
	</div>
<?php 
	$hidden = array('tipoEdit' => 1);
	echo form_open_multipart('user/create', 'id="frmNuevoUsuario"', $hidden); 
?>
	<div class="col-md-6 col-md-offset-3">	
		<div class="form-group">
			<label for="email">Correo Electronico *</label>
			<input type="text" class="form-control" id="email" name="email" placeholder="Correo Electronico">
		</div>
		<div class="form-group">
			<label for="password">Contraseña *</label>				
			<input type="text" class="form-control" id="password" name="password" placeholder="Contraseña">
		</div>
		<div class="form-group">
			<label for="cargo">Cargo *</label><br>
			<select name="cargo" class="form-control" required>
				<option value="">--SELECCIONE UN CARGO--</option>
	<?php foreach ($Cargos as $cargo): ?>
				<option value="<?= $cargo->idcargo; ?>"><?= $cargo->nombre; ?></option>				        			
    <?php endforeach ?>		        		
	    	</select>
		</div>
		<div class="form-group">
			<label for="area">Área *</label><br>
			<select name="area" class="form-control" required>
				<option value="">--SELECCIONE UN ÁREA--</option>
	<?php foreach ($Areas as $area): ?>
				<option value="<?= $area->idarea?>"><?= $area->nombre; ?></option>
	<?php endforeach ?>
	    	</select>
		</div>
		<div class="form-group">
			<label for="dependencia">Dependencia *</label><br>
			<select name="dependencia" class="form-control" required>
				<option value="">--SELECCIONE UNA DEPENDENCIA--</option>
	<?php foreach ($Cargos as $cargo): ?>
				<option value="<?= $cargo->idcargo; ?>"><?= $cargo->nombre; ?></option>				        			
    <?php endforeach ?>		        		
	    	</select>
		</div>
		<div class="form-group">
			<label for="estado">Estado *</label>
			<select name="estado" id="estado" class="form-control" required="required">
				<option value="">--SELECCIONE ESTADO--</option>
				<option value="1">HABILITADO</option>
				<option value="0">DESHABILITADO</option>
			</select>
		</div>
		<div class="form-group">
			<label for="rol">Rol *</label>
			<select name="rol" id="rol" class="form-control" required="required">
				<option value="">--SELECCIONE ROL--</option>
				<option value="ADMINISTRADOR">ADMINISTRADOR</option>
				<option value="USUARIO">USUARIO</option>
				<option value="EMPLEADO">EMPLEADO</option>
			</select>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Crear Usuario</button>
		</div>
	</div>
	<?php echo validation_errors(); ?>
<?php echo form_close(); ?>
</div>
