<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h1>Informes Enviados</h1>
				</div>	
			</div>
			<div class="col-md-12">
			<?php if ($informes == NULL): ?>		
				<strong>No existen mensajes</strong>
			<?php else: ?>
				<table class="table table-responsive">
					<thead>
						<tr>
							<th>#</th>
							<th>Ruta</th>
							<th>Cite</th>
							<th>Fecha</th>
							<th>Enviado A:</th>
							<th>Estado</th>
							<th>Ver:</th>
						</tr>
					</thead>
					<tbody>
						<?php  $i=1; foreach ($informes as $informe):  ?>
						<tr class="<?php if($informe->estado == "Pendiente") : echo "warning"; else : echo "success"; endif;?>">
							<td><?php echo $i; $i++; ?></td>
							<td><?php echo $informe->idruta;?></td>
							<td><?php echo $informe->cite;?></td>
							<td><?php echo $informe->fecha;?></td>
							<td><?php echo $informe->destinatario;?></td>
							<td><?php echo $informe->estado?></td>
							<td>
								<a class="btn btn-primary selected" href="#" role="button" id="observacion<?= $informe->idinforme ?>" data-selected="false">
									Informe
								</a>
								<a class="btn btn-info" href="<?= base_url();?>dms/view/<?= $informe->idruta;?>">
									Ruta
								</a>
							</td>
						</tr>
						<tr class="trhide" id="showobservacion<?= $informe->idinforme ?>">
							<td colspan="8">
								<strong>Referencia</strong><br>
								<p><?php echo $informe->referencia;?></p>
								<strong>Resumen</strong><br>
								<p><?php echo $informe->resumen;?></p>
								<?php if ($informe->externo!=''): 
									echo anchor('dms/viewinforme/'.$informe->externo, "DOCUEMENTO EXTERNO", "class='btn btn-success' role='button'");
					 			endif ?>
					 			
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>	
			<?php endif; ?>				
			</div>			
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('.trhide').hide();
		$('.selected').each(function(index){
			$(this).click(function(event) {
				var mammalKey = $(this).attr('id');
				$('#show'+mammalKey ).fadeToggle();
			});		
		});	
	});
</script>


