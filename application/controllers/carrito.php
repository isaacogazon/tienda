<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Carrito extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('carrito_model');
    }

    public function index() {
        $this->load->view('carrito');
        
    }

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
        $this->cart->insert($data);
        $this->load->view('carrito');
        
    }
    
    public function mostrarCarrito(){
        $this->load->view('carrito');
    }
    
    public function vaciarCarrito(){
        $this->cart->destroy();
        redirect('carrito');
    }
    
    public function actualizarCarrito(){
        $data = $this->input->post();
        $this->cart->update($data);
        $this->load->view('carrito');
    }

}
