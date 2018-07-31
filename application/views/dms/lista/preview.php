<style type="text/css">
hr {
	height: 2px;
	margin-left: auto;
	margin-right: auto;
	background-color:#222;
	color:#FF0066;
	border: 0 none;
}
table
{
	width: 100%;
}
</style>
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="page-header">
					<h2>Ruta: <strong><?= $rutas[0]['idruta'] ?></strong></h2>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">				
				<p><a class="btn btn-info" role="button" href="<?= base_url().'dms/pdf/'.$rutas[0]['idruta'];?>".>Exportar PDF</a>	</p>
			</div>			
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">			
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Ruta: <?= $rutas[0]['idruta'] ?></h3>
					</div>
					<div class="panel-body">						
						<p><strong>Referencia:</strong> <?= $procedencia->procedencia; ?></p>												
						<p><strong><?= $procedencia->nombre; ?></strong></p>
					</div>
					<ul class="list-group">
						<?php $i=1; foreach ($rutas as $ruta) : ?>
							<?php if ($ruta['proceso'] != "AVISAR"): ?>
								<li class="list-group-item">
							    	<table>
										<tr>
											<td>
												<strong>Fecha : <?= $ruta['fechaenviado'] ?></strong>
											</td>
											<td>
												<strong>
													Cite: <?= $ruta['cite'] ?>
												</strong>
											</td>
											<td class="pull-right">
												<strong>
													Ruta: <?= $ruta['idruta'] ?>
												</strong>
											</td>
											
										</tr>
									</table>

									
									<strong>Adjunto : <?php if ($ruta['adjuntoexterno'] != "") 
										{
											echo anchor('dms/viewinforme/'.$ruta['adjuntoexterno'], $ruta['adjuntoexterno']); 
										} else { echo "No incluido";}?>
									</strong><br>								

									<strong>A: </strong>
									<?= $ruta['destinatario']." - ". $ruta['destinatariocargo']; ?>
									<?php if (isset($avisados)): ?>
										<?php foreach ($avisados as $destino): ?>
											<?php echo ','. $destino['destinatario']." - ". $destino['destinatariocargo']  ?>
										<?php endforeach ?>
									<?php endif ?>									
									<br>

									<strong>Proveido: </strong><br><?= $ruta['resumen']; ?><br>
							    </li>
							<?php endif ?>					    
					    <?php endforeach; ?>
					</ul>
				</div>				
			</div>			
		</div>
	</div>
</div>