<!-- main-header -->
<header class="main-header">
    <a href="#" class="logo" style="">
        <span class="logo-mini"><b>SIS</b>V</span>
        <span class="logo-lg" style="font-size: 11px"><b><?php echo $empEmpresa ?> </b></span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-danger" id="spanAlertas"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header Med">No Tiene notificaciones.</li>
                        <li>
                            <ul class="menu" id="menuAlertas">
                                <li data-toggle="modal" data-target="#modalOrdenes">
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger" id="spanTareas"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header tasks">You have 0 tasks</li>
                        <li>
                            <ul class="menu" id="menutareas">
                                <li>
                                    <!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Design some buttons
                                            <small class="pull-right">20%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">View all tasks</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav" style="font-size: 11px;">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><?php echo $nombreUsuario ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li data-toggle="modal" data-toggle="modal" data-target="#modalConfiguracionUser"><a href="#"><i class="fa fa-user-circle" aria-hidden="true"></i> Seguridad</a></li>
                        <li><a href="/consolidacion/php_cerrar"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>
        </div>

    </nav>
</header>
<div class="modal fade " id="modalConfiguracionUser" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id=""><strong>Perfil de usuario.</strong></h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label><strong>Nombre usuario:</strong></label>
                        <input type="text" class="form-control input-sm" disabled="" value=" <?php echo $nombreUsuario ?>">
                        <br>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Cambio de clave
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <form name="login" method="post" action="/" autocomplete="off">
                                        <div class="col-md-4">
                                            <label><strong>Contraseña Anterior:</strong></label>
                                            <input type="text" style="-webkit-text-security: disc;" autocomplete="off" class="form-control input-sm" name="txtContrasenaAnterior" id="txtContrasenaAnterior">
                                        </div>
                                        <div class="col-md-4">
                                            <label><strong>Nueva Contraseña:</strong></label>
                                            <input type="text" style="-webkit-text-security: disc;" autocomplete="off" class="form-control input-sm" name="txtContrasenaNueva" id="txtContrasenaNueva">
                                        </div>
                                        <div class="col-md-4">
                                            <label><strong>Confirmar Contraseña:</strong></label>
                                            <input type="text" style="-webkit-text-security: disc;" autocomplete="off" spellcheck="false" class="form-control input-sm" name="txtConfirmarContraena" id="txtConfirmarContraena">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" name="btnGuardarConfiguraion" onclick="cambiarContrasena();" id="btnGuardarConfiguraion" class="btn btn-primary btn-sm"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Salir.</button>
            </div>
        </div>
    </div>
</div>