<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12"><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2><i class="fa fa-cubes"></i> Reportes.</h2>
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
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content"><!-- Inicio Div x_content -->
                        <div class="row"><!-- Inicio Div row 2 -->
                            <!-- REPORTES -->  
                            <!-- Cantidad Ventas -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-danger shadow h-100">
                                    <div class="card-body bg-danger font-weight-bold">    
                                        <div class="h2 mb-0 font-weight-bold"><h3 class="fa fa-file-text x2 text-light"> Reporte de venta General</h3></div>
                                    </div>
                                    <div class="card-footer bg-danger font-weight-bold">
                                        <?php echo form_open_multipart('reporte/general');?>
                                        <button type="submit" class="btn btn-round btn-danger"><i class="glyphicon glyphicon-arrow-right"></i> Ir a Reporte</button>
                                        <?php echo form_close();?>
                                    </div>
                                </div>
                            </div>

                            <!-- Cantidad Empleados 
                            <div class="col-xl-3 col-md-6 mb-4"> 
                                <div class="card border-danger shadow h-100">
                                    <div class="card-body bg-danger font-weight-bold">    
                                        <div class="h2 mb-0 font-weight-bold "><h3 class="fa fa-file-text x2 text-light"> Reporte de venta por Sucursal</h3></div>
                                    </div>
                                    <div class="card-footer bg-danger font-weight-bold">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-arrow-right"></i> Ir a Reporte
                                            </button>
                                            <?php echo form_open_multipart('reporte/Sucursal');?>
                                            <div class="dropdown-menu">
                                                <?php foreach ($sucursal->result() as $row){ ?>
                                                <button type="submit" name="idSucursal" value="<?php echo $row->idSucursal; ?>" class="btn btn-light btn-block" data-toggle="tooltip" data-placement="top"><?php echo $row->nombreSucursal; ?></button>
                                                <?php }?>
                                            </div>
                                            <?php echo form_close();?>
                                        </div>
                                    </div>
                                </div>   
                            </div>-->
    
                            <!-- Cantidad Productos -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-danger shadow h-100">
                                    <div class="card-body bg-danger font-weight-bold">    
                                        <div class="h2 mb-0 font-weight-bold"><h3 class="fa fa-file-text x2 text-light"> Productos mas vendidos</h3></div>
                                    </div>
                                    <div class="card-footer bg-danger font-weight-bold">
                                        <?php echo form_open_multipart('reporte/producto');?>
                                        <button type="submit" class="btn btn-round btn-danger"><i class="glyphicon glyphicon-arrow-right"></i> Ir a Reporte</button>
                                        <?php echo form_close();?>
                                    </div>
                                </div>
                            </div>
                            <!-- Cantidad Productos 
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-danger shadow h-100">
                                    <div class="card-body bg-danger font-weight-bold">    
                                        <div class="h2 mb-0 font-weight-bold"><h3 class="fa fa-file-text x2 text-light"> Productos mas vendidos por sucursal</h3></div>
                                    </div>
                                    <div class="card-footer bg-danger font-weight-bold">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-arrow-right"></i> Ir a Reporte
                                            </button>
                                            <?php echo form_open_multipart('reporte/productoSucursal');?>
                                            <div class="dropdown-menu">
                                                <?php foreach ($sucursal->result() as $row){ ?>
                                                <button type="submit" name="idSucursal" value="<?php echo $row->idSucursal; ?>" class="btn btn-light btn-block" data-toggle="tooltip" data-placement="top"><?php echo $row->nombreSucursal; ?></button>
                                                <?php }?>
                                            </div>
                                            <?php echo form_close();?>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                        </div>    
                        <div class="row"><!-- Inicio Div row 2 -->
                            <!-- REPORTES --> 
                            <!-- Cantidad Modelos 
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-danger shadow h-100">
                                    <div class="card-body bg-danger font-weight-bold">    
                                        <div class="h2 mb-0 font-weight-bold"><h3 class="fa fa-file-text x2 text-light"> Reporte ID</h3></div>
                                    </div>
                                    <div class="card-footer bg-danger font-weight-bold">
                                        <?php echo form_open_multipart('reporte/reporteID');?>
                                        <button type="submit" class="btn btn-round btn-danger"><i class="glyphicon glyphicon-arrow-right"></i> Ir a Reporte</button>
                                        <?php echo form_close();?>
                                    </div>
                                </div>
                            </div> -->
                            <!-- Cantidad Productos 
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-danger shadow h-100">
                                    <div class="card-body bg-danger font-weight-bold">    
                                        <div class="h2 mb-0 font-weight-bold"><h3 class="fa fa-file-text x2 text-light"> Productos Disponibles</h3></div>
                                    </div>
                                    <div class="card-footer bg-danger font-weight-bold">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-arrow-right"></i> Ir a Reporte
                                            </button>
                                            
                                            <div class="dropdown-menu">
                                                <?php echo form_open_multipart('reporte/lista_producto_general');?>
                                                <button type="submit" class="btn btn-light btn-block" data-toggle="tooltip" data-placement="top">GENERAL</button>
                                                <?php echo form_close();?>

                                                <?php echo form_open_multipart('reporte/lista_producto_sucursal');?>
                                                <?php foreach ($sucursal->result() as $row){ ?>
                                                <button type="submit" name="idSucursal" value="<?php echo $row->idSucursal; ?>" class="btn btn-light btn-block" data-toggle="tooltip" data-placement="top"><?php echo $row->nombreSucursal; ?></button>
                                                <?php }?>
                                                <?php echo form_close();?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                            <!-- Cantidad Productos
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-danger shadow h-100">
                                    <div class="card-body bg-danger font-weight-bold">    
                                        <div class="h2 mb-0 font-weight-bold"><h3 class="fa fa-file-text x2 text-light"> Reporte Clientes</h3></div>
                                    </div>
                                    <div class="card-footer bg-danger font-weight-bold">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-arrow-right"></i> Ir a Reporte
                                            </button>
                                            
                                            <div class="dropdown-menu">
                                                <?php echo form_open_multipart('reporte/lista_cliente_general');?>
                                                <button type="submit" class="btn btn-light btn-block" data-toggle="tooltip" data-placement="top">GENERAL</button>
                                                <?php echo form_close();?>

                                                <?php echo form_open_multipart('reporte/lista_cliente_sucursal');?>
                                                <?php foreach ($sucursal->result() as $row){ ?>
                                                <button type="submit" name="idSucursal" value="<?php echo $row->idSucursal; ?>" class="btn btn-light btn-block" data-toggle="tooltip" data-placement="top"><?php echo $row->nombreSucursal; ?></button>
                                                <?php }?>
                                                <?php echo form_close();?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- Cantidad Ventas 
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-danger shadow h-100">
                                    <div class="card-body bg-danger font-weight-bold">    
                                        <div class="h2 mb-0 font-weight-bold"><h3 class="fa fa-file-text x2 text-light"> Reporte Usuarios</h3></div>
                                    </div>
                                    <div class="card-footer bg-danger font-weight-bold">
                                        <?php echo form_open_multipart('reporte/lista_usuarios');?>
                                        <button type="submit" class="btn btn-round btn-danger"><i class="glyphicon glyphicon-arrow-right"></i> Ir a Reporte</button>
                                        <?php echo form_close();?>
                                    </div>
                                </div>
                            </div>-->
                        </div><!-- Fin Div row 2 -->
                    </div><!-- Fin Div x_content -->
                </div><!-- Fin Div x_panel -->
            </div><!-- Fin Div col-md-12 col-sm-12  -->
        </div><!-- Fin Div row -->
    </div><!-- Fin Div container md-3 -->
</div><!-- Fin Right Col Role Main -->

<!-- Modal -->
<div class="modal fade" id="modalConfirmacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header alert-danger">
        <h5 class="modal-title font-weight-bold">CONFIRMAR ACCIÓN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         ¿Está seguro de deshabilitarlo? Presione Deshabilitar
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
        <a id="url-delete" type="submit" class="btn btn-outline-danger"><i class="fa fa-toggle-off"></i> Deshabilitar</a>
      </div>
    </div>
  </div>
</div>