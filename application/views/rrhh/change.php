<div class="container" id="container">
	<div class="page-header">
		<h1>Completar registros de usuarios</h1>
	</div>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre Completo</th>
				<th>Correo</th>
				<th>Area</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($Usuarios as $usuario): ?>
			<tr>
				<td>
					<?= $usuario->idusuario ?>									
				</td>
				<td><?= $usuario->nombre ?></td>
				<td><?= $usuario->email ?></td>
				<td><?= $usuario->area ?></td>
				<td>
					<div class="pull-right">
						<!-- <div class="dropdown">
							<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-pencil"></span>
							<span class="caret"></span></button>
							<ul class="dropdown-menu">
								<li><a href="#">Datos Generales</a></li>
								<li><a href="#">Detalles </a></li>
								<li><a href="#">JavaScript</a></li>
								<li class="divider"></li>
								<li class="dropdown-header">Dropdown header 2</li>
								<li><a href="#">About Us</a></li>
							</ul>
						</div> -->
				<?php if ($usuario->estado == 1): ?>
						<a href="<?= base_url()."user/disable/".$usuario->idusuario; ?>" title="Inhabilitar">
							<span class="glyphicon glyphicon-remove"></span>
						</a>
				<?php else: ?>
						<a href="<?= base_url()."user/enable/".$usuario->idusuario; ?>" title="Habilitar">
							<span class="glyphicon glyphicon-ok"></span>
						</a>
				<?php endif ?>
						<a href="<?= base_url()."user/view/".$usuario->idusuario; ?>" title="Ver">
							<span class="glyphicon glyphicon-eye-open"></span>
						</a>
						<a href="<?= base_url()."user/change_view/".$usuario->idusuario; ?>" title="Modificar">
							<span class="glyphicon glyphicon-scissors"></span>
						</a><!-- 
						<a href="<?= base_url()."user/editFolder/".$usuario->idusuario; ?>" title="Modificar">
							<span class="glyphicon glyphicon-briefcase"></span>
						</a> -->
					</div>	
				</td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
</div>



