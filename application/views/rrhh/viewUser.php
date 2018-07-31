<div id="page-wrapper">
	<div class="container-fluid" ng-controller="manageCV">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">	
					<h1><?= $Corresponde->nombres ?> <?= $Corresponde->apellidoPaterno ?> <?= $Corresponde->apellidoMaterno ?></h1>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel-group">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a 
								data-toggle="collapse" 
								href="#pnlDatosUsuarios"								 
								ng-click="LoadDatosPersonales('<?= base_url();?>/rrhh/editPersonal/<?= $Corresponde->idusuario?>')">
									Datos personales
								</a>
								<small>
									<a href="#" data-toggle="tooltip" title="Selecciona para editar y Deselecciona para guardar!"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span></a>	
								</small>
							</h4>
						</div>			
						<div id="pnlDatosUsuarios" class="panel-collapse collapse">
							<div class="panel-body" ng-include src="editDatosPersonales">
							</div>
						</div>
					</div>		
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel-group">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" href="#datosContrato">Datos de contrato</a>
							</h4>
						</div>
						<div id="datosContrato" class="panel-collapse collapse">							
							<table class="table table-responsive">
								<thead>
									<tr>
										<th>Lugar de trabajo</th>
										<th>Fecha de ingreso</th>
										<th>Fecha de salida</th>
										<th>Cuenta de Banco</th>
										<th>Nombre de Banco</th>
										<th>Estado</th>
										<th>
											<a 
											href="#mdlAddContrato" 
											data-toggle="modal" 
											role="button" 
											class="btn btn-primary" 
											ng-click="LoadAddContrato('<?= base_url()?>rrhh/contrato/add/<?= $Corresponde->idusuario;?>')">
												<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
											</a>
										</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach ($DatosContratos as $contrato): ?>
									<tr>
										<td><?= $contrato->LugarTrabajo; ?></td>
										<td><?= $contrato->fechaIngreso; ?></td>
										<td><?= $contrato->fechaSalida; ?></td>
										<td><?= $contrato->cuentaBanco; ?></td>
										<td><?= $contrato->nombreBanco; ?></td>
										<td><?= $contrato->estado; ?></td>
										<td>									
											<div class="btn-group" role="group" aria-label="button">
												<a 
												href="#mdlEditContrato" 
												title="Ver/Modificar" 
												data-toggle="modal" 
												role="button" 
												class="btn btn-default" 
												ng-click="LoadEditContrato('<?= base_url()?>rrhh/contrato/edit/<?= $contrato->idcontrato; ?>')"
												>
													<span class="glyphicon glyphicon-pencil"></span>
												</a>
											</div>
										</td>
									</tr>
								<?php endforeach ?>							
								</tbody>
							</table>
						</div>
						<div class="modal fade" id="mdlAddContrato">
							<div class="modal-dialog">
								<div class="modal-content" ng-include src="addContrato">
								</div>
							</div>
						</div>					
						<div class="modal fade" id="mdlEditContrato">
							<div class="modal-dialog">
								<div class="modal-content" ng-include src="editContrato">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel-group">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title"><a data-toggle="collapse" href="#formacionProfesional">Formacion profesional</a></h4>
						</div>
						<div id="formacionProfesional" class="panel-collapse collapse">
							<table class="table">
								<thead>
									<tr>
										<th>Nombre</th>
										<th>Institución</th>
										<th>País</th>
										<th>Fecha</th>
										<th>
											<a 
											href="#mdlAddFormacion" 
											data-toggle="modal" 
											role="button" 
											class="btn btn-primary" 
											ng-click="LoadAddFormacion('<?= base_url()?>rrhh/formacion/add/<?= $Corresponde->idusuario;?>')">
												<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
											</a>
										</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach ($DatosFormacion as $formacion): ?>
									<tr>
										<td><?= $formacion->nombre; ?></td>
										<td><?= $formacion->institucion; ?></td>
										<td><?= $formacion->pais; ?></td>
										<td><?= $formacion->fecha; ?></td>
										<td>									
											<div class="btn-group" role="group" aria-label="button">
												<a 
												href="#mdlEditFormacion" 
												title="Ver/Modificar" 
												data-toggle="modal" 
												role="button" 
												class="btn btn-default" 
												ng-click="LoadEditFormacion('<?= base_url()?>rrhh/formacion/edit/<?= $formacion->idformacion; ?>')"
												>
													<span class="glyphicon glyphicon-pencil"></span>
												</a>
											</div>
										</td>
									</tr>
								<?php endforeach ?>							
								</tbody>
							</table>
							<div class="modal fade" id="mdlAddFormacion">
								<div class="modal-dialog">
									<div class="modal-content" ng-include src="addFormacion">
									</div>
								</div>
							</div>					
							<div class="modal fade" id="mdlEditFormacion">
								<div class="modal-dialog">
									<div class="modal-content" ng-include src="editFormacion">								
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>	
			<div class="col-md-6">
				<div class="panel-group">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title"><a data-toggle="collapse" href="#experienciaLaboral">Experiencia Laboral</a></h4>
						</div>
						<div id="experienciaLaboral" class="panel-collapse collapse">
							<table class="table">
								<thead>
									<tr>
										<th>Nombre de la empresa</th>
										<th>Cargo en la empresa</th>
										<th><a href="#MdlAddExperiencia" data-toggle="modal" role="button" class="btn btn-primary" ng-click="LoadAddExperiencia('<?= base_url()?>rrhh/experiencia/add/<?= $Corresponde->idusuario;?>')"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></th>
									</tr>
								</thead>
								<tbody>
								<?php foreach ($DatosExperiencia as $experiencia): ?>
									<tr>
										<td><?= $experiencia->nombreEmpresa?></td>
										<td><?= $experiencia->cargoEmpresa?></td>
										<td>									
											<div class="btn-group" role="group" aria-label="button">
												<a href="#MdlEditExperiencia" title="Ver/Modificar" data-toggle="modal" role="button" class="btn btn-default" ng-click="LoadEditExperiencia('<?= base_url()?>rrhh/experiencia/edit/<?= $experiencia->idexperienciaLaboral;?>')">
													<span class="glyphicon glyphicon-pencil"></span>
												</a>
											</div>
										</td>
									</tr>
								<?php endforeach ?>							
								</tbody>
							</table>
							<div class="modal fade" id="MdlAddExperiencia">
								<div class="modal-dialog">
									<div class="modal-content" ng-include src="addExperiencia">
									</div>
								</div>
							</div>					
							<div class="modal fade" id="MdlEditExperiencia">
								<div class="modal-dialog">
									<div class="modal-content" ng-include src="editExperiencia">
									</div>
								</div>
							</div>
						</div>
					</div>		
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel-group">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title"><a data-toggle="collapse" href="#pnlRelacionFamiliar">Relacion Familiar</a></h4>
						</div>
						<div id="pnlRelacionFamiliar" class="panel-collapse collapse">
							<table class="table">
								<thead>
									<tr>
										<th>Relación</th>
										<th>Nombre Completo</th>
										<th>Codigo de Seguro</th>
										<th>Domicilio</th>
										<th>Teléfono</th>
										<th>Celular</th>								
										<th>
											<a 
											href="#MdlAddRelacion" 
											data-toggle="modal" 
											role="button" 
											class="btn btn-primary" 
											ng-click="LoadAddRelacion('<?= base_url()?>rrhh/relacion/add/<?= $Corresponde->idusuario;?>')">
												<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
											</a>
										</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach ($DatosRelacion as $relacion): ?>
									<tr>
										<td><?= $relacion->TipoRelacion; ?></td>
										<td><?= $relacion->nombres; ?></td>
										<td><?= $relacion->codigoSeguro; ?></td>
										<td><?= $relacion->domicilio; ?></td>								
										<td><?= $relacion->telefono; ?></td>
										<td><?= $relacion->celular; ?></td>
										<td>									
											<div class="btn-group" role="group" aria-label="button">
												<a 
												href="#MdlEditRelacion" 
												title="Ver/Modificar" 
												data-toggle="modal" 
												role="button" 
												class="btn btn-default" 
												ng-click="LoadEditRelacion('<?= base_url()?>rrhh/relacion/edit/<?= $relacion->idrelacionFamiliar; ?>')">
													<span class="glyphicon glyphicon-pencil"></span>
												</a>
											</div>
										</td>
									</tr>
								<?php endforeach ?>							
								</tbody>
							</table>
							<script type="text/javascript">
							</script>
							<div class="modal fade" id="MdlAddRelacion">
								<div class="modal-dialog">
									<div class="modal-content" ng-include src="addRelacion">
									</div>
								</div>
							</div>					
							<div class="modal fade" id="MdlEditRelacion">
								<div class="modal-dialog">
									<div class="modal-content" ng-include src="editRelacion">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>