<?php
require_once '../static/modelob.php';

$eliminar = new Registro();
if($eliminar->limpiaServidor()==1){
    echo 'Datos Actualizados';
} else {
 echo "Datos No Actualizados";    
}


?>