<h2>Ruta: <?= $rutas[0]['idruta'] ?></h2>
<?php $i=1; foreach ($rutas as $ruta) { ?>	
<div class="col-md-12">
	<table>
		<tr>
			<td><strong>Fecha : <?= $ruta['fechaenviado'] ?></strong>
			</td>
			<td align="Right">
				<strong>
					Cite: <?= $ruta['cite'] ?>
				</strong>
			</td>
			<td align="Right">
				<strong>
					Ruta: <?= $ruta['idruta'] ?>
				</strong>
			</td>
		</tr>
	</table>
	<strong>Adjunto : <?php if ($ruta['adjuntoexterno'] != "") 
		{
			echo anchor('itinerario/informe/download/'.$ruta['adjuntoexterno'], $ruta['adjuntoexterno']); 
		} else { echo "No incluido";}?>
	</strong>

	<br><br>
	<strong>De: </strong>
	<?= $ruta['autor']." - ". $ruta['autorcargo']; ?><br>

	<strong>A: </strong>
	<?= $ruta['destinatario']." - ". $ruta['destinatariocargo']; ?>
	<br><br>

	<strong>Referencia: </strong><br><?= $ruta['referencia']; ?><br>
	<strong>Resumen: </strong><br><?= $ruta['resumen']; ?>
	<hr>
</div>
<?php } ?>	
