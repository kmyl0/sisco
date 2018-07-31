<div class="container">
	<div class="col-md-11">	
		<h1>Formulario de solicitud </h1>	
	</div>
	<div class="col-md-1 pull-right">
		<h1><?= $NroFormulario; ?></h1>		
	</div>
	<div class="col-md-12">

<?php if (isset($Proveedores)): ?>
		<div class="form-group">
			<label for="proveedor">Proveedores</label>
			<select name="proveedor" id="proveedor" class="form-control" required>
				<option value="">--Seleccione un proveedor--</option>
				<?php foreach ($Proveedores as $proveedor): ?>
				<option value="<?= $proveedor['idproveedor']?>"><?= $proveedor['nombre'] ?></option>
				<?php endforeach ?>
			</select>				
		</div>
		<div class="form-group ">
			<a class="btn btn-warning" id="step1" href="<?= base_url();?>solicitud/new" role="button">Siguiente</a>
		</div>
<?php endif ?>

<?php if (isset($Proveedor)): ?>
	<?php echo form_open('solicitud/new'); ?>
		<div class="form-group">
			<label for="fecha">Fecha</label>
			<input type="text" name="fecha" value="<?php echo date("Y-m-d"); ?>" id="fecha" class="form-control" placeholder="Fecha" readonly>
		</div>		
		<div class="form-group">
			<label for="proveedor">Proveedor</label>
			<input type="text" name="inputProveedor" id="inputProveedor" class="form-control" value="<?= $Proveedor->nombre?>" readonly>
			<input type="hidden" name="proveedor" id="inputProveedor" class="form-control" value="<?= $Proveedor->idproveedor?>">
		</div>
		<div class="well well-sm">
			<strong>NIT: </strong><?= $Proveedor->nit; ?><br>
			<strong>Direccion: </strong><?= $Proveedor->direccion; ?><br>
			<strong>Telefono: </strong><?= $Proveedor->telefono; ?><br>
			<strong>Observacion: </strong><?= $Proveedor->observacion; ?><br>
			<strong>URL: </strong><?= $Proveedor->url; ?>
		</div>

		<hr>
		<?php if (is_array($Productos)): ?>
		<div class="form-group" >
			<a class="btn btn-default" role="button" id="del" ng-click="del()">Eliminar Pedido</a>
			<a class="btn btn-default" role="button" id="add" ng-click="add()">Agregar Pedido</a>
		</div>		
		<?php endif ?>	
		<table class="table table-hover" id="tabla">
			<thead>
				<tr>
					<th>Producto</th>
					<th width="120px">Cantidad</th>
					<th width="120px">Precio unitario</th>
					<th width="450px">Observacion</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<select name="producto[]" class="form-control" required>
								<option value="">--Seleccione el producto</option>
			<?php foreach ($Productos as $producto): ?>
								<option value="<?= $producto['idproducto']?>"><?= $producto['nombre'] ?></option>
			<?php endforeach ?>
						</select>
					</td>
					<td>
						<input type="text" class="form-control" name="cantidad[]" required>
					</td>
					<td>
						<input type="text" class="form-control" name="precio[]" required>
					</td>
					<td>
						<input type="text" class="form-control" name="observacion[]" required>
					</td>
				</tr>
			</tbody>
		</table>			
		<div class="form-group pull-right">
			<button type="submit" class="btn btn-primary">Enviar</button>
		</div>
	<?php echo form_close(); ?>
<?php endif ?>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {

<?php if(isset($Proveedor) && is_array($Productos)): ?>
		$("#add").click(function(){	
		    var nuevaFila="<tr>";

            // añadimos las columnas
            nuevaFila+="<td>"
					+	"<select name='producto[]' class='form-control' required>"
					+			"<option value=''>--Seleccione el producto</option>"
					+		"<?php foreach ($Productos as $producto): ?>"
					+				"<option value='<?= $producto['idproducto']?>'><?= $producto['nombre'] ?></option>"
					+		"<?php endforeach ?>"
					+	"</select>"
					+"<td>"
					+	"<input type='text' class='form-control' name='cantidad[]' required>"
					+"</td>"
					+"<td>"
					+	"<input type='text' class='form-control' name='precio[]' required>"
					+"</td>"
					+"<td>"
					+	"<input type='text' class='form-control' name='observacion[]'' required>"
					+"</td>";

            // Añadimos una columna con el numero total de columnas.
            // Añadimos uno al total, ya que cuando cargamos los valores para la
            // columna, todavia no esta añadida
            nuevaFila+="</tr>";

            $("#tabla").append(nuevaFila);

        });
		$("#del").click(function(){

            // Obtenemos el total de columnas (tr) del id "tabla"
            var trs=$("#tabla tr").length;
            if(trs>2)
            {
                // Eliminamos la ultima columna
                $("#tabla tr:last").remove();
            }
        });
<?php endif ?>

        $('#proveedor').change(function() {
        	var proveedor = $(this).val();
        	$('#step1').attr('href', '<?= base_url();?>solicitud/new/'+proveedor);        	
        });        
	});	
</script>