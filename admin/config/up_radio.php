<?php

session_start();
$senal = $_POST['senal'];
$descripcion = $_POST['descripcion'];
$tiempo = $_POST['tiempo'];
$volumen = $_POST['volumen'];
require '../static/modeloa.php';
require '../static/modelob.php';

$radio = (new Consulta())->Radio();


$cont = 0;
$estatus = 0;

try {
    $verifica = $senal * 10;
    if ($verifica > 880 && $verifica < 1080) {
        $estatus = 1;
    } else {
        echo "La frecuencia debe estar entre 88.1 a 107.9\n";
    }
} catch (Exception $ex) {
    echo 'Ingrese una frecuencia válida';
}
if ($estatus == 1) {
    if ($radio['frecuencia'] != $senal) {
        //TRUNCAR DATOS
        $cont = 1;
    }
    if($radio['frecuencia']!=$senal||$radio['descripcion']!=$descripcion||$radio['silencio']!=$tiempo||$radio['volumen']!=$volumen){
        $registro = new Registro();
        $registro->actualizaRadio($senal, $descripcion, $tiempo, $volumen);
        $cont = 1;
    }
}


if ($cont === 1) {
    shell_exec('sudo systemctl restart ramon.service');
    echo "Datos Actualizados";
} else {
    echo "Datos No Actualizados";
}
?>
