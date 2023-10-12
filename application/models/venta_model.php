<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Venta_model extends CI_Model
{

   public function buscarProducto($data) //get
   {
      $this->db->like('marca.nombre', $data);
      $this->db->from('producto'); //tabla productos
      $this->db->where('producto.estado', '1'); //condición where estado = 1
      $this->db->join('marca', 'marca.idMarca = producto.idMarca');
      return $this->db->get();
   }
   public function getProducts($postData)
   {

      $response2 = array();
      if (isset($postData['search'])) {
         // Select record
         $this->db->select('P.idProducto, P.codigo, P.nombre, P.stock, 
         P.precioCompra, P.precioVenta, P.estado, P.fechaRegistro, P.fechaActualizacion,
         P.idMarca, MA.nombre as nombrem, P.idCategoria, CA.nombre as nombrec');
         $this->db->from('producto P'); //tabla productos
         $this->db->join('marca MA', 'P.idMarca=MA.idMarca');
         $this->db->join('categoria CA', 'P.idCategoria=CA.idCategoria');
         $this->db->where("P.nombre like '%" . $postData['search'] . "%' ");
         $this->db->where('P.estado', '1'); //condición where estado = 1
          
         $records = $this->db->get()->result();


         foreach ($records as $row) {
            //$value = $row->nombreProducto. ' - ' . $row->nombreMarca;
            $value = $row->nombre;
            $response2[] = array(
               "value" => $value,
               "nombre" => $row->nombre,
               "categoria" => $row->nombre,
               "marca" => $row->nombre,
               "precioVenta" => $row->precioVenta,
               "idProducto" => $row->idProducto,
               "cantidad" => $row->stock,
               "codigo" => $row->codigo,
            );
         }
      }
      return $response2;
   }

   public function getProductsantiguo($postData)
   {

      $response2 = array();
      if (isset($postData['search'])) {
         // Select record
         $this->db->select('*');
         $this->db->from('bddproyectolibreria.producto'); //tabla productos
         $this->db->join('bddproyectolibreria.marca ', 'marca.idMarca = producto.idMarca');
         $this->db->join('bddproyectolibreria.categoria', 'categoria.idCategoria = producto.idCategoria');
         $this->db->where("producto.nombre like '%" . $postData['search'] . "%' ");
         $this->db->where('producto.estado', '1'); //condición where estado = 1


         $records = $this->db->get()->result();


         foreach ($records as $row) {
            //$value = $row->nombreProducto. ' - ' . $row->nombreMarca;
            $value = $row->nombre;
            $response2[] = array(
               "value" => $value,
               "nombre" => $row->nombre,
               "categoria" => $row->nombre,
               "marca" => $row->nombre,
               "precioVenta" => $row->precioVenta,
               "idProducto" => $row->idProducto,
               "cantidad" => $row->stock,
               "codigo" => $row->codigo,
            );
         }
      }
      return $response2;
   }
   public function getProducts2($postData)
   {

      $response2 = array();
      if (isset($postData['search'])) {
         // Select record
         $this->db->select('*');
         $this->db->from('bddproyectolibreria.producto'); //tabla productos
         $this->db->join('bddproyectolibreria.marca ', 'marca.idMarca = producto.idMarca');
         $this->db->join('bddproyectolibreria.categoria', 'categoria.idCategoria = producto.idCategoria');
         $this->db->where("producto.nombre like '%" . $postData['search'] . "%' ");
         $this->db->where('producto.estado', '1'); //condición where estado = 1


         $records = $this->db->get()->result();


         foreach ($records as $row) {
            //$value = $row->nombreProducto. ' - ' . $row->nombreMarca;
            $value = $row->nombre;
            $response2[] = array(
               "value" => $value,
               "nombre" => $row->nombre,
               "categoria" => $row->nombre,
               "marca" => $row->nombre,
               "precioVenta" => $row->precioVenta,
               "idProducto" => $row->idProducto,
               "cantidad" => $row->stock,
               "codigo" => $row->codigo,
            );
         }
      }
      return $response2;
   }

   // function getClients($postData,$idProducto){

   //     $response2 = array();
   //     if(isset($postData['search']) ){
   //       // Select record
   //       $this->db->select('*');
   //       $this->db->from('bddMilivoy.marca'); //tabla productos
   //       $this->db->join('bddMilivoy.producto ', 'marca.idMarca = producto.idMarca');
   //       $this->db->where("persona.marca like '%".$postData['search']."%' ");
   //       $this->db->where('producto.idProducto',$idProducto); //condición where estado = 1

   //       $records = $this->db->get()->result();

   //       foreach($records as $row ){
   //          $response2[] = array("value"=>$row->nombreMarca,"primerApellido"=>$row->primerApellido
   //          ,"segundoApellido"=>$row->segundoApellido,"carnet"=>$row->numeroCI);
   //         }

   //     }
   //     return $response2;
   //  }

   function getMarcas($postData)
   {

      $response2 = array();
      if (isset($postData['search'])) {
         // Select record
         $this->db->select('*');
         $this->db->from('bdprolibreria.marca'); //tabla productos
         $this->db->join('bdprolibreria.producto ', 'marca.idMarca = producto.idMarca');
         $this->db->where("persona.marca like '%" . $postData['search'] . "%' ");
         $this->db->where('producto.nroChasis', $postData); //condición where estado = 1

         $records = $this->db->get()->result();

         foreach ($records as $row) {
            $response2[] = array(
               "value" => $row->nombreMarca,
                "primerApellido" => $row->primerApellido,
                "segundoApellido" => $row->segundoApellido, 
                "carnet" => $row->cedulaIdentidad
            );
         }
      }
      return $response2;
   }




   public function registrar($data)
   {
      //Iniciamos la transacción.    
      $this->db->trans_begin();
      //Intenta insertar un cliente.    
      $this->db->insert('venta', array(
         'idCliente' => $data['idCliente'],
         'idUsuario' => $data['idUsuario'],
         'total' => $data['total'],
         'estado' => 1,
      ));
      //Recuperamos el id del cliente registrado.    
      $venta_id = $this->db->insert_id();
      //Insertamos los servicios que desea adquirir el cliente.     

         $idProductos = $data['idProducto'];
         $cantidades = $data['cantidad'];
         $subtotal = $data['subtotal'];
         //$stock = $data['stock'];
        $count = 0; 
       while ($count < count($idProductos)) {
         $this->db->insert('detalleventa', array(
            'idVenta' => $venta_id,
            'idProducto' => $idProductos[$count],
            'cantidad' => $cantidades[$count],
            'precioVenta' => $subtotal[$count],
         ));

         // Aqui actualizamos el stock de los productos yucaboy cuidado que te confundas ajajja
         $estadoVenta = 2;
         $this->db->where('idProducto', $idProductos[$count]);
         $this->db->update('producto',  array(
            'estado' => $estadoVenta,
         ));

         $count ++;
       }

      if ($this->db->trans_status() === FALSE) {
         //Hubo errores en la consulta, entonces se cancela la transacción.   
         $this->db->trans_rollback();
         return false;
      } else {
         //Todas las consultas se hicieron correctamente.  
         $this->db->trans_commit();
         return true;
      }
   }

   public function actualizar($idVenta,$data)
   {
      $this->db->where('idVenta', $idVenta);
      $this->db->update('venta',  array(
         'idCliente' => $data['idCliente'],
         'idUsuario' => $data['idUsuario'],
         'estado' => $data['estado'],
      ));

      $this->db->where('idVenta', $idVenta);
      $this->db->update('detalleventa', array(
         'idProducto' => $data['idProducto'],
         'cantidad' => $data['cantidad'],
         'precioVenta' => $data['precioVenta'],
      ));

   }


   public function recuperarVenta($idVenta) //get
   {
      $this->db->select('*'); //select *
      $this->db->from('venta'); //tabla productos
      $this->db->where('venta.idVenta', $idVenta); //condición where estado = 1
      $this->db->join('cliente', 'venta.idCliente = cliente.idCliente');
      $this->db->join('usuario', 'venta.idUsuario = usuario.idUsuario');
      $this->db->join('detalleventa', 'venta.idVenta = detalleventa.idVenta');
      $this->db->join('producto', 'producto.idProducto = detalleventa.idProducto');
      $this->db->join('marca', 'marca.idMarca = producto.idMarca');

      return $this->db->get(); //devolucion del resultado de la consulta

   }
   public function modificarventa($idventa,$data)//update
   {
       $this->db->where('idVenta',$idventa);
       $this->db->update('venta',$data);
       
   }

   public function getClients($postData){
      // $postData['search'] = 7;
      $response2 = array();
      if(isset($postData['search']) ){
        // Select record
        $this->db->select('*');
        $this->db->from('cliente'); //tabla productos
        $this->db->where("ciNit like '%".$postData['search']."%' ");
        $this->db->where('estado','1'); //condición where estado = 1
      
        $records = $this->db->get()->result();
 
        foreach($records as $row ){
            $response2[] = array(
            "value"=>$row->ciNit,
            "idCliente"=>$row->idCliente,
            "ciNit"=>$row->ciNit,
            "razonSocial"=>$row->razonSocial,
            "telefono"=>$row->telefono);
          }
 
      }
      return $response2;
   }

//--------------------------------------------------------------------------------------------------//
   public function reporteventa($idventa)
	{
      $this->db->select('venta.idVenta, venta.total, venta.estado, venta.fechaRegistro, venta.fechaActualizacion, cliente.idCliente, cliente.nombres, 
                  cliente.primerApellido, cliente.segundoApellido, cliente.cedulaIdentidad, usuario.idUsuario, usuario.login, usuario.nombres AS nombresU,
                  usuario.primerApellido AS primerApellidoU,usuario.segundoApellido AS segundoApellidoU, sucursal.idSucursal, sucursal.nombreSucursal, sucursal.direccion, 
                  detalleventa.precioVenta, detalleventa.cantidad, producto.nroChasis, producto.color, producto.precio,
                   modelo.nombreModelo, marca.nombreMarca'); //select *
      $this->db->from('venta'); //tabla productos
      $this->db->where('venta.estado', '1'); //condición where estado = 1
      $this->db->join('cliente', 'venta.idCliente = cliente.idCliente');
      $this->db->join('usuario', 'venta.idUsuario = usuario.idUsuario');
      $this->db->join('sucursal', 'usuario.idSucursal = sucursal.idSucursal');
      $this->db->join('detalleventa', 'venta.idVenta = detalleventa.idVenta');
      $this->db->join('producto', 'producto.idProducto = detalleventa.idProducto');
      $this->db->join('modelo', 'producto.idModelo = modelo.idModelo');
      $this->db->join('marca', 'producto.idMarca = marca.idMarca');
      $this->db->where('venta.idVenta',$idventa);
      return $this->db->get(); //devolucion del resultado de la consulta
   
	}
}


