<?php

class Categoria_model extends CI_Model {

    public function listacategorias()
    {
        $this->db->select('*');
        $this->db->from('categoria');
        $this->db->where('estado','1');
        return $this->db->get();
    }
    public function agregarcategoria($data)
    {
        $this->db->insert('categoria',$data);
    }

    public function eliminarcategoria($idcategoria)
    {
        $this->db->where('idCategoria',$idcategoria);
        $this->db->delete('categoria');
    }

    public function recuperarcategoria($idcategoria)
    {

        $this->db->select('*');
        $this->db->from('categoria');
        $this->db->where('idCategoria',$idcategoria);
        return $this->db->get();
    }

    public function modificarcategoria($idcategoria,$data)
    {
        $this->db->where('idCategoria',$idcategoria);
        $this->db->update('categoria',$data);
    }

    public function listacategoriasdeshabilitados()
    {
        $this->db->select('*');
        $this->db->from('categoria');
        $this->db->where('estado','0');
        return $this->db->get();
    }
}
