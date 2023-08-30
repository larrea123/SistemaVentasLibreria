<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><i class="fa fa-users"></i> CLIENTES</h3>
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
            <h2><i class="fa fa-users"></i> Insertar nuevo cliente</h2>
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
                        echo form_open_multipart('cliente/index');
                      ?>
                      <button type="submit" name="buttonInhabilitados" class="btn btn-outline-success">
                        <i class="fa fa-arrow-circle-left"></i> Volver a clientes
                      </button>
                      <?php 
                        echo form_close();
                      ?>
                      ⠀<!--aquí se encuentra un caracter en blanco con el propósito de separar los botones de forma "limpia"-->
                    </div>
                    <br><br>
                    <p class="text-muted font-13 m-b-30">
                      Usted va a insertar un nuevo cliente, por favor llene el siguiente campo:
                    </p>
                    <?php 
                      echo form_open_multipart('cliente/agregarbd');
                    ?>
                    
                    <div class="item form-group has-feedback">
                      <label class="col-form-label col-md-1 label-align" for="razonsocial">Razon Social:</label>
                      <div class="col-md-3">
                          <input type="text" name="RazonSocial" class="form-control has-feedback-left"
                          value="<?php echo set_value('RazonSocial');?>">
                          <span class="fa fa-male form-control-feedback left" aria-hidden="true"></span>
                          <?php echo form_error('RazonSocial'); ?>
                      </div>
                      <label class="col-form-label col-md-1 label-align" for="cinit">CI/NIT:</label>
                      <div class="col-md-3">
                          <input type="text" name="CiNit" class="form-control has-feedback-left"
                          value="<?php echo set_value('CiNit');?>">
                          <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                          <?php echo form_error('CiNit'); ?>
                      </div>
                      <label class="col-form-label col-md-1 label-align" for="telefono">Nro. Celular:</label>
                      <div class="col-md-3">
                          <input type="text" name="Telefono" class="form-control has-feedback-left"
                          value="<?php echo set_value('Telefono');?>">
                          <span class="fa fa-mobile-phone form-control-feedback left" aria-hidden="true"></span>
                          <?php echo form_error('Telefono'); ?>
                      </div>
                    </div>
            
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus-circle"></i> Insertar
                    </button>
                    <?php 
                      echo form_close();
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
