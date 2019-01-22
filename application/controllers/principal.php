<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	
        public function __construct() {
            parent::__construct();
            $this->load->model("listadoproductos_model");
            
            /*if(!$this->session->userdata("login")){
                redirect(base_url());
            }*/
        }
        public function index()
	{
            //Cargo todos los productos y se los paso a la vista mediante $data
            $data = array(
                'productos' => $this->getProductos(),
            );
            $this->load->view('layouts/header'); 
            $this->load->view('layouts/aside'); 
            $this->load->view('listadoproductos', $data); 
            $this->load->view('layouts/footer'); 
	}
        
        public function login(){
            $this->load->view('login'); 
        }
        
        
}
