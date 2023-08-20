<?php

    class Marca_model extends CI_Model {

        public function listamarcas()
        {
            $this->db->select('*');
            $this->db->from('marca');
            $this->db->where('estado','1');
            return $this->db->get();
        }
}
