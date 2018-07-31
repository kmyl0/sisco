<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top navbar-fixed-top" role="navigation">
	<!-- Top Navigation  -->
	<div class="navbar-header">
		<a class="navbar-brand" href="#">
			<img style="max-width:130px; margin-top: -5px;" src="<?= base_url()?>assets/img/mugebuschlogoxxx.png">
         </a>
         <a href="#" class="navbar-brand">SISCOSED</a>
	</div>

	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>

	<!-- Top Navigation: Right Menu -->
	<ul class="nav navbar-top-links navbar-right">

		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
				<i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
			</a>
			<ul class="dropdown-menu dropdown-alerts">
				<li>
					<a href="#">
						<div>
							<i class="fa fa-comment fa-fw"></i> Nuevo Comentario
							<span class="pull-right text-muted small">Hace 4 minutos</span>
						</div>
					</a>
				</li>
				<li class="divider"></li>
				<li>
					<a class="text-center" href="#">
						<strong>Ver todas las alertas</strong>
						<i class="fa fa-angle-right"></i>
					</a>
				</li>
			</ul>
		</li>
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
				<i class="fa fa-user fa-fw"></i><b class="caret"></b>
			</a>
			<ul class="dropdown-menu dropdown-user">
				<li><a href="#"><i class="fa fa-user fa-fw"></i>Cambiar Contraseña</a>
				</li>
				<li class="divider"></li>
				<li><a href="<?= base_url()?>home/logout"><i class="fa fa-sign-out fa-fw"></i>Salir</a>
				</li>
			</ul>
		</li>
	</ul>

	<!-- Sidebar -->
	<div class="navbar-default sidebar" role="navigation">
		<div class="sidebar-nav navbar-collapse">
			<ul class="nav" id="side-menu">
				<li class="active">
					<!-- <a href="#"><i class="fa fa-paper-plane-o"></i> Gestión de rutas<span class="fa arrow"></span></a> -->
					<ul class="nav nav-second-level">
						<li>
							<a href="#">Nuevo<span class="fa arrow"></span></a>
							<ul class="nav nav-third-level">
								<li>
									<a href="<?= base_url(); ?>dms/operacion/nuevaruta">Hoja de Ruta</a>
								</li>
								<li>
									<a href="<?= base_url(); ?>dms/operacion/nuevo">Documento</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Bandeja de Proveidos<span class="fa arrow"></span></a>
							<ul class="nav nav-third-level">
								<li>
									<a href="<?= base_url(); ?>dms/lista/recepcion">Recepcion</a>
								</li>
								<li>
									<a href="<?= base_url(); ?>dms/lista/pendientes">Pendientes</a>
								</li>
								<li>
									<a href="<?= base_url(); ?>dms/lista/npendientes">Enviados Pendientes de Recepción</a>
								</li>
								<li>
									<a href="<?= base_url(); ?>dms/lista/proveidos">Proveidos</a>
								</li>
								<li>
									<a href="<?= base_url(); ?>dms/lista/archivados">Archivados</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="<?= base_url(); ?>dms/lista/ruta">Bandeja de Remitidos</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>
