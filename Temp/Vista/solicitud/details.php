<!-- Angular controller route -->
<script src="https://code.angularjs.org/1.5.0/angular-route.min.js"></script>

<div class="container" ng-app="scsd_detalles" ng-controller="comentarios">
	<div class="page-header">
	  <h1>Formulario de Solicitud No. <?=$Cabecera->idsolicitud_cabecera ?> </h1>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label for="fecha">Fecha</label>
			<input type="text" name="fecha" id="inputFecha" class="form-control" value="<?= $Cabecera->fecha; ?>" disabled>			
		</div>
		<div class="form-group">
			<label for="fecha">Estado</label>
			<input type="text" name="fecha" id="inputFecha" class="form-control" value="<?= $Cabecera->estado; ?>" disabled>			
		</div>
		<div class="form-group">
			<label for="proveedor">Proveedor</label>
			<div class="well well-sm">
				<strong>ID: </strong><?= $Cabecera->idproveedor; ?><br>
				<strong>Nombre: </strong><?= $Cabecera->nombreProveedor; ?><br>
				<strong>NIT: </strong><?= $Cabecera->nit; ?><br>
				<strong>Direccion: </strong><?= $Cabecera->direccion; ?><br>
				<strong>Telefono: </strong><?= $Cabecera->telefono; ?><br>
				<strong>Observacion: </strong><?= $Cabecera->observacion; ?><br>
				<strong>URL: </strong><?= $Cabecera->url; ?>
			</div>
		</div>
		<table class="table table-hover" id="tabla">
			<thead>
				<tr>
					<th width="90px">ID #</th>
					<th>Producto</th>
					<th width="120px">Cantidad</th>
					<th width="120px">Precio unitario</th>
					<th width="120px">Subtotal</th>
					<th width="120px">Ver</th>
				</tr>
			</thead>
			<tbody>
<?php foreach ($Detalles as $detalle): ?>
				<tr>
					<td>
						<input type="text" class="form-control" name="cantidad" disabled value="<?= $detalle->idsolicitud_detalle ?>">
					</td>
					<td>
						<input type="text" class="form-control" name="cantidad" disabled value="<?= $detalle->nombre ?>">
					</td>
					<td>
						<input type="text" class="form-control" name="cantidad" disabled value="<?= $detalle->cantidad ?>">
					</td>
					<td>
						<input type="text" class="form-control" name="cantidad" disabled value="<?= $detalle->preciounitario ?>">
					</td>
					<td>
						<input type="text" class="form-control" name="cantidad" disabled value="<?= $detalle->subtotal ?>">
					</td>
					<td>
						<button type="button" id="observacion<?= $detalle->idsolicitud_detalle ?>" class="selected" data-selected="false">Observaciones</button>
					</td>
				</tr>
				<tr class="trhide" id="showobservacion<?= $detalle->idsolicitud_detalle ?>">
					<td colspan="6">
	<?php foreach ($Comentarios as $comentario): ?>
			<?php foreach ($comentario as $observacion): ?>
				<?php if ($observacion->idsolicitud_detalle == $detalle->idsolicitud_detalle): ?>
					<h4><?= $observacion->nombre." - ". $observacion->cargo?></h4>
					<p class="text-muted"><?= $observacion->fecha?></p>
					<p><?= $observacion->observacion?></p>
					<hr>
				<?php endif ?>
			<?php endforeach ?>
	<?php endforeach ?>
	<?php echo form_open(base_url().'solicitud/newComentario', 'class="form-inline"'); ?>
		<input type="hidden" name="idsolicitud_cabecera" id="input" class="form-control" value="<?=$Cabecera->idsolicitud_cabecera ?>">
		<input type="hidden" name="idsolicitud_detalle" id="input" class="form-control" value="<?= $detalle->idsolicitud_detalle ?>">
		<div class="form-inline">
			<input type="text" name="observacion" id="observacion" class="form-control">
			<button type="submit" class="btn btn-default">Observar</button>			
		</div>
		<hr>
	<?php echo  form_close(); ?>
					</td>
				</tr>
<?php endforeach ?>		
				<tr>
					<td colspan="4">
						<strong>TOTAL</strong>
					</td>
					<td>
						<input type="text" name="fecha" id="inputFecha" class="form-control" value="<?= $Cabecera->totalreal; ?>" disabled>
					</td>
					<td>
						<strong>$Bs</strong>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('.trhide').hide();
		$('.selected').each(function(index){
			$(this).click(function(event) {
				var mammalKey = $(this).attr('id');
				$('#show'+mammalKey ).toggle();
			});		
		});	
	});
	var app = angular.module('scsd_detalles',[]);
	app.controller('comentarios', ['$scope','$http', Comentarios]);

	function Comentarios($scope, $http) 
	{
		$scope.cargarobesrvaciones = function () {
			$http({
				url		: "<?= base_url()?>pedido/JsonObservaciones",
				method	: "POST",
				data 	: {
					"idsolicitud": $scope.idsolicitud_cabecera,
					"iddetallesolicitud" : $scope.detalle
				}
			}).success();
		}
	}
</script>