<?php

class Cliente_model extends CI_Model {
    
    public function listaclientes()
    {
        $this->db->select('*');
        $this->db->from('cliente');
        $this->db->where('estado','1');
        return $this->db->get();
    }

    public function agregarcliente($data)
    {
        $this->db->insert('cliente',$data);
    }

    public function eliminarcliente($idcliente)
    {
        $this->db->where('idCliente',$idcliente);
        $this->db->delete('cliente');
    }

    public function recuperarcliente($idcliente)
    {

        $this->db->select('*');
        $this->db->from('cliente');
        $this->db->where('idCliente',$idcliente);
        return $this->db->get();

        /*$this->db->select('U.idcliente, U.login, U.password, U.tipo, U.nombres, U.primerApellido, U.segundoApellido, U.cedulaIdentidad, 
        U.telefono, U.direccion, U.estado, U.fechaRegistro, U.fechaActualizacion'); //select *
        $this->db->from('cliente U'); //tabla
        $this->db->where('U.idcliente',$idcliente);
        return $this->db->get(); //devolucion del resultado de la consulta
            
            $this->db->select('*'); //select *
            $this->db->from('cliente'); //tabla
            $this->db->where('idcliente',$idcliente);
            return $this->db->get(); //devolucion del resultado de la consulta*/
    }

    public function modificarcliente($idcliente,$data)
    {
        $this->db->where('idCliente',$idcliente);
        $this->db->update('cliente',$data);
    }

    public function listaclientesdeshabilitados()
    {
        $this->db->select('*');
        $this->db->from('cliente');
        $this->db->where('estado','0');
        return $this->db->get();

        /*$this->db->select('U.idcliente, U.login, U.tipo, U.nombres, U.primerApellido, U.segundoApellido, U.cedulaIdentidad, 
        U.telefono, U.direccion, U.estado, U.fechaRegistro, U.fechaActualizacion'); //select *
        $this->db->from('cliente U'); //tabla
        $this->db->where('U.estado','0');
        return $this->db->get(); //devolucion del resultado de la consulta*/
    }
}
