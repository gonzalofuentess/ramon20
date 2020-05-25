<?php

require_once '../static/modelob.php';

$iddestinatario = $_POST['iddestinatario'];


$elimina = (new Registro())->eliminaDestinatario($iddestinatario);

if ($elimina == 1) {
    echo "Datos Actualizados";
} else {
    echo "Datos No Actualizados";
}
?>
