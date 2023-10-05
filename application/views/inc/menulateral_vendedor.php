      <div class="main_container bg-png">
        <div class="col-md-3 left_col menu_fixed bg-png">
          <div class="left_col scroll-view bg-png">
            <div class="navbar nav_title bg-png" style="border: 0;">
              <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>Librería JAZUL</span></a>
            </div>

            <div class="clearfix bg-png"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix bg-png">
              <div class="profile_pic">
                <img src="<?php echo base_url(); ?>gentelella/production/images/picture.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2><?php echo $this->session->userdata('login')?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-users"></i> Usuarios <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>
                          <?php echo form_open_multipart('usuario/index2');?>
                            <button type="submit" class="col-md-11 btn btn-dark  bg-lcv" style="background-color: transparent; border: none;">
                              Usuarios
                            </button>
                          <?php echo form_close();?>
                      </li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-male"></i>Clientes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>
                          <?php echo form_open_multipart('cliente/index');?>
                            <button type="submit" class="col-md-11 btn btn-dark  bg-lcv" style="background-color: transparent; border: none;">
                              Clientes
                            </button>
                          <?php echo form_close();?>
                      </li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-cubes"></i>Productos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>
                          <?php echo form_open_multipart('producto/index');?>
                            <button type="submit" class="col-md-11 btn btn-dark  bg-lcv" style="background-color: transparent; border: none;">
                              Productos
                            </button>
                          <?php echo form_close();?>
                      </li>
                      <li>
                          <?php echo form_open_multipart('categoria/index');?>
                            <button type="submit" class="col-md-11 btn btn-dark  bg-lcv" style="background-color: transparent; border: none;">
                              Categoria
                            </button>
                          <?php echo form_close();?>
                      </li>
                      <li>
                          <?php echo form_open_multipart('marca/index');?>
                            <button type="submit" class="col-md-11 btn btn-dark  bg-lcv" style="background-color: transparent; border: none;">
                              Marcas
                            </button>
                          <?php echo form_close();?>
                      </li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i> Proveedores <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>
                          <?php echo form_open_multipart('proveedor/index');?>
                            <button type="submit" class="col-md-11 btn btn-dark  bg-lcv" style="background-color: transparent; border: none;">
                              Proveedores
                            </button>
                          <?php echo form_close();?>
                      </li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-shopping-cart"></i>Ventas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li>
                          <?php echo form_open_multipart('venta/vistaAgregarVenta');?>
                            <button type="submit" class="col-md-11 btn btn-dark bg-lcv" style="background-color: transparent; border: none;">
                              Ventas
                            </button>
                          <?php echo form_close();?>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small bg-png">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->