<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><i class="fa fa-users"></i> PROVEEDORES</h3>
      </div>
    </div>

    <div class="clearfix"></div>

      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2><i class="fa fa-users"></i> Lista de Proveedores</h2>
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
                        echo form_open_multipart('proveedor/deshabilitados');
                      ?>
                      <button type="submit" name="buttonDeshabilitados" class="btn btn-info">
                          <i class="fa fa-eye"></i> Proveedores Deshabilitados
                      </button>
                      <?php 
                        echo form_close();
                      ?>
                      ⠀<!--aquí se encuentra un caracter en blanco con el propósito de separar los botones de forma "limpia"-->
                    </div>
                    <br><br>
                    <p class="text-muted font-13 m-b-30">
                      Estimado usuario, a continuación se muestran todos los proveedores de la librería.
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Nro</th>                          
                          <th>Razon Social</th>
                          <th>Nit</th>
                          <th>Direccion</th>
                          <th>Telefono</th>
                          <th>Correo</th>
                          <th>Fecha de ingreso</th>
                          <!--<th>Modificar</th>
                          <th>Eliminar</th>-->
                        </tr>
                      </thead>

                      <tbody>
                      <?php
                        $indice=1;
                        foreach ($proveedor->result() as $row)
                        {
                      ?>
                        <tr>
                          <td><?php echo $indice; ?></td>
                          <td><?php echo $row->razonSocial; ?></td>
                          <td><?php echo $row->nit; ?></td>
                          <td><?php echo $row->direccion; ?></td>
                          <td><?php echo $row->telefono; ?></td>
                          <td><?php echo $row->correo; ?></td>
                          <td><?php echo formatearFecha($row->fechaRegistro); ?></td>
                          <!--<td>
                          <?php 
                              echo form_open_multipart('proveedor/modificar');
                              ?>
                              <input type="hidden" name="idproveedor" value="<?php echo $row->idProveedor; ?>">
                              <button type="submit" class="btn btn-success">MODIFICAR</button>
                              <?php   
                              echo form_close();
                              ?>                            
                          </td>
                          <td>
                              <?php 
                              echo form_open_multipart('proveedor/deshabilitarbd');
                              ?>
                              <input type="hidden" name="idproveedor" value="<?php echo $row->idProveedor; ?>">
                              <button type="submit" class="btn btn-danger">ELIMINAR</button>
                              <?php   
                              echo form_close();
                              ?>                            
                          </td>-->
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
