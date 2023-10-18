          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu  bg-png">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <?php echo $this->session->userdata('login')?>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <?php echo form_open_multipart('usuario/perfil'); ?>
                        <button class="dropdown-item " type="submit">Perfil</button>
                      <?php echo form_close(); ?>
                      <?php echo form_open_multipart('usuario/logout'); ?>
                        <button class="dropdown-item" type="submit"><i class="fa fa-sign-out pull-right"></i>Cerrar Sesión</button>
                      <?php echo form_close(); ?>
                    </div>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->