<div class="container">
	<div class="page-header">
		<h1>Editar Producto</h1>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><?= $Producto->nombre ?></h3>
			</div>
			<div class="panel-body">
				<form action="<?= base_url();?>producto/edit_action" method="POST" role="form">
					<input type="hidden" name="idproducto" id="idProducto" class="form-control" value="<?= $Producto->idproducto?>">
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input name="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre" value="<?= $Producto->nombre?>">
					</div>
					<div class="form-group">
						<label for="categoria">Categoria *</label><br>
						<select name="categoria" class="form-control" required>							
				<?php foreach ($Categorias as $categoria): ?>
							<option value="<?= $categoria->idcategoria?>" <?php if ($categoria->nombre == $Producto->categoria): ?> selected <?php endif ?>>
								<?= $categoria->nombre?>
							</option>							
			    <?php endforeach ?>		        		
				    	</select>
					</div>
					<div class="form-group">
						<label for="estado">Estado</label>
						<select name="estado" id="estado" class="form-control" required="required">
							<option value="1" <?php if ($Producto->estado == 1): ?> selected<?php endif ?> >HABILITADO</option>
							<option value="0" <?php if ($Producto->estado == 0): ?> selected<?php endif ?> >DESHABILITADO</option>
						</select>
					</div>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</form>
			</div>
		</div>
	</div>
</div>