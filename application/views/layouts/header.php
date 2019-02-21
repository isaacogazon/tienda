<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Sistema de Ventas</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/font-awesome/css/font-awesome.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/dist/css/skins/_all-skins.min.css">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="<?php echo site_url(); ?>" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>T</b>O</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Tienda Online</b></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Navegacion</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>  

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account: style can be found in dropdown.less -->
                            <a href="<?php echo site_url();?>/carrito" class="btn btn-info btn-lg">
                                <span class="glyphicon glyphicon-shopping-cart"></span>
                            </a>
                            <li class="dropdown user user-menu">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo base_url() ?>assets/template/dist/img/avatar5.png" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?php
                                        if ($this->session->userdata('login')) {
                                            echo ($this->session->userdata('nombre'));
                                        } else {
                                            echo('Inicia Sesión');
                                        }
                                        ?>
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <?php if ($this->session->userdata('login')): ?>
                                        <li class="user-body">
                                            <div class="row">
                                                <div class="col-xs-12 text-center">
                                                    <a href="<?php echo site_url() ?>/auth/logout"> Cerrar Sesión</a>
                                                </div>
                                            </div>
                                            <!-- /.row -->
                                        </li>
                                        <li class="user-body">
                                            <div class="row">
                                                <div class="col-xs-12 text-center">
                                                    <a href="<?php echo site_url() ?>/auth/modificar"> Modificar Contraseña</a>
                                                </div>
                                            </div>
                                            <!-- /.row -->
                                        </li>
                                        <li class="user-body">
                                            <div class="row">
                                                <div class="col-xs-12 text-center">
                                                    <a href="<?php echo site_url() ?>/auth/recordar"> Recordar Contraseña</a>
                                                </div>
                                            </div>
                                            <!-- /.row -->
                                        </li>
                                        <li class="user-body">
                                            <div class="row">
                                                <div class="col-xs-12 text-center">
                                                    <a href="<?php echo site_url() ?>/auth/modificarUsuario"> Modificar Usuario</a>
                                                </div>
                                            </div>
                                            <!-- /.row -->
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!$this->session->userdata('login')): ?>
                                        <li class="user-body">
                                            <div class="row">
                                                <div class="col-xs-12 text-center">
                                                    <a href="<?php echo site_url() ?>/principal/login"> Iniciar Sesión</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="user-body">
                                            <div class="row">
                                                <div class="col-xs-12 text-center">
                                                    <a href="<?php echo site_url() ?>/principal/registrar"> Crear Usuario</a>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>