<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body" id="infProveedor">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>				
			</div>
		</div>
	</div>
</div>		
<div class="container">
	<div class="page-header">
	  <h1>Formulario de Solicitud No. <?=$Cabeceras->idsolicitud_cabecera ?> </h1>
	</div>
	<div class="col-md-12">
		<div class="panel <?= $Panel; ?>">
			<div class="panel-heading">
				<h3 class="panel-title"><?= $Cabeceras->fecha; ?></h3>	
			</div>
				<div class="panel-body">
					<strong>Proveedor: </strong><?= $Cabeceras->proveedor; ?>
					<table class="table" id="tabla">
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
									<button type="button" id="observacion<?= $detalle->idsolicitud_detalle ?>" class="selected" data-selected="false">
										Observaciones
									</button>
								</td>
							</tr>
							<!-- <tr class="trhide" id="showobservacion<?= $detalle->idsolicitud_detalle ?>"> -->
							<tr>
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
								<form action="<?= base_url().'solicitud/newComentario'; ?>" method="POST" role="form" class= "form-inline">
									<input type="hidden" name="idsolicitud_cabecera" value="<?=$Cabeceras->idsolicitud_cabecera ?>">
									<input type="hidden" name="idsolicitud_detalle" value="<?= $detalle->idsolicitud_detalle ?>">
									<div class="form-group">
										<label for="observacion">Observacion</label>
										<input type="text" name="observacion" id="observacion" class="form-control">
									</div>
									<button type="submit" class="btn btn-default">Observar</button>	
								</form>
								</td>
							</tr>
						<?php endforeach ?>		
							<tr>
								<td colspan="4">
									<strong>TOTAL</strong>
								</td>
								<td>
									<input type="text" name="fecha" id="inputFecha" class="form-control" value="<?= $Cabeceras->total; ?>" disabled>
								</td>
								<td>
									<strong>$Bs</strong>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			<!-- <div class="panel-footer">
				<strong></strong>
			</div> -->
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#Proveedor').click(function() {

			
		});
	});
</script>
<!-- 
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
</script> -->