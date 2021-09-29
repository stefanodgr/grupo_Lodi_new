<?php
error_reporting(E_ERROR | E_PARSE);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ERP - GrupoLodi</title>
    <!-- Bootstrap Styles-->




    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom Styles-->
    <link href="../assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
      <!-- Data Tables-->
    <link href="../assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/bootstrap-iso.css" rel="stylesheet" />
    <!-- jQuery Js -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <!--<script src="../assets/js/jquery-1.10.2.js"></script>

-->


</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>

                </button>
                <div class="visible-md visible-lg">
                    <a class="navbar-brand" href="index.php"><strong>ERP - GrupoLodi</strong></a>
                </div>
                <!--MENU PARA MOVIL-->
                <div class="visible-xs">
                    <ul class="nav navbar-top-links navbar-right">

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                <i class="fa fa-user fa-fw"></i> <?php echo $usuario; ?>&nbsp;<i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">

                                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configuraci&oacute;n</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="../Funciones/Salir.php"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                                </li>
                            </ul>
                            <!-- /.dropdown-user -->
                        </li>
                        <!-- /.dropdown -->
                    </ul>
                </div>
            </div>
            <div class="visible-md visible-lg">

                <ul class="nav navbar-top-links">

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                            <i class="fa fa-home"></i> Inicio&nbsp;
                        </a>

                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                            <i class="fa fa-book fa-fw"></i> Compras&nbsp;<i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">

                            <li><a href="index.php?menu=13"><i class="fa fa-book fa-fw"></i> Importaciones</a>
                            </li>

                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                            <i class="fa fa-book fa-fw"></i> Ventas&nbsp;<i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">

                            <li class="divider"></li>
                            <li><a href="index.php?menu=19"><i class="fa fa-book fa-fw"></i> Cotizacion</a>
                            </li>

                        </ul>


                        <!-- /.dropdown-user -->
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                            <i class="fa fa-cog fa-fw"></i> Configuraci&oacute;n&nbsp;<i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="index.php?menu=4"><i class="fa fa-group fa-fw"></i>Marcas</a>
                            </li>

                            <li class="divider"></li>
                            <li><a href="index.php?menu=1"><i class="fa fa-group fa-fw"></i>Productos</a>
                            </li>

                        </ul>
                        <!-- /.dropdown-user -->
                    </li>

                    <!-- /.dropdown -->
                </ul>

            </div>
            <!--#hidden-xs oculto / visible-xs -->

        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side hidden-lg hidden-md" role="navigation">
            <div class="hidden-md hidden-lg">
                <div id="sideNav" href="">
                    <!--<i class="fa fa-caret-right"></i>-->
                </div>
            </div>
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li class="lii">
                        <!--class="active-menu"-->
                        <a href="index.php"><i class="fa fa-home"></i> Inicio</a>
                    </li>
                    <!-- <li class="lii">

                        <a href="index.php"><i class="fa fa-calendar"></i> Inventario <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="index.php?menu=33">Productos<span class="fa arrow"></span></a>
                            </li>
                            <li>
                                <a href="#">Busqueda de Asiento <span class="fa arrow"></span></a>
                            </li>

                        </ul>
                    </li> -->

                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
