<?php

require_once '../static/modelob.php';
$comando = $_POST['comando'];

$cadena_formateada = trim($comando);

if ($cadena_formateada == NULL) {
    echo "Debe Ingresar Comando en Curl";
} else {
    if (substr($cadena_formateada, 0, 4) == 'curl') {
        if((new Registro ())->guardaComando($cadena_formateada)==1){
            echo "Datos Actualizados";
        }else{
           echo "Datos No Actualizados"; 
        }
    } else {
        echo "Debe Ingresar Comando en Curl";
    }
}
 
#echo "Datos Actualizados";

