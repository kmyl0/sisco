<div id="page-wrapper" ng-controller="dms_controller">
	<div class="container-fluid">
		<div class="row" data-spy="scroll" data-target="#myScrollspy" data-offset="20">
			<div class="col-lg-12">
				<div class="page-header">
					<h1>Editar de Usuario</h1>
				</div>				
			</div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" id="myScrollspy" >
				<!-- <a href="#" class="thumbnail">
				  	<img src="" alt="">
				</a> -->
				<ul class="nav nav-pills nav-stacked">
					<li class="active"><a href="#Info_Personal">Información Personal</a></li>
					<li><a href="#Permisos">Permisos</a></li>
				</ul>
				<hr>
				<div class="alert alert-success alert-dismissable" style="display: none" id="msgReiniciar">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Success!</strong> Indicates a successful or positive action.
				</div>
				<div class="alert alert-success alert-dismissable" style="display: none" id="msgActualizar">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Success!</strong> Indicates a successful or positive action.
				</div>
			</div>
			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">			
				<form method="POST" action="<?= base_url(); ?>user/edit" id="frmInfo_Personal">					
					<input type="hidden" name="idusuario" id="idusuario" class="form-control" value="<?= $Personal->idusuario; ?>">
					<input type="hidden" name="urlcite" id="urlcite" class="form-control" value="<?= base_url();?>user/modal/cite-usuario">
					<div id="Info_Personal"> <!-- Información Personal -->
						<h3>Información Personal</h3>						
						<table class="table table-responsive">
							<tbody>
								<tr>
									<th>Apellido Paterno:</th>
									<td><input type="text" class="form-control" name="apellidoPaterno" value="<?= $Personal->apellidoPaterno ?>"></td>
								</tr>
								<tr>
									<th>Apellido Materno:</th>
									<td><input type="text" class="form-control" name="apellidoMaterno" value="<?= $Personal->apellidoMaterno ?>"></td>
								</tr>
								<tr>
									<th>Nombre:</th>
									<td><input type="text" class="form-control" name="nombres" value="<?= $Personal->nombres ?>"></td>
								</tr>
								<tr>
									<th>Estado:</th>
									<td>
										<select name="estado" id="estado" class="form-control" required="required">
											<option value="1" <?php if ($Personal->estado == 1): ?> selected<?php endif ?> >HABILITADO</option>
											<option value="0" <?php if ($Personal->estado == 0): ?> selected<?php endif ?> >DESHABILITADO</option>
										</select>
									</td>
								</tr>
								<tr>
									<th>Rol:</th>
									<td>
										<select name="rol" id="rol" class="form-control" required="required">
											<option value="1" <?php if ($Personal->rol == 1): ?> selected<?php endif ?> >ADMINISTRADOR</option>
											<option value="2" <?php if ($Personal->rol == 2): ?> selected<?php endif ?> >USUARIO</option>
										</select>
									</td>
								</tr>
								<tr>
									<th>Correo Electronico:</th>
									<td><input type="text" class="form-control" name="email" value="<?= $Personal->email ?>"></td>
								</tr>
								<tr>
									<th>Alias de Identificación:</th>
									<td><input type="text" class="form-control" name="codigousuario" value="<?= $Personal->codigousuario ?>"></td>
								</tr>
								<tr>
									<th>Contraseña:</th>
									<td>
										<a href="<?= base_url(); ?>user/reset" class="btn btn-warning" id="btnReiniciar">Reiniciar</a>
										
									</td>
								</tr>
							</tbody>
						</table>						
					</div>
					<div id="Permisos"> <!-- Permisos -->
						<h3>Permisos</h3>						
						<table class="table table-responsive">					
							<tbody>
								<tr>
									<th>
										Conducto Regular:
										<p></p>
									</th>
									<td>
										<select name="cfgConductoRegular" id="inputCfgConductoRegular" class="form-control" required="required">
											<option value="1" <?php if ($Permisos->cfgConductoRegular == 1): ?> selected<?php endif ?> >Habilitado</option>
											<option value="0" <?php if ($Permisos->cfgConductoRegular == 0): ?> selected<?php endif ?> >Deshabilitado</option>
										</select>
									</td>
								</tr>
								<tr>
									<th>
										Nuevo Informe:
										<p></p>
									</th>
									<td>
										<select name="cfgNuevoInforme" id="inputCfgNuevoInforme" class="form-control" required="required">
											<option value="1" <?php if ($Permisos->cfgNuevoInforme == 1): ?> selected<?php endif ?> >Habilitado</option>
											<option value="0" <?php if ($Permisos->cfgNuevoInforme == 0): ?> selected<?php endif ?> >Deshabilitado</option>
										</select>
									</td>
								</tr>
								<tr>
									<th>
										Acceso a Rutas:
										<p></p>
									</th>
									<td>
										<select name="cfgAccesoRutas" id="inputCfgConductoRegular" class="form-control" required="required">
											<option value="1" <?php if ($Permisos->cfgAccesoRutas == 1): ?> selected<?php endif ?> >Habilitado</option>
											<option value="0" <?php if ($Permisos->cfgAccesoRutas == 0): ?> selected<?php endif ?> >Deshabilitado</option>
										</select>
									</td>
								</tr>
								<tr>
									<th>
										Cargo:
										<p></p>
									</th>
									<td>
										<select name="id_cargo" class="form-control" id="cargo">
											<?php foreach ($Cargos as $cargo): ?>
												<option value="<?= $cargo->idcargo; ?>" <?php if ($Permisos->id_cargo == $cargo->idcargo): ?> selected <?php endif ?> ><?= $cargo->nombre; ?></option>
											<?php endforeach ?>		        		
								    	</select>
									</td>
								</tr>
								<tr>
									<th>Dependencias:</th>
									<td>
										<select name="id_dependencia" class="form-control" id="dependencia">
											<option value="">NO TIENE DEPENDENCIA</option>
										<?php foreach ($Cargos as $cargo): ?>
											<option value="<?= $cargo->idcargo; ?>" <?php if ($Permisos->id_dependencia_cargo == $cargo->idcargo): ?> selected <?php endif ?> ><?= $cargo->nombre; ?></option>				        			
									    <?php endforeach ?>		        		
								    	</select>
									</td>
								</tr>
								<tr>
									<th>Cites Asignados:</th>
									<td id="lstcite">
										<p>
											<a class="btn btn-primary" data-toggle="modal" data-target="#mdlAlta"><span class="glyphicon glyphicon-plus"></span></a>
										</p>
										<div id="lstcite">
											<ul class="list-group">
											<?php foreach ($Cites as $cite): ?>
											<li class="list-group-item">
												<?= $cite->nombre ?>
												<button type="button" class="btn btn-link" data-toggle="modal" data-target="#mdlModificar" 
													data-idcite="<?= $cite->idcite;?>" 
													data-nombre="<?= $cite->nombre;?>"
													data-idusuario="<?= $Personal->idusuario;?>" >
													<span class="glyphicon glyphicon-pencil"></span>
												</button>
											</li>
											<?php endforeach; ?>
											</ul>
										</div>										
									</td>
								</tr>
							</tbody>
						</table>						
					</div>
					<button type="submit" class="btn btn-success">Actualizar</button>
				</form>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Fecha de modificación</th>
							<th>Campo</th>
							<th>Valor</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<form id="frmAltaCite" >
			<div class="modal fade" id="mdlAlta">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Añadir Asignacion</h4>
						</div>
						<div class="modal-body">
							<input type="hidden" name="idcite" value="" id="idcite">
							<select name="idcite" id="inpcite" class="form-control" required="required">
								<option value="">SELECCIONE UNA CATEGORIA</option>
								<?php foreach ($Areas as $area): ?>
									<option><?= $area->nombre;?></option>
								<?php endforeach ?>
							</select>
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<strong>Title!</strong> Alert body ...
							</div>
						</div>
						<div class="modal-footer">							
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-primary">Guardar Cambios</button>
						</div>
					</div>
				</div>
			</div>
		</form>

		<form id="frmModificarCite" action="<?= base_url(); ?>user/editar/cite">
			<div class="modal fade" id="mdlModificar">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Modificar Asignación:<p id="mdlTituloModificacion"></p></h4>
						</div>
						<div class="modal-body">						
							<div class="alert alert-success alert-dismissible" style="display: none;">
								<button type="button" class="close" aria-hidden="true">&times;</button>
								<strong>Se ha guardado exitosamente</strong>
							</div>
							<div class="alert alert-danger alert-dismissible" style="display: none;>
								<button type="button" class="close" aria-hidden="true">&times;</button>
								<strong>Error al guardado</strong>
							</div>
							<input type="hidden" name="idcite" value="" id="idcite">
							<div class="form-group" >
								<select name="idarea" id="idarea" class="form-control" required="required">
									<option value="">SELECCIONE UNA CATEGORIA</option>
									<?php foreach ($Areas as $area): ?>
										<option value="<?= $area->idarea;?>"><?= $area->nombre;?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-primary">Guardar Cambios</button>
						</div>
					</div>
				</div>
			</div>
		</form>

	</div>
