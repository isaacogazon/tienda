<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Carrito extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('carrito_model');
        $this->load->model("listadoproductos_model");
    }

    public function index() {
        
        $categorias = array(
            'categorias' => $this->listadoproductos_model->getCategorias()
        );
        
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside', $categorias);
        $this->load->view('carrito');
        $this->load->view('layouts/footer');
        
    }
    /**
     * Funcion que inserta productos en el carrito mediante un array
     */
    public function inserta() {
        $id = $this->input->post("id");
        $nombre = $this->input->post("nombre");
        $precio = $this->input->post("precio");
        $cantidad = $this->input->post("cantidad");

        $data = array(
            'id' => $id,
            'qty' => $cantidad,
            'price' => $precio,
            'name' => $nombre
        );
        
        $categorias = array(
            'categorias' => $this->listadoproductos_model->getCategorias()
        );
        
        $this->cart->insert($data);
        
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside', $categorias);
        $this->load->view('carrito');
        $this->load->view('layouts/footer'); 
        
    }
    
    public function mostrarCarrito(){
        $categorias = array(
            'categorias' => $this->listadoproductos_model->getCategorias()
        );
        
        $this->cart->insert($data);
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside', $categorias);
        $this->load->view('carrito');
        $this->load->view('layouts/footer');
    }
    
    public function vaciarCarrito(){
        $this->cart->destroy();
        redirect('carrito');
    }
    
    public function actualizarCarrito(){
        $data = $this->input->post();
        $this->cart->update($data);
        
        $categorias = array(
            'categorias' => $this->listadoproductos_model->getCategorias()
        );
        
        $this->cart->insert($data);
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside', $categorias);
        $this->load->view('carrito');
        $this->load->view('layouts/footer');
    }

}
