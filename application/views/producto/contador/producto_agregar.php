<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><i class="fa fa-cubes"></i> PRODUCTOS</h3>
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
                  <div class="card-box">
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
                    <h4>
                      Usted va a insertar un nuevo producto, por favor llene el siguiente campo:
                    </h4> 
                    <p class="text-muted font-13 m-b-30">Indica un campo obligatorio(*)</p>
                    <?php 
                      echo form_open_multipart('producto/agregarbd');
                    ?>

                    <div class="item form-group has-feedback">
                      <label class="col-form-label col-md-1 label-align" for="marca">(*) Marca:</label>
                      <div class="col-md-3">
                          <select class="form-control" name="idMarca" required>
                          <option value="" disabled selected >Seleccione una marca:</option>
                          <?php
                              foreach ($marca->result() as $rowMarca)
                              {
                          ?>
                          <option value="<?php echo $rowMarca->idMarca; ?>">
                              <?php echo $rowMarca->nombre; ?>    
                          </option>
                          <?php        
                              }
                          ?>
                          </select> 
                      </div>
                      <label class="col-form-label col-md-1 label-align" for="proveedor">(*) Proveedor:</label>
                      <div class="col-md-3">
                          <select class="form-control" name="idProveedor" required>
                              <option value="" disabled selected >Seleccione un proveedor:</option>
                              <?php
                              foreach($proveedor->result() as $row)
                              {?>
                                  <option value="<?php echo $row->idProveedor;?>"><?php echo $row->razonSocial;?></option>
                              <?php
                              }
                              ?>
                          </select> 
                      </div>
                      <label class="col-form-label col-md-1 label-align" for="categoria">(*) Categoria:</label>
                      <div class="col-md-3">
                          <select class="form-control" name="idCategoria" required>
                          <option value="" disabled selected >Seleccione una categoria:</option>
                          <?php
                              foreach ($categoria->result() as $row)
                              {
                          ?>
                          <option value="<?php echo $row->idCategoria; ?>">
                              <?php echo $row->nombre; ?>    
                          </option>
                          <?php        
                              }
                          ?>
                          </select> 
                      </div>
                    </div>

                    <div class="item form-group has-feedback">
                      <label class="col-form-label col-md-1 label-align" for="inputCo">(*) Codigo:</label>
                      <div class="col-md-3">
                          <input type="text" name="Codigo" class="form-control has-feedback-left"
                          value="<?php echo set_value('Codigo');?>">
                          <span class="fa fa-barcode form-control-feedback left" aria-hidden="true"></span>
                          <?php echo form_error('Codigo'); ?>
                      </div>
                      <label class="col-form-label col-md-1 label-align" for="inputNP">(*) Descripcion:</label>
                      <div class="col-md-3">
                          <input type="text" name="Nombreproducto" class="form-control has-feedback-left"
                          value="<?php echo set_value('Nombreproducto');?>">
                          <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
                          <?php echo form_error('Nombreproducto'); ?>
                      </div>
                      <label class="col-form-label col-md-1 label-align" for="inputCa">(*) Stock:</label>
                      <div class="col-md-3">
                          <input type="text" name="Stock" class="form-control has-feedback-left"
                          value="<?php echo set_value('Stock');?>">
                          <span class="fa fa-barcode form-control-feedback left" aria-hidden="true"></span>
                          <?php echo form_error('Stock'); ?>
                      </div>
                    </div>

                    <div class="item form-group has-feedback">
                      <label class="col-form-label col-md-1 label-align" for="inputPreC">(*) Precio Compra (Bs):</label>
                      <div class="col-md-3">
                          <input type="text" name="Preciocompra" class="form-control has-feedback-left"
                          value="<?php echo set_value('Preciocompra');?>">
                          <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
                          <?php echo form_error('Preciocompra'); ?>
                      </div>
                      <label class="col-form-label col-md-1 label-align" for="inputPreV">(*) Precio Venta (Bs):</label>
                      <div class="col-md-3">
                          <input type="text" name="Precioventa" class="form-control has-feedback-left"
                          value="<?php echo set_value('Precioventa');?>">
                          <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
                          <?php echo form_error('Precioventa'); ?>
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
