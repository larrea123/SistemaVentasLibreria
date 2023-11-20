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
            <h2><i class="fa fa-cubes"></i>Actualizar Stock</h2>
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
                    </div>
                    <br><br>
                    <h4>
                      Usted está por incrementar o disminuir el stock, por favor llene el siguiente campo:
                    </h4> 
                    <p class="text-muted font-13 m-b-30">Indica un campo obligatorio(*)</p>
                    <?php 
                      foreach($infoproducto->result() as $rows)
                      {
                      echo form_open_multipart('producto/modificarbdcantidad');
                    ?>
                    <input type="hidden" name="idproducto" value="<?php echo $rows->idProducto;?>">
                    <br>

                    <div class="item form-group has-feedback">
                      <label class="col-form-label col-md-1 label-align" for="inputCa">(*) Actualizar Stock:</label>
                      <div class="col-md-3">
                          <input type="number" name="Stock" class="form-control has-feedback-left" value="<?php echo $rows->stock; ?>">
                          <span class="fa fa-barcode form-control-feedback left" aria-hidden="true"></span>
                          <?php echo form_error('Stock'); ?>
                      </div>
                    </div>                   
                    <button type="submit" class="btn btn-warning">
                        <i class="fa fa-edit"></i> Agregar Stock
                    </button>

                    <?php 
                      form_close();
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
