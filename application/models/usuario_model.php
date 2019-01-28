<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    public function login($nombre, $contraseña) {
        $this->db->where("nombre", $nombre);
        $this->db->where("contraseña", $contraseña);

        $resultados = $this->db->get("clientes");
        if ($resultados->num_rows() > 0) {
            return $resultados->row();
        } else {
            return false;
        }
    }

    public function registrar($nombre, $apellidos, $contraseña, $dni, $telefono, $direccion, $cp, $provincia, $correo) {
        
        $datos = array(
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'contraseña' => $contraseña,
            'dni' => $dni,
            'telefono' => $telefono,
            'direccion' => $direccion,
            'cp' => $cp,
            'provincia' => $provincia,
            'correo' => $correo,
            'estado' => 1
        );
        $this->db->insert('clientes', $datos);
    }

}
