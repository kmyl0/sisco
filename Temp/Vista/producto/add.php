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
            categoria : {
                validators : {
                    notEmpty : {
                        message : 'El Categoria es un dato requerido'
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
	echo form_open_multipart('producto/add', 'id="frmNuevoUsuario"'); 
?>
	<div class="col-md-6 col-md-offset-3">	
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input name="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">
		</div>
		<div class="form-group">
			<label for="categoria">Categoria *</label><br>
			<select name="categoria" class="form-control" required>
				<option value="">--SELECCIONE UN CATEGORIA--</option>
	<?php foreach ($Categorias as $categoria): ?>
				<option value="<?= $categoria->idcategoria; ?>"><?= $categoria->nombre; ?></option>				        			
    <?php endforeach ?>		        		
	    	</select>
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
