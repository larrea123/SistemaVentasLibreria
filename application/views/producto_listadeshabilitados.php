<div class="container">
    <div class="row">
        <div class="col-md-12"><br>

            <a href="<?php echo base_url(); ?>index.php/producto/index">
                <button type="button" class="btn btn-warning" name="enviar">Ver Lista Habilitados</button>
            </a>
            <?php   
            echo form_close();
            ?>

            <h1>Lista de Productos Deshabilitados</h1><br>
            <table class="table">
            <thead>
                <tr>
                <th>Nro</th>
                <th>Nombre Producto</th>
                <th>Marca</th>
                <th>Cantidad</th>
                <th>Precio Compra</th>
                <th>Precio Venta</th>
                <th>Habilitar</th>
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
                            echo form_open_multipart('producto/habilitarbd');
                            ?>
                            <input type="hidden" name="idproducto" value="<?php echo $row->idProducto; ?>">
                            <button type="submit" class="btn btn-warning">HABILITAR</button>
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