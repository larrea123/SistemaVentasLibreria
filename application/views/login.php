<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LIBRERÍA JAZUL | Iniciar Sesión </title>
    <link href="<?php echo base_url(); ?>gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>gentelella/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>gentelella/vendors/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>gentelella/build/css/custom.min.css" rel="stylesheet">
    <!-- Icono de pestaña -->
    <link href="<?php echo base_url(); ?>uploads/2.png" rel="icon" type="image/jpg" />
    <link href="<?php echo base_url(); ?>gentelella/micss.css" rel="stylesheet">

  </head>
  <body class="login bg-png">
    <div>
        <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content bg-lcv1">
    <?php

            switch($msg)
            {
            case '1':
                $mensaje='<p style="text-shadow: none;" class="text-danger font-weight-bold">Usuario u contraseña incorrecta</p>';
                $clase="primary";
                break;
            case '2':
                $mensaje="Acceso no valido";
                $clase="danger";
                break;
            case '3':
                $mensaje='<p style="text-shadow: none;" class="text-success font-weight-bold">Gracias por usar el sistema!</p>';
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
            <h1 class=" text-white">Librería JAZUL</h1>
            <div class="content-center">
                <img class="img-fluid rounded w-50" src="<?php echo base_url(); ?>img/membrete1.png">
            </div>
            <br>
            <div class="rounded badge-light">
            </div>
            <div class="col-md-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left"  name="login" placeholder="Ingrese su usuario" required>
                <span class="fa fa-user form-control-feedback left" aria-hidden="true">
                </span>
            </div>
            <div class="col-md-10 form-group has-feedback">
                <span class="fa fa-key form-control-feedback left " aria-hidden="true">
                </span>
                <input id="Password" type="password" class="form-control has-feedback-left"  name="password" placeholder="Ingrese su contraseña" required>
            </div>
            <div class="col-md-2">
                <button id="show_password" class="btn btn-danger bg-lcv" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
            </div>
            <div>
                <button class="col btn btn-danger bg-lcv" type="submit">
                <i class="fa fa-sign-in"></i> Ingresar
                </button>
            </div>
            <div class="clearfix"></div>
            <div class="separator">
                <div class="clearfix"></div>
                <div>
                <h1 class=" text-white"><i class="fa fa-globe"></i> Sistema de gestión de ventas</h1>
                </div>
            </div>
            <?php 
                echo form_close();
            ?>
            </section>
        </div>
        </div>

        </div>
  </body>

  <script type="text/javascript">
    function mostrarPassword(){
        var cambio = document.getElementById("Password");
        if(cambio.type == "password"){
          cambio.type = "text";
          $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
        }else{
          cambio.type = "password";
          $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }
      } 
      
      $(document).ready(function () {
      //CheckBox mostrar contraseña
      $('#ShowPassword').click(function () {
        $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
      });
    });
    </script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</html>
      