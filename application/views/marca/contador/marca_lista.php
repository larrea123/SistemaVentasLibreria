<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><i class="fa fa-users"></i> MARCAS</h3>
      </div>
    </div>

    <div class="clearfix"></div>

      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2><i class="fa fa-users"></i> Lista de marcas</h2>
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
                        echo form_open_multipart('marca/agregar');
                      ?>
                      <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus-circle"></i> Insertar Marca
                      </button>
                      <?php 
                        echo form_close();
                      ?>
                      ⠀<!--aquí se encuentra un caracter en blanco con el propósito de separar los botones de forma "limpia"-->
                      <?php 
                        echo form_open_multipart('marca/deshabilitados');
                      ?>
                      <button type="submit" name="buttonDeshabilitados" class="btn btn-info">
                          <i class="fa fa-eye"></i> Marcas Deshabilitadas
                      </button>
                      <?php 
                        echo form_close();
                      ?>
                    </div>
                    <br><br>
                    <p class="text-muted font-13 m-b-30">
                      Estimado usuario, a continuación se muestran las marcas de los productos de la librería.
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Nro</th>
                          <th>Marca</th>
                          <th>Fecha de ingreso</th>
                          <th class="text-center">Acciones</th>
                        </tr>
                      </thead>

                      <tbody>
                      <?php
                        $indice=1;
                        foreach ($marca->result() as $row)
                        {
                      ?>
                        <tr>
                          <td><?php echo $indice; ?></td>
                          <td><?php echo $row->nombre; ?></td>
                          <td><?php echo formatearFecha($row->fechaRegistro); ?></td>
                          <td class="text-center">
                            <div class="btn-group">
                              <?php echo form_open_multipart('marca/modificar');?>
                              <input type="hidden" name="idmarca" value="<?php echo $row->idMarca; ?>">
                              <button class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar">
                              <i class="fa fa-edit"></i>
                              </button>
                              <?php echo form_close();?>


                              <!--<input type="hidden" name="idmarca" value="<?php echo $row->idMarca; ?>">
                              <button class="btn btn-outline-danger" data-toggle="tooltip"  onclick="return confirm_modalDeshabilitar(<?php echo $row->idMarca; ?>)"  data-placement="top" title="Deshabilitar">
                                <i class="fa fa-toggle-off"></i>
                              </button>-->
                            </div>
                          </td>
                        </tr>
                        <?php
                          $indice++;
                          }
                        ?>
                      </tbody>
                    </table>
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
    function confirm_modalDeshabilitar(id) 
    {
        var url = '<?php echo base_url() . "index.php/marca/deshabilitarbd/"; ?>';
        $("#url-delete").attr('href', url + id);
        // jQuery('#confirmar').modal('show', {backdrop: 'static'});
        $('#modalConfirmacion').modal('show');
    }
</script>
