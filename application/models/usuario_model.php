<?php

class Usuario_model extends CI_Model {

    public function validar($login,$password)
    {
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('login',$login);
        $this->db->where('password',$password);
        return $this->db->get();
    }
    
    public function listausuarios()
    {
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('estado','1');
        return $this->db->get();
    }

    public function agregarusuario($data)
    {
        $this->db->insert('usuario',$data);
    }

    public function eliminarusuario($idusuario)
    {
        $this->db->where('idUsuario',$idusuario);
        $this->db->delete('usuario');
    }

    public function recuperarusuario($idusuario)
    {

        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('idUsuario',$idusuario);
        return $this->db->get();

        /*$this->db->select('U.idUsuario, U.login, U.password, U.tipo, U.nombres, U.primerApellido, U.segundoApellido, U.cedulaIdentidad, 
        U.telefono, U.direccion, U.estado, U.fechaRegistro, U.fechaActualizacion'); //select *
        $this->db->from('usuario U'); //tabla
        $this->db->where('U.idUsuario',$idusuario);
        return $this->db->get(); //devolucion del resultado de la consulta
            
            $this->db->select('*'); //select *
            $this->db->from('usuario'); //tabla
            $this->db->where('idUsuario',$idusuario);
            return $this->db->get(); //devolucion del resultado de la consulta*/
    }

    public function modificarusuario($idusuario,$data)
    {
        $this->db->where('idUsuario',$idusuario);
        $this->db->update('usuario',$data);
    }

    public function listausuariosdeshabilitados()
    {
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('estado','0');
        return $this->db->get();

        /*$this->db->select('U.idUsuario, U.login, U.tipo, U.nombres, U.primerApellido, U.segundoApellido, U.cedulaIdentidad, 
        U.telefono, U.direccion, U.estado, U.fechaRegistro, U.fechaActualizacion'); //select *
        $this->db->from('usuario U'); //tabla
        $this->db->where('U.estado','0');
        return $this->db->get(); //devolucion del resultado de la consulta*/
    }
}
