<form method="POST" action="<?= base_url().'rrhh/user/'.$action; ?>" id="frmNuevoUsuario">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title">Añadir Usuario</h4>
	</div>
	<div class="modal-body">	
		<div class="form-group">
			<label for="email">Correo Electronico *</label>
			<input type="text" class="form-control" id="email" name="email" placeholder="Correo Electronico">
		</div>
		<div class="form-group">
			<label for="password">Contraseña *</label>				
			<input type="text" class="form-control" id="password" name="password" placeholder="Contraseña">
		</div>		
		<div class="form-group">
			<label for="estado">Estado *</label>
			<select name="estado" id="estado" class="form-control" required="required">
				<option value="">--SELECCIONE ESTADO--</option>
				<option value="1">HABILITADO</option>
				<option value="0">DESHABILITADO</option>
			</select>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Crear Usuario</button>
	</div>
</form>
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
            estado : {
                validators : {
                    notEmpty : {
                        message : 'El rol es un dato requerido'
                    }
                }
            }
        }
    });
});
</script>