<?php

require_once '../static/modelob.php';

$correo = $_POST['correo'];

if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    $ejecutar = (new Registro())->guardaDestinatario($correo);
    if ($ejecutar == 2) {
        echo "Ha alcanzado el máximo de destinatarios permitidos";
    } elseif ($ejecutar == 3) {
        echo "Destinatario ya existe ingrese otro correo";
    } elseif ($ejecutar == 1) {
        echo "Datos Actualizados";
    } else {
        echo "Datos No Actualizados";
    }
} else {
    echo "!Ingrese un correo en formato Válido¡";
}
?>
