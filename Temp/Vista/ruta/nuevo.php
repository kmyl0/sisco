<div class="container" id="contenido">
	<div class="col-md-8">
		<h1>Nueva Ruta</h1>
	</div>
	<div class="col-md-4 pull-right">
		<h1>Ruta Nro: <?php //$idruta+1; //Proxima Ruta ?></h1>
	</div> 
	<?php echo form_open('ruta/nuevo'); ?>
		<div class="col-md-4">
			<div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="text" name="fecha" value="<?php echo date("Y-m-d") ?>" class="form-control" readonly="off">
            </div>
		</div>
		<div class="col-md-8">
			<div class="form-group">
				<label for="procedencia">PROCEDENCIA</label>
				<input type="text" name="cite" value="" class="form-control">
			</div>
			<div class="form-group">
				<label for="procedencia">ASUNTO</label>
				<input type="text" name="cite" value="" class="form-control">
			</div>
		</div>
	</form>
</div>