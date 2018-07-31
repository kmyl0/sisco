<form action="" method="POST" role="form" class="form-horizontal">
	<div class="form-group"> <!-- Apellido Paterno -->
		<label class="col-lg-2 control-label" for="apellidoPaterno">Apellido Paterno</label>
		<div class="input-group col-lg-9">
			<span class="input-group-addon">
				<input type="checkbox" id="chkApellidoPaterno">
			</span>				
			<input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno" placeholder="Apellido Paterno" readonly="true" value="<?= $DatosPersonales->apellidoPaterno ?>">
		</div>
	</div>
	<div class="form-group"> <!-- Apellido Materno -->
		<label class="col-lg-2 control-label" for="apellidoMaterno">Apellido Materno</label>
		<div class="input-group col-lg-9">
			<span class="input-group-addon">
				<input type="checkbox" id="chkApellidoMaterno">
			</span>
			<input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno" placeholder="Apellido Materno" readonly="true" value="<?= $DatosPersonales->apellidoMaterno ?>">
		</div>
	</div>
	<div class="form-group"> <!-- Nombres -->
		<label class="col-lg-2 control-label" for="nombres">Nombres</label>
		<div class="input-group col-lg-9">
			<span class="input-group-addon">
				<input type="checkbox" id="chkNombres">
			</span>
			<input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres" readonly="true" value="<?= $DatosPersonales->nombres ?>">
		</div>
	</div>
	<div class="form-group"> <!-- Cedula de identidad -->
		<label class="col-lg-2 control-label" for="ci">Cedula de Identidad</label>
		<div class="input-group col-lg-9">
			<span class="input-group-addon">
				<input type="checkbox" id="chkCi">
			</span>
			<input type="text" class="form-control" id="ci" name="ci" placeholder="Cedula de Identidad" readonly="true" value="<?= $DatosPersonales->ci ?>">
		</div>
	</div>
	<div class="form-group"> <!-- Expedido -->
		<label class="col-lg-2 control-label" for="expedido">Expedido</label>
		<div class="input-group col-lg-9">
			<span class="input-group-addon">
				<input type="checkbox" id="chkExpedido">
			</span>
			<select name="expedido" class="form-control" id="expedido" disabled="true">					        		
	    		<option value="La Paz" 		<?php if ($DatosPersonales->Expedido == 'La Paz'): ?> 		selected<?php endif ?> >La Paz</option>
	    		<option value="Cochabamba" 	<?php if ($DatosPersonales->Expedido == 'Cochabamba'): ?> 	selected<?php endif ?> >Cochabamba</option>
	    		<option value="Santa Cruz" 	<?php if ($DatosPersonales->Expedido == 'Santa Cruz'): ?> 	selected<?php endif ?> >Santa Cruz</option>
	    		<option value="Oruro"		<?php if ($DatosPersonales->Expedido == 'Oruro'): ?> 		selected<?php endif ?> >Oruro</option>
	    		<option value="Potosi" 		<?php if ($DatosPersonales->Expedido == 'Potosi'): ?> 		selected<?php endif ?> >Potosi</option>
	    		<option value="Beni" 		<?php if ($DatosPersonales->Expedido == 'Beni'): ?> 		selected<?php endif ?> >Beni</option>
	    		<option value="Pando" 		<?php if ($DatosPersonales->Expedido == 'Pando'): ?> 		selected<?php endif ?> >Pando</option>
	    		<option value="Sucre" 		<?php if ($DatosPersonales->Expedido == 'Sucre'): ?> 		selected<?php endif ?> >Sucre</option>
	    		<option value="Tarija" 		<?php if ($DatosPersonales->Expedido == 'Tarija'): ?> 		selected<?php endif ?> >Tarija</option>
	    	</select>	
	    </div>	
	</div>
	<div class="form-group"> <!-- Fecha de nacimiento -->
		<label class="col-lg-2 control-label" for="fechaNacimiento">Fecha de Nacimiento</label>
		<div class='input-group col-lg-9' id='dtpFechaNacimiento'>
			<span class="input-group-addon">
	            <span class="glyphicon glyphicon-calendar"></span>
	        </span>
			<input type="text" class="form-control" id="fechaNacimiento" name="fechaNacimiento" placeholder="Fecha de nacimiento" value="<?= $DatosPersonales->fechaNacimiento ?>">
	    </div>
	</div>
	<div class="form-group"> <!-- Sexo -->
		<label class="col-lg-2 control-label" for="sexo">Sexo</label>
		<div class="input-group col-lg-9">
			<span class="input-group-addon">
				<input type="checkbox" id="chkSexo">
			</span>
			<select name="sexo" class="form-control" id="sexo" disabled="true">					        		
	    		<option value="Masculino" 	<?php if ($DatosPersonales->sexo == 'Masculino'): ?> selected<?php endif ?> >Masculino</option>
	    		<option value="Femenino"	<?php if ($DatosPersonales->sexo == 'Femenino'): ?>  selected<?php endif ?> >Femenino</option>
			</select>				
		</div>
	</div>
	<div class="form-group"> <!-- Estado Civil -->
		<label class="col-lg-2 control-label" for="estadoCivil">Estado Civil</label>
		<div class="input-group col-lg-9">
			<span class="input-group-addon">
				<input type="checkbox" id="chkEstadoCivil">
			</span>
			<select name="estadoCivil" class="form-control" id="estadoCivil" disabled="true" >									
				<option value="Soltero" 	<?php if ($DatosPersonales->estadoCivil == 'Soltero'): ?> 		selected<?php endif ?> >Soltero</option>
				<option value="Casado" 		<?php if ($DatosPersonales->estadoCivil == 'Casado'): ?> 		selected<?php endif ?> >Casado</option>
				<option value="Viudo" 		<?php if ($DatosPersonales->estadoCivil == 'Viudo'): ?> 		selected<?php endif ?> >Viudo</option>
				<option value="Divorciado" 	<?php if ($DatosPersonales->estadoCivil == 'Divorciado'): ?> 	selected<?php endif ?> >Divorciado</option>	
			</select>
		</div>
	</div>
	<div class="form-group"> <!-- Telefono -->
		<label class="col-lg-2 control-label" for="telefono">Teléfono</label>
		<div class="input-group col-lg-9">
			<span class="input-group-addon">
				<input type="checkbox" id="chkTelefono">
			</span>
			<input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" readonly="true" value="<?= $DatosPersonales->telefono ?>">
		</div>
	</div>
	<div class="form-group"> <!-- Celular -->
		<label class="col-lg-2 control-label" for="celular">Celular</label>
		<div class="input-group col-lg-9">
			<span class="input-group-addon">
				<input type="checkbox" id="chkCelular">
			</span>
			<input type="text" class="form-control" id="celular" name="celular" placeholder="Celular" readonly="true" value="<?= $DatosPersonales->celular ?>">
		</div>			
	</div>
	<div class="form-group"> <!-- Domicilio -->
		<label class="col-lg-2 control-label" for="domicilio">Domicilio</label>
		<div class="input-group col-lg-9">
			<span class="input-group-addon">
				<input type="checkbox" id="chkDomicilio">
			</span>
			<input type="text" class="form-control" id="domicilio" name="domicilio" placeholder="Domicilio" readonly="true" value="<?= $DatosPersonales->domicilio ?>">
		</div>			
	</div>
	<div class="form-group"> <!-- Código de seguro -->
		<label class="col-lg-2 control-label" for="codigoSeguro">Código de seguro</label>
		<div class="input-group col-lg-9">
			<span class="input-group-addon">
				<input type="checkbox" id="chkCodigoSeguro">
			</span>
			<input type="text" class="form-control" id="codigoSeguro" name="codigoSeguro" placeholder="Código de seguro" readonly="true" value="<?= $DatosPersonales->codigoSeguro ?>">
		</div>				
	</div>
	<div class="form-group"> <!-- ID Biométrico -->
		<label class="col-lg-2 control-label" for="codigoBiometrico">ID Biométrico</label>
		<div class="input-group col-lg-9">
			<span class="input-group-addon">
				<input type="checkbox" id="chkCodigoBiometrico">
			</span>
			<input type="text" class="form-control" id="codigoBiometrico" name="codigoBiometrico" placeholder="ID Biométrico" readonly="true" value="<?= $DatosPersonales->codigoBiometrico ?>">				
		</div>
	</div>
	<div class="form-group"> <!-- Profesión -->
		<label class="col-lg-2 control-label" for="profesion">Profesión</label>
		<div class="input-group col-lg-9">
			<span class="input-group-addon">
				<input type="checkbox" id="chkProfesion">
			</span>
			<input type="text" class="form-control" id="profesion" name="profesion" placeholder="Profesión" readonly="true" value="<?= $DatosPersonales->profesion ?>">
		</div>
	</div>
</form>

<script type="text/javascript">
$(document).ready(function() {
	$('#CloseConfirm').click(function() {
    	$('#Confirm').hide('400');
	});
	 $('[data-toggle="tooltip"]').tooltip(); 
	/*Datos Personales*/
	$('#dtpFechaNacimiento').datetimepicker({
        viewMode: 'years',
        format: 'YYYY/MM/DD'
    });
	$('#chkApellidoPaterno').click(function() {
		$('#apellidoPaterno').attr('readonly', !this.checked);
		if ($(this).is(':checked')) {
			$('#Confirm').hide('400');
		} else {
			$.ajax({
				url: '<?= base_url();?>rrhh/personalChange_proccess/<?= $DatosPersonales->idusuario; ?>/',
				type: 'POST',
				data: $('#apellidoPaterno').serialize(),
			})
			.done(function() {
				console.log("success");
				$('#Confirm').show('400');
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		}
		$('#Confirm').hide('400');
	});
	$('#chkApellidoMaterno').click(function() {
		$('#apellidoMaterno').attr('readonly', !this.checked);
		if ($(this).is(':checked')) {
			$('#Confirm').hide('400');
		} else {
			$.ajax({
				url: '<?= base_url();?>rrhh/personalChange_proccess/<?= $DatosPersonales->idusuario; ?>/',
				type: 'POST',
				data: $('#apellidoMaterno').serialize(),
			})
			.done(function() {
				console.log("success");
				$('#Confirm').show('400');
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		}
	});
	$('#chkNombres').click(function() {
		$('#nombres').attr('readonly', !this.checked);
		if ($(this).is(':checked')) {
			$('#Confirm').hide('400');
		} else {
			$.ajax({
				url: '<?= base_url();?>rrhh/personalChange_proccess/<?= $DatosPersonales->idusuario; ?>/',
				type: 'POST',
				data: $('#nombres').serialize(),
			})
			.done(function() {
				console.log("success");
				$('#Confirm').show('400');
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		}
	});
	$('#chkCi').click(function() {
		$('#ci').attr('readonly', !this.checked);
		if ($(this).is(':checked')) {
			$('#Confirm').hide('400');
		} else {
			$.ajax({
				url: '<?= base_url();?>rrhh/personalChange_proccess/<?= $DatosPersonales->idusuario; ?>/',
				type: 'POST',
				data: $('#ci').serialize(),
			})
			.done(function() {
				console.log("success");
				$('#Confirm').show('400');
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		}
	});
	$('#chkExpedido').click(function() {
		$('#expedido').attr('disabled', !this.checked);
		if ($(this).is(':checked')) {
			$('#Confirm').hide('400');
		} else {
			$.ajax({
				url: '<?= base_url();?>rrhh/personalChange_proccess/<?= $DatosPersonales->idusuario; ?>/',
				type: 'POST',
				data: {'expedido': $('#expedido').val() },
			})
			.done(function() {
				console.log("success");
				$('#Confirm').show('400');
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		}
	});
	$('#fechaNacimiento').blur(function() {
		$.ajax({
			url: '<?= base_url();?>rrhh/personalChange_proccess/<?= $DatosPersonales->idusuario; ?>/',
			type: 'POST',
			data: $('#fechaNacimiento').serialize(),
		})
		.done(function() {
			console.log("success");
			$('#Confirm').show('400');
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	});
	$('#chkSexo').click(function() {
		$('#sexo').attr('disabled', !this.checked);
		if ($(this).is(':checked')) {
			$('#Confirm').hide('400');
		} else {
			$.ajax({
				url: '<?= base_url();?>rrhh/personalChange_proccess/<?= $DatosPersonales->idusuario; ?>/',
				type: 'POST',
				data: {'sexo': $('#sexo').val() },
			})
			.done(function() {
				console.log("success");
				$('#Confirm').show('400');
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		}
	});
	$('#chkEstadoCivil').click(function() {
		$('#estadoCivil').attr('disabled', !this.checked);
		if ($(this).is(':checked')) {
			$('#Confirm').hide('400');
		} else {
			$.ajax({
				url: '<?= base_url();?>rrhh/personalChange_proccess/<?= $DatosPersonales->idusuario; ?>/',
				type: 'POST',
				data: { 'EstadoCivil': $('#estadoCivil').val() },
			})
			.done(function() {
				console.log("success");
				$('#Confirm').show('400');
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		}
	});
	$('#chkTelefono').click(function() {
		$('#telefono').attr('readonly', !this.checked);
		if ($(this).is(':checked')) {
			$('#Confirm').hide('400');
		} else {
			$.ajax({
				url: '<?= base_url();?>rrhh/personalChange_proccess/<?= $DatosPersonales->idusuario; ?>/',
				type: 'POST',
				data: $('#telefono').serialize(),
			})
			.done(function() {
				console.log("success");
				$('#Confirm').show('400');
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		}
	});
	$('#chkCelular').click(function() {
		$('#celular').attr('readonly', !this.checked);
		if ($(this).is(':checked')) {
			$('#Confirm').hide('400');
		} else {
			$.ajax({
				url: '<?= base_url();?>rrhh/personalChange_proccess/<?= $DatosPersonales->idusuario; ?>/',
				type: 'POST',
				data: $('#celular').serialize(),
			})
			.done(function() {
				console.log("success");
				$('#Confirm').show('400');
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		}
	});
	$('#chkDomicilio').click(function() {
		$('#domicilio').attr('readonly', !this.checked);
		if ($(this).is(':checked')) {
			$('#Confirm').hide('400');
		} else {
			$.ajax({
				url: '<?= base_url();?>rrhh/personalChange_proccess/<?= $DatosPersonales->idusuario; ?>/',
				type: 'POST',
				data: $('#domicilio').serialize(),
			})
			.done(function() {
				console.log("success");
				$('#Confirm').show('400');
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		}
	});
	$('#chkCodigoSeguro').click(function() {
		$('#codigoSeguro').attr('readonly', !this.checked);
		if ($(this).is(':checked')) {
			$('#Confirm').hide('400');
		} else {
			$.ajax({
				url: '<?= base_url();?>rrhh/personalChange_proccess/<?= $DatosPersonales->idusuario; ?>/',
				type: 'POST',
				data: $('#codigoSeguro').serialize(),
			})
			.done(function() {
				console.log("success");
				$('#Confirm').show('400');
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		}
	});
	$('#chkCodigoBiometrico').click(function() {
		$('#codigoBiometrico').attr('readonly', !this.checked);
		if ($(this).is(':checked')) {
			$('#Confirm').hide('400');
		} else {
			$.ajax({
				url: '<?= base_url();?>rrhh/personalChange_proccess/<?= $DatosPersonales->idusuario; ?>/',
				type: 'POST',
				data: $('#codigoBiometrico').serialize(),
			})
			.done(function() {
				console.log("success");
				$('#Confirm').show('400');
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		}
	});
	$('#chkProfesion').click(function() {
		$('#profesion').attr('readonly', !this.checked);
		if ($(this).is(':checked')) {
			$('#Confirm').hide('400');
		} else {
			$.ajax({
				url: '<?= base_url();?>rrhh/personalChange_proccess/<?= $DatosPersonales->idusuario; ?>/',
				type: 'POST',
				data: $('#profesion').serialize(),
			})
			.done(function() {
				console.log("success");
				$('#Confirm').show('400');
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		}
	});
	});
</script>