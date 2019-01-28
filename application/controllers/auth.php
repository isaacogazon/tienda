<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("usuario_model");
    }

    public function index() {
        if ($this->session->userdata("login")) {
            redirect(base_url() . "principal");
        } else {
            $this->load->view('login');
        }
    }

    public function login() {
        $nombre = $this->input->post("nombre");
        $contraseña = $this->input->post("contraseña");
        $res = $this->usuario_model->login($nombre, $contraseña);

        if (!$res) {
            $this->session->set_flashdata("error", "El usuario y/o contraseña son incorrectos");
            redirect(base_url() . 'auth');
        } else {
            $data = array(
                'id' => $res->id,
                'nombre' => $res->nombre,
                'login' => true
            );

            $this->session->set_userdata($data);
            redirect(base_url() . 'principal');
        }
    }

    public function registrar() {

            $nombre = $this->input->post("nombre");
            $apellidos = $this->input->post("apellidos");
            $contraseña = $this->input->post("contraseña");
            $dni = $this->input->post("dni");
            $telefono = $this->input->post("telefono");
            $direccion = $this->input->post("direccion");
            $cp = $this->input->post("cp");
            $provincia = $this->input->post("provincia");
            $correo = $this->input->post("correo");

            $this->usuario_model->registrar($nombre, $apellidos, $contraseña, $dni, $telefono, $direccion, $cp, $provincia, $correo);

            redirect(base_url() . 'principal');
        
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url() . 'principal');
    }

}
