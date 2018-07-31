<div class="container">
	<div class="page-header">	
		<h1>Formulario de solicitud: <?= $NroFormulario; ?></h1>	
	</div>
	<div class="col-md-12">
<?php 
	$hidden = array('estado' => '1');
	echo form_open('solicitud/add_action', 'id=frmAddSolicitud', $hidden);
?>
		<div class="form-group">
			<label for="fecha">Fecha</label>
			<input type="text" name="fecha" value="<?php echo date("Y-m-d"); ?>" id="fecha" class="form-control" placeholder="Fecha" readonly>
		</div>
		<div class="form-group">
			<label for="proveedor">Proveedores</label>
			<select name="proveedor" id="proveedor" class="form-control" required>
				<option value="">--Seleccione un proveedor--</option>
				<?php foreach ($Proveedores as $proveedor): ?>
				<option value="<?= $proveedor->idproveedor; ?>"><?= $proveedor->nombre; ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<table class="table table-hover" id="tabla">
			<thead>
				<tr>
					<th>Producto</th>
					<th>Cantidad</th>
					<th>Precio unitario</th>			
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<select name="producto" class="form-control" required>
								<option value="">--Seleccione el producto</option>
							<?php foreach ($Productos as $producto): ?>
								<option value="<?= $producto->idproducto; ?>"><?= $producto->nombre; ?></option>
							<?php endforeach ?>
						</select>
					</td>
					<td>
						<input type="text" class="form-control" name="cantidad" required>
					</td>
					<td>
						<input type="text" class="form-control" name="precioUnitario" required>
					</td>
				</tr>
			</tbody>
		</table>
		<div class="form-group">
			<label for="observacion">Observación</label>
			<input type="text" name="observacion" id="Observacion" class="form-control" placeholder="Observacion" required="required">			
		</div>
		<div class="form-group">
			<label for="campo">Campos</label>
			<select name="campo" class="form-control" required>
					<option value="">--Seleccione un campo</option>
				<?php foreach ($Campos as $campo): ?>
					<option value="<?= $campo->idcampo; ?>"><?= $campo->nombre; ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-default">Guardar</button>			
		</div>
<?php echo form_close(); ?>
	</div>
</div>