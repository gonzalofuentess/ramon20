<?php

session_start();
$user = $_POST['user'];
$pass = $_POST['pass'];
require ('../admin/static/modelo.php');
// Crea la conexión



$consulta = new Consulta();

#$salida = ($consulta->validaUsuario('admin', 'sdsd'));
#echo $salida;
#$consulta = new Consulta();
$dato = $consulta->validaUsuario($user, $pass);

// Verifica la conexión

if ($dato == 1) {
    $_SESSION['usuario'] = $user;
    echo '<script>location.href = "./config/"</script>';
} if ($dato == 0) {
    echo '<span style="color:red;">El usuario y/o clave son incorrectas, vuelva a intentarlo</span>';
} else {
    '<span style="color:red;">Ha ocurrido un error al conectar</span>';
}
