<div class="container" id="container">
	<div class="page-header">
		<h1>Detalles de usuario</h1>
	</div>
	<div class="row">
		<div class="col-md-3">
			<a href="#" class="thumbnail">
				<img data-src="<?= base_url()."fileupload/photoperfil/".$DatosPersonales->fotoPerfil;?>" alt="...">
			</a>
		</div>
		<div class="col-md-9">
			<strong>Nombre: </strong><?=$DatosPersonales->nombres ?><br>
			<strong>Apellido Paterno: </strong><?=$DatosPersonales->apellidoPaterno; ?><br>
			<strong>Apellido Materno: </strong><?=$DatosPersonales->apellidoMaterno; ?><br>
			<?php if ($DatosPersonales->grado == ''): ?>
				<strong>Grado</strong> <?= $DatosPersonales->grado; ?>
				<strong>Fuerza</strong> <?= $DatosPersonales->fuerza; ?>
				<strong>Regimiento</strong> <?= $DatosPersonales->regimiento; ?>
				<strong>Carnet Militar</strong> <?= $DatosPersonales->carnetMilitar; ?>
			<?php endif ?>
		</div>
	</div>
	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingOne">
				<h4 class="panel-title">
					<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						Datos Personales
					</a>
				</h4>
			</div>
			<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
				<div class="panel-body">
					<strong>Carnet de identidad: </strong><?= $DatosPersonales->ci; ?><br>
					<strong>Expedido: </strong><?= $DatosPersonales->expedido; ?><br>
					<strong>Fecha de nacimiento: </strong><?= $DatosPersonales->fechaNacimiento; ?><br>
					<strong>Sexo: </strong><?= $DatosPersonales->sexo; ?><br>
					<strong>Telefono: </strong><?= $DatosPersonales->telefono; ?><br>
					<strong>Celular: </strong><?= $DatosPersonales->celular; ?><br>
					<strong>Domicilio: </strong><?= $DatosPersonales->domicilio; ?><br>
					<strong>Codigo de seguro: </strong><?= $DatosPersonales->codigoSeguro; ?><br>
					<strong>Estado Civil: </strong><?= $DatosPersonales->estadoCivil; ?><br>
					<strong>Profesión: </strong><?= $DatosPersonales->profesion; ?><br>
					<strong>Email: </strong><?= $DatosPersonales->email; ?><br>
					<strong>Password: </strong><?= $DatosPersonales->password; ?><br>
					<strong>Cargo: </strong><?= $DatosPersonales->cargo; ?><br>
					<strong>Área: </strong><?= $DatosPersonales->area; ?><br>
					<strong>Dependencia: </strong><?= $DatosPersonales->dependencia; ?><br>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingTwo">
			<h4 class="panel-title">
				<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					
				</a>
			</h4>
		</div>
		<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
		  <div class="panel-body">
		    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
		  </div>
		</div>
		</div>
		<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingThree">
		  <h4 class="panel-title">
		    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
		      Collapsible Group Item #3
		    </a>
		  </h4>
		</div>
		<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
		  <div class="panel-body">
		    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
		  </div>
		</div>
		</div>
	</div>
</div>