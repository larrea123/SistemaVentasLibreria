<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminlte/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Librería</b>JAZUL</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

    <?php

    switch($msg)
    {
      case '1':
        $mensaje="Error de ingreso";
        $clase="primary";
        break;
      case '2':
        $mensaje="Acceso no valido";
        $clase="danger";
        break;
      case '3':
        $mensaje="Gracias por usar el sistema";
        $clase="warning";
        break;
      default:
        $mensaje="Ingrese su usuario y clave para iniciar sesion";
        $clase="primary";
        break;
    }      
    ?>
      <p class="login-box-msg text-<?php echo $clase; ?>">
        <?php echo $mensaje; ?>
      </p>
    
      <?php 

      echo form_open_multipart('usuario/validarusuario',
      array('id'=>'form1','class'=>'needs-validation','method'=>'post'));

      ?>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Nombre de Usuario" name="login" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">INICIAR SESION</button>
          </div>
          <!-- /.col -->
        </div>
      <?php
echo form_close();
?>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>adminlte/dist/js/adminlte.min.js"></script>
</body>
</html>
