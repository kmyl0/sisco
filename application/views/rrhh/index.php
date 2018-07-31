<div id="page-wrapper">
	<div class="container-fluid" ng-controller="rrhh">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h1>Lista de usuarios</h1>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Lista completa</h3>
					</div>
					<div class="panel-body">
						<table id="tblUsuarios">
							<thead>
								<tr>
									<th>ID</th>
									<th>Nombre Completo</th>
									<th>Correo</th>
									<th>
										<a 
										class="btn btn-primary" 
										data-toggle="modal" 
										href='#MdlAddUser' 
										ng-click="LoadMdlAddUser('<?= base_url()?>rrhh/user/add')"
										>
											<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
										</a>
									</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach ($Usuarios as $usuario): ?>
								<tr>
									<td><?= $usuario->idusuario ?></td>
									<td><?= $usuario->nombres." ".$usuario->apellidoPaterno." ".$usuario->apellidoMaterno; ?></td>
									<td><?= $usuario->email; ?></td>
									<td>
										<div class="btn-group" role="group" aria-label="button">
											<?php if ($usuario->estado == 1): ?>
												<a 
												href="<?= base_url(); ?>rrhh/user_changestate/<?= $usuario->idusuario; ?>/0" 
												title="Inhabilitar" 
												class="btn btn-default active"
												>
													<span class="glyphicon glyphicon-remove"></span>
												</a>
											<?php else: ?>
												<a 
												href="<?= base_url(); ?>rrhh/user_changestate/<?= $usuario->idusuario; ?>/1" 
												title="Habilitar" 
												class="btn btn-default"
												>
													<span class="glyphicon glyphicon-ok"></span>
												</a>
											<?php endif ?>
											<a 
											href="#MdlEdit" 
											title="Ver/Modificar" 
											data-toggle="modal" 
											class="btn btn-default" 
											ng-click="LoadMdlEdit('<?= base_url()?>rrhh/user/edit/<?= $usuario->idusuario; ?>')"
											>
												<span class="glyphicon glyphicon-pencil"></span>
											</a>
											<a 
											href="<?= base_url()."rrhh/viewUser/".$usuario->idusuario; ?>" 
											title="Agregar Informacion" 
											class="btn btn-default"
											>
												<span class="glyphicon glyphicon-briefcase"></span>
											</a>
										</div>
									</td>
								</tr>
							<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="modal fade" id="MdlAddUser">
					<div class="modal-dialog">
						<div class="modal-content" ng-include src="AddUser">
						</div>
					</div>
				</div>	
				<div class="modal fade" id="MdlEdit">
					<div class="modal-dialog">
						<div class="modal-content" ng-include src="EditUser">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){     
    $('#tblUsuarios').DataTable();
});
</script>



