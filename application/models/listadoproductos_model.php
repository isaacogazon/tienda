<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listadoproductos_model extends CI_Model {
        /**
         * Funcion que me devuelve todos los productos de la tabla productos donde su estado sea visible.
         * @return type
         */
	public function getProductos(){
            $this->db->where("estado", "1");
            $resultados = $this->db->get("productos");
            return $resultados->result();
        }
}