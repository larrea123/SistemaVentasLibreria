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
            <h2><i class="fa fa-cubes"></i>Actualizar datos del Producto</h2>
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
                    <p class="text-muted font-13 m-b-30">
                      Usted está por actualizar los datos de un producto, por favor llene el siguiente campo:
                    </p>
                    <?php 
                      foreach($infoproducto->result() as $row)
                      {
                      echo form_open_multipart('producto/modificarbd');
                    ?>
                    <input type="hidden" name="idproducto" value="<?php echo $row->idProducto;?>">
                    <div class="item form-group has-feedback">
                      <label class="col-form-label col-md-1 label-align" for="inputMa">Marca:</label>
                      <div class="col-md-3">
                          <select class="form-control" name="idmarca" required>
                            <option value="<?php echo $row->idMarca; ?>">
                              <?php echo $row->nombreMarca; ?>
                            </option>
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
                      <label class="col-form-label col-md-1 label-align" for="proveedor">Proveedor:</label>
                      <div class="col-md-3">
                          <select class="form-control" name="idproveedor" required>
                              <option value="<?php echo $row->idProveedor; ?>">
                                <?php echo $row->nombreProveedor; ?>
                              </option>
                              <?php
                                foreach($proveedor->result() as $rowProveedor)
                                {
                              ?>
                              <option value="<?php echo $rowProveedor->idProveedor;?>">
                                <?php echo $rowProveedor->nombreProveedor;?>
                              </option>
                              <?php
                                }
                              ?>
                          </select> 
                      </div>
                      <label class="col-form-label col-md-1 label-align" for="categoria">Categoria:</label>
                      <div class="col-md-3">
                          <select class="form-control" name="idcategoria">
                            <option value="<?php echo $row->idCategoria; ?>">
                              <?php echo $row->nombreCategoria; ?>
                            </option>
                            <?php
                                foreach ($categoria->result() as $row)
                                {
                            ?>
                            <option value="<?php echo $row->idCategoria; ?>">
                                <?php echo $row->nombreCategoria; ?>    
                            </option>
                            <?php        
                                }
                            ?>
                          </select> 
                      </div>
                    </div>

                    <div class="item form-group has-feedback">
                      <label class="col-form-label col-md-1 label-align" for="inputCo">Codigo:</label>
                      <div class="col-md-3">
                          <input type="text" name="Codigo" class="form-control has-feedback-left" value="<?php echo $row->codigo;?>">
                          <span class="fa fa-barcode form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <label class="col-form-label col-md-1 label-align" for="inputNP">Descripcion:</label>
                      <div class="col-md-3">
                          <input type="text" name="Nombreproducto" class="form-control has-feedback-left" value="<?php echo $row->nombreProducto; ?>" >
                          <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <label class="col-form-label col-md-1 label-align" for="inputCa">Cantidad:</label>
                      <div class="col-md-3">
                          <input type="text" name="Cantidad" class="form-control has-feedback-left" value="<?php echo $row->cantidad; ?>">
                          <span class="fa fa-barcode form-control-feedback left" aria-hidden="true"></span>
                      </div>
                    </div>

                    <div class="item form-group has-feedback">
                      <label class="col-form-label col-md-1 label-align" for="inputPreC">Precio Compra (Bs):</label>
                      <div class="col-md-3">
                          <input type="text" name="Preciocompra" class="form-control has-feedback-left" value="<?php echo $row->precioCompra; ?>">
                          <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <label class="col-form-label col-md-1 label-align" for="inputPreV">Precio Venta (Bs):</label>
                      <div class="col-md-3">
                          <input type="text" name="Precioventa" class="form-control has-feedback-left" value="<?php echo $row->precioVenta; ?>">
                          <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
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
