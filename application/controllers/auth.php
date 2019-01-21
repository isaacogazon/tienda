<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
            parent::__construct();
            $this->load->model("usuario_model");
        }

        public function index()
	{
            if($this->session->userdata("login")){
                redirect(base_url()."principal");
            }
            else{
		$this->load->view('login'); 
            }
	}
        
        public function login(){
            $nombre = $this->input->post("nombre");
            $contraseña = $this->input->post("contraseña");
            $res = $this->usuario_model->login($nombre, $contraseña);
            
            if(!$res){
                redirect(base_url());
            }
            else{
                $data = array(
                    'id' => $res->id,
                    'nombre' => $res->nombre,
                    'login' => true
                );
                
                $this->session->set_userdata($data);
                redirect(base_url().'principal');
            }
        }

        public function logout(){
            $this->session->sess_destroy();
            redirect(base_url());
        }
}
