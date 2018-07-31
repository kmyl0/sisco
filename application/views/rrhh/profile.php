<div class="container">
	<div class="page-header">
	  <h1>Perfil<small></small></h1>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">	
		<?php foreach ($Usuario as $usuario): ?>
		<strong>Nombre: </strong><br>
		<p><?= $usuario->nombre; ?></p>
		<strong>Cargo: </strong>
		<p><?= $usuario->cargo ?></p>
		<strong>Area: </strong>
		<p><?= $usuario->area ?></p>
		<strong>Rol: </strong>
		<p><?= $usuario->rol ?></p>
		<strong>Contraseña: </strong>
		<form method="POST" action="user/reset/<?= $usuario->idusuario?>" role="form" class="form-inline">		
			<div class="form-group">
				<input type="text" id="" placeholder="Contraseña" value="<?= $usuario->password ?>" class="form-control">
			</div>
			<button type="submit" class="btn btn-primary">Reiniciar</button>
		</form>
		<?php endforeach ?>		
	</div>
</div>