<div class="container">
    <div class="row">
        <div class="col-md-12"><br>

            <a href="<?php echo base_url(); ?>index.php/producto/agregar">
                <button type="button" class="btn btn-primary" name="enviar">Agregar Producto</button>
            </a>

            <a href="<?php echo base_url(); ?>index.php/producto/deshabilitados">
                <button type="button" class="btn btn-warning" name="enviar">Lista deshabilitados</button>
            </a>
            <?php   
            echo form_close();
            ?>

            <h1>Lista de Productos</h1><br>
            <table class="table">
            <thead>
                <tr>
                <th>Nro</th>
                <th>Nombre Producto</th>
                <th>Marca</th>
                <th>Cantidad</th>
                <th>Precio Compra</th>
                <th>Precio Venta</th>
                <th>Modificar</th>
                <th>Eliminar</th>
                <th>Deshabilitar</th>
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