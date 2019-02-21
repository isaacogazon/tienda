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
            'contraseña' => md5($contraseña),
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

    public function compruebacontraseña($correo, $contraseña) {
        $datos = $this->db->query("select contraseña as contraseña, correo as correo from clientes where id=" . $this->session->userdata('id'));

        $res = [];

        foreach ($datos->result() as $row) {
            $res['contraseña'] = $row->contraseña;
            $res['correo'] = $row->correo;
        }

        if ($res['correo'] == $correo && $res['contraseña'] == $contraseña) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function cambiacontraseña($contraseña) {
        $contra = array(
            'contraseña' => $contraseña
        );

        $this->db->where("nombre", $this->session->userdata('nombre'));
        $this->db->update('clientes', $contra);
    }

    public function dameCorreo() {
        $rs = $this->db->query("select correo from clientes where id=" . $this->session->userdata('id'));

        $reg = $rs->row();

        return $reg->correo;
    }

    public function datos() {
        $rs = $this->db->query("select nombre, apellidos, contraseña, dni, telefono, direccion, cp, provincia, correo from clientes where id=" . $this->session->userdata('id'));

        $reg = $rs->row();

        return $reg;
    }

    public function modificarDatos($nombre, $apellidos, /* $contraseña, */ $dni, $telefono, $direccion, $cp, $provincia, $correo) {
        $datos = array(
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            //'contraseña' => $contraseña,
            'dni' => $dni,
            'telefono' => $telefono,
            'direccion' => $direccion,
            'cp' => $cp,
            'provincia' => $provincia,
            'correo' => $correo
        );
        $this->db->where("nombre", $this->session->userdata('nombre'));
        $this->db->update('clientes', $datos);
    }

    public function borrarUsuario() {
        $this->db->where('id', $this->session->userdata('id'));
        $this->db->delete('clientes');
    }

}
