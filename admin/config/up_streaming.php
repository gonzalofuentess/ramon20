<?php

session_start();
$servidor = $_POST['servidor'];
$puerto = $_POST['puerto'];
$montaje = $_POST['montaje'];
$password = $_POST['password'];




require_once '../static/modelob.php';
$guardar = new Registro();
if(($guardar->actualizaStreaming($servidor, $puerto, $montaje, $password))==1){
    echo "Datos Actualizados";
}else{
    echo "Datos No Actualizados";
}
#shell_exec('sudo systemctl start actualizadatos.service');

#print_r($arreglo);

#echo "Datos Actualizados";
?>