</div>

<script type="text/javascript">	
$(document).ready(function(e) {	
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
	$("#cite").multipleSelect({});
	$("#btnReiniciar").click(function(event) {
		event.preventDefault();
		$.ajax({
			url: $(this).attr("href"),
			type: 'POST',			
			data: { idusuario: $("#idusuario").val() },
		})
		.done(function(html) {
			$("#msgReiniciar").css("display", "block");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});		
	});
	$("#frmInfo_Personal").submit(function () {
		$.ajax({
			url: $(this).attr('action'),
			type: 'POST',			
			data: $(this).serialize(),
		})
		.done(function() {
			$("#msgActualizar").css("display", "block");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
		return false;
	});
	$("#mdlModificar").on('show.bs.modal', function (e) {		
		var evento =  $(e.relatedTarget);
		var modal = $(this);
		modal.find('#mdlTituloModificacion').html(evento.data('nombre'));
		modal.find('#idcite').val(evento.data('idcite'));		
	});
	$('#frmModificarCite').submit(function (e) {
		var parametros = $(this).serialize();
		var URLParaCargarTabla = $('#urlcite').val();
		var idusuario = $('#idusuario').val();
		var promise =  $.ajax({
				url: $(this).attr('action'),
				type: 'POST',
				data: parametros,
			})
			.done(function() {
				$('.alert-success').css('display', 'block');
				console.log("success");
			})
			.fail(function() {
				$('.alert-danger').css('display', 'block');
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			e.preventDefault();			
		});
	$('.close').click(function(event) {
		$('.alert-success').css('display', 'none');
		$('.alert-danger').css('display', 'none');
	});
});
</script>