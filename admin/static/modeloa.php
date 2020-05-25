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

    function Servidor() {
        $pdo = (new SQLiteConnection())->connect();
        $consulta = $pdo->query('SELECT servidor,puerto,tls, remitente,autentificacion,usuario from servidor where id=1');
        $row = $consulta->fetch(PDO::FETCH_ASSOC);
        $servidor = ['servidor' => $row['servidor'], 'puerto' => $row['puerto'], 'tls' => $row['tls'], 'remitente' => $row['remitente'], 'autentificacion' => $row['autentificacion'], 'usuario' => $row['usuario']];
        return $servidor;
    }

    function cuentaDestinatarios() {
        $pdo = (new SQLiteConnection())->connect();
        //$stmt = $pdo->query("SELECT count(servidor) as server FROM servidor where id = 1;");
        $stmt = $pdo->query("SELECT count(correo) as contador FROM destinatario");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['contador'];
    }

    function verificaDestinatario($correo) {
        $pdo = (new SQLiteConnection())->connect();
        //$stmt = $pdo->query("SELECT count(servidor) as server FROM servidor where id = 1;");
        $stmt = $pdo->prepare("SELECT count(correo) as contador FROM destinatario where correo =:correo");
        $stmt->bindParam(":correo", $correo, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['contador'];
    }

    function listarDestinatarios() {
        $pdo = (new SQLiteConnection())->connect();
        //$stmt = $pdo->query("SELECT count(servidor) as server FROM servidor where id = 1;");
        $stmt = $pdo->query("SELECT id,correo FROM destinatario");
        $stmt->execute();
        $destinatarios = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $destinatarios [] = ['id' => $row['id'], 'correo' => $row['correo']];
        }
        return $destinatarios;
    }

}
