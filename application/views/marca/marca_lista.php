<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><i class="fa fa-users"></i> MARCAS</h3>
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
                        echo form_open_multipart('marca/deshabilitados');
                      ?>
                      <button type="submit" name="buttonDeshabilitados" class="btn btn-info">
                          <i class="fa fa-eye"></i> Marcas Deshabilitadas
                      </button>
                      <?php 
                        echo form_close();
                      ?>
                      ⠀<!--aquí se encuentra un caracter en blanco con el propósito de separar los botones de forma "limpia"-->
                      <?php 
                        echo form_open_multipart('marca/agregar');
                      ?>
                      <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus-circle"></i> Insertar Marca
                      </button>
                      <?php 
                        echo form_close();
                      ?>
                    </div>
                    <br><br>
                    <p class="text-muted font-13 m-b-30">
                      The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Nro</th>
                          <th>Marca</th>
                          <th>Fecha de ingreso</th>
                          <th>Modificar</th>
                          <th>Eliminar</th>
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
                          <td><?php echo $row->nombreMarca; ?></td>
                          <td><?php echo formatearFecha($row->fechaRegistro); ?></td>
                          <td>
                          <?php 
                              echo form_open_multipart('marca/modificar');
                              ?>
                              <input type="hidden" name="idmarca" value="<?php echo $row->idMarca; ?>">
                              <button type="submit" class="btn btn-success">MODIFICAR</button>
                              <?php   
                              echo form_close();
                              ?>                            
                          </td>
                          <td>
                              <?php 
                              echo form_open_multipart('marca/deshabilitarbd');
                              ?>
                              <input type="hidden" name="idmarca" value="<?php echo $row->idMarca; ?>">
                              <button type="submit" class="btn btn-danger">ELIMINAR</button>
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
