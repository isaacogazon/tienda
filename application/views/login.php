
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Iniciar sesión
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
                        <p class="login-box-msg">Introduzca sus datos de ingreso</p>
                        <?php
                        if ($this->session->flashdata("error")) {
                            echo'<div class="alert alert-danger">';
                            echo '<p>' . $this->session->flashdata("error");
                            '. </p>';
                            echo '</div>';
                        }
                        ?>
                        <form action="<?php echo site_url(); ?>/auth/login" method="post">
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Usuario" name="nombre" value="<?php echo!empty($_POST['nombre']) ? $_POST['nombre'] : "" ?>">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" class="form-control" placeholder="Password" name="contraseña" value="<?php echo!empty($_POST['contraseña']) ? $_POST['contraseña'] : "" ?>">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <a href="<?php echo site_url(); ?>/auth/recordar"<p class="primary">¿Has olvidado la contraseña?</p>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar Sesión</button>
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

