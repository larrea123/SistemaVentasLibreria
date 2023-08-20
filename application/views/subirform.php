  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subir Imagen del Producto</h1>
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
              <div class="card-header">Adjunte una imagen del producto</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <?php 
                echo form_open_multipart('producto/subir');
                ?>
                <form class="row g-3">
                    <div class="col-md-6">
                        <!-- <label for="inputNP" class="form-label">Nombre Producto:</label><br> -->
                        <input type="hidden" name="idProducto" value="<?php echo $idProducto; ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="inputM" class="form-label">Imagen del Producto:</label>
                        <input type="file" name="userfile" class="form-control">
                    </div><br> 
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Subir</button>
                    </div>
                </form>
                <?php 
                echo form_close();
                ?> 

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