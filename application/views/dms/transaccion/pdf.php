<h1>NUR: <?= $rutas[0]['idruta'] ?> <br><strong><?= $procedencia->nombre; ?></strong></h1>
<strong>De: </strong><?= $procedencia->nombres." ".$procedencia->apellidoPaterno." ".$procedencia->apellidoMaterno." - ".$procedencia->cargo; ?><br>
<strong>Referencia: </strong><?= $procedencia->procedencia; ?>
<hr>
<?php $i=1; foreach ($rutas as $ruta): ?>
	<?php if ($ruta['proceso'] != "AVISAR"):?>
		<table>
			<tr>
				<td><strong>Fecha : <?= $ruta['fechaenviado'] ?></strong>
				</td>
				<td align="Right">
					<?php if (($ruta['cite']) != ""): ?>
					<strong>				
						Cite: <?= $ruta['cite'] ?>				
					</strong>
					<?php endif ?>					
				</td>			
			</tr>
		</table>
		<strong>Adjunto : <?php if ($ruta['adjuntoexterno'] != "") 
			{
				echo anchor('dms/viewinforme/'.$ruta['adjuntoexterno'], $ruta['adjuntoexterno']); 
			} else { echo "No incluido";}?>
		</strong>
		<br>

		<strong>A: </strong>
		<?= $ruta['destinatario']." - ". $ruta['destinatariocargo']; ?>
		<?php if (isset($avisados)): ?>
			<?php echo ' Y OTROS' ?>				
		<?php endif ?>
		<br>

		<strong>Proveido: </strong><br><?= $ruta['resumen']; ?><br>
		<?php if (($ruta['documento']) != ""): ?>
		<strong>Documento: </strong><?= $ruta['documento'] ?><br>
		<?php endif ?>						
		<hr>
	<?php endif; ?>	
<?php endforeach; ?>
<br>
<br>
<table border="1px" cellspacing="">
	<tr>
		<td colspan="2" height="50px">A:</td>		
	</tr>
	<tr>
		<td height="120px" width="65%">Proveido:</td>
		<td width="35%">Firma:</td>
	</tr>
</table>
