<div class="container">
	<div class="page-header">
		<h1>Editar Categoria</h1>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><?= $Categoria->nombre ?></h3>
			</div>
			<div class="panel-body">
				<form action="<?= base_url();?>categoria/edit_action" method="POST" role="form">
					<input type="hidden" name="idcategoria" id="idcategoria" class="form-control" value="<?= $Categoria->idcategoria?>">
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input name="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre" value="<?= $Categoria->nombre; ?>">
					</div>
					<div class="form-group">
						<label for="estado">Estado</label>
						<select name="estado" id="estado" class="form-control" required="required">
							<option value="1" <?php if ($Categoria->estado == 1): ?> selected<?php endif ?> >HABILITADO</option>
							<option value="0" <?php if ($Categoria->estado == 0): ?> selected<?php endif ?> >DESHABILITADO</option>
						</select>
					</div>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</form>
			</div>
		</div>
	</div>
</div>