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
            }
        }
    });
});
</script>
<div class="container">
	<div class="page-header">
		<h1>Nuevo Categoria</h1>
	</div>
<?php 
	$hidden = array('estado' => 1);
	echo form_open_multipart('categoria/add', 'id="frmNuevoUsuario"', $hidden); 
?>
	<div class="col-md-6 col-md-offset-3">	
		<div class="form-group">
			<label for="nombre">Nombre *</label>
			<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Añadir Categoria</button>
		</div>
	</div>
	<?php echo validation_errors(); ?>
<?php echo form_close(); ?>
</div>
