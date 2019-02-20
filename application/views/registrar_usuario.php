
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Registrar Usuario
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
                        <p class="login-box-msg">Introduzca sus datos para darse de alta como usuario</p>
                        <form action="<?php echo site_url(); ?>/auth/registrar" method="post">
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Usuario" value="<?php echo!empty($_POST['nombre']) ? $_POST['nombre'] : "" ?>" name="nombre">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <?= form_error('nombre'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Apellidos" value="<?php echo!empty($_POST['apellidos']) ? $_POST['apellidos'] : "" ?>" name="apellidos">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <?= form_error('apellidos'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" class="form-control" placeholder="Contraseña" value="<?php echo!empty($_POST['contraseña']) ? $_POST['contraseña'] : "" ?>" name="contraseña">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                <?= form_error('contraseña'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="DNI" value="<?php echo!empty($_POST['dni']) ? $_POST['dni'] : "" ?>" name="dni">
                                <span class="glyphicon glyphicon-briefcase form-control-feedback"></span>
                                <?= form_error('dni'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Correo" value="<?php echo!empty($_POST['correo']) ? $_POST['correo'] : "" ?>" name="correo">
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                <?= form_error('correo'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Telefono" value="<?php echo!empty($_POST['telefono']) ? $_POST['telefono'] : "" ?>" name="telefono">
                                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                                <?= form_error('telefono'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Direccion" name="direccion">
                                <span class="glyphicon glyphicon-home form-control-feedback"></span>
                                <?= form_error('direccion'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="CP" value="<?php echo!empty($_POST['cp']) ? $_POST['cp'] : "" ?>" name="cp">
                                <span class="glyphicon glyphicon-home form-control-feedback"></span>
                                <?= form_error('cp'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <?php $class = 'class="form-control select2 select2-hidden-accessible" name="provincia"';
                                echo form_dropdown('provincia', $provincias, '', $class);
                                ?>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
                                </div>
                                <!-- /.col -->
                            </div><br>
                            <div class="row">
                                <div class="col-xs-12">
                                    <a href="<?php echo site_url() ?>/principal">
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
