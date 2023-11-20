<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><i class="fa fa-users"></i> PROVEEDORES</h3>
      </div>
    </div>

    <div class="clearfix"></div>

      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2><i class="fa fa-users"></i> Actualizar datos del proveedor</h2>
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
                        echo form_open_multipart('proveedor/index');
                      ?>
                      <button type="submit" name="buttonInhabilitados" class="btn btn-outline-success">
                        <i class="fa fa-arrow-circle-left"></i> Volver a proveedores
                      </button>
                      <?php 
                        echo form_close();
                      ?>
                      ⠀<!--aquí se encuentra un caracter en blanco con el propósito de separar los botones de forma "limpia"-->
                    </div>
                    <br><br>
                    <p class="text-muted font-13 m-b-30">
                    <h4>
                      Usted está por actualizar los datos de un proveedor, por favor llene el siguiente campo:
                    </h4> 
                    <p class="text-muted font-13 m-b-30">Indica un campo obligatorio(*)</p>
                    <?php 
                      foreach($infoproveedor->result() as $row)
                      {
                      echo form_open_multipart('proveedor/modificarbd');
                    ?>
                    <input type="hidden" name="idproveedor" value="<?php echo $row->idProveedor;?>">
                    <div class="item form-group has-feedback">
                      <label class="col-form-label col-md-1 label-align" for="inputN">(*) Razon Social:</label>
                      <div class="col-md-3">
                          <input type="text" name="RazonSocial" class="form-control has-feedback-left" value="<?php echo $row->razonSocial;?>">
                          <span class="fa fa-sign-in form-control-feedback left" aria-hidden="true"></span>
                          <?php echo form_error('RazonSocial'); ?>
                      </div>
                      <label class="col-form-label col-md-1 label-align" for="nit">(*) NIT:</label>
                      <div class="col-md-3">
                          <input type="text" name="Nit" class="form-control has-feedback-left" value="<?php echo $row->nit;?>">
                          <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                          <?php echo form_error('Nit'); ?>
                      </div>
                      <label class="col-form-label col-md-1 label-align" for="telf">(*) Telefono:</label>
                      <div class="col-md-3">
                          <input type="text" name="Telefono" class="form-control has-feedback-left" value="<?php echo $row->telefono;?>">
                          <span class="fa fa-mobile-phone form-control-feedback left" aria-hidden="true"></span>
                          <?php echo form_error('Telefono'); ?>
                      </div>               
                    </div>

                    <div class="item form-group has-feedback">
                      <label class="col-form-label col-md-1 label-align" for="correo">Correo:</label>
                      <div class="col-md-3">
                          <input type="text" name="Correo" class="form-control has-feedback-left" value="<?php echo $row->correo;?>">
                          <span class="fa fa-male form-control-feedback left" aria-hidden="true"></span>
                          <?php echo form_error('Correo'); ?>
                      </div>   
                      <label class="col-form-label col-md-1 label-align" for="genero">(*) Direccion:</label>
                      <div class="col-md-3">
                        <textarea name="Direccion" class="form-control has-feedback-left" ><?php echo $row->direccion; ?></textarea>
                        <span class="fa fa-list form-control-feedback left" aria-hidden="true"></span>
                        <?php echo form_error('Direccion'); ?>
                      </div>     
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
