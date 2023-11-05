<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><i class="fa fa-users"></i> Lista de Usuarios Deshabilitados</h3>
      </div>
    </div>

    <div class="clearfix"></div>

      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2><i class="fa fa-cubes"></i>Lista de Usuarios Deshabilitados</h2>
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
                        echo form_open_multipart('usuario/index2');
                      ?>
                      <button type="submit" name="buttonDeshabilitados" class="btn btn-info">
                          <i class="fa fa-eye"></i> Regresar a Usuarios
                      </button>
                      <?php 
                        echo form_close();
                      ?>
                    </div>
                    <br><br>
                    <p class="text-muted font-13 m-b-30">
                      Estimado administrador, los usuarios que usted está viendo a continuación ya no trabajan en el punto de venta.
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Nro</th>
                          <th>Nombre Usuario</th>
                          <th>Rol Usuario</th>
                          <th>Nombre</th>
                          <th>Nro. Carnet</th>
                          <th>Nro. Celular</th>
                          <th>Direccion</th>
                          <th>Fecha de ingreso</th>
                          <th>Habilitar</th>
                        </tr>
                      </thead>

                      <tbody>
                      <?php
                        $indice=1;
                        foreach ($usuario->result() as $row)
                        {
                      ?>
                        <tr>
                          <td><?php echo $indice; ?></td>
                          <td><?php echo $row->login; ?></td>
                          <td><?php echo $row->rol; ?></td>
                          <td><?php echo $row->nombres. ' ' . $row->primerApellido. ' ' . $row->segundoApellido; ?></td>
                          <td><?php echo $row->cedulaIdentidad; ?></td>
                          <td><?php echo $row->telefono; ?></td>
                          <td><?php echo $row->direccion; ?></td>
                          <td><?php echo formatearFecha($row->fechaRegistro); ?></td>
                          <td>
                          <?php 
                              echo form_open_multipart('usuario/habilitarbd');
                              ?>
                              <input type="hidden" name="idusuario" value="<?php echo $row->idUsuario; ?>">
                              <button class="btn btn-success">
                                <i class="fa fa-toggle-on"></i> HABILITAR
                              </button>
                              <?php   
                              echo form_close();
                              ?>                            
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
