<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><i class="fa fa-file-text"></i> REPORTES</h3>
      </div>
    </div>

    <div class="clearfix"></div>

      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2><i class="fa fa-file-text"></i> Lista de Reportes</h2>
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
            <!-- FILA DE REPORTES -->
            <div class="row">
                <!-- REPORTES -->  
                <!-- Cantidad Ventas -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-png shadow h-100">
                        <div class="card-body bg-lcv1 font-weight-bold">    
                            <div class="h2 mb-0 font-weight-bold"><h3 class="fa fa-file-text x2 text-light"> Reporte de venta General</h3></div>
                        </div>
                        <div class="card-footer bg-lcv1 font-weight-bold">
                            <?php echo form_open_multipart('reporte/general');?>
                            <button type="submit" class="btn btn-round btn-danger text-white"><i class="glyphicon glyphicon-arrow-right"></i> Ir a Reporte</button>
                            <?php echo form_close();?>
                        </div>
                    </div>
                </div>

                <!-- Cantidad Productos mas Vendidos-->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-png shadow h-100">
                        <div class="card-body bg-lcv1 font-weight-bold">    
                            <div class="h2 mb-0 font-weight-bold"><h3 class="fa fa-file-text x2 text-light"> Reporte de Productos con mayor Rotacion</h3></div>
                        </div>
                        <div class="card-footer bg-lcv1 font-weight-bold">
                            <?php echo form_open_multipart('reporte/producto');?>
                            <button type="submit" class="btn btn-round btn-danger"><i class="glyphicon glyphicon-arrow-right"></i> Ir a Reporte</button>
                            <?php echo form_close();?>
                        </div>
                    </div>
                </div>
                <!-- Cantidad Productos con mayor rotacion-->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-png shadow h-100">
                        <div class="card-body bg-lcv1 font-weight-bold">    
                            <div class="h2 mb-0 font-weight-bold"><h3 class="fa fa-file-text x2 text-light"> Reporte de Productos más vendidos</h3></div>
                        </div>
                        <div class="card-footer bg-lcv1 font-weight-bold">
                            <?php echo form_open_multipart('reporte/productoRotacion');?>
                            <button type="submit" class="btn btn-round btn-danger"><i class="glyphicon glyphicon-arrow-right"></i> Ir a Reporte</button>
                            <?php echo form_close();?>
                        </div>
                    </div>
                </div>
                <!-- Clientes con mayores compras-->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-png shadow h-100">
                        <div class="card-body bg-lcv1 font-weight-bold">    
                            <div class="h2 mb-0 font-weight-bold"><h3 class="fa fa-file-text x2 text-light"> Reporte de Clientes con Mayores Compras</h3></div>
                        </div>
                        <div class="card-footer bg-lcv1 font-weight-bold">
                            <?php echo form_open_multipart('reporte/clienteProducto');?>
                            <button type="submit" class="btn btn-round btn-danger"><i class="glyphicon glyphicon-arrow-right"></i> Ir a Reporte</button>
                            <?php echo form_close();?>
                        </div>
                    </div>
                </div>
                <!-- Lista de Categorias-->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-png shadow h-100">
                        <div class="card-body bg-lcv1 font-weight-bold">    
                            <div class="h2 mb-0 font-weight-bold"><h3 class="fa fa-file-text x2 text-light"> Reporte de Categorias</h3></div>
                        </div>
                        <div class="card-footer bg-lcv1 font-weight-bold">
                            <?php echo form_open_multipart('reporte/categorias');?>
                            <button type="submit" class="btn btn-round btn-danger"><i class="glyphicon glyphicon-arrow-right"></i> Ir a Reporte</button>
                            <?php echo form_close();?>
                        </div>
                    </div>
                </div>
                <!-- Lista de Marcas-->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-png shadow h-100">
                        <div class="card-body bg-lcv1 font-weight-bold">    
                            <div class="h2 mb-0 font-weight-bold"><h3 class="fa fa-file-text x2 text-light"> Reporte de Marcas</h3></div>
                        </div>
                        <div class="card-footer bg-lcv1 font-weight-bold">
                            <?php echo form_open_multipart('reporte/marcas');?>
                            <button type="submit" class="btn btn-round btn-danger"><i class="glyphicon glyphicon-arrow-right"></i> Ir a Reporte</button>
                            <?php echo form_close();?>
                        </div>
                    </div>
                </div>
                <!-- Lista de Proveedores-->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-png shadow h-100">
                        <div class="card-body bg-lcv1 font-weight-bold">    
                            <div class="h2 mb-0 font-weight-bold"><h3 class="fa fa-file-text x2 text-light"> Reporte de Proveedores</h3></div>
                        </div>
                        <div class="card-footer bg-lcv1 font-weight-bold">
                            <?php echo form_open_multipart('reporte/proveedores');?>
                            <button type="submit" class="btn btn-round btn-danger"><i class="glyphicon glyphicon-arrow-right"></i> Ir a Reporte</button>
                            <?php echo form_close();?>
                        </div>
                    </div>
                </div>
                <!-- Productos por Proveedor-->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-png shadow h-100">
                        <div class="card-body bg-lcv1 font-weight-bold">    
                            <div class="h2 mb-0 font-weight-bold"><h3 class="fa fa-file-text x2 text-light"> Reporte de Productos por Proveedor</h3></div>
                        </div>
                        <div class="card-footer bg-lcv1 font-weight-bold">
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-arrow-right"></i> Ir a Reporte
                                </button>

                                <div class="dropdown-menu">
                                    <?php echo form_open_multipart('reporte/productoProveedor');?>
                                    <?php foreach ($proveedor->result() as $row){ ?>
                                        <button type="submit" name="idProveedor" value="<?php echo $row->idProveedor; ?>" class="btn btn-light btn-block" data-toggle="tooltip" data-placement="top"><?php echo $row->razonSocial; ?></button>
                                    <?php }?>
                                    <?php echo form_close();?>
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
  </div>
</div>  
<!-- /page content -->
