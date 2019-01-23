<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listadoproductos_model extends CI_Model {
        /**
         * Funcion que me devuelve todos los productos de la tabla productos donde su estado sea visible.
         * @return type
         */
	public function getProductos(){
            $this->db->where('estado','1');
            $resultados = $this->db->get("productos");
            return $resultados->result();
        }
        
        public function getCategorias(){
            $this->db->select('id, nombre');
            $resultados = $this->db->get("categorias");
            return $resultados->result();
        }
        
        public function categoria($cat_id){
            $this->db->where('categoria_id',$cat_id);
            $resultados = $this->db->get("productos");
            return $resultados->result();
        }
        
        
}
