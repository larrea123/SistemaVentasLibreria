<?php

class Proveedor_model extends CI_Model {

    public function listaproveedores()
    {
        $this->db->select('*');
        $this->db->from('proveedor');
        $this->db->where('estado','1');
        return $this->db->get();
    }

    public function agregarproveedor($data)
    {
        $this->db->insert('proveedor',$data);
    }

    public function eliminarproveedor($idproveedor)
    {
        $this->db->where('idProveedor',$idproveedor);
        $this->db->delete('proveedor');
    }

    public function recuperarproveedor($idproveedor)
    {

        $this->db->select('*');
        $this->db->from('proveedor');
        $this->db->where('idProveedor',$idproveedor);
        return $this->db->get();

        /*$this->db->select('U.idProveedor, U.login, U.password, U.tipo, U.nombres, U.primerApellido, U.segundoApellido, U.cedulaIdentidad, 
        U.telefono, U.direccion, U.estado, U.fechaRegistro, U.fechaActualizacion'); //select *
        $this->db->from('proveedor U'); //tabla
        $this->db->where('U.idProveedor',$idproveedor);
        return $this->db->get(); //devolucion del resultado de la consulta
            
            $this->db->select('*'); //select *
            $this->db->from('proveedor'); //tabla
            $this->db->where('idProveedor',$idproveedor);
            return $this->db->get(); //devolucion del resultado de la consulta*/
    }

    public function modificarproveedor($idproveedor,$data)
    {
        $this->db->where('idProveedor',$idproveedor);
        $this->db->update('proveedor',$data);
    }

    public function listaproveedoresdeshabilitados()
    {
        $this->db->select('*');
        $this->db->from('proveedor');
        $this->db->where('estado','0');
        return $this->db->get();

        /*$this->db->select('U.idProveedor, U.login, U.tipo, U.nombres, U.primerApellido, U.segundoApellido, U.cedulaIdentidad, 
        U.telefono, U.direccion, U.estado, U.fechaRegistro, U.fechaActualizacion'); //select *
        $this->db->from('proveedor U'); //tabla
        $this->db->where('U.estado','0');
        return $this->db->get(); //devolucion del resultado de la consulta*/
    }
}
