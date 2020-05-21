<?php

require_once 'SQLiteConnection.php';

class Consulta {   
    
    function validaUsuario($user, $pass) {
        $pdo = (new SQLiteConnection())->connect();
        $consulta = $pdo->prepare('select count(usuario) as cuenta from usuario where usuario= :usuario and password= :password  and id=1;');
        $consulta->bindParam(":usuario", $user, PDO::PARAM_STR);
        $consulta->bindParam(":password", $pass, PDO::PARAM_STR);
        $consulta->execute();
        return $consulta->fetchColumn();
    }

    function Radio() {
        $pdo = (new SQLiteConnection())->connect();
        $consulta = $pdo->query('select frecuencia, descripcion, silencio, volumen from radio where id=1');
        $row = $consulta->fetch(PDO::FETCH_ASSOC);
        $radio = ['frecuencia' => $row['frecuencia'], 'descripcion' => $row['descripcion'], 'silencio' => $row['silencio'], 'volumen' => $row['volumen']];
        return $radio;
    }
    
     function Baja() {
        $pdo = (new SQLiteConnection())->connect();
        $consulta = $pdo->query('select valor, estado FROM baja WHERE id = 2');
        $row = $consulta->fetch(PDO::FETCH_ASSOC);
        $baja = ['valor' => $row['valor'], 'estado' => $row['estado']];
        return $baja;
    }

}
