<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listadoproductos_model extends CI_Model {
        
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
        public function categoria($cat_id, $num_por_pag){
            $this->db->where('categoria_id',$cat_id);
            $resultados = $this->db->get("productos", $num_por_pag, $this->uri->segment(3));
            return $resultados->result();
        }
        
        /**
         * Funcion que devuelve numero de productos para la paginacion
         * @return type int
         */
        public function num_productosCat($cat_id){
            $num = $this->db->query("select count(*) as num from productos where categoria_id=".$cat_id)->row()->num;
            return intval($num);
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
        /**
         * Funcion que devuelve numero de productos para la paginacion
         * @return type int
         */
        public function num_productos(){
            $num = $this->db->query("select count(*) as num from productos")->row()->num;
            return intval($num);
        }
        
        /**
         * Funcion para pagiacion
         * @param type $num_por_pag
         * @return type 
         */
        public function getPaginacion($num_por_pag){
            $this->db->where('estado = 1 and stock > 0');
            $resultados = $this->db->get("productos", $num_por_pag, $this->uri->segment(3));
            return $resultados->result();
        }
        
}
