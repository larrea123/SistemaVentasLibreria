<div class="right_col" role="main">
    <!-- Inicio Div Right Col Role Main -->
    <div class="container md-3">
        <!-- Inicio Div container md-3 -->
        <div class="row">
            <!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12">
                <!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel">
                    <!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <TItle> <i class="fa fa-shopping-cart"></i></i> Ventas </TItle>
                        <h2><i class="fa fa-shopping-cart"></i> Ventas.</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content">
                        <!-- Inicio Div x_content -->
                        <div class="row">
                            <!-- Inicio Div row 2 -->
                            <div class="col-sm-12">
                                <!-- Inicio Div col-sm-12 2 -->
                                <div class="card-box table-responsive">
                                    <!-- Inicio Div card-box table-responsive -->
                                    <div class="btn-group ">
                                        <!--------------------------boton para ver cliented desavilitado directo en la lista------------------------------->
                                        <!-- <?php
                                                //echo form_open_multipart('cliente/deshabilitados');
                                                ?>
                                        <button type="submit" name="buttonDeshabilitados" class="btn btn-info">
                                            <i class="fa fa-eye"></i> Clientes Deshabilitados
                                        </button>
                                        <?php
                                        //echo form_close();
                                        ?>-->
                                        <!-----------------------------------------------fin---------------------------------------------------------------->
                                        <?php
                                        echo form_open_multipart('venta/vistaAgregarVenta');
                                        ?>
                                        <button type="submit" class="btn btn-round  btn-success">
                                            <i class="fa fa-shopping-cart"></i> Registrar Venta
                                        </button>
                                        <?php
                                        echo form_close();
                                        ?>
                              
                                    </div>
                                    <br><br>
                                    <p class="text-muted font-13 m-b-30">
                                        Estimado administrador, en esta seccion puede visualizar las ventas realizadas.
                                    </p>
                                    <!-- la tabla de abajo tenia un id por defecto que ordenaba los tr el id se llama  datatable-buttons-->
                                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr class="text-center">
                                                <th scope="col">Nro</th>
                                                <th>Cliente</th>
                                                <th>Nit</th>
                                                <th>Detalle Producto</th>
                                                <th>Total (Bs.)</th>
                                                <th>Fecha</th>
                                                <th>Usuario</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $indice=1;
                                            foreach ($venta->result() as $row) {
                                            ?>
                                                <tr>
                                                    <th scope="row"><?php echo $indice++; ?></th>
                                                    <td><?php echo $row->razonSocial; ?></td>
                                                    <td><?php echo $row->ciNit; ?></td>
                                                    <td><?php echo $row->nombrem.' - '.$row->nombrec.' - '.$row->nombre; ?></td>
                                                    <td> <?php echo 'Bs. '.$row->total  ?></td>                                                 
                                                    <td><?php echo formatearFecha($row->fechaRegistro); ?></td>
                                                    <td><?php echo $row->login; ?></td>

                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <?php echo form_open_multipart('venta/reportePdfCopia');?>
                                                            <input type="hidden" name="idventa" value="<?php echo $row->idVenta;?>">
                                                            <button class="btn btn-danger" data-toggle="tooltip" formtarget="_blank" data-placement="top" title="PDF">
                                                            <i class="fa fa-file-pdf-o"></i>
                                                            </button>
                                                            <?php echo form_close();?>


                                                            <!--<input type="hidden" name="idproducto" value="<?php echo $row->idVenta;?>">
                                                            <button class="btn btn-outline-danger" data-toggle="tooltip"  onclick="return confirm_modalDeshabilitar(<?php echo $row->idVenta; ?>)"  data-placement="top" title="Deshabilitar">
                                                            <i class="fa fa-toggle-off"></i>
                                                            </button>-->
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                </div><!-- Inicio Div card-box table-responsive -->
                            </div><!-- Fin Div col-sm-12 2 -->
                        </div><!-- Fin Div row 2 -->
                    </div><!-- Fin Div x_content -->
                </div><!-- Fin Div x_panel -->
            </div><!-- Fin Div col-md-12 col-sm-12  -->
        </div><!-- Fin Div row -->
    </div><!-- Fin Div container md-3 -->
</div><!-- Fin Right Col Role Main -->


<!------------------------------------------------- Modal ------------------------------------------------------->
<div class="modal fade" id="modalConfirmacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content alert alert-danger ">
            <div class="modal-content alert-secondary ">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"> Confirmación Deshabilitar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Estás seguro de Deshabilitar?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
                    <a id="url-delete" type="submit" class="btn btn-outline-danger"><i class="fa fa-check-circle-o"></i> Deshabilitar</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function confirm_modalFotos(id) {
        var url = '<?php echo base_url() . "index.php/venta/deshabilitarbd/"; ?>';
        $("#url-delete").attr('href', url + id);
        // jQuery('#confirmar').modal('show', {backdrop: 'static'});
        $('#modalConfirmacion').modal('show');
    }
         function confirm_modalDeshabilitar(id) 
    {
        var url = '<?php echo base_url() . "index.php/venta/deshabilitarbd/"; ?>';
        $("#url-delete").attr('href', url + id);
        // jQuery('#confirmar').modal('show', {backdrop: 'static'});
        $('#modalConfirmacion').modal('show');
    }
</script>