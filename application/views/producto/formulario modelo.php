<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><i class="fa fa-cubes"></i> PRODUCTOS</h3>
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
            <h2><i class="fa fa-cubes"></i>Lista de Productos</h2>
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
                  <div class="card-box table-responsive">
                    <div class="btn-group">
                      <?php 
                        echo form_open_multipart('producto/index');
                      ?>
                      <button type="submit" name="buttonInhabilitados" class="btn btn-outline-success">
                        <i class="fa fa-arrow-circle-left"></i> Volver a productos
                      </button>
                      <?php 
                        echo form_close();
                      ?>
                      ⠀<!--aquí se encuentra un caracter en blanco con el propósito de separar los botones de forma "limpia"-->
                    </div>
                    <br><br>
                    <p class="text-muted font-13 m-b-30">
                      Usted va a insertar un nuevo producto, por favor llene el siguiente campo:
                    </p>
                    <?php 
                      echo form_open_multipart('producto/agregarbd');
                    ?>
                    <div class="item form-group has-feedback">
                      <label class="col-form-label col-md-1 label-align" for="marca">Marca:</label>
                      <div class="col-md-3">
                          <select class="form-control" name="idMarca" required>
                          <option value="" disabled selected >Seleccione una marca:</option>
                          <?php
                              foreach ($marca->result() as $rowMarca)
                              {
                          ?>
                          <option value="<?php echo $rowMarca->idMarca; ?>">
                              <?php echo $rowMarca->nombreMarca; ?>    
                          </option>
                          <?php        
                              }
                          ?>
                          </select> 
                      </div>
                      <label class="col-form-label col-md-1 label-align" for="idmodelo">Modelo:</label>
                      <div class="col-md-3">
                          <select class="form-control" name="idModelo" required>
                              <option value="" disabled selected >Seleccione un modelo:</option>
                              <?php
                              foreach($modelo->result() as $row)
                              {?>
                                  <option value="<?php echo $row->idModelo;?>"><?php echo $row->nombreModelo;?></option>
                              <?php
                              }
                              ?>
                          </select> 
                      </div>
                      <label class="col-form-label col-md-1 label-align" for="color">Color:</label>
                      <div class="col-md-3">
                          <select class="form-control" name="color" required>
                              <option value="" disabled selected >Seleccione un Color:</option>
                              <option value="ROJO">ROJO</option>
                              <option value="BLANCO">BLANCO</option>
                              <option value="NEGRO">NEGRO</option>
                              <option value="PLOMO">PLOMO</option>
                              <option value="AZUL">AZUL</option>
                          </select> 
                      </div>
                    </div>

                    <div class="item form-group has-feedback">
                      <label class="col-form-label col-md-1 label-align" for="inputAM">Año Modelo:</label>
                      <div class="col-md-3">
                          <input type="text" name="aniomodelo" class="form-control has-feedback-left" 
                          value="<?php echo set_value('aniomodelo');?>">
                          <span class="fa fa-fire form-control-feedback left" aria-hidden="true"></span>
                          <?php echo form_error('aniomodelo'); ?>
                      </div>
                      <label class="col-form-label col-md-1 label-align" for="inputNC">Numero Chasis:</label>
                      <div class="col-md-3">
                          <input type="text" name="nrochasis" class="form-control has-feedback-left"
                          value="<?php echo set_value('nrochasis');?>">
                          <span class="fa fa-cogs form-control-feedback left" aria-hidden="true"></span>
                          <?php echo form_error('nrochasis'); ?>
                      </div>
                      <label class="col-form-label col-md-1 label-align" for="inputNM">Numero Motor:</label>
                      <div class="col-md-3">
                          <input type="text" name="nromotor" class="form-control has-feedback-left"
                          value="<?php echo set_value('nromotor');?>">
                          <span class="fa fa-wrench form-control-feedback left" aria-hidden="true"></span>
                          <?php echo form_error('nromotor'); ?>
                      </div>
                    </div>

                    <div class="item form-group has-feedback">
                      <label class="col-form-label col-md-1 label-align" for="inputPo">Poliza:</label>
                      <div class="col-md-3">
                          <input type="text" name="poliza" class="form-control has-feedback-left"
                          value="<?php echo set_value('poliza');?>">
                          <span class="fa fa-barcode form-control-feedback left" aria-hidden="true"></span>
                          <?php echo form_error('poliza'); ?>
                      </div>
                      <label class="col-form-label col-md-1 label-align" for="inputPre">Precio (Bs.):</label>
                      <div class="col-md-3">
                          <input type="text" name="precio" class="form-control has-feedback-left"
                          value="<?php echo set_value('precio');?>">
                          <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
                          <?php echo form_error('precio'); ?>
                      </div>
                      <label class="col-form-label col-md-1 label-align" for="sucursal">Sucursal:</label>
                      <div class="col-md-3">
                          <select class="form-control" name="idSucursal">
                          <option value="" disabled selected >Seleccione una sucursal:</option>
                          <?php
                              foreach ($sucursal->result() as $row)
                              {
                          ?>
                          <option value="<?php echo $row->idSucursal; ?>">
                              <?php echo $row->nombreSucursal; ?>    
                          </option>
                          <?php        
                              }
                          ?>
                          </select> 
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
