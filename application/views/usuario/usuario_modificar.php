<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><i class="fa fa-users"></i> USUARIOS</h3>
      </div>
    </div>

    <div class="clearfix"></div>

      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2><i class="fa fa-users"></i> Actualizar datos del usuario</h2>
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
                        <i class="fa fa-arrow-circle-left"></i> Volver a usuarios
                      </button>
                      <?php 
                        echo form_close();
                      ?>
                      ⠀<!--aquí se encuentra un caracter en blanco con el propósito de separar los botones de forma "limpia"-->
                    </div>
                    <br><br>
                    <p class="text-muted font-13 m-b-30">
                      Usted está por actualizar los datos de un usuario, por favor llene el siguiente campo:
                    </p>
                    <?php 
                      foreach($infousuario->result() as $row)
                      {
                      echo form_open_multipart('usuario/modificarbd');
                    ?>
                    <input type="hidden" name="idusuario" value="<?php echo $row->idUsuario;?>">
                    
                    <div class="item form-group has-feedback">
                      <label class="col-form-label col-md-1 label-align" for="nombres">Nombres:</label>
                      <div class="col-md-3">
                          <input type="text" name="Nombres" class="form-control has-feedback-left" value="<?php echo $row->nombres;?>">
                          <span class="fa fa-male form-control-feedback left" aria-hidden="true"></span>
                          <?php echo form_error('Nombres'); ?>
                      </div>
                      <label class="col-form-label col-md-1 label-align" for="primerapellido">Primer Apellido:</label>
                      <div class="col-md-3">
                          <input type="text" name="PrimerApellido" class="form-control has-feedback-left" value="<?php echo $row->primerApellido;?>">
                          <span class="fa fa-male form-control-feedback left" aria-hidden="true"></span>
                          <?php echo form_error('PrimerApellido'); ?>
                      </div>
                      <label class="col-form-label col-md-1 label-align" for="segundoapellido">Segundo Apellido:</label>
                      <div class="col-md-3">
                          <input type="text" name="SegundoApellido" class="form-control has-feedback-left" value="<?php echo $row->segundoApellido;?>">
                          <span class="fa fa-male form-control-feedback left" aria-hidden="true"></span>
                          <?php echo form_error('SegundoApellido'); ?>
                      </div>
                    </div>

                    <div class="item form-group has-feedback">
                      <label class="col-form-label col-md-1 label-align" for="rol">Rol Usuario:</label>
                      <div class="col-md-3">
                          <select class="form-control" name="Rol" required>
                              <option value="<?php echo $row->rol;?>"><?php echo $row->rol;?></option>
                              <option value="admin" >admin</option>
                              <option value="vendedor">vendedor</option>
                              <option value="contador">contador</option>
                          </select>
                      </div>
                      <label class="col-form-label col-md-1 label-align" for="numeroci">Nro. Carnet:</label>
                      <div class="col-md-3">
                          <input type="text" name="CedulaIdentidad" class="form-control has-feedback-left" value="<?php echo $row->cedulaIdentidad;?>">
                          <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                          <?php echo form_error('CedulaIdentidad'); ?>
                      </div>
                      <label class="col-form-label col-md-1 label-align" for="numerocelular">Nro. Celular:</label>
                      <div class="col-md-3">
                          <input type="text" name="Telefono" class="form-control has-feedback-left" value="<?php echo $row->telefono;?>">
                          <span class="fa fa-mobile-phone form-control-feedback left" aria-hidden="true"></span>
                          <?php echo form_error('Telefono'); ?>
                      </div>    
                    </div>

                    <div class="item form-group has-feedback">
                      <label class="col-form-label col-md-1 label-align" for="genero">Direccion:</label>
                      <div class="col-md-3">
                        <textarea name="Direccion" class="form-control has-feedback-left" ><?php echo $row->direccion; ?></textarea>
                        <span class="fa fa-list form-control-feedback left" aria-hidden="true"></span>
                        <?php echo form_error('Direccion'); ?>
                      </div> 
                      <!--<label class="col-form-label col-md-1 label-align" for="inputN">Nombre Usuario:</label>
                      <div class="col-md-3">
                          <input type="text" name="Login" class="form-control has-feedback-left" value="<?php echo $row->login;?>">
                          <span class="fa fa-sign-in form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <label class="col-form-label col-md-1 label-align" for="primerapellido">Password:</label>
                      <div class="col-md-3">
                          <input type="password" name="Password" class="form-control has-feedback-left" value="<?php echo $row->password;?>">
                          <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                      </div>-->                      
                    </div>
                                        
                    <button type="submit" class="btn btn-warning">
                        <i class="fa fa-edit"></i> Modificar
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
