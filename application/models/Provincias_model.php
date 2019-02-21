<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Provincias_model extends CI_Model {

    public function provincias() {
        $this->db->select('cod, nombre');
        $provincias = $this->db->get('tbl_provincias');

        $res = [];

        foreach ($provincias->result() as $row) {
            $res[$row->cod] = $row->nombre;
        }
        return $res;
    }

}
