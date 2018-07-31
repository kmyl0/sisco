<div class="container">
	<div class="page-header">
		<h2>Reportes</h2>
	</div>
	<div class="col-md-12">
		<form class="form-inline" role="form" method="POST" accept="UTF-8" action="<?= base_url()?>reporte/buscar ">
			<div class="form-group">
				<select name="buscar" class="form-control" required>
					<option value="">--BUSCAR EN:--</option>
					<option value="1">Numero de ruta</option>
					<option value="2">Refencia</option>
					<option value="3">Resumen</option>
					<option value="4">Autor</option>
				</select>
			</div>
			<div class="form-group">
				<input type="search" name="buscar" class="form-control" placeholder="Buscar">
				<button class="btn btn-success" >Buscar</button>				
			</div>
		</form>
	</div>

	<div class="col-md-12">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>#</th>	
					<th>Enviado</th>
					<th>Recibido</th>
					<th>Referencia</th>
					<th>Resumen</th>
					<th>Adjunto</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=1; foreach ($rutas as $ruta) { ?>	
				<tr>
					<td><?= $i?></td>
					<td><?= $ruta['fechaenviado']?></td>
					<td><?= $ruta['autor']?></td>
					<td><?= $ruta['fechaaceptado']?></td>
					<td><?= $ruta['destinatario']?></td>
					<td><?= $ruta['referencia']?></td>
					<td><?= $ruta['resumen']?></td>
				</tr>
				<?php $i++; } ?>
			</tbody>			
		</table>		
	</div>
</div>