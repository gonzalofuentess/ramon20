<?php

require_once '../static/modelob.php';

if ((new Registro ())->eliminaStreaming()== 1) {
    echo 'Datos Actualizados';
} else {
    echo 'Datos No Actualizados';
}


#echo "Datos Actualizados";
?>