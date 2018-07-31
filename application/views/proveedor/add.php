<script type="text/javascript">
$(document).ready(function() {
	$('#frmNuevoUsuario').bootstrapValidator({
		framework: 'bootstrap',
        message: 'Este valor no es valido',
        feedbackIcons: {
            validating: 'glyphicon glyphicon-refresh'
        },
        fields : {
            nombre : {
                validators : {
                    notEmpty : {
                        message : 'El Nombre es un dato requerido'
                    }
                }
            },
            nit : {
                validators : {
                    notEmpty : {
                        message : 'El Nombre es un dato requerido'
                    }
                }
            }
        }
    });
});
</script>
<div class="container">
	<div class="page-header">
		<h1>Nuevo Proveedor</h1>
	</div>
<?php
	echo form_open_multipart('proveedor/add', 'id="frmNuevoUsuario"'); 
?>
	<div class="col-md-6 col-md-offset-3">	
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input name="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">
		</div>
		<div class="form-group">
			<label for="nit">NIT</label>
			<input name="nit" type="text" class="form-control" id="nit" placeholder="NIT">
		</div>
		<div class="form-group">
			<label for="direccion">Dirección</label>
			<input name="direccion" type="text" class="form-control" id="direccion" placeholder="Dirección">
		</div>
		<div class="form-group">
			<label for="telefono">Teléfono</label>
			<input name="telefono" type="text" class="form-control" id="telefono" placeholder="Teléfono">
		</div>
		<div class="form-group">
			<label for="observacion">Observación</label>
			<input name="observacion" type="text" class="form-control" id="observacion" placeholder="Observación">
		</div>
		<div class="form-group">
			<label for="url">URL</label>
			<input name="url" type="text" class="form-control" id="url" placeholder="URL">
		</div>
		<div class="form-group">
			<label for="estado">Estado</label>
			<select name="estado" id="estado" class="form-control" required="required">
				<option value="1">HABILITADO</option>
				<option value="0">DESHABILITADO</option>
			</select>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Añadir Proveedor</button>
		</div>
	</div>
	<?php echo validation_errors(); ?>
<?php echo form_close(); ?>
</div>
