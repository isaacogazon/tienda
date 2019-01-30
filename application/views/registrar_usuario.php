<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema de ventas</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!-- base_url() = http://localhost/tienda/-->

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/font-awesome/css/font-awesome.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/AdminLTE.min.css">

</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <h2>SISTEMA DE VENTAS</h2>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Introduzca sus datos para darse de alta como usuario</p>
            <form action="<?php echo base_url();?>auth/registrar" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Usuario" name="nombre">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                     <?= form_error('nombre');?>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Apellidos" name="apellidos">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <?= form_error('apellidos');?>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Contraseña" name="contraseña">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <?= form_error('contraseña');?>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="DNI" name="dni">
                    <span class="glyphicon glyphicon-briefcase form-control-feedback"></span>
                    <?= form_error('dni');?>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Correo" name="correo">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <?= form_error('correo');?>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Telefono" name="telefono">
                    <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                    <?= form_error('telefono');?>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Direccion" name="direccion">
                    <span class="glyphicon glyphicon-home form-control-feedback"></span>
                    <?= form_error('direccion');?>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="CP" name="cp">
                    <span class="glyphicon glyphicon-home form-control-feedback"></span>
                    <?= form_error('cp');?>
                </div>
                <div class="form-group has-feedback">
                    <?php $class = 'class="form-control select2 select2-hidden-accessible" name="provincia"';
                    echo form_dropdown('provincia', $provincias, '', $class); ?>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
                    </div>
                    <!-- /.col -->
                </div><br>
                <div class="row">
                    <div class="col-xs-12">
                        <a href="<?php echo base_url()?>principal">
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

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/template/jquery/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/template/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
