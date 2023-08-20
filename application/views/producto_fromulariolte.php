  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Crear Productos</h1>
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
              <div class="card-header">Rellene el formulario para crear un producto</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <?php 
                echo form_open_multipart('producto/agregarbd');
                ?>
                <form class="row g-3">
                    <div class="col-md-6">
                        <label for="inputNP" class="form-label">Nombre Producto:</label>
                        <input type="text" name="Nombreproducto" class="form-control" placeholder="Ingrese el producto">
                    </div>
                    <div class="col-md-6">
                        <label for="inputM" class="form-label">Marca:</label>
                        <input type="text" name="Marca" class="form-control" placeholder="Ingrese la marca">
                    </div>
                    <div class="col-md-6">
                        <label for="inputC" class="form-label">Cantidad:</label>
                        <input type="text" name="Cantidad" class="form-control" placeholder="Ingrese la cantidad">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPC" class="form-label">Precio de Compra:</label>
                        <input type="text" name="Preciocompra" class="form-control" placeholder="Ingrese el precio de compra">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPV" class="form-label">Precio de venta:</label>
                        <input type="text" name="Precioventa" class="form-control" placeholder="Ingrese el precio de venta">
                    </div><br> 
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Agregar Producto</button>
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