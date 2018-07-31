<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="#">SISCOSED</a>
    </div>

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <!-- Top Navigation: Right Menu -->
    <ul class="nav pull-right navbar-top-links">
        <li class="dropdown navbar-inverse">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-bell fa-fw"></i><b class="caret"></b>
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
                        <strong>Ver todas las alertass</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
        </li>
        <li class="dropdown navbar-inverse">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-bell fa-fw"></i> secondtruth <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="<?= base_url()?>user/profile"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="<?= base_url()?>home/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
        </li>
    </ul>

    <!-- Sidebar -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="#" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-sitemap fa-fw"></i> Gestión de rutas<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?= base_url(); ?>dms/">           Seguimiento</a>
                            <a href="<?= base_url(); ?>dms/nuevo/ruta"> Nueva Ruta</a>
                            <a href="<?= base_url(); ?>dms/lista/ruta"> Rutas</a>
                            <a href="<?= base_url(); ?>dms/enviados">   Informes Enviados</a>
                            <a href="<?= base_url(); ?>dms/recibidos">  Informes Recibidos</a>                          
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-sitemap fa-fw"></i> Usuarios<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">

                        <li>
                            <a href="<?= base_url()?>rrhh/">Lista de Usuarios</a>
							<a href="<?= base_url()?>rrhh/addUser" role="button">Crear Usuario</a>
                        </li>                       
                    </ul>
                </li>                
            </ul>
        </div>
    </div>
</nav>   