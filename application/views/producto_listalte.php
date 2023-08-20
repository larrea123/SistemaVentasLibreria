  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lista de Productos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Productos Habilitados </h3>

                <br>

                <a href="<?php echo base_url(); ?>index.php/usuario/indexlte">
                    <button type="button" class="btn btn-primary" name="enviar">LISTA USUARIOS</button>
                </a>

                <a href="<?php echo base_url(); ?>index.php/producto/agregar">
                    <button type="button" class="btn btn-primary" name="enviar">Agregar Producto</button>
                </a>

                <a href="<?php echo base_url(); ?>index.php/producto/deshabilitados">
                    <button type="button" class="btn btn-warning" name="enviar">Lista deshabilitados</button>
                </a>

                <a href="<?php echo base_url(); ?>index.php/usuario/logout">
                    <button type="button" class="btn btn-danger" >Cerrar Sesion</button>
                </a>

                <br>
                <h3>
                  Login: <?php echo $this->session->userdata('login'); ?><br>
                  id: <?php echo $this->session->userdata('idusuario'); ?><br>
                  Rol: <?php echo $this->session->userdata('tipo'); ?><br>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nro</th>
                    <th>Nombre Producto</th>
                    <th>Marca</th>
                    <th>Cantidad</th>
                    <th>Precio Compra</th>
                    <th>Precio Venta</th>
                    <th>Creacion</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                    <th>Deshabilitar</th>
                    <th>Foto</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                        $indice=1;
                        foreach ($producto->result() as $row)
                        {
                    ?>
                  <tr>
                        <td><?php echo $indice; ?></td>
                        <td><?php echo $row->nombreProducto; ?></td>
                        <td><?php echo $row->marca; ?></td>
                        <td><?php echo $row->cantidad; ?></td>
                        <td><?php echo $row->precioCompra; ?></td>
                        <td><?php echo $row->precioVenta; ?></td>
                        <td><?php echo formatearFecha($row->fechaRegistro); ?></td>
                        <td>
                        <?php 
                            echo form_open_multipart('producto/modificar');
                            ?>
                            <input type="hidden" name="idproducto" value="<?php echo $row->idProducto; ?>">
                            <button type="submit" class="btn btn-success">MODIFICAR</button>
                            <?php   
                            echo form_close();
                            ?>                            
                        </td>
                        <td>
                            <?php 
                            echo form_open_multipart('producto/eliminarbd');
                            ?>
                            <input type="hidden" name="idproducto" value="<?php echo $row->idProducto; ?>">
                            <button type="submit" class="btn btn-danger">ELIMINAR</button>
                            <?php   
                            echo form_close();
                            ?>                            
                        </td>
                        <td>
                            <?php 
                            echo form_open_multipart('producto/deshabilitarbd');
                            ?>
                            <input type="hidden" name="idproducto" value="<?php echo $row->idProducto; ?>">
                            <button type="submit" class="btn btn-warning">DESHABILITAR</button>
                            <?php   
                            echo form_close();
                            ?>                            
                        </td>
                        <td>
                            <?php
                            $foto=$row->foto;
                            if($foto=="")
                            {
                              ?>
                              <img width="100" src="<?php echo base_url(); ?>uploads/productos/producto.jpg">
                              <?php
                            }
                            else
                            {
                              ?>
                              <img width="100" src="<?php echo base_url(); ?>uploads/productos/<?php echo $foto; ?>">
                              <?php
                            }
                            ?> 
                            
                            <?php 
                            echo form_open_multipart('producto/subirfoto');
                            ?>
                            <input type="hidden" name="idproducto" value="<?php echo $row->idProducto; ?>">
                            <button type="submit" class="btn btn-primary">SUBIR</button>
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
                  <tfoot>
                  <tr>
                    <th>Nro</th>
                    <th>Nombre Producto</th>
                    <th>Marca</th>
                    <th>Cantidad</th>
                    <th>Precio Compra</th>
                    <th>Precio Venta</th>
                    <th>Creacion</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                    <th>Deshabilitar</th>
                    <th>Foto</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->