<?php

require_once '../static/modelob.php';
$modelo = new Registro();


$baja = $_POST['baja'];
$bajacriticaltext = $_POST['bajacriticaltext'];




if ($baja == "true") {
    $estado = 1;
} else {

    $estado = 0;
}

if($modelo->actualizaBaja($bajacriticaltext, $estado)==1){
shell_exec('sudo systemctl start actualiza.service');
sleep(1); 
shell_exec('sudo systemctl restart alertas.service');
echo "Datos Actualizados";    
}else{    
    echo "Ha ocurrido un error al actualizar";
}




?>