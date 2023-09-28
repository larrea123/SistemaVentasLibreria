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
    <div  class="col-12">
                <br><br><br>
        <div class="x_content">
            <div class="row">

                <section class="col-4 login_content bg-white">
                
                <h3 class=" text-dark">USTED ESTA A PUNTO DE CAMBIAR SU CONTRASEÑA</h3>

                    <?php 
                        foreach($infousuario->result() as $row)
                        {
                        echo form_open_multipart('usuario/modificar3');
                    ?>
                    
                    <input type="hidden" name="idusuario" value="<?php echo $row->idUsuario;?>">
                    <!--<div class="content-center">
                        <img class="img-fluid rounded w-50" src="<?php echo base_url(); ?>img/2.jpg">
                    </div>
                    <?php echo $row->nombres. ' ' . $row->primerApellido. ' ' . $row->segundoApellido; ?>-->
                    <div class="rounded badge-light">
                    </div>
                    <!--<div class="field item form-group">
                        <label class="col-form-label col-md-4 col-sm-4  label-align">Antigua Contraseña<span class="required"></span></label>
                        <div class="col-md-7 col-sm-7">
                            <input class="form-control" type="text" id="password3" readonly name="PasswordAn" value="<?php echo $row->nombres[0]. $row->primerApellido[0].$row->cedulaIdentidad; ?> "  />
                        </div>
                    </div>-->
                    <div class="field item form-group">
                        <label class="col-form-label col-md-4 col-sm-4  label-align">Nueva Contraseña<span class="required"></span></label>
                        <div class="col-md-7 col-sm-7">
                            <input class="form-control" type="password" id="password1" name="Password" required />
                            
                            <span style="position: absolute;right:15px;top:7px;" onclick="hideshow()" >
                                <i id="slash" class="fa fa-eye-slash"></i>
                                <i id="eye" class="fa fa-eye"></i>
                            </span>
                        </div>
                    </div>
                    
                    <div class="field item form-group">
                        <label class="col-form-label col-md-4 col-sm-4  label-align">Repite la contraeña<span class="required"></span></label>
                        <div class="col-md-7 col-sm-7">
                            <input class="form-control" type="password" name="password2" data-validate-linked='Password' required='required' />
                        </div>
                    </div>							

                    <div class="field item form-group">
                        <div class="col-md-2 col-sm-1"></div>
                        <div class="col-md-8 col-sm-6">
                            <button class="col btn btn-danger bg-lcv" type="submit">
                            <i class="fa fa-sign-in"></i> MODIFICAR CONTRASEÑA
                            </button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <?php 
                        echo form_close();
                        }
                    ?>
                    <?php 
                    echo form_open_multipart('usuario/index2');
                ?>
                <div class="field item form-group">
                    <div class="col-md-2 col-sm-1"></div>
                    <div class="col-md-8 col-sm-6">
                        <button type="submit" name="buttonInhabilitados" class="col btn btn-outline-success">
                            <i class="fa fa-arrow-circle-left"></i> CANCELAR
                        </button>
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

  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>gentelella/vendors/validator/multifield.js"></script>
    <script src="<?php echo base_url(); ?>gentelella/vendors/validator/validator.js"></script>
  <script>
		function hideshow(){
			var password = document.getElementById("password1");
			var slash = document.getElementById("slash");
			var eye = document.getElementById("eye");
			
			if(password.type === 'password'){
				password.type = "text";
				slash.style.display = "block";
				eye.style.display = "none";
			}
			else{
				password.type = "password";
				slash.style.display = "none";
				eye.style.display = "block";
			}

		}
	</script>
    <script>
        // initialize a validator instance from the "FormValidator" constructor.
        // A "<form>" element is optionally passed as an argument, but is not a must
        var validator = new FormValidator({
            "events": ['blur', 'input', 'change']
        }, document.forms[0]);
        // on form "submit" event
        document.forms[0].onsubmit = function(e) {
            var submit = true,
                validatorResult = validator.checkAll(this);
            console.log(validatorResult);
            return !!validatorResult.valid;
        };
        // on form "reset" event
        document.forms[0].onreset = function(e) {
            validator.reset();
        };
        // stuff related ONLY for this demo page:
        $('.toggleValidationTooltips').change(function() {
            validator.settings.alerts = !this.checked;
            if (this.checked)
                $('form .alert').remove();
        }).prop('checked', false);   
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
</html>
      
      