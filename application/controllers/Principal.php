<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("listadoproductos_model");
    }

    public function index() {

        /**
         * Paginacion
         * */
        $this->load->library('pagination');

        $config['base_url'] = site_url('principal/index');
        $config['total_rows'] = $this->listadoproductos_model->num_productos();
        $config['per_page'] = 6;
        //$config['uri_segment'] = 3;
        $config['num_links'] = 5;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        //Cargo todos los productos y se los paso a la vista mediante $data
        $data = array(
            'productos' => $this->listadoproductos_model->getPaginacion($config['per_page'])
        );

        $categorias = array(
            'categorias' => $this->listadoproductos_model->getCategorias()
        );

        $data['pagination'] = $this->pagination->create_links();

        /*
         * Cargar vista
         */
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside', $categorias);
        $this->load->view('listadoproductos', $data);
        $this->load->view('layouts/footer');
    }

    public function categoria($id_cat) {

        /**
         * Paginacion
         * */
        $this->load->library('pagination');

        $config['base_url'] = site_url('principal/categoria/' . $id_cat);
        $config['total_rows'] = $this->listadoproductos_model->num_productosCat($id_cat);
        $config['per_page'] = 6;
        //$config['uri_segment'] = 3;
        $config['num_links'] = 5;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);


        //Cargo todos los productos y se los paso a la vista mediante $data 
        $data = array(
            'productos' => $this->listadoproductos_model->categoria($id_cat, $config['per_page'])
        );

        $categorias = array(
            'categorias' => $this->listadoproductos_model->getCategorias()
        );

        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('layouts/header');
        $this->load->view('layouts/aside', $categorias);
        $this->load->view('listadoproductos', $data);
        $this->load->view('layouts/footer');
    }

    public function login() {
        $categorias = array(
            'categorias' => $this->listadoproductos_model->getCategorias()
        );

        $this->load->view('layouts/header');
        $this->load->view('layouts/aside', $categorias);
        $this->load->view('login');
        $this->load->view('layouts/footer');
    }

    public function registrar() {

        $this->load->model("provincias_model");

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
