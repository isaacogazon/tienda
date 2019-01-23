<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listadoproductos_model extends CI_Model {
        /**
         * Funcion que me devuelve todos los productos de la tabla productos donde su estado sea visible.
         * @return type
         */
	public function getProductos(){
            $this->db->where('estado = 1 and stock > 0');
            $resultados = $this->db->get("productos");
            return $resultados->result();
        }
        
        /**
         * Funcion que me devuelve el id y el nombre de cada una de las categorias
         * @return type 
         */
        public function getCategorias(){
            $this->db->select('id, nombre');
            $resultados = $this->db->get("categorias");
            return $resultados->result();
        }
        
        /**
         * Funcion que me da la categoria para poder coger todos los productos de ella
         * @param type $cat_id
         * @return type
         */
        public function categoria($cat_id){
            $this->db->where('categoria_id',$cat_id);
            $resultados = $this->db->get("productos");
            return $resultados->result();
        }
        
        /**
         * Funcion que me da el producto para poder mostrarlo en la pantalla de forma individual.
         * @param type $nombre
         * @return type
         */
        public function producto($nombre){
            $this->db->where('nombre', $nombre);
            $resultado = $this->db->get('productos');
            return $resultado->row();
        }
        
        
}
