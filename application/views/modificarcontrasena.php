
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Modificar contraseña
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
                        <p class="login-box-msg">Introduzca los datos necesarios para modificar la contraseña</p>
                        <form action="<?php echo site_url(); ?>/auth/modificar" method="post">
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Correo" value="<?php echo!empty($_POST['correo']) ? $_POST['correo'] : $ponercorreo ?>" name="correo">
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                <?= form_error('correo'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" class="form-control" placeholder="Contraseña Anterior" value="<?php echo!empty($_POST['contraseña']) ? $_POST['contraseña'] : "" ?>" name="contraseña">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                <?= form_error('contraseña'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" class="form-control" placeholder="Contraseña Nueva" value="<?php echo!empty($_POST['contraseñanueva']) ? $_POST['contraseñanueva'] : "" ?>" name="contraseñanueva">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                <?= form_error('contraseñanueva'); ?>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" class="form-control" placeholder="Confirma Contraseña" value="<?php echo!empty($_POST['confirmacontrasena']) ? $_POST['confirmacontrasena'] : "" ?>" name="confirmacontrasena">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                <?= form_error('confirmacontrasena'); ?>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Modificar</button>
                                </div>
                                <!-- /.col -->
                            </div><br>
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

