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
<div class="container">
	<div class="page-header">
		<h2>Ruta: <strong><?= $rutas[0]['idruta'] ?></strong></h2>
	</div>
	<div class="col-md-12">
		<p><a class="btn btn-info" href="<?= base_url().'ruta/pdf/'.$rutas[0]['idruta'];?>".>Exportar PDF</a></p>
	</div>	
	<?php $i=1; foreach ($rutas as $ruta) { ?>	
	<div class="col-md-12">
		<table>
			<tr>
				<td><strong>Fecha : <?= $ruta['fechaenviado'] ?></strong>
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
				echo anchor('informe/viewinforme/'.$ruta['adjuntoexterno'], $ruta['adjuntoexterno']); 
			} else { echo "No incluido";}?>
		</strong><br>

		<strong>De: </strong>
		<?= $ruta['autor']." - ". $ruta['autorcargo']; ?><br>

		<strong>A: </strong>
		<?= $ruta['destinatario']." - ". $ruta['destinatariocargo']; ?><br>

		<strong>Referencia: </strong><br><?= $ruta['referencia']; ?><br>

		<strong>Resumen: </strong><br><?= $ruta['resumen']; ?>

		<hr>
	</div>
	<?php } ?>
</div>