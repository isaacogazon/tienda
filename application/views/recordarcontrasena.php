
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Recordar contraseña.
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
                        <p class="login-box-msg">Introduzca su correo para recordar la contraseña</p>
                        <form action="<?php echo site_url(); ?>/auth/recordar" method="post">
                            <div class="form-group has-feedback">
                                <!--if ($this->session->userdata('login')) {
                                            echo ($this->session->userdata('nombre'));
                                        } else {
                                            echo('Inicia Sesión');
                                        } -->
                                <input type="text" class="form-control" placeholder="Correo" value="<?php if($this->session->userdata('login')){ echo!empty($_POST['correo']) ? $_POST['correo'] : $ponercorreo;}else{ echo ("");} ?>" name="correo">
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                <?= form_error('correo'); ?>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Enviar</button>
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
