<form method="POST" action="<?= base_url().'rrhh/experiencia/'.$action; ?>" id="frmEditExperiencia">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title">Editar Experiencia Laboral</h4>
	</div>
	<div class="modal-body">
		<input type="hidden" name="idexperienciaLaboral" id="idexperienciaLaboral" class="form-control" value="<?= $Experiencia->idexperienciaLaboral?>">			
		<div class="form-group">
			<label for="nombreEmpresa">Nombre de la empresa que trabajó</label>						
			<input type="text" class="form-control" id="nombreEmpresa" name="nombreEmpresa" placeholder="Nombre de la empresa que trabajó" value="<?= $Experiencia->nombreEmpresa?>">
		</div>
		<div class="form-group">
			<label for="cargoEmpresa">Nombre del cargo que ejerció</label>						
			<input type="text" class="form-control" id="cargoEmpresa" name="cargoEmpresa" placeholder="Nombre del cargo que ejerció" value="<?= $Experiencia->cargoEmpresa?>">
		</div>	
		<input type="hidden" name="estado" id="estado" class="form-control" value="<?=$Experiencia->estado?>">
		<input type="hidden" name="id_usuario" id="id_usuario" class="form-control" value="<?=$Experiencia->id_usuario?>">
	</div>	
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Guardar</button>
	</div>
</form>	
<script type="text/javascript">	
$(document).ready(function() {	
	$('#frmEditExperiencia').bootstrapValidator({
		framework: 'bootstrap',
		message: 'Este valor no es valido',
		live: 'enabled',
		feedbackIcons: {
            validating: 'glyphicon glyphicon-refresh'
        },
        fields:{
        	nombreEmpresa: {
        		validators:{
        			notEmpty:{
        				message:'El nombre de la empresa es un dato requerido'
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