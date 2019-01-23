<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("listadoproductos_model");

        /* if(!$this->session->userdata("login")){
          redirect(base_url());
          } */
    }

    public function index() {
        //Cargo todos los productos y se los paso a la vista mediante $data
        $data = array(
            'productos' => $this->listadoproductos_model->getProductos()
        );

        $categorias = array(
            'categorias' => $this->listadoproductos_model->getCategorias()
        );
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside', $categorias);
        $this->load->view('listadoproductos', $data);
        $this->load->view('layouts/footer');
    }

    public function categoria($id_cat) {
        //Cargo todos los productos y se los paso a la vista mediante $data
        $data = array(
            'productos' => $this->listadoproductos_model->categoria($id_cat)
        );

        $categorias = array(
            'categorias' => $this->listadoproductos_model->getCategorias()
        );
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside', $categorias);
        $this->load->view('listadoproductos', $data);
        $this->load->view('layouts/footer');
    }

    public function login() {
        $this->load->view('login');
    }

    public function producto($nombre) {
        
        $categorias = array(
            'categorias' => $this->listadoproductos_model->getCategorias()
        );
        
        $data = array(
            'producto' => $this->listadoproductos_model->producto($nombre)
        );

        $this->load->view('layouts/header'); 
        $this->load->view('layouts/aside', $categorias); 
        $this->load->view('producto', $data);
        $this->load->view('layouts/footer'); 
    }

}
