<div class="container">
	<div class="page-header">
		<h1>Editar Proveedor</h1>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><?= $Proveedor->nombre ?></h3>
			</div>
			<div class="panel-body">
				<form action="<?= base_url();?>proveedor/edit_action" method="POST" role="form">
					<input type="hidden" name="idproveedor" id="idproveedor" class="form-control" value="<?= $Proveedor->idproveedor?>">
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input name="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre" value="<?= $Proveedor->nombre?>">
					</div>
					<div class="form-group">
						<label for="nit">NIT</label>
						<input name="nit" type="text" class="form-control" id="nit" placeholder="NIT" value="<?= $Proveedor->nit?>">
					</div>
					<div class="form-group">
						<label for="direccion">Dirección</label>
						<input name="direccion" type="text" class="form-control" id="direccion" placeholder="Dirección" value="<?= $Proveedor->direccion?>">
					</div>
					<div class="form-group">
						<label for="telefono">Teléfono</label>
						<input name="telefono" type="text" class="form-control" id="telefono" placeholder="Teléfono" value="<?= $Proveedor->telefono?>">
					</div>
					<div class="form-group">
						<label for="observacion">Observación</label>
						<input name="observacion" type="text" class="form-control" id="observacion" placeholder="Observación" value="<?= $Proveedor->observacion?>">
					</div>
					<div class="form-group">
						<label for="url">URL</label>
						<input name="url" type="text" class="form-control" id="url" placeholder="URL" value="<?= $Proveedor->url?>">
					</div>
					<div class="form-group">
						<label for="estado">Estado</label>
						<select name="estado" id="estado" class="form-control" required="required">
							<option value="1" <?php if ($Proveedor->estado == 1): ?> selected<?php endif ?> >HABILITADO</option>
							<option value="0" <?php if ($Proveedor->estado == 0): ?> selected<?php endif ?> >DESHABILITADO</option>
						</select>
					</div>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</form>
			</div>
		</div>
	</div>
</div>