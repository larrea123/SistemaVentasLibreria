<?php

    class Producto_model extends CI_Model {

        public function listaproductos()
        {
            /*$this->db->select('*');
            $this->db->from('producto');
            $this->db->where('estado','1');
            return $this->db->get();*/

            $this->db->select('P.idProducto, P.codigo, P.nombre, P.stock, 
            P.precioCompra, P.precioVenta, P.estado, P.fechaRegistro, P.fechaActualizacion,
            P.idMarca, MA.nombre as nombrem, P.idCategoria, CA.nombre as nombrec, P.idProveedor, PR.razonSocial'); //select *
            $this->db->from('producto P'); //tabla
            $this->db->where('P.estado','1');
            $this->db->join('marca MA', 'P.idMarca=MA.idMarca');
            $this->db->join('categoria CA', 'P.idCategoria=CA.idCategoria');
            $this->db->join('proveedor PR', 'P.idProveedor=PR.idProveedor');
            return $this->db->get(); 
        }

        public function listaproductosdeshabilitados()
        {
            /*$this->db->select('*');
            $this->db->from('producto');
            $this->db->where('estado','0');
            return $this->db->get();*/

            $this->db->select('P.idProducto, P.codigo, P.nombre, P.stock, 
            P.precioCompra, P.precioVenta, P.estado, P.fechaRegistro, P.fechaActualizacion,
            P.idMarca, MA.nombre as nombrem, P.idCategoria, CA.nombre as nombrec, P.idProveedor, PR.razonSocial'); //select *
            $this->db->from('producto P'); //tabla
            $this->db->where('P.estado','0');
            $this->db->join('marca MA', 'P.idMarca=MA.idMarca');
            $this->db->join('categoria CA', 'P.idCategoria=CA.idCategoria');
            $this->db->join('proveedor PR', 'P.idProveedor=PR.idProveedor');
            return $this->db->get(); 
        }

        public function agregarproducto($data)
        {
            $this->db->insert('producto',$data);
        }

        public function eliminarproducto($idproducto)
        {
            $this->db->where('idProducto',$idproducto);
            $this->db->delete('producto');
        }

        public function recuperarproducto($idproducto)
        {
            /*$this->db->select('*');
            $this->db->from('producto');
            $this->db->where('idProducto',$idproducto);
            return $this->db->get();*/

            $this->db->select('P.idProducto, P.codigo, P.nombre, P.stock, 
            P.precioCompra, P.precioVenta, P.estado, P.fechaRegistro, P.fechaActualizacion,
            P.idMarca, MA.nombre  as nombrem, P.idCategoria, CA.nombre  as nombrec, P.idProveedor, PR.razonSocial'); //select *
            $this->db->from('producto P'); //tabla
            $this->db->where('idProducto',$idproducto);
            $this->db->join('marca MA', 'P.idMarca=MA.idMarca');
            $this->db->join('categoria CA', 'P.idCategoria=CA.idCategoria');
            $this->db->join('proveedor PR', 'P.idProveedor=PR.idProveedor');
            return $this->db->get(); //devolucion del resultado de la consulta

        }

        public function modificarproducto($idproducto,$data)
        {
            $this->db->where('idProducto',$idproducto);
            $this->db->update('producto',$data);
        }
        //----Funcion para aumentar stock-----
        public function aumentar_stock($idProducto, $cantidad)
        {
            $this->db->set('stock', 'stock+' . (int)$cantidad, false);
            $this->db->where('idProducto', $idProducto);
            $this->db->update('producto');
        }
}
