<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
      </div>
    </div>

    <div class="clearfix"></div>

      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2><i class="fa fa-file-text"></i>  REPORTE DE PRODUCTOS POR PROVEEDORES</h2>
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
                <!-- Inicio Div col-sm-12 2 -->
                <div class="card-box table-responsive">
                    <?php
                        echo form_open_multipart('reporte/index');
                        ?>
                        <button type="submit" class="btn btn-round  btn-success">
                            <i class="glyphicon glyphicon-arrow-left"></i> Regresar Reportes
                        </button>
                        <?php
                        echo form_close();
                        ?>
                        <br><br>
                    <?php echo form_open_multipart('reporte/productoProveedoresPdf'); ?>
                      <div class="item form-group has-feedback">
                          <h5>Imprimir Reporte: </h5>
                          ⠀⠀
                          <input hidden name="idProveedor" id="idProveedor" value="<?php echo $idProveedor ?>">
                          <button type="submit" class="btn btn-danger" name="enviar" formtarget="_blank"><i class="fa fa-file-pdf-o"></i>  REPORTE PDF</button>          
                      </div>
                    <?php echo form_close(); ?>
                    <br>
                    <!-- la tabla de abajo tenia un id por defecto que ordenaba los tr el id se llama  datatable-buttons-->
                    <table id="datatable" class="table table-striped table-bordered jambo_table bulk_action" style="width:100%">
                        <thead>
                            <tr class="headings">
                              <th>Nro</th>
                              <th>Marca</th>
                              <th>Nombre Producto</th>
                              <th>Categoria</th>
                              <th>Stock</th>
                              <th>Precio Compra</th>
                              <th>Precio Venta</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $indice=1;
                            foreach ($infoProveedorGeneral->result() as $row) {
                            ?>
                                <tr>
                                    <td><?php echo $indice; ?></td>
                                    <td><?php echo $row->nombrem; ?></td>
                                    <td><?php echo $row->nombrep; ?></td>
                                    <td><?php echo $row->nombrec; ?></td>
                                    <td><?php echo $row->stock; ?></td>
                                    <td><?php echo $row->precioCompra; ?></td>
                                    <td><?php echo $row->precioVenta; ?></td>
                                </tr>
                            <?php
                            $indice++;
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="item form-group has-feedback">

                    </div>
                </div><!-- Inicio Div card-box table-responsive -->
              </div><!-- Fin Div col-sm-12 2 -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>  
<!-- /page content -->
