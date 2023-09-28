<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><i class="fa fa-users"></i> USUARIOS</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2><i class="fa fa-users"></i> Actualizar mi contraseña</h2>
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
                  <div class="card-box">
                    <div class="btn-group">
                      <?php 
                        echo form_open_multipart('usuario/index2');
                      ?>
                      <button type="submit" name="buttonInhabilitados" class="btn btn-outline-success">
                        <i class="fa fa-arrow-circle-left"></i> Regresar
                      </button>
                      <?php 
                        echo form_close();
                      ?>
                      ⠀<!--aquí se encuentra un caracter en blanco con el propósito de separar los botones de forma "limpia"-->
                    </div>
                    <br><br>
                    <p class="text-muted font-13 m-b-30">
                      Usted está por actualizar su contraseña, por favor llene el siguiente campo:
                    </p>
                    <?php 
                      foreach($infousuario->result() as $row)
                      {
                      echo form_open_multipart('usuario/modificarbd');
                    ?>
                    <input type="hidden" name="idusuario" value="<?php echo $row->idUsuario;?>">
                    <div class="item form-group has-feedback">
                      <label class="col-form-label col-md-1 label-align" for="inputN">Nombre Usuario:</label>
                      <div class="col-md-3">
                          <input type="text" name="Login" readonly class="form-control has-feedback-left" value="<?php echo $row->login;?>">
                          <span class="fa fa-sign-in form-control-feedback left" aria-hidden="true"></span>
                      </div>
        <!--<div class="field item form-group">
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
            </div>	-->
                      
                      <div class="col-md-3">
                        <div class="field item form-group">
                          <label class="col-form-label col-md-4 col-sm-4  label-align">Nueva Contraseña<span class="required"></span></label>
				                  <div class="col-md-7 col-sm-7">
					                  <input class="form-control" type="password" id="password1" name="password2" required />
					
					                  <span style="position: absolute;right:15px;top:7px;" onclick="hideshow()" >
						                  <i id="slash" class="fa fa-eye-slash"></i>
						                  <i id="eye" class="fa fa-eye"></i>
					                  </span>
				                  </div>
			                  </div>
                      </div>  
                      
                      <div class="col-md-3">
                      <div class="field item form-group">
                <label class="col-form-label col-md-4 col-sm-4  label-align">Repite la contraeña<span class="required"></span></label>
                <div class="col-md-7 col-sm-7">
                    <input class="form-control" type="password" name="Password" data-validate-linked='Password' required='required' />
                </div>
            </div>
                      </div>                    
                    </div>

                    <div class="item form-group has-feedback">
                      <label class="col-form-label col-md-1 label-align" for="nombres">Nombres:</label>
                      <div class="col-md-3">
                          <input type="text" name="Nombres" readonly class="form-control has-feedback-left" value="<?php echo $row->nombres;?>">
                          <span class="fa fa-male form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <label class="col-form-label col-md-1 label-align" for="primerapellido">Primer Apellido:</label>
                      <div class="col-md-3">
                          <input type="text" name="PrimerApellido" readonly class="form-control has-feedback-left" value="<?php echo $row->primerApellido;?>">
                          <span class="fa fa-male form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <label class="col-form-label col-md-1 label-align" for="segundoapellido">Segundo Apellido:</label>
                      <div class="col-md-3">
                          <input type="text" name="SegundoApellido" readonly class="form-control has-feedback-left" value="<?php echo $row->segundoApellido;?>">
                          <span class="fa fa-male form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="item form-group has-feedback">
                      <label class="col-form-label col-md-1 label-align" for="rol">Rol Usuario:</label>
                      <div class="col-md-3">
                          <select class="form-control" readonly name="Rol" required>
                              <option value="<?php echo $row->rol;?>"><?php echo $row->rol;?></option>
                              <option value="admin" >admin</option>
                              <option value="vendedor">vendedor</option>
                              <option value="contador">contador</option>
                          </select>
                      </div>  
                      <label class="col-form-label col-md-1 label-align" for="numeroci">Nro. Carnet:</label>
                      <div class="col-md-3">
                          <input type="text" name="CedulaIdentidad" readonly class="form-control has-feedback-left" value="<?php echo $row->cedulaIdentidad;?>">
                          <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <label class="col-form-label col-md-1 label-align" for="numerocelular">Nro. Celular:</label>
                      <div class="col-md-3">
                          <input type="text" name="Telefono" readonly class="form-control has-feedback-left" value="<?php echo $row->telefono;?>">
                          <span class="fa fa-mobile-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>    
                    </div>
                    <div class="item form-group has-feedback">
                      <label class="col-form-label col-md-1 label-align" for="genero">Direccion:</label>
                      <div class="col-md-3">
                        <textarea name="Direccion" readonly class="form-control has-feedback-left" ><?php echo $row->direccion; ?></textarea>
                        <span class="fa fa-list form-control-feedback left" aria-hidden="true"></span>
                      </div>     
                    </div>
                                        
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus-circle"></i> Modificar
                    </button>
                    <?php 
                      echo form_close();
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
</div>  
<!-- /page content -->
                  
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