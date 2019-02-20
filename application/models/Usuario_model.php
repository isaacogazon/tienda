<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    /**
     * Funcion que comprieba si el usuario está o no registrado.
     * @param type $nombre
     * @param type $contraseña
     * @return boolean
     */
    public function login($nombre, $contraseña) {
        $this->db->where("nombre", $nombre);
        $this->db->where("contraseña", md5($contraseña));

        $resultados = $this->db->get("clientes");
        if ($resultados->num_rows() > 0) {
            return $resultados->row();
        } else {
            return false;
        }
    }

    /**
     * Funcion para registrar datos de usuario en la base de datos siempre 
     * y cuando pasen los criterios de filtrado.
     * @param type $nombre
     * @param type $apellidos
     * @param type $contraseña
     * @param type $dni
     * @param type $telefono
     * @param type $direccion
     * @param type $cp
     * @param type $provincia
     * @param type $correo
     */
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

    /**
     * Funcion que comprueba la contrasena en la base de datos a corde al usuario recibido.
     * @param type $correo
     * @param type $contraseña
     * @return boolean
     */
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

    /**
     * Funcion que cambia contraseña en base de datos siempre y cuando
     * pasen los criterios de filtrado y las dos contraseñas de confirmacion
     * sean iguales.
     * @param type $contraseña
     */
    public function cambiacontraseña($contraseña) {
        $contra = array(
            'contraseña' => $contraseña
        );

        $this->db->where("nombre", $this->session->userdata('nombre'));
        $this->db->update('clientes', $contra);
    }
    
    /**
     * Funcion que devueve el correo del usuario registrado en sesion.
     * @return type
     */
    public function dameCorreo() {
        $rs = $this->db->query("select correo from clientes where id=" . $this->session->userdata('id'));

        $reg = $rs->row();

        return $reg->correo;
    }
    
    /**
     * Funcion que devuelve los datos del usuario registrado en sesion.
     * @return type
     */
    public function datos() {
        $rs = $this->db->query("select nombre, apellidos, contraseña, dni, telefono, direccion, cp, provincia, correo from clientes where id=" . $this->session->userdata('id'));

        $reg = $rs->row();

        return $reg;
    }

    /**
     * Funcion que modifica los datos en la base de datos siempre y cuando pasen
     * criterios de filtado.
     * @param type $nombre
     * @param type $apellidos
     * @param type $dni
     * @param type $telefono
     * @param type $direccion
     * @param type $cp
     * @param type $provincia
     * @param type $correo
     */
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
    /**
     * Funcion que borra usuario registrado en el momento.
     */
    public function borrarUsuario() {
        $this->db->where('id', $this->session->userdata('id'));
        $this->db->delete('clientes');
    }

}
