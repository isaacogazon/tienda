<?php

function CreaSelect($name, $opciones, $valorDefecto = '') {
    $html = "\n" . '<select name="' . $name . '">';
    foreach ($opciones as $value => $text) {
        if ($value == $valorDefecto)
            $select = 'selected="selected"';
        else
            $select = "";
        $html .= "\n\t<option value=\"$value\" $select>$text</option>";
    }
    $html .= "\n</select>";
    return $html;
}

/**
 * Coge las provincias de la base de datos
 * @return type
 */
function getProvincias() {

    $db = Conexion::getInstance();
    $mysqli = $db->getConnection();
    $mysqli->set_charset('utf8');
    $sql_query = 'SELECT cod, nombre FROM tbl_provincias';
    $result = $mysqli->query($sql_query);

    $provincia = [];
    while ($line = $result->fetch_assoc()) {
        $provincia[$line['cod']] = $line['nombre'];
    }
    return $provincia;
}