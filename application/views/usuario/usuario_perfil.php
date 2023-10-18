<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><i class="fa fa-users"></i> USUARIOS</h3>
      </div>
    </div>

    <div class="clearfix"></div>

      <div class=" ">
        <div class="x_panel">
          <div class="x_title">
            <h2><i class="fa fa-users"></i> Lista de Usuarios</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Settings 1</a>
                    <a class="dropdown-item" href="#">Settings 2</a>
                  </div>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                  <?php 
                    echo form_open_multipart('producto/index');
                  ?>
                      <button type="submit" class="btn btn-success">
                      <i class="fa fa-home"></i> Volver a Inicio
                      </button>
                  <?php 
                      echo form_close();
                  ?>
                  <br>
                  <?php            
                      foreach($infousuario->result() as $row)
                      {
                  ?>
                  
                  <div class="card col-md-8">
                      <div class="card-body">
                          <h1><i class="fa fa-list-alt" data-toggle="tooltip" data-placement="top" title="Nombre"></i> <?php echo $row->nombres; ?> <?php echo $row->primerApellido; ?> <?php echo $row->segundoApellido; ?></h1>
                          <h3><i class="fa fa-user" data-toggle="tooltip" data-placement="top" title="Nombre de Usuario"></i> <?php echo $row->login; ?></h3>
                          <h3><i class="fa fa-star" data-toggle="tooltip" data-placement="top" title="Cargo"></i> <?php echo ucfirst($row->rol); ?></h3>
                          <h3><i class="fa fa-calendar" data-toggle="tooltip" data-placement="top" title="Fecha de Ingreso"></i> <?php echo $row->fechaRegistro; ?></h3>
                          <h3><i class="fa fa-list-alt" data-toggle="tooltip" data-placement="top" title="C.I."></i> <?php echo ucfirst($row->cedulaIdentidad); ?></h3>
                          <h3><i class="fa fa-mobile-phone" data-toggle="tooltip" data-placement="top" title="Celular"></i> <?php echo ucfirst($row->telefono); ?></h3>
                      </div>
                      <div class="col-md-4">
                          <label for="">&nbsp;</label>
                          <button class="btn btn-info" data-toggle="modal" data-target="#modal-default1" >
                              <span class="fa fa-key"></span> Modificar Contraseña</button>
                      </div>
                  </div>

                  <?php
                      }
                  ?>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>  
<!-- /page content -->
<div class="modal fade" id="modal-default1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <?php 
                echo form_open_multipart('usuario/modificar3');
            ?>
            <div class="modal-header">
                <h4 class="modal-title">MODIFICACION CONTRASEÑA</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-muted font-13 m-b-30">
                Estimado Usuario, usted esta a punto de cambiar su contraseña
                </p>
                <input type="hidden" name="idusuario" value="<?php echo $row->idUsuario;?>">
                <!--<div class="item form-group has-feedback">
                    <label class="col-form-label col-md-4 label-align">Antigua Contraseña<span class="required"></span></label>
                    <div class="col-md-3">
                      <input class="form-control" type="text" id="password3" readonly name="PasswordAn" value="<?php echo $row->nombres[0]. $row->primerApellido[0].$row->cedulaIdentidad; ?> "  />
                    </div>
                </div>-->
        
                <div class="item form-group has-feedback">
                    <label class="col-form-label col-md-4 label-align">Nueva Contraseña<span class="required"></span></label>
                    <div class="col-md-3">
                      <input class="form-control" type="password" id="password1" name="Password" required />
                      
                      <span style="position: absolute;right:15px;top:7px;" onclick="hideshow()" >
                        <i id="slash" class="fa fa-eye-slash"></i>
                        <i id="eye" class="fa fa-eye"></i>
                      </span>
                    </div>
                </div>   
                <div class="item form-group has-feedback">
                    <label class="col-form-label col-md-4 label-align">Repite la contraeña<span class="required"></span></label>
                    <div class="col-md-3">
                      <input class="form-control" type="password" name="password2" data-validate-linked='Password' required='required' />
                    </div>
                </div>  
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-plus-circle"></i>  Modificar
                </button>
            </div>
        <?php 
            echo form_close();
        ?>
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
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
