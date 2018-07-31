<form method="POST" action="<?= base_url().'rrhh/formacion/'.$action; ?>" id="frmAddFormacion">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title">Nueva Formación académica de: <?= $Usuario->nombres." ".$Usuario->apellidoPaterno." ".$Usuario->apellidoMaterno ?></h4>
	</div>
	<div class="modal-body">
		<input type="hidden" name="id_usuario" id="id_usuario" class="form-control" value="<?=$Usuario->idusuario?>">
		<input type="hidden" name="estado" id="estado" class="form-control" value="1">
		<div class="form-group">
			<label for="nombre">Nombre del curso, diplomado, especializacion, certificación</label>						
			<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del curso, diplomado, especializacion, certificación">
		</div>
		<div class="form-group">
			<label for="institucion">Nombre de la institucion</label>						
			<input type="text" class="form-control" id="institucion" name="institucion" placeholder="Nombre de la Institucion">
		</div>
		<div class="form-group">
			<label for="pais">País</label>						
			<input type="text" class="form-control" id="pais" name="pais" placeholder="País">
		</div>
		<div class="form-group">
			<label for="fecha">Fecha</label>
			<div class='input-group' id='dtpfecha'>
				<span class="input-group-addon">
		            <span class="glyphicon glyphicon-calendar"></span>
		        </span>						
				<input type="text" class="form-control" id="fecha" name="fecha" placeholder="Fecha">
			</div>
		</div>		
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Añadir Formacion</button>
	</div>
</form>	
<script type="text/javascript">	
$(document).ready(function() {	
	$('#frmAddFormacion').bootstrapValidator({
		framework: 'bootstrap',
		message: 'Este valor no es valido',
		live: 'enabled',
		feedbackIcons: {
            validating: 'glyphicon glyphicon-refresh'
        },
        fields:{
        	nombre: {
        		validators:{
        			notEmpty:{
        				message:'El cuso es un dato requerido'
        			}
        		}
        	},
        	institucion:{        		
        		validators:{
        			notEmpty:{
        				message:'La institución es un dato requerido'
        			}
        		}
        	},
        	fecha:{        		
        		validators:{
        			notEmpty:{
        				message:'La fecha es un dato requerido'
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