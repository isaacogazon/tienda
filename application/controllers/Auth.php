<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("usuario_model");
        $this->load->model("provincias_model");
        $this->load->model("listadoproductos_model");
        $this->load->library('form_validation');
    }

    public function index() {
        if ($this->session->userdata("login")) {
            redirect(site_url() . "/principal");
        } else {

            $categorias = array(
                'categorias' => $this->listadoproductos_model->getCategorias()
            );

            $this->load->view('layouts/header');
            $this->load->view('layouts/aside', $categorias);
            $this->load->view('login');
            $this->load->view('layouts/footer');

            // $this->load->view('login');
        }
    }

    public function login() {
        $nombre = $this->input->post("nombre");
        $contraseña = md5($this->input->post("contraseña"));
        $res = $this->usuario_model->login($nombre, $contraseña);

        if (!$res) {
            $this->session->set_flashdata("error", "El usuario y/o contraseña son incorrectos");
            echo $contraseña;
            $this->load->model("provincias_model");


            $categorias = array(
                'categorias' => $this->listadoproductos_model->getCategorias()
            );

            $this->load->view('layouts/header');
            $this->load->view('layouts/aside', $categorias);
            $this->load->view('login');
            $this->load->view('layouts/footer');
        } else {
            $data = array(
                'id' => $res->id,
                'nombre' => $res->nombre,
                'login' => true
            );

            $this->session->set_userdata($data);
            redirect(site_url() . '/principal');
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
            $provincias = array(
                'provincias' => $this->provincias_model->provincias()
            );

            $categorias = array(
                'categorias' => $this->listadoproductos_model->getCategorias()
            );

            $this->load->view('layouts/header');
            $this->load->view('layouts/aside', $categorias);
            $this->load->view('registrar_usuario', $provincias);
            $this->load->view('layouts/footer');
        } else {
            $this->usuario_model->registrar($nombre, $apellidos, $contraseña, $dni, $telefono, $direccion, $cp, $provincia, $correo);
            redirect(site_url() . '/principal');
        }
    }

    public function logout() {
        $data = array(
            'login' => false
        );

        $this->session->set_userdata($data);
        redirect(site_url() . '/principal');
    }

    public function modificar() {

        $this->form_validation->set_rules('correo', 'Correo', 'required|valid_email', array(
            'required' => '<p class="text-danger">Es obligatorio el campo %s.',
            'valid_email' => '<p class="text-danger">El formato del %s no es correcto.'
        ));

        $this->form_validation->set_rules('contraseña', 'Contraseña', 'required', array(
            'required' => '<p class="text-danger">Es obligatorio el campo %s.'
        ));

        $this->form_validation->set_rules('contraseñanueva', 'Contraseña', 'required', array(
            'required' => '<p class="text-danger">Es obligatorio el campo %s.'
        ));

        $this->form_validation->set_rules('confirmacontrasena', 'Contraseña', 'required|callback_contrasena_igual', array(
            'required' => '<p class="text-danger">Es obligatorio el campo %s.',
            'contrasena_igual' => '<p class="text-danger">Las contraseñas deben ser iguales.'
        ));

        $ponercorreo = $this->usuario_model->dameCorreo();

        $correo = $this->input->post("correo");
        $contraseña = md5($this->input->post("contraseña"));
        $contraseñanueva = md5($this->input->post("contraseñanueva"));
        $confirmacontraseña = md5($this->input->post("confirmacontrasena"));

        if ($this->form_validation->run() == FALSE) {

            $categorias = array(
                'categorias' => $this->listadoproductos_model->getCategorias()
            );

            $this->load->view('layouts/header');
            $this->load->view('layouts/aside', $categorias);
            $this->load->view('modificarcontrasena', ['ponercorreo' => $ponercorreo]);
            $this->load->view('layouts/footer');
        } else {
            if ($contraseñanueva == $confirmacontraseña && $this->usuario_model->compruebacontraseña($correo, $contraseña)) {

                $this->usuario_model->cambiacontraseña($contraseñanueva);
                redirect(site_url() . '/principal');
            } else {
                $categorias = array(
                    'categorias' => $this->listadoproductos_model->getCategorias()
                );

                $this->load->view('layouts/header');
                $this->load->view('layouts/aside', $categorias);
                $this->load->view('modificarcontrasena', ['ponercorreo' => $ponercorreo]);
                $this->load->view('layouts/footer');
            }
        }
    }

    /**
     * Funcion para modificar datos del usuario
     */
    public function modificarUsuario() {

        $this->form_validation->set_rules('nombre', 'Nombre', 'required', array(
            'required' => '<p class="text-danger">Es obligatorio el campo Usuario.</p>'
        ));
        $this->form_validation->set_rules('apellidos', 'Apellidos', 'required', array(
            'required' => '<p class="text-danger">Es obligatorio el campo %s.'
        ));
        /* $this->form_validation->set_rules('contraseña', 'Contraseña', 'required', array(
          'required' => '<p class="text-danger">Es obligatorio el campo %s.'
          )); */
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
        //$contraseña = $this->input->post("contraseña");
        $dni = $this->input->post("dni");
        $telefono = $this->input->post("telefono");
        $direccion = $this->input->post("direccion");
        $cp = $this->input->post("cp");
        $provincia = $this->input->post("provincia");
        $correo = $this->input->post("correo");

        if ($this->form_validation->run() == FALSE) {
            $provincias = array(
                'provincias' => $this->provincias_model->provincias()
            );

            $categorias = array(
                'categorias' => $this->listadoproductos_model->getCategorias()
            );

            $datos['datos'] = $this->usuario_model->datos();
            $datos['provincias'] = $provincias;

            $this->load->view('layouts/header');
            $this->load->view('layouts/aside', $categorias);
            $this->load->view('modificar_usuario', $datos);
            $this->load->view('layouts/footer');
        } else {
            $this->usuario_model->modificarDatos($nombre, $apellidos, /* $contraseña, */ $dni, $telefono, $direccion, $cp, $provincia, $correo);
            redirect(site_url() . '/principal');
        }
    }

    /**
     * Funcion que me comprueba si los dos campos son iguales
     * @param type $contraseña1
     * @param type $contraseña2
     * @return boolean
     */
    function contrasena_igual($contraseña1, $contraseña2) {
        $contraseña1 = $this->input->post("contraseñanueva");
        $contraseña2 = $this->input->post("confirmacontrasena");

        if ($contraseña1 == $contraseña2) {
            return true;
        }
        return FALSE;
    }

    public function baja() {
        $this->usuario_model->borrarUsuario();
        session_destroy();
        redirect(site_url() . '/principal');
    }
    
       public function recordar() {

        $this->form_validation->set_rules('correo', 'Correo', 'required|valid_email', array(
            'required' => '<p class="text-danger">Es obligatorio el campo %s.',
            'valid_email' => '<p class="text-danger">El formato del %s no es correcto.'
        ));
       // if ($this->session->userdata('login')) {
            $ponercorreo = $this->usuario_model->dameCorreo();
        //}

        $correo = $this->input->post("correo");

        if ($this->form_validation->run() == FALSE) {

            $categorias = array(
                'categorias' => $this->listadoproductos_model->getCategorias()
            );

            $this->load->view('layouts/header');
            $this->load->view('layouts/aside', $categorias);
            $this->load->view('recordarcontrasena' , ['ponercorreo' => $ponercorreo] );
            $this->load->view('layouts/footer');
        } else {
            $categorias = array(
                'categorias' => $this->listadoproductos_model->getCategorias()
            );

            $this->email->from('segundodaw2019@gmail.com', 'Isaac');
            $this->email->to($correo);
            //$this->email->cc('otro@otro-ejemplo.com');
            //$this->email->bcc('ellos@su-ejemplo.com');
            $this->email->subject('Recordatorio contraseña');
            $this->email->message('Probando la Clase Email.');
            $this->email->send();
            //echo $this->email->print_debugger();

            $this->load->view('layouts/header');
            $this->load->view('layouts/aside', $categorias);
            if ($this->session->userdata('login')) {
                $this->load->view('recordarcontrasena', ['ponercorreo' => $ponercorreo]);
            } else {
                $this->load->view('recordarcontrasena');
            }

            $this->load->view('layouts/footer');
        }
    }

}
