<div id="page-wrapper" ng-controller="dms_controller">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-header">
					<h1>Lista de Usuarios</h1>
				</div>				
			</div>
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Lista completa</h3>
					</div>
					<table id="tblUsuarios" class="table table-responsive table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Nombre de Usuario</th>
								<th>Nombre</th>
								<th>Correo Electronico</th>
								<th>Perfil</th>
								<th>
									<a class="btn btn-primary" data-toggle="modal" href='#MdlAddUser' ng-click="LoadMdlAddUser('<?= base_url()?>rrhh/user/add')">
										<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
									</a>
								</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($Usuarios as $usuario): ?>
							<tr>
								<td><?= $usuario->idusuario ?></td>
								<td><?= $usuario->codigousuario ?></td>
								<td><?= $usuario->nombres." ".$usuario->apellidoPaterno." ".$usuario->apellidoMaterno; ?></td>
								<td><?= $usuario->email; ?></td>
								<td>
									<?php if ($usuario->rol == '1'): ?>
										Administrador
									<?php endif ?>
									<?php if ($usuario->rol == '2'): ?>
										Usuarios
									<?php endif ?>
									<?php if ($usuario->rol == '3'): ?>
										Visitantes
									<?php endif ?>
								</td>
								<td>
									<div class="btn-group" role="group" aria-label="button">
										<form method="POST" action="<?= base_url(); ?>user/edit">
											<input type="hidden" name="idusuario" id="inputIdusuario" class="form-control" value="<?= $usuario->idusuario ?>">
											<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></button>
											<?php if ($usuario->estado == 1): ?>
												<a href="<?= base_url(); ?>user/user_changestate/<?= $usuario->idusuario; ?>/0" title="Inhabilitar" class="btn btn-default active">
													<span class="glyphicon glyphicon-remove"></span>
												</a>
											<?php endif ?>
											<?php if ($usuario->estado == 0):  ?>
												<a href="<?= base_url(); ?>user/user_changestate/<?= $usuario->idusuario; ?>/1" title="Habilitar" class="btn btn-default">
													<span class="glyphicon glyphicon-ok"></span>
												</a>
											<?php endif ?>
										</form>
									</div>
								</td>
							</tr>
						<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>			
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$('#tblUsuarios').DataTable({
		"language" : {
			"url" : "<?= base_url()?>assets/json/Spanish.json"
		},
		stateSave: true
	});
});
</script>
