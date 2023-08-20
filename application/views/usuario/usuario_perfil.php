<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><i class="fa fa-users"></i> USUARIOS</h3>
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
            <h2><i class="fa fa-users"></i> Lista de Usuarios</h2>
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
                  <?php 
                    echo form_open_multipart('producto/index');
                  ?>
                      <button type="submit" class="btn btn-success">
                      <i class="fa fa-home"></i> Volver a Inicio
                      </button>
                  <?php 
                      echo form_close();
                  ?>
                  <br>
                  <?php            
                      foreach($infousuario->result() as $row)
                      {
                  ?>
                  
                  <div class="card col-md-8">
                      <div class="card-body">
                          <h1><i class="fa fa-list-alt" data-toggle="tooltip" data-placement="top" title="Nombre"></i> <?php echo $row->nombres; ?> <?php echo $row->primerApellido; ?> <?php echo $row->segundoApellido; ?></h1>
                          <h3><i class="fa fa-user" data-toggle="tooltip" data-placement="top" title="Nombre de Usuario"></i> <?php echo $row->login; ?></h3>
                          <h3><i class="fa fa-star" data-toggle="tooltip" data-placement="top" title="Cargo"></i> <?php echo ucfirst($row->rol); ?></h3>
                          <h3><i class="fa fa-calendar" data-toggle="tooltip" data-placement="top" title="Fecha de Ingreso"></i> <?php echo $row->fechaRegistro; ?></h3>
                          <h3><i class="fa fa-list-alt" data-toggle="tooltip" data-placement="top" title="C.I."></i> <?php echo ucfirst($row->cedulaIdentidad); ?></h3>
                          <h3><i class="fa fa-mobile-phone" data-toggle="tooltip" data-placement="top" title="Celular"></i> <?php echo ucfirst($row->telefono); ?></h3>
                      </div>
                  </div>

                  <?php
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
<!-- /page content -->
