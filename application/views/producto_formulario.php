<div class="container">
    <div class="row">
        <div class="col-md-12">

        <h2>Agregar Producto</h2>
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
    </div>
</div>