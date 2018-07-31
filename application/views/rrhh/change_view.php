<div class="container">
	<div class="page-header">
		<h1>Editar usuario 
			<small>
				<a href="#" data-toggle="tooltip" title="Deselecciona para guardar!"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span></a>
			</small>
		</h1>
	</div>

	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" href="#collapse1">Collapsible panel</a>
				</h4>
			</div>
			<div id="collapse1" class="panel-collapse collapse">
				<div class="panel-body">Panel Body</div>
				<div class="panel-footer">Panel Footer</div>
			</div>
		</div>
	</div>

	<div class="row-fluid">
		<div class="alert alert-success alert-dismissable collapse" id="Confirm">
			<button type="button" class="close" id="CloseConfirm">&times;</button>
			<strong>Estado: </strong>Datos Guardados Correctamente
		</div>	
	</div>
	<div class="col-md-12">
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#datosPersonales">Datos Personales</a></li>
			<li><a data-toggle="tab" href="#datosContrato">Datos de Contrato</a></li>
			<li><a data-toggle="tab" href="#formacionProfesional">Formación Profesional</a></li>
			<li><a data-toggle="tab" href="#experienciaLaboral">Experiencia Laboral</a></li>
			<li><a data-toggle="tab" href="#conyuguesPendientes">Cónyugues y pendientes</a></li>
			<li><a data-toggle="tab" href="#licencias">Licencias</a></li>			
		</ul>
		<div class="tab-content">
			<div id="datosPersonales" class="tab-pane fade in active"> <!-- Datos Personales -->
				<form action="#" method="POST" role="form" class="form">
					<input type="hidden" name="TipoEdicion" id="inputTipoEdit" class="form-control" value="Personales">
					<br>
					<div class="form-group"> <!-- Apellido Paterno -->
						<label for="apellidoPaterno">Apellido Paterno</label>
						<div class="input-group">
							<span class="input-group-addon">
								<input type="checkbox" id="chkApellidoPaterno">
							</span>				
							<input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno" placeholder="Apellido Paterno" readonly="true" value="<?= $DatosPersonales->apellidoPaterno ?>">
						</div>
					</div>
					<div class="form-group"> <!-- Apellido Materno -->
						<label for="apellidoMaterno">Apellido Materno</label>
						<div class="input-group">
							<span class="input-group-addon">
								<input type="checkbox" id="chkApellidoMaterno">
							</span>
							<input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno" placeholder="Apellido Materno" readonly="true" value="<?= $DatosPersonales->apellidoMaterno ?>">
						</div>
					</div>
					<div class="form-group"> <!-- Nombres -->
						<label for="nombres">Nombres</label>
						<div class="input-group">
							<span class="input-group-addon">
								<input type="checkbox" id="chkNombres">
							</span>
							<input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres" readonly="true" value="<?= $DatosPersonales->nombres ?>">
						</div>
					</div>
					<div class="form-group"> <!-- Cedula de identidad -->
						<label for="ci">Cedula de Identidad</label>
						<div class="input-group">
							<span class="input-group-addon">
								<input type="checkbox" id="chkCi">
							</span>
							<input type="text" class="form-control" id="ci" name="ci" placeholder="Cedula de Identidad" readonly="true" value="<?= $DatosPersonales->ci ?>">
						</div>
					</div>
					<div class="form-group"> <!-- Expedido -->
						<label for="expedido">Expedido</label>
						<div class="input-group">
							<span class="input-group-addon">
								<input type="checkbox" id="chkExpedido">
							</span>
							<select name="expedido" class="form-control" id="expedido" disabled="true">					        		
				        		<option value="La Paz" 		<?php if ($DatosPersonales->expedido == 'La Paz'): ?> 		selected<?php endif ?> >La Paz</option>
				        		<option value="Cochabamba" 	<?php if ($DatosPersonales->expedido == 'Cochabamba'): ?> 	selected<?php endif ?> >Cochabamba</option>
				        		<option value="Santa Cruz" 	<?php if ($DatosPersonales->expedido == 'Santa Cruz'): ?> 	selected<?php endif ?> >Santa Cruz</option>
				        		<option value="Oruro"		<?php if ($DatosPersonales->expedido == 'Oruro'): ?> 		selected<?php endif ?> >Oruro</option>
				        		<option value="Potosi" 		<?php if ($DatosPersonales->expedido == 'Potosi'): ?> 		selected<?php endif ?> >Potosi</option>
				        		<option value="Beni" 		<?php if ($DatosPersonales->expedido == 'Beni'): ?> 		selected<?php endif ?> >Beni</option>
				        		<option value="Pando" 		<?php if ($DatosPersonales->expedido == 'Pando'): ?> 		selected<?php endif ?> >Pando</option>
				        		<option value="Sucre" 		<?php if ($DatosPersonales->expedido == 'Sucre'): ?> 		selected<?php endif ?> >Sucre</option>
				        		<option value="Tarija" 		<?php if ($DatosPersonales->expedido == 'Tarija'): ?> 		selected<?php endif ?> >Tarija</option>
				        	</select>	
				        </div>	
					</div>
					<div class="form-group"> <!-- Fecha de nacimiento -->
						<label for="fechaNacimiento">Fecha de Nacimiento</label>
						<div class='input-group date' id='dtpFechaNacimiento'>
							<span class="input-group-addon">
				                <span class="glyphicon glyphicon-calendar"></span>
				            </span>
							<input type="text" class="form-control" id="fechaNacimiento" name="fechaNacimiento" placeholder="Fecha de nacimiento" value="<?= $DatosPersonales->fechaNacimiento ?>">
		                </div>
					</div>
					<div class="form-group"> <!-- Sexo -->
						<label for="sexo">Sexo</label>
						<div class="input-group">
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
						<label for="estadoCivil">Estado Civil</label>
						<div class="input-group">
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
						<label for="telefono">Teléfono</label>
						<div class="input-group">
							<span class="input-group-addon">
								<input type="checkbox" id="chkTelefono">
							</span>
							<input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" readonly="true" value="<?= $DatosPersonales->telefono ?>">
						</div>
					</div>
					<div class="form-group"> <!-- Celular -->
						<label for="celular">Celular</label>
						<div class="input-group">
							<span class="input-group-addon">
								<input type="checkbox" id="chkCelular">
							</span>
							<input type="text" class="form-control" id="celular" name="celular" placeholder="Celular" readonly="true" value="<?= $DatosPersonales->celular ?>">
						</div>			
					</div>
					<div class="form-group"> <!-- Domicilio -->
						<label for="domicilio">Domicilio</label>
						<div class="input-group">
							<span class="input-group-addon">
								<input type="checkbox" id="chkDomicilio">
							</span>
							<input type="text" class="form-control" id="domicilio" name="domicilio" placeholder="Domicilio" readonly="true" value="<?= $DatosPersonales->domicilio ?>">
						</div>			
					</div>
					<div class="form-group"> <!-- Código de seguro -->
						<label for="codigoSeguro">Código de seguro</label>
						<div class="input-group">
							<span class="input-group-addon">
								<input type="checkbox" id="chkCodigoSeguro">
							</span>
							<input type="text" class="form-control" id="codigoSeguro" name="codigoSeguro" placeholder="Código de seguro" readonly="true" value="<?= $DatosPersonales->codigoSeguro ?>">
						</div>				
					</div>
					
					<div class="form-group"> <!-- ID Biométrico -->
						<label for="codigoBiometrico">ID Biométrico</label>
						<div class="input-group">
							<span class="input-group-addon">
								<input type="checkbox" id="chkCodigoBiometrico">
							</span>
							<input type="text" class="form-control" id="codigoBiometrico" name="codigoBiometrico" placeholder="ID Biométrico" readonly="true" value="<?= $DatosPersonales->codigoBiometrico ?>">				
						</div>
					</div>
					<div class="form-group"> <!-- Profesión -->
						<label for="profesion">Profesión</label>
						<div class="input-group">
							<span class="input-group-addon">
								<input type="checkbox" id="chkProfesion">
							</span>
							<input type="text" class="form-control" id="profesion" name="profesion" placeholder="Profesión" readonly="true" value="<?= $DatosPersonales->profesion ?>">
						</div>
					</div>
				</form>
			</div> <!-- FIN: Datos Personales -->
			<div id="datosContrato" class="tab-pane fade"> <!-- Datos de Contrato -->
				<br>				
				<div class="form-group">
					<label for="LugarTrabajo">Lugar de trabajo *</label>
					<div class="input-group">
						<span class="input-group-addon">
							<input type="checkbox" id="chkLugarTrabajo">
						</span>
						<select name="LugarTrabajo" class="form-control" id="LugarTrabajo" disabled="true">					        		
			        		<option value="La Paz" 		<?php if ($DatosPersonales->LugarTrabajo == 'La Paz'): ?> 		selected<?php endif ?> >La Paz</option>
			        		<option value="Cochabamba" 	<?php if ($DatosPersonales->LugarTrabajo == 'Cochabamba'): ?> 	selected<?php endif ?> >Cochabamba</option>
			        		<option value="Santa Cruz" 	<?php if ($DatosPersonales->LugarTrabajo == 'Santa Cruz'): ?> 	selected<?php endif ?> >Santa Cruz</option>
			        		<option value="Oruro"		<?php if ($DatosPersonales->LugarTrabajo == 'Oruro'): ?> 		selected<?php endif ?> >Oruro</option>
			        		<option value="Potosi" 		<?php if ($DatosPersonales->LugarTrabajo == 'Potosi'): ?> 		selected<?php endif ?> >Potosi</option>
			        		<option value="Beni" 		<?php if ($DatosPersonales->LugarTrabajo == 'Beni'): ?> 		selected<?php endif ?> >Beni</option>
			        		<option value="Pando" 		<?php if ($DatosPersonales->LugarTrabajo == 'Pando'): ?> 		selected<?php endif ?> >Pando</option>
			        		<option value="Sucre" 		<?php if ($DatosPersonales->LugarTrabajo == 'Sucre'): ?> 		selected<?php endif ?> >Sucre</option>
			        		<option value="Tarija" 		<?php if ($DatosPersonales->LugarTrabajo == 'Tarija'): ?> 		selected<?php endif ?> >Tarija</option>
			        	</select>
			    	</div>
				</div>
				<form action="user/edit" method="POST" role="form">
					<input type="hidden" name="TipoEdicion" id="inputTipoEdit" class="form-control" value="Contrato">
					<div class="form-group">
						<label for="fechaIngresoPersonal">Fecha de ingreso</label>
						<div class='input-group date' id='dtpFechaIngresoPersonal'>
							<input type="text" class="form-control" id="fechaIngresoPersonal" name="fechaIngresoPersonal" placeholder="Fecha de ingreso" value="Falta aqui">		
							<span class="input-group-addon">
				                <span class="glyphicon glyphicon-calendar"></span>
				            </span>		
		                </div>
					</div>
					<div class="form-group">
						<label for="fechaSalidaPersonal">Fecha de salida</label>
						<div class='input-group date' id='dtpfechaSalidaPersonal'>
							<input type="text" class="form-control" id="fechaSalidaPersonal" name="fechaSalidaPersonal" placeholder="Fecha de salida" value="Falta Aqui">	
							<span class="input-group-addon">
				                <span class="glyphicon glyphicon-calendar"></span>
				            </span>		
		                </div>
					</div>
					<div class="form-group">
						<label for="banco">Nombre de Banco</label>
						<input type="text" class="form-control" id="banco" name="banco" placeholder="Nombre de Banco">				
					</div>
					<div class="form-group">
						<label for="nroCuenta">Cuenta de Banco</label>
						<input type="text" class="form-control" id="nroCuenta" name="nroCuenta" placeholder="Cuenta de Banco">				
					</div>
					<div class="form-group">
						<label for="">Estado</label>
						<input type="text" class="form-control" id="" placeholder="Estado">
					</div>
					<button type="submit" class="btn btn-default">Agregar Contrato</button>
				</form>
			</div> <!-- FIN: Datos Contrato -->
			
			<div id="formacionProfesional" class="tab-pane fade">
				3
			</div>
			<div id="experienciaLaboral" class="tab-pane fade">
				4
			</div>
			<div id="conyuguesPendientes" class="tab-pane fade">
				5
			</div>
			<div id="licencias" class="tab-pane fade">
				6
			</div>
			
		</div>
	</div>	
</div>

<script type="text/javascript">	
$(document).ready(function() {
	

	/*Datos de Contrato*/
	$('#chkCargo').click(function() {
		$('#cargo').attr('disabled', !this.checked);
		if ($(this).is(':checked')) {
			$('#Confirm').hide('400');
		} else {
			$.ajax({
				url: '<?= base_url();?>user/change_action/<?= $DatosPersonales->idusuario; ?>/',
				type: 'POST',
				data: { 'id_cargo': $('#cargo').val() },
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
	$('#chkArea').click(function() {
		$('#area').attr('disabled', !this.checked);
		if ($(this).is(':checked')) {
			$('#Confirm').hide('400');
		} else {
			$.ajax({
				url: '<?= base_url();?>user/change_action/<?= $DatosPersonales->idusuario; ?>/',
				type: 'POST',
				data: { 'id_area': $('#area').val() },
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
	$('#chkDependencia').click(function() {
		$('#dependencia').attr('disabled', !this.checked);
		if ($(this).is(':checked')) {
			$('#Confirm').hide('400');
		} else {
			$.ajax({
				url: '<?= base_url();?>user/change_action/<?= $DatosPersonales->idusuario; ?>/',
				type: 'POST',
				data: { 'id_dependencia_cargo': $('#dependencia').val() },
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
	$('#chkLugarTrabajo').click(function() {
		$('#LugarTrabajo').attr('disabled', !this.checked);
		if ($(this).is(':checked')) {
			$('#Confirm').hide('400');
		} else {
			$.ajax({
				url: '<?= base_url();?>user/change_action/<?= $DatosPersonales->idusuario; ?>/',
				type: 'POST',
				data: { 'LugarTrabajo': $('#LugarTrabajo').val() },
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

	/*Datos de acceso*/
	$('#chkEstadoAcceso').click(function() {
		$('#identificacion').attr('readonly', !this.checked);
		$('#autenticacion').attr('readonly', !this.checked);
		$('#rol').attr('disabled', !this.checked);
		$('#btnGuardarAcceso').attr('disabled', !this.checked);
		if ( ! $(this).is(':checked')) {
			$.ajax({
				url: '<?= base_url();?>user/change_action/<?= $DatosPersonales->idusuario; ?>/',
				type: 'POST',
				data: { 'estado': 0 },
			})
			.done(function() {
				console.log("success");
				$('#Confirm').fadeIn('4000');
				$('#Confirm').fadeOut('4000');
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		}
	});
	$('#frmAcceso').submit(function() {
		$.ajax({
			url: '<?= base_url();?>user/change_action/<?= $DatosPersonales->idusuario; ?>',
			type: 'POST',
			data: $('#frmAcceso').serialize()
		})
		.done(function() {
			console.log("success");
			$('#Confirm').fadeIn('400');
			$('#Confirm').fadeOut('4000');			
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		return false;
	});
	$('#frmAcceso').bootstrapValidator({
		framework: 'bootstrap',
		message: 'Este valor no es valido',
		live: 'disabled',
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