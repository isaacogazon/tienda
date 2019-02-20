
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Modificar Usuario
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box box-solid">
            <div class="box-body">

                <div class="login-box">
                    <div class="login-logo">
                        <h2>SISTEMA DE VENTAS</h2>
                    </div>
                    <!-- /.login-logo -->
                    <div class="login-box-body">
                        <p class="login-box-msg">Modifique los datos que desee necesario</p>
                        <form action="<?php echo site_url(); ?>/auth/modificarUsuario" method="post">
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Usuario" value="<?php echo!empty($_POST['nombre']) ? $_POST['nombre'] : $datos->nombre ?>" name="nombre">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <?= form_error('nombre'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Apellidos" value="<?php echo!empty($_POST['apellidos']) ? $_POST['apellidos'] : $datos->apellidos ?>" name="apellidos">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <?= form_error('apellidos'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="DNI" value="<?php echo!empty($_POST['dni']) ? $_POST['dni'] : $datos->dni ?>" name="dni">
                                <span class="glyphicon glyphicon-briefcase form-control-feedback"></span>
                                <?= form_error('dni'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Correo" value="<?php echo!empty($_POST['correo']) ? $_POST['correo'] : $datos->correo ?>" name="correo">
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                <?= form_error('correo'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Telefono" value="<?php echo!empty($_POST['telefono']) ? $_POST['telefono'] : $datos->telefono ?>" name="telefono">
                                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                                <?= form_error('telefono'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Direccion" value="<?php echo!empty($_POST['direccion']) ? $_POST['direccion'] : $datos->direccion ?>" name="direccion">
                                <span class="glyphicon glyphicon-home form-control-feedback"></span>
                                <?= form_error('direccion'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="CP" value="<?php echo!empty($_POST['cp']) ? $_POST['cp'] : $datos->cp ?>" name="cp">
                                <span class="glyphicon glyphicon-home form-control-feedback"></span>
                                <?= form_error('cp'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <?php
                                $class = 'class="form-control select2 select2-hidden-accessible" name="provincia"';
                                echo form_dropdown('provincia', $provincias, $datos->provincia, $class);
                                ?>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Modificar</button>
                                </div>
                                <!-- /.col -->
                            </div><br>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button type="button" class="btn btn-danger btn-block btn-flat" data-toggle="modal" data-target="#miModal">Borrar Usuario</button>
                                </div>
                                <!-- /.col -->
                            </div><br>

                            <!--Inicio ventana emergente -->
                            <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel">¿Seguro que quieres borrar al usuario <?php echo $this->session->userdata('nombre') ?>?</h4>
                                            <div class="col-xs-3">
                                                <a href="<?php site_url() ?>/auth/baja"><button type="button" class="btn btn-danger btn-block btn-flat">SI</button></a>
                                            </div>
                                            <div class="col-xs-3 offset-1">
                                                <a href="<?php site_url() ?>"><button type="button" class="btn btn-success btn-block btn-flat">NO</button></a>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            Perderas todos los datos de éste usuario.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fin ventana emergente-->

                            <div class="row">
                                <div class="col-xs-12">
                                    <a href="<?php echo site_url() ?>principal">
                                        <input type="button"  value="Ver catálogo" class="btn btn-success btn-block btn-flat">
                                    </a>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>

                    </div>
                    <!-- /.login-box-body -->
                </div>
                <!-- /.login-box -->
            </div>
        </div>
    </section>
</div>

