	<?php if ($informes != NULL){ $i=1; foreach ($informes as $informe)  {  ?>
	<div class="panel-group" id="accordion">	
		<div class="panel <?php if($informe['estado'] == "Pendiente") { echo "panel-warning"; } else { echo "panel-success";}?>">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" 
						href="<?php echo "#collapse".$i; ?>">
						<?php echo $i;?> 
						<?php echo $informe['cite'];?>
						<?php echo $informe['autor'];?>
						<span class="label label-default pull-right"><?php echo $informe['fecha'];?></span>
					</a>
				</h4>
			</div>
			<div id="<?php echo 'collapse'.$i;?>" class="panel-collapse collapse">
				<div class="panel-body">
					<strong>Referencia</strong>
					<p><?php echo $informe['referencia'];?></p>
					<div class="btn-group">
						<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
							Adjunto <span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu">
							<li>
								<?php if ($informe['externo']!='') { 
									echo anchor('itinerario/informe/download/'.$informe['externo'], "Externo");
					 			} ?>
			 				</li>
							<li>
								<?php echo anchor('itinerario/informe/download/'.$informe['documento'], "Informe"); ?>
							</li>
						</ul>
					</div>

					
					<?php if ($informe['estado'] == "Pendiente") { ?>
						<a class="btn btn-success pull-right" href="<?= base_url();?>informe/nuevo/<?= $informe['idruta'].'/'.$informe['idinforme'];?>">
							Responder
						</a>
					<?php } else { ?>
						<a class="btn btn-success pull-right" href="<?= base_url();?>ruta/<?= $informe['idruta'];?>">
							Remitido
						</a>
					<?php } ?>
				</div>
			</div>
		</div>	
	</div>
	<?php $i++; } } ?>	

	<div class="timeline">
			<div class="line text-muted"></div>

			<!-- Panel -->
			<article class="panel panel-info panel-outline">
	
					<!-- Icon -->
					<div class="panel-heading icon">
						<i class="glyphicon glyphicon-flag"></i>
					</div>
					<!-- /Icon -->
	
					<!-- Body -->					
					<div class="alert alert-success" role="alert">Inicio</div>					
					<!-- /Body -->
	
			</article>
			<!-- /Panel -->

			<?php foreach ($rutas as $ruta) { ?>				
			
			<!-- Panel -->
			<article class="panel panel-primary">
					<!-- Icon -->
					<div class="panel-heading icon">
							<i class="glyphicon glyphicon-bullhorn"></i>
					</div>
					<!-- /Icon -->
	
					<!-- Heading -->
					<div class="panel-heading">
						<h2 class="panel-title"> <?= $ruta['cite']." - ".$ruta['referencia']?></h2>
						<span class="label label-default pull-right"><?php echo $ruta['fecha'];?></span>
					</div>
					<!-- /Heading -->
	
					<!-- Body -->
					<div class="panel-body">
							<?= $ruta['resumen']?>
					</div>
					<!-- /Body -->
	
					<!-- Footer -->
					<div class="panel-footer">
						Informe
					</div>
					<!-- /Footer -->
			</article>
			<!-- /Panel -->

			<?php } ?>

			<!-- Panel -->
			<article class="panel panel-info panel-outline">
	
					<!-- Icon -->
					<div class="panel-heading icon">
							<i class="glyphicon glyphicon-flag"></i>
					</div>
					<!-- /Icon -->
	
					<!-- Body -->
					<div class="alert alert-warning" role="alert">Pendiente</div>	
					<!-- /Body -->
	
			</article>
			<!-- /Panel -->				
		
		</div>
		<!-- /Timeline -->




		$('#cbbBuscar').change(function(){
		if($('#cbbBuscar').val() == "1")
		{
			$('#txtBuscar').removeAttr('type');
			$('#txtBuscar').attr('type', 'number');
		}
		else
		{
			$('#txtBuscar').removeAttr('type');
			$('#txtBuscar').attr('type', 'text');
		}
	});

	<style type="text/css">
.timeline {
	position: relative;
	padding: 21px 0px 10px;
	margin-top: 4px;
	margin-bottom: 30px;
}

.timeline .line {
	position: absolute;
	width: 4px;
	display: block;
	background: currentColor;
	top: 0px;
	bottom: 0px;
	margin-left: 30px;
}

.timeline .separator {
	border-top: 1px solid currentColor;
	padding: 5px;
	padding-left: 40px;
	font-style: italic;
	font-size: .9em;
	margin-left: 30px;
}

.timeline .line::before { top: -4px; }
.timeline .line::after { bottom: -4px; }
.timeline .line::before,
.timeline .line::after {
	content: '';
	position: absolute;
	left: -4px;
	width: 12px;
	height: 12px;
	display: block;
	border-radius: 50%;
	background: currentColor;
}

.timeline .panel {
	position: relative;
	margin: 10px 0px 21px 70px;
	clear: both;
}

.timeline .panel::before {
	position: absolute;
	display: block;
	top: 8px;
	left: -24px;
	content: '';
	width: 0px;
	height: 0px;
	border: inherit;
	border-width: 12px;
	border-top-color: transparent;
	border-bottom-color: transparent;
	border-left-color: transparent;
}

.timeline .panel .panel-heading.icon * { font-size: 20px; vertical-align: middle; line-height: 40px; }
.timeline .panel .panel-heading.icon {
	position: absolute;
	left: -59px;
	display: block;
	width: 40px;
	height: 40px;
	padding: 0px;
	border-radius: 50%;
	text-align: center;
	float: left;
}

.timeline .panel-outline {
	border-color: transparent;
	background: transparent;
	box-shadow: none;
}

.timeline .panel-outline .panel-body {
	padding: 10px 0px;
}

.timeline .panel-outline .panel-heading:not(.icon),
.timeline .panel-outline .panel-footer {
	display: none;
}
</style>


// $pageLayout = array(215, 279); 
		// $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, $pageLayout, true, 'UTF-8', false);

	 //    $pdf->SetCreator(PDF_CREATOR);
	 //    $pdf->SetAuthor('MUGEBUSCH');
	 //    $pdf->SetTitle('RUTA');
	 //    $pdf->SetSubject('INFORME DE ');
	 //    $pdf->SetKeywords('RUTA, INFORME');

	 //    $pdf->SetHeaderData("logomugebusch.png", PDF_HEADER_LOGO_WIDTH);
		// $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
	 //    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
	 //    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	 //    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	 //    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER); 
	 //    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
	 //    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

	 //    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) 
	 //    {
	 //        require_once(dirname(__FILE__).'/lang/eng.php');
	 //        $pdf->setLanguageArray($l);
	 //    }

	 //    $pdf->setFontSubsetting(true); 
	 //    $pdf->SetFont('helvetica', '', 10);
	 //    $pdf->AddPage();

	    $Rutas = $this->ruta_model->GetRutaById2($idruta);
	    $html = "";

	    foreach ($Rutas as $ruta) 
	    {
	    	$ruta['adjuntoexterno'] = $ruta['adjuntoexterno'] != "" ? $ruta['adjuntoexterno'] : "No incluido";
	    	$html = $html + "
	    	<table border>
				<tr>
					<td>
						<strong>Fecha : ".$ruta['fechaenviado']."</strong>
					</td>
					<td>
						<strong>Adjunto :".$ruta['adjuntoexterno']."</strong>
					</td>
					<td>
						<strong>Cite : ".$ruta['cite']."</strong>
					</td>
					<td>
						<strong>Ruta : ".$ruta['idruta']."</strong>
					</td>
				</tr>
				<tr>
					<td>
						<strong>DE:</strong>
					</td>
					<td colspan=3>
						".$ruta['autorarea']." - ".$ruta['autor']." - ". $ruta['autorcargo']."			
					</td>
				</tr>
				<tr>
					<td>
						<strong>A:</strong>
					</td>
					<td colspan=3>
						".$ruta['destinatarioarea']." - ".$ruta['destinatario']." - ". $ruta['destinatariocargo']."
					</td>
				</tr>
				<tr>
					<td>
						<strong>Referencia:</strong>
					</td>
					<td colspan=3>
						".$ruta['referencia']."
					</td>
				</tr>
				<tr>
					<td colspan=4>
						<strong>Resumen: </strong><br> 
						".$ruta['resumen']."
					</td>
				</tr>
			</table>";  
		}
	    echo ($html);


	    <div class="container">
	<div class="page-header">
		<h2>Ruta: <strong><?= $rutas[0]['idruta'] ?></strong></h2>
	</div>
	<div class="col-md-12">
		<form class="form-inline pull-right" role="form">
			<!-- <div class="form-group">
				<input type="search" name="buscar" class="form-control" placeholder="Buscar">
				<button class="btn btn-success" >Buscar</button>				
			</div> -->
			<a class="btn btn-info" href="<?= base_url().'ruta/pdf/'.$rutas[0]['idruta'];?>".>Exportar PDF</a>
		</form>
		
	</div>
	<?php $i=1; foreach ($rutas as $ruta) { ?>	
	<div class="col-md-12">
		<table class="table table-bordered">
			<tr>
				<td>
					<strong>
						Fecha : <?= $ruta['fechaenviado'] ?>
					</strong>
				</td>
				<td>
					<strong>
						Adjunto : <?php if ($ruta['adjuntoexterno'] != "") 
						{
							echo anchor('itinerario/informe/download/'.$ruta['adjuntoexterno'], $ruta['adjuntoexterno']); 
						} else { echo "No incluido";}?>
					</strong>
				</td>
				<td>
					<strong>
						Cite: <?= $ruta['cite'] ?>
					</strong>
				</td>
				<td>
					<strong>
						Ruta: <?= $ruta['idruta'] ?>
					</strong>
				</td>
			</tr>
			<tr>
				<td>
					<strong>DE:</strong>
				</td>
				<td colspan=3>
					<?= $ruta['autorarea']." - ".$ruta['autor']." - ". $ruta['autorcargo']; ?>					
				</td>
			</tr>
			<tr>
				<td>
					<strong>A:</strong>
				</td>
				<td colspan=3>
					<?= $ruta['destinatarioarea']." - ".$ruta['destinatario']." - ". $ruta['destinatariocargo']; ?>
				</td>
			</tr>
			<tr>
				<td>
					<strong>Referencia:</strong>
				</td>
				<td colspan=3>
					<?= $ruta['referencia']; ?>
				</td>
			</tr>
			<tr>
				<td colspan=4>
					<strong>Resumen: </strong><br> 
					<?= $ruta['resumen']; ?>
				</td>
			</tr>
		</table>
		<hr>
	</div>

	<?php } ?>	
</div>