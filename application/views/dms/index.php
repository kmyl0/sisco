<div id="page-wrapper" ng-controller="dms_controller">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="page-header">
					<h1>Buscar</h1>
				</div>
			</div>
			<div class="col-md-12">
				<ul id="menu_area" class="nav nav-pills">
					<li class="active"><a href="#knowing_us" data-toggle="tab" id="menu_text">Recepción</a></li>
					<li><a href="#knowing_us2" data-toggle="tab" id="menu_text">Pendientes</a></li>
					<li><a href="#knowing_us3" data-toggle="tab" id="menu_text">Todos</a></li>
					<li><a href="#knowing_us3" data-toggle="tab" id="menu_text">Archicados</a></li>
				</ul>
				<form method="GET" action="<?= base_url()?>dms/buscar" class="form-group" id="frmBuscarReporte">
					<div class="form-group">
						<label class="checkbox-inline">
							<input
								type="checkbox"
								name="nroRuta"
								value="TRUE"
								<?php if (isset($Rutas)): ?> checked <?php endif ?>>
							Numero de ruta
						</label>
						<label class="checkbox-inline">
							<input
								type="checkbox"
								name="referencia"
								value="TRUE"
								<?php if (isset($Referencia)): ?> checked <?php endif ?>>
							Referencia
						</label>
						<label class="checkbox-inline">
							<input
								type="checkbox"
								name="resumen"
								value="TRUE"
								<?php if (isset($Resumen)): ?> checked <?php endif ?>>
							Resumen
						</label>
						<label class="checkbox-inline">
							<input
								type="checkbox"
								name="autor"
								value="TRUE"
								<?php if (isset($Autor)): ?> checked <?php endif ?>>
							Autor
						</label>
					</div>
					<div class="form-group">
						<input type="search" name="buscar" id="txtBuscar" class="form-control" placeholder="Buscar" value="<?= @$Busqueda?>" required>
					</div>
					<div class="form-group">
						<button class="btn btn-success" type="submit">Buscar</button>
					</div>
				</form>
			</div>

			<?php if (isset($Rutas)): ?>
			<div class="col-md-12" id="referenciaRespuesta">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Rutas encotradas</h3>
					</div>
					<div class="panel-body">
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Ruta</th>
									<th>Referencia</th>
									<th>Resumen</th>
									<th>Estado</th>
									<th>Ruta</th>
								</tr>
							</thead>
							<tbody>
							<?php $i=1; foreach ($Rutas as $ruta): ?>
								<tr class="<?php if($ruta->estado == "Pendiente") { echo "warning"; } else { echo "success";}?>">
									<td><?php echo $i; $i++?></td>
									<td><strong><?php echo $ruta->id_ruta;?></strong></td>
									<td><?php echo $ruta->referencia;?></td>
									<td><?php echo $ruta->resumen;?></td>
									<td><?php echo $ruta->estado?></td>
									<td><?php echo anchor(base_url().'dms/view/'.$ruta->id_ruta, "Ruta", 'class="btn btn-info"');?></td>
								</tr>
							<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<?php endif ?>

			<?php if (isset($Referencia)): ?>
			<div class="col-md-12" id="referenciaRespuesta">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Referencias encontradas</h3>
					</div>
					<div class="panel-body">
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Referencia</th>
									<th>Resumen</th>
									<th>Estado</th>
									<th>Ruta</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; foreach ($Referencia as $referencia) :  ?>
									<tr class="<?php if($referencia->estado == "Pendiente") { echo "warning"; } else { echo "success";}?>">
										<td><?php echo $i; $i++?></td>
										<td><?php echo $referencia->referencia;?></td>
										<td><?php echo $referencia->resumen;?></td>
										<td><?php echo $referencia->estado;?></td>
										<td><?php echo anchor(base_url().'dms/view/'.$referencia->id_ruta, $referencia->id_ruta, 'class="btn btn-info"');?></td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<?php endif ?>
			<?php if (isset($Resumen)): ?>
			<div class="col-md-12" id="resumenRespuesta">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Resumenes encotrados</h3>
					</div>
					<div class="panel-body">
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Referencia</th>
									<th>Resumen</th>
									<th>Estado</th>
									<th>Ruta</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; foreach ($Resumen as $resumen) :  ?>
									<tr class="<?php if($resumen->estado == "Pendiente") { echo "warning"; } else { echo "success"; }?>">
										<td><?php echo $i; $i++?></td>
										<td><?php echo $resumen->referencia;?></td>
										<td><?php echo $resumen->resumen;?></td>
										<td><?php echo $resumen->estado;?></td>
										<td><?php echo anchor(base_url().'dms/view/'.$resumen->id_ruta, $resumen->id_ruta, 'class="btn btn-info"');?></td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<?php endif ?>
			<?php if (isset($Autor)): ?>
			<div class="col-md-12" id="autorRespuesta">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Autores encotrados</h3>
					</div>
					<div class="panel-body">
						<table class="table">
							<caption></caption>
							<thead>
								<tr>
									<th>#</th>
									<th>Autor</th>
									<th>Destinatario</th>
									<th>Referencia</th>
									<th>Estado</th>
									<th>Ruta</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; foreach ($Autor as $autor) :  ?>
								<tr class="<?php if($autor->estado == "Pendiente") { echo "warning"; } else { echo "success";}?>">
									<td><?php echo $i; $i++?></td>
									<td><?php echo $autor->autor;?></td>
									<td><?php echo $autor->destinatario;?></td>
									<td><?php echo $autor->referencia;?></td>
									<td><?php echo $autor->estado;?></td>
									<td><?php echo anchor(base_url().'dms/view/'.$autor->id_ruta, $autor->id_ruta, 'class="btn btn-info"');?></td>
								</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<?php endif ?>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	$('#frmBuscarReporte').bootstrapValidator({
		framework: 'bootstrap',
		message: 'Este valor no es valido',
		feedbackIcons: {
			validating: 'glyphicon glyphicon-refresh'
		},
		fields : {
			txtBuscar : {
				validators : {
					notEmpty:{
						message: 'Buscar es un dato requerido'
					}
				}
			},
			'tipoBusqueda[]' : {
				validators : {
					notEmpty :{
						message : 'Elija una opcion de busqueda'
					}
				}
			}
		}
	});
});
</script>
