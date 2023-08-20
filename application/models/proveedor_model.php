<?php

    class Proveedor_model extends CI_Model {

        public function listaproveedores()
        {
            $this->db->select('*');
            $this->db->from('proveedor');
            $this->db->where('estado','1');
            return $this->db->get();
        }
}
