<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LIBRERÍA JAZUL | Iniciar Sesión </title>
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="<?php echo base_url(); ?>gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>gentelella/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>gentelella/vendors/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>gentelella/build/css/custom.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url(); ?>gentelella/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    
    <link href="<?php echo base_url(); ?>gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>gentelella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>gentelella/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>gentelella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>gentelella/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Icono de pestaña -->
    <link href="<?php echo base_url(); ?>uploads/2.png" rel="icon" type="image/jpg" />
    <link href="<?php echo base_url(); ?>gentelella/micss.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>gentelella/build/css/custom.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>gentelella/micss.css" rel="stylesheet">

  </head>
  <body class="nav-md">
    <div class="container body">

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
  
                  <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-envelope-o"></i>
                      <span class="badge bg-green">6</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <div class="text-center">
                          <a class="dropdown-item">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                          </a>
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->



        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                        <div class="title_left">
                            <h3><i class="fa fa-users"></i> MARCAS</h3>
                        </div>
                </div>

                <div class="clearfix"></div>

                    <div  class="login">
                        <br><br><br>
                        <div class="x_content">
                            <div class="row">
                              <section class="login_content bg-white">
                                    
                                <h1 class=" text-dark">ESTIMADO USUARIO CAMBIE SU CONTRASEÑA</h1>

                                    <?php 
                                        foreach($infousuario->result() as $row)
                                        {
                                        echo form_open_multipart('usuario/modificar3');
                                    ?>
                                    
                                    <input type="hidden" name="idusuario" value="<?php echo $row->idUsuario;?>">
                                    <!--<div class="content-center">
                                        <img class="img-fluid rounded w-50" src="<?php echo base_url(); ?>img/2.jpg">
                                    </div>
                                    <?php echo $row->nombres. ' ' . $row->primerApellido. ' ' . $row->segundoApellido; ?>-->
                                    <div class="rounded badge-light">
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4  label-align">Antigua Contraseña<span class="required"></span></label>
                                        <div class="col-md-7 col-sm-7">
                                            <input class="form-control" type="text" id="password3" readonly name="PasswordAn" value="<?php echo $row->nombres[0]. $row->primerApellido[0].$row->cedulaIdentidad; ?> "  />
                                        </div>
                                    </div>
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4  label-align">Nueva Contraseña<span class="required"></span></label>
                                        <div class="col-md-7 col-sm-7">
                                            <input class="form-control" type="password" id="password1" name="Password" required />
                                            
                                            <span style="position: absolute;right:15px;top:7px;" onclick="hideshow()" >
                                                <i id="slash" class="fa fa-eye-slash"></i>
                                                <i id="eye" class="fa fa-eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                    
                                    <div class="field item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4  label-align">Repite la contraeña<span class="required"></span></label>
                                        <div class="col-md-7 col-sm-7">
                                            <input class="form-control" type="password" name="password2" data-validate-linked='Password' required='required' />
                                        </div>
                                    </div>							

                                    <div class="field item form-group">
                                        <div class="col-md-1 col-sm-1"></div>
                                        <div class="col-md-10 col-sm-6">
                                            <button class="col btn btn-danger bg-lcv" type="submit">
                                            <i class="fa fa-sign-in"></i> MODIFICAR CONTRASEÑA
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <?php 
                                        echo form_close();
                                        }
                                    ?>
                              </section>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>  

        <!-- /page content -->
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>gentelella/vendors/validator/multifield.js"></script>
    <script src="<?php echo base_url(); ?>gentelella/vendors/validator/validator.js"></script>
  <script>
		function hideshow(){
			var password = document.getElementById("password1");
			var slash = document.getElementById("slash");
			var eye = document.getElementById("eye");
			
			if(password.type === 'password'){
				password.type = "text";
				slash.style.display = "block";
				eye.style.display = "none";
			}
			else{
				password.type = "password";
				slash.style.display = "none";
				eye.style.display = "block";
			}

		}
	</script>
    <script>
        // initialize a validator instance from the "FormValidator" constructor.
        // A "<form>" element is optionally passed as an argument, but is not a must
        var validator = new FormValidator({
            "events": ['blur', 'input', 'change']
        }, document.forms[0]);
        // on form "submit" event
        document.forms[0].onsubmit = function(e) {
            var submit = true,
                validatorResult = validator.checkAll(this);
            console.log(validatorResult);
            return !!validatorResult.valid;
        };
        // on form "reset" event
        document.forms[0].onreset = function(e) {
            validator.reset();
        };
        // stuff related ONLY for this demo page:
        $('.toggleValidationTooltips').change(function() {
            validator.settings.alerts = !this.checked;
            if (this.checked)
                $('form .alert').remove();
        }).prop('checked', false);   
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>gentelella/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="<?php echo base_url(); ?>gentelella/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>gentelella/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url(); ?>gentelella/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>gentelella/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>gentelella/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?php echo base_url(); ?>gentelella/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>gentelella/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>gentelella/vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url(); ?>gentelella/build/js/custom.min.js"></script> 
  </body>   
</html>

