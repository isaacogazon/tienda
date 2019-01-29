<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("usuario_model");
        $this->load->library('form_validation');
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

            $this->load->model("provincias_model");


            //redirect(base_url() . 'auth');
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

        $this->form_validation->set_rules('nombre', 'Nombre', 'required', array(
            'required' => '<p class="text-danger">Es obligatorio el campo Usuario.</p>'
        ));
        $this->form_validation->set_rules('apellidos', 'Apellidos', 'required', array(
            'required' => '<p class="text-danger">Es obligatorio el campo %s.'
        ));
        $this->form_validation->set_rules('contraseña', 'Contraseña', 'required', array(
            'required' => '<p class="text-danger">Es obligatorio el campo %s.'
        ));
        $this->form_validation->set_rules('dni', 'DNI', 'required|max_length[9]|alpha_numeric', array(
            'required' => '<p class="text-danger">Es obligatorio el campo %s.',
            'max_length' => '<p class="text-danger">El campo %s no tiene formato correcto.',
            'alpha_numeric' => '<p class="text-danger">El campo %s no tiene formato correcto, solo numeros y una letra.'
            
        ));
        $this->form_validation->set_rules('telefono', 'Telefono', 'required|max_length[9]', array(
            'required' => '<p class="text-danger">Es obligatorio el campo %s.',
            'max_length' => '<p class="text-danger">El campo %s no tiene formato correcto.'
        ));
        $this->form_validation->set_rules('direccion', 'Direccion', 'required', array(
            'required' => '<p class="text-danger">Es obligatorio el campo %s.'
        ));
        $this->form_validation->set_rules('cp', 'CP', 'required|max_length[5]', array(
            'required' => '<p class="text-danger">Es obligatorio el campo %s.',
            'max_length' => '<p class="text-danger">El campo %s no tiene formato correcto.'
        ));
        $this->form_validation->set_rules('provincia', 'Provincia', 'required', array(
            'required' => '<p class="text-danger">Es obligatorio el campo %s.'
        ));
        $this->form_validation->set_rules('correo', 'Correo', 'required|valid_email', array(
            'required' => '<p class="text-danger">Es obligatorio el campo %s.',
            'valid_email' => '<p class="text-danger">El formato del %s no es correcto.'
        ));

        $nombre = $this->input->post("nombre");
        $apellidos = $this->input->post("apellidos");
        $contraseña = $this->input->post("contraseña");
        $dni = $this->input->post("dni");
        $telefono = $this->input->post("telefono");
        $direccion = $this->input->post("direccion");
        $cp = $this->input->post("cp");
        $provincia = $this->input->post("provincia");
        $correo = $this->input->post("correo");

        if ($this->form_validation->run() == FALSE) {
            $this->load->model("provincias_model");
            $provincias = array(
                'provincias' => $this->provincias_model->provincias()
            );

            $this->load->view('registrar_usuario', $provincias);
        } else {
            $this->usuario_model->registrar($nombre, $apellidos, $contraseña, $dni, $telefono, $direccion, $cp, $provincia, $correo);
            redirect(base_url() . 'principal');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url() . 'principal');
    }

}
