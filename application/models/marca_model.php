<?php

class Marca_model extends CI_Model {

    public function listamarcas()
    {
        $this->db->select('*');
        $this->db->from('marca');
        $this->db->where('estado','1');
        return $this->db->get();
    }

    public function agregarmarca($data)
    {
        $this->db->insert('marca',$data);
    }

    public function eliminarmarca($idmarca)
    {
        $this->db->where('idMarca',$idmarca);
        $this->db->delete('marca');
    }

    public function recuperarmarca($idmarca)
    {

        $this->db->select('*');
        $this->db->from('marca');
        $this->db->where('idMarca',$idmarca);
        return $this->db->get();
    }

    public function modificarmarca($idmarca,$data)
    {
        $this->db->where('idMarca',$idmarca);
        $this->db->update('marca',$data);
    }

    public function listamarcasdeshabilitados()
    {
        $this->db->select('*');
        $this->db->from('marca');
        $this->db->where('estado','0');
        return $this->db->get();
    }


}
