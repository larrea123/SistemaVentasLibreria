<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte_model extends CI_Model {

    //cantidad de clientes
    public function cantidadCliente()
    {
        $this->db->from('cliente');
        $this->db->where('estado', 1);
        return $this->db->count_all_results();
    }
    //cantidad de modelos
    public function cantidadCategoria()
    {
        $this->db->from('categoria');		
        $this->db->where('estado', 1);
        return $this->db->count_all_results();
    }
    //cantidad de marca
    public function cantidadMarca()
    {
        $this->db->from('marca');		
        $this->db->where('estado', 1);
        return $this->db->count_all_results();
    }
    //cantidad de proveedores
    public function cantidadProveedor()
    {
        $this->db->from('proveedor');		
        $this->db->where('estado', 1);
        return $this->db->count_all_results();
    }
    //cantidad de productos
    public function cantidadProducto()
    {
        $this->db->from('producto');		
        $this->db->where('estado', 1);
        return $this->db->count_all_results();
    }
    //cantidad de ventas
    public function cantidadVenta()
    {
        $this->db->from('venta');		
        $this->db->where('estado', 1);
        return $this->db->count_all_results();
    }
    //DASHBOARD 1
    public function getMes() //select
    {

        $this->db->select('producto.idProducto, count(categoria.idCategoria) cant, categoria.nombre nom'); //select*
        $this->db->from('producto'); //tabla
        $this->db->join('categoria', 'producto.idCategoria=categoria.idCategoria');
        $this->db->join('marca', 'producto.idMarca=marca.idMarca');
        $this->db->WHERE('producto.estado','1');
        $this->db->group_by('categoria.idCategoria');
        $query = $this->db->get(); //devolucion del resultado de la consulta
        return $query->result();
    }
    //DASHBORD 2
    public function getProductosVendidos() //select
    {
        $this->db->select('venta.idVenta, venta.total, venta.estado, venta.fechaRegistro, venta.fechaActualizacion, cliente.idCliente, cliente.razonSocial, 
                  cliente.ciNit, usuario.idUsuario, usuario.login, detalleventa.precioUnitario, detalleventa.cantidad, producto.nombre, producto.codigo,
                  producto.stock, producto.precioCompra, producto.precioVenta, categoria.idCategoria ,count(categoria.idCategoria) canti, categoria.nombre as nomb, 
                  marca.nombre as nombrem'); //select *
        $this->db->from('venta'); //tabla productos
        $this->db->where('venta.estado', '1'); //condición where estado = 1
        $this->db->join('cliente', 'venta.idCliente = cliente.idCliente');
        $this->db->join('usuario', 'venta.idUsuario = usuario.idUsuario');
        $this->db->join('detalleventa', 'venta.idVenta = detalleventa.idVenta');
        $this->db->join('producto', 'producto.idProducto = detalleventa.idProducto');
        $this->db->join('categoria', 'producto.idCategoria = categoria.idCategoria');
        $this->db->join('marca', 'producto.idMarca = marca.idMarca');   
        $this->db->group_by('categoria.idCategoria'); 
        $query = $this->db->get(); //devolucion del resultado de la consulta
        return $query->result();
    }

    public function listaventa()//select
	{
        $this->db->select('*'); //select *
        $this->db->from('venta'); //tabla producto
        $this->db->where('venta.estado','1'); //condición where estado = 1
        $this->db->join('cliente', 'cliente.idCliente=venta.idCliente');
        $this->db->join('usuario', 'Usuario.idUsuario=venta.idUsuario');
    //inner join a una segunda tabla
        //si se gusta añadir una especie de AND de SQL se puede repetir nuevamente la línea previa a este comentario. ($this->db->where('estado','1');)
        return $this->db->get(); //devolucion del resultado de la consulta
	}
    public function listaventa2($idventa)//select
	{
        $this->db->select('login'); //select *
        $this->db->from('venta'); //tabla producto
        $this->db->where('venta.estado',$idventa); //condición where estado = 1
        $this->db->join('cliente', 'cliente.idCliente=venta.idCliente');
        $this->db->join('usuario', 'Usuario.idUsuario=venta.idUsuario');
    //inner join a una segunda tabla
        //si se gusta añadir una especie de AND de SQL se puede repetir nuevamente la línea previa a este comentario. ($this->db->where('estado','1');)
        return $this->db->get(); //devolucion del resultado de la consulta
	}
    public function listaventarechasada()//select
	{
        $this->db->select('*'); //select *
        $this->db->from('venta'); //tabla producto
        $this->db->where('venta.estado','0'); //condición where estado = 1
        $this->db->join('cliente', 'cliente.idCliente=venta.idCliente');
        $this->db->join('usuario', 'usuario.idUsuario=venta.idUsuario');
    //inner join a una segunda tabla
        //si se gusta añadir una especie de AND de SQL se puede repetir nuevamente la línea previa a este comentario. ($this->db->where('estado','1');)
        return $this->db->get(); //devolucion del resultado de la consulta
	}

    public function detalle($idventa)//select
	{
        $this->db->select('venta.idVenta, venta.total, venta.estado, venta.fechaRegistro, venta.fechaActualizacion, cliente.idCliente, cliente.razonSocial,
                 cliente.ciNit, usuario.idUsuario, usuario.login, usuario.nombres AS nombresU, usuario.primerApellido AS primerApellidoU,usuario.segundoApellido AS segundoApellidoU, 
                 detalleventa.precioUnitario, detalleventa.cantidad, producto.nombre, producto.codigo, producto.precioCompra, producto.precioVenta, producto.stock,
                categoria.nombre as nombrec, marca.nombre as nombrem, proveedor.razonSocial'); //select *
        $this->db->from('venta'); //tabla productos
        $this->db->where('venta.estado', '1'); //condición where estado = 1
        $this->db->join('cliente', 'venta.idCliente = cliente.idCliente');
        $this->db->join('usuario', 'venta.idUsuario = usuario.idUsuario');
        $this->db->join('detalleventa', 'venta.idVenta = detalleventa.idVenta');
        $this->db->join('producto', 'producto.idProducto = detalleventa.idProducto');
        $this->db->join('categoria', 'producto.idCategoria = categoria.idCategoria');
        $this->db->join('marca', 'producto.idMarca = marca.idMarca');
        $this->db->join('proveedor', 'producto.idProveedor = proveedor.idProveedor');
        $this->db->where('venta.idVenta',$idventa);
        $this->db->order_by('venta.idVenta', 'desc');
        //$this->db->group_by('venta.idVenta'); 
        //si se gusta añadir una especie de AND de SQL se puede repetir nuevamente la línea previa a este comentario. ($this->db->where('estado','1');)
        return $this->db->get(); //devolucion del resultado de la consulta
        
	}

    // PDF -> REPORTE GENERAL POR FECHAS 
    public function detalle1()//select
	{
        $this->db->select('venta.idVenta, venta.total, venta.estado, venta.fechaRegistro, venta.fechaActualizacion, cliente.idCliente, cliente.razonSocial, 
        cliente.ciNit, usuario.idUsuario, usuario.login, usuario.nombres, usuario.primerApellido,  usuario.segundoApellido, detalleventa.precioUnitario, 
        detalleventa.cantidad, producto.nombre, producto.codigo, producto.stock, producto.precioCompra, producto.precioVenta, categoria.nombre as nombrec, 
        marca.nombre as nombrem, proveedor.razonSocial as razonSocialp'); //select *
        $this->db->from('venta'); //tabla productos
        $this->db->where('venta.estado', '1'); //condición where estado = 1
        $this->db->join('cliente', 'venta.idCliente = cliente.idCliente');
        $this->db->join('usuario', 'venta.idUsuario = usuario.idUsuario');
        $this->db->join('detalleventa', 'venta.idVenta = detalleventa.idVenta');
        $this->db->join('producto', 'producto.idProducto = detalleventa.idProducto');
        $this->db->join('categoria', 'producto.idCategoria = categoria.idCategoria');
        $this->db->join('marca', 'producto.idMarca = marca.idMarca');
        $this->db->join('proveedor', 'producto.idProveedor = proveedor.idProveedor');
        $this->db->order_by('venta.fechaRegistro', 'desc');

        
    //inner join a una segunda tabla
        //si se gusta añadir una especie de AND de SQL se puede repetir nuevamente la línea previa a este comentario. ($this->db->where('estado','1');)
        return $this->db->get(); //devolucion del resultado de la consulta
	}

    public function sucursalVenta()//select
	{
        
        $this->db->select('*'); //select *
        $this->db->from('detalleventa'); //tabla producto //condición where estado = 1
        $this->db->join('venta', 'venta.idVenta=detalleventa.idVenta');
        $this->db->join('producto ', 'producto.idProducto=detalleventa.idProducto');
        $this->db->join('modelo', 'modelo.idModelo=producto.idModelo');
        $this->db->join('marca', 'marca.idMarca=producto.idMarca');
        $this->db->join('cliente', 'cliente.idCliente=venta.idCliente');
        
    //inner join a una segunda tabla
        //si se gusta añadir una especie de AND de SQL se puede repetir nuevamente la línea previa a este comentario. ($this->db->where('estado','1');)
        return $this->db->get(); //devolucion del resultado de la consulta
	}

    public function reporteSucursalFechas($idSucursal,$Inicio,$Fin)//select
	{
        
       $this->db->select('venta.idVenta, venta.total, venta.estado, venta.fechaRegistro, venta.fechaActualizacion, cliente.idCliente, cliente.nombres, 
                    cliente.primerApellido, cliente.segundoApellido, cliente.cedulaIdentidad, usuario.idUsuario, usuario.login,
                    sucursal.idSucursal, sucursal.nombreSucursal, sucursal.direccion, detalleventa.precioVenta, detalleventa.cantidad, 
                    producto.idProducto, producto.precio, producto.nroChasis, producto.color, modelo.nombreModelo, marca.nombreMarca');
        $this->db->from ('venta');
        $this->db->join ('cliente' ,'venta.idCliente = cliente.idCliente');
        $this->db->join ('usuario' ,'venta.idUsuario= usuario.idUsuario');
        $this->db->join ('detalleventa' ,'venta.idVenta = detalleventa.idVenta');
        $this->db->join ('producto' ,'producto.idProducto = detalleventa.idProducto');
        $this->db->join ('modelo' ,'producto.idModelo = modelo.idModelo');
        $this->db->join ('marca'  ,'producto.idMarca = marca.idMarca');
        $this->db->join('sucursal', 'venta.idSucursal = sucursal.idSucursal');
        $this->db->where ('venta.estado','1');
        $this->db->where('sucursal.idSucursal',$idSucursal);
        $this->db->where("venta.fechaRegistro BETWEEN'{$Inicio}' AND '{$Fin},23:59:59'");
        $this->db->group_by ('venta.idVenta');
        
        return $this->db->get(); 
	}

    // REPORTE PRODUCTOS MAS VENDIDOS
    public function reporteProducto()
	{
        $this->db->select('categoria.nombre as nombrec ,marca.nombre as nombrem, ifnull(count(*),0) cantidad, sum(detalleventa.precioUnitario) total');
        $this->db->from ('producto');
        $this->db->join ('categoria' ,'producto.idCategoria = categoria.idCategoria');
        $this->db->join ('marca'  ,'producto.idMarca = marca.idMarca');
        $this->db->join ('detalleventa' ,'producto.idProducto = detalleventa.idProducto');
        $this->db->join ('venta' ,'detalleventa.idVenta = venta.idVenta');
        $this->db->where ('producto.estado=1');
        $this->db->group_by ('categoria.idCategoria');
        $this->db->order_by ('cantidad desc');
        
        return $this->db->get(); 
	}

    // REPORTE PRODUCTOS MAS VENDIDOS MAS CANTIDAD
    public function reporteProductoFinal($cantidad)
	{
        
        $this->db->select('producto.precioVenta, categoria.nombre as nombrec ,marca.nombre as nombrem, ifnull(count(*),0) cantidad, sum(detalleventa.precioUnitario) total');
        $this->db->from ('producto');
        $this->db->join ('categoria' ,'producto.idCategoria = categoria.idCategoria');
        $this->db->join ('marca'  ,'producto.idMarca = marca.idMarca');
        $this->db->join ('detalleventa' ,'producto.idProducto = detalleventa.idProducto');
        $this->db->join ('venta' ,'detalleventa.idVenta = venta.idVenta');
        $this->db->where ('producto.estado=1');
        $this->db->group_by ('categoria.idCategoria');
        $this->db->order_by ('cantidad desc');
        $this->db->limit($cantidad);
        
        return $this->db->get(); 
	}

    // REPORTE PRODUCTOS MAYOR ROTACION
    public function reporteProductoRotacion()
	{
        
        $this->db->select('producto.precioVenta, categoria.idCategoria, categoria.nombre as nombrec, sum(detalleventa.cantidad) cantidad, sum(detalleventa.precioUnitario) total');
        $this->db->from ('producto');
        $this->db->join ('categoria' ,'producto.idCategoria = categoria.idCategoria');
        $this->db->join ('detalleventa' ,'producto.idProducto = detalleventa.idProducto');
        $this->db->join ('venta' ,'detalleventa.idVenta = venta.idVenta');
        $this->db->where ('producto.estado=1');
        $this->db->group_by ('categoria.idCategoria');
        $this->db->order_by ('cantidad desc');
        
        return $this->db->get(); 
	}

    // REPORTE PRODUCTOS MAYOR ROTACION MAS CANTIDAD
    public function reporteProductoRotacion1($cantidad)
	{
        
        $this->db->select('producto.precioVenta, categoria.idCategoria, categoria.nombre as nombrec, sum(detalleventa.cantidad) cantidad, sum(detalleventa.precioUnitario) precioD, venta.total');
        $this->db->from ('producto');
        $this->db->join ('categoria' ,'producto.idCategoria = categoria.idCategoria');
        $this->db->join ('detalleventa' ,'producto.idProducto = detalleventa.idProducto');
        $this->db->join ('venta' ,'detalleventa.idVenta = venta.idVenta');
        $this->db->where ('producto.estado=1');
        $this->db->group_by ('categoria.idCategoria');
        $this->db->order_by ('cantidad desc');
        $this->db->limit($cantidad);
        
        return $this->db->get(); 
	}

    public function reporteProductoSucursal($idSucursal)
	{
        
        $this->db->select('modelo.nombreModelo,marca.nombreMarca,sucursal.idSucursal, sucursal.nombreSucursal, ifnull(count(*),0) cantidad, sum(detalleventa.precioVenta) total');
        $this->db->from ('producto');
        $this->db->join ('modelo' ,'producto.idModelo = modelo.idModelo');
        $this->db->join ('marca'  ,'producto.idMarca = marca.idMarca');
        $this->db->join('sucursal', 'producto.idSucursal = sucursal.idSucursal');
        $this->db->join ('detalleventa' ,'producto.idProducto = detalleventa.idProducto');
        $this->db->join ('venta' ,'detalleventa.idVenta = venta.idVenta');
        $this->db->where('sucursal.idSucursal',$idSucursal);
        $this->db->where ('producto.estado=2');
        $this->db->group_by ('modelo.idModelo');
        $this->db->order_by ('cantidad desc');
        return $this->db->get();
	}

    public function reporteProductoSucursalCantidad($idSucursal, $cantidad)
	{
        
        $this->db->select('producto.precio, sucursal.idSucursal, sucursal.nombreSucursal, sucursal.direccion, modelo.nombreModelo,marca.nombreMarca, ifnull(count(*),0) cantidad, sum(detalleventa.precioVenta) total');
        $this->db->from ('producto');
        $this->db->join ('modelo' ,'producto.idModelo = modelo.idModelo');
        $this->db->join ('marca'  ,'producto.idMarca = marca.idMarca');
        $this->db->join('sucursal', 'producto.idSucursal = sucursal.idSucursal');
        $this->db->join ('detalleventa' ,'producto.idProducto = detalleventa.idProducto');
        $this->db->join ('venta' ,'detalleventa.idVenta = venta.idVenta');
        $this->db->where ('producto.estado=2');
        $this->db->where('sucursal.idSucursal',$idSucursal);
        $this->db->group_by ('modelo.idModelo');
        $this->db->order_by ('cantidad desc');
        $this->db->limit($cantidad);
        
        return $this->db->get(); 
	}
    // PDF -> Reporte suma del total en NUMERAL de ventas
    public function reporteTotal()
	{
        $this->db->select('sum(total) as total');
        $this->db->from ('venta');
        return $this->db->get(); 
    }
    // PDF -> Reporte suma del total en NUMERAL de ventas POR FECHAS
    public function reporteTotalFechas($Inicio,$Fin)
	{
        $this->db->select('ifnull(sum(total),0) as total');
        $this->db->from ('venta');
        $this->db->where('venta.estado','1');
        $this->db->where("venta.fechaRegistro BETWEEN'{$Inicio}' AND '{$Fin},23:59:59'");
        return $this->db->get(); 
    }

    public function reporteTotalSucursal($idSucursal)
	{
        $this->db->select('ifnull(sum(total),0) as total');
        $this->db->from ('venta');
        $this->db->where('venta.estado','1');
        $this->db->where('venta.idSucursal',$idSucursal);
        return $this->db->get(); 
    }
    public function reporteTotalSucursalFechas($idSucursal,$Inicio,$Fin)
	{
        $this->db->select('ifnull(sum(total),0) as total');
        $this->db->from ('venta');
        $this->db->where('venta.estado','1');
        $this->db->where('venta.idSucursal',$idSucursal);
        $this->db->where("venta.fechaRegistro BETWEEN'{$Inicio}' AND '{$Fin},23:59:59'");
        return $this->db->get(); 
    }

    // PDF -> Reporte datos de la empresa y usuario
    public function ventashistorial() //select
    {
      $this->db->select('venta.idVenta, venta.total, venta.estado, venta.fechaRegistro, venta.fechaActualizacion, cliente.idCliente, cliente.razonSocial, 
                 cliente.ciNit, usuario.idUsuario, usuario.login, usuario.nombres, usuario.primerApellido,  usuario.segundoApellido, detalleventa.precioUnitario, 
                 detalleventa.cantidad, producto.nombre, producto.codigo, producto.stock, producto.precioCompra, producto.precioVenta, categoria.nombre as nombrec, 
                 marca.nombre as nombrem, proveedor.razonSocial as razonSocialp'); //select *
      $this->db->from('venta'); //tabla productos
      $this->db->where('venta.estado', '1'); //condición where estado = 1
      $this->db->join('cliente', 'venta.idCliente = cliente.idCliente');
      $this->db->join('usuario', 'venta.idUsuario = usuario.idUsuario');
      $this->db->join('detalleventa', 'venta.idVenta = detalleventa.idVenta');
      $this->db->join('producto', 'producto.idProducto = detalleventa.idProducto');
      $this->db->join('categoria', 'producto.idCategoria = categoria.idCategoria');
      $this->db->join('marca', 'producto.idMarca = marca.idMarca');
      $this->db->join('proveedor', 'producto.idProveedor = proveedor.idProveedor');
      $this->db->order_by('venta.idVenta', 'desc');
      $this->db->group_by('venta.idVenta'); 
      //si se gusta añadir una especie de AND de SQL se puede repetir nuevamente la línea previa a este comentario. ($this->db->where('estado','1');)
      return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function ventaGeneral($Inicio,$Fin) //select
    {
      $this->db->select("venta.idVenta, venta.fechaRegistro,venta.total,  venta.fechaActualizacion, cliente.idCliente, cliente.nombres, 
       cliente.primerApellido, cliente.segundoApellido, cliente.cedulaIdentidad, usuario.idUsuario, usuario.login,
       sucursal.idSucursal, sucursal.nombreSucursal, sucursal.direccion, detalleventa.precioVenta, detalleventa.cantidad, 
       producto.idProducto, producto.precio, producto.nroChasis, producto.color, 
       modelo.nombreModelo, marca.nombreMarca
        from venta
        join cliente ON venta.idCliente = cliente.idCliente
        join usuario ON venta.idUsuario= usuario.idUsuario
        join sucursal ON usuario.idSucursal = sucursal.idSucursal
        join detalleventa ON venta.idVenta = detalleventa.idVenta
        join producto ON producto.idProducto = detalleventa.idProducto
        join modelo ON producto.idModelo = modelo.idModelo
        join marca ON producto.idMarca = marca.idMarca
        where venta.estado=1 AND venta.fechaRegistro between'".$Inicio."' AND '".$Fin." 23:59:59'
        group by venta.idVenta
        order by venta.fechaRegistro desc");

        return $this->db->get(); 
    }

    //REPORTE GENERAL POR FECHAS
    public function ventaFechas($Inicio,$Fin) //select
    {
        $this->db->select('venta.idVenta, venta.total, venta.estado, venta.fechaRegistro, venta.fechaActualizacion, cliente.idCliente, cliente.razonSocial, 
                        cliente.ciNit, usuario.idUsuario, usuario.login, usuario.nombres, usuario.primerApellido,  usuario.segundoApellido, detalleventa.precioUnitario, 
                        detalleventa.cantidad, producto.nombre, producto.codigo, producto.stock, producto.precioCompra, producto.precioVenta, categoria.nombre as nombrec, 
                        marca.nombre as nombrem, proveedor.razonSocial as razonSocialp');  //select *
        $this->db->from('venta'); //tabla productos
        $this->db->join('cliente', 'venta.idCliente = cliente.idCliente');
        $this->db->join('usuario', 'venta.idUsuario = usuario.idUsuario');
        $this->db->join('detalleventa', 'venta.idVenta = detalleventa.idVenta');
        $this->db->join('producto', 'producto.idProducto = detalleventa.idProducto');
        $this->db->join('categoria', 'producto.idCategoria = categoria.idCategoria');
        $this->db->join('marca', 'producto.idMarca = marca.idMarca');
        $this->db->join('proveedor', 'producto.idProveedor = proveedor.idProveedor');
        $this->db->where('venta.estado','1');
        $this->db->where("venta.fechaRegistro BETWEEN'{$Inicio}' AND '{$Fin},23:59:59'");
        $this->db->order_by('venta.fechaRegistro', 'desc');
        //$this->db->group_by('venta.idVenta'); 
        return $this->db->get(); 
    }

    public function buscarID($idVenta) //select
    {

      $this->db->select('venta.idVenta, venta.total, venta.estado, venta.fechaRegistro, venta.fechaActualizacion, cliente.idCliente, cliente.nombres, 
                  cliente.primerApellido, cliente.segundoApellido, cliente.cedulaIdentidad, usuario.idUsuario, usuario.login,
                  sucursal.idSucursal, sucursal.nombreSucursal, sucursal.direccion, detalleventa.precioVenta, detalleventa.cantidad, 
                  producto.nroChasis, producto.color, modelo.nombreModelo, marca.nombreMarca'); //select *
      $this->db->from('venta'); //tabla productos
      $this->db->where('venta.estado', '1'); //condición where estado = 1
      $this->db->where('venta.idVenta', $idVenta);
      $this->db->join('cliente', 'venta.idCliente = cliente.idCliente');
      $this->db->join('usuario', 'venta.idUsuario = usuario.idUsuario');
      $this->db->join('sucursal', 'usuario.idSucursal = sucursal.idSucursal');
      $this->db->join('detalleventa', 'venta.idVenta = detalleventa.idVenta');
      $this->db->join('producto', 'producto.idProducto = detalleventa.idProducto');
      $this->db->join('modelo', 'producto.idModelo = modelo.idModelo');
      $this->db->join('marca', 'producto.idMarca = marca.idMarca');
      $this->db->group_by('venta.idVenta'); 
      $this->db->order_by('venta.idVenta','desc');


      return $this->db->get(); //devolucion del resultado de la consulta
   }

   	public function listaProductosGeneral()
	{
       $this->db->select('P.idProducto, P.color, P.anioModelo, P.nroChasis, P.nroMotor, 
                        P.poliza, P.precio, P.estado, P.fechaRegistro, P.fechaActualizacion,
                        P.idMarca, MA.nombreMarca, P.idModelo, MO.nombreModelo, S.nombreSucursal'); //select *
       $this->db->from('producto P'); //tabla
       $this->db->where('P.estado','1');
       $this->db->join('marca MA', 'P.idMarca=MA.idMarca');
       $this->db->join('modelo MO', 'P.idModelo=MO.idModelo');
       $this->db->join('sucursal S', 'P.idSucursal=S.idSucursal');
       $this->db->order_by('idProducto', 'desc');
       return $this->db->get(); //devolucion del resultado de la consulta
	}

   	public function listaProductosSucursal($idSucursal)
	{
       $this->db->select('P.idProducto, P.color, P.anioModelo, P.nroChasis, P.nroMotor, 
                        P.poliza, P.precio, P.estado, P.fechaRegistro, P.fechaActualizacion,
                        P.idMarca, MA.nombreMarca, P.idModelo, MO.nombreModelo, S.nombreSucursal'); //select *
       $this->db->from('producto P'); //tabla
       $this->db->where('P.estado','1');
       $this->db->where('S.idSucursal',$idSucursal);
       $this->db->join('marca MA', 'P.idMarca=MA.idMarca');
       $this->db->join('modelo MO', 'P.idModelo=MO.idModelo');
       $this->db->join('sucursal S', 'P.idSucursal=S.idSucursal');
       $this->db->order_by('idProducto', 'desc');
       return $this->db->get(); //devolucion del resultado de la consulta
	}

    public function listaClientesGeneral()
	{
        $this->db->select('C.idCliente, C.nombres, C.primerApellido, C.segundoApellido, C.cedulaIdentidad, C.telefono, 
                        C.direccion, C.estado, C.fechaRegistro, C.fechaActualizacion, U.idUsuario, U.login, 
                        S.idSucursal, S.nombreSucursal'); //select *
        $this->db->from('cliente C'); //tabla
        $this->db->join('usuario U', 'C.idUsuario=U.idUsuario');
        $this->db->join('sucursal S', 'C.idSucursal=S.idSucursal');
        $this->db->where('C.estado','1');
        $this->db->order_by('idCliente', 'desc');
        return $this->db->get(); //devolucion del resultado de la consulta
	}

    public function listaClientesSucursal($idSucursal)
	{
        $this->db->select('C.idCliente, C.nombres, C.primerApellido, C.segundoApellido, C.cedulaIdentidad, C.telefono, 
                        C.direccion, C.estado, C.fechaRegistro, C.fechaActualizacion, U.idUsuario, U.login, 
                        S.idSucursal, S.nombreSucursal'); //select *
        $this->db->from('cliente C'); //tabla
        $this->db->join('usuario U', 'C.idUsuario=U.idUsuario');
        $this->db->join('sucursal S', 'C.idSucursal=S.idSucursal');
        $this->db->where('C.estado','1');
        $this->db->where('S.idSucursal',$idSucursal);
        $this->db->order_by('idCliente', 'desc');
        return $this->db->get(); //devolucion del resultado de la consulta
	}

    public function listaUsuarios()
	{
                $this->db->select('U.idUsuario, U.login, U.tipo, U.nombres, U.primerApellido, U.segundoApellido, U.cedulaIdentidad, 
                U.telefono, U.direccion, U.estado, U.fechaRegistro, U.fechaActualizacion, S.idSucursal, S.nombreSucursal'); //select *
                $this->db->from('usuario U'); //tabla
                $this->db->where('U.estado','1');
                $this->db->join('sucursal S', 'S.idSucursal=U.idSucursal');
                return $this->db->get(); //devolucion del resultado de la consulta
	}
}
