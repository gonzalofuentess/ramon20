<?php

require_once 'SQLiteConnection.php';
class Registro {

    function actualizaRadio($frec, $desc, $tiempo, $vol) {
        $pdo = (new SQLiteConnection())->connect();
        $stmt = $pdo->prepare("UPDATE radio SET frecuencia=:frec, descripcion=:desc,silencio=:sile,volumen=:vol where id=1");
        $stmt->bindParam(":frec", $frec, PDO::PARAM_STR);
        $stmt->bindParam(":desc", $desc, PDO::PARAM_STR);
        $stmt->bindParam(":sile", $tiempo, PDO::PARAM_INT);
        $stmt->bindParam(":vol", $vol, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return 1;
        } else {
            return 0;
        }
    }
    function actualizaBaja($valor, $estado) {
        $pdo = (new SQLiteConnection())->connect();
        $stmt = $pdo->prepare("UPDATE baja SET valor=:valor, estado=:estado WHERE id=2");
        $stmt->bindParam(":valor", $valor, PDO::PARAM_INT);
        $stmt->bindParam(":estado", $estado, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return 1;
        } else {
            return 0;
        }
    }
    function guardaServidor($datos) {
        $pdo = (new SQLiteConnection())->connect();
        if ($datos['autenticacion'] == 0) {
            $stmt = $pdo->prepare("UPDATE servidor SET servidor=:servidor, puerto=:puerto,"
                    . "tls=:tls,remitente=:remitente,autentificacion=0,usuario=NULL, "
                    . "clave=NULL WHERE id=1");
            $stmt->bindParam(":servidor", $datos['servidor'], PDO::PARAM_STR);
            $stmt->bindParam(":puerto", $datos['puerto'], PDO::PARAM_INT);
            $stmt->bindParam(":tls", $datos['starttls'], PDO::PARAM_INT);
            $stmt->bindParam(":remitente", $datos['remitente'], PDO::PARAM_STR);
            if ($stmt->execute()) {
                return 1;
            } else {
                return 0;
            }
        }if ($datos['autenticacion'] == 1) {
            $stmt = $pdo->prepare("UPDATE servidor SET servidor=:servidor, puerto=:puerto,"
                    . "tls=:tls,remitente=:remitente,autentificacion=1,usuario=:usuario, "
                    . "clave=:clave WHERE id=1");
            $stmt->bindParam(":servidor", $datos['servidor'], PDO::PARAM_STR);
            $stmt->bindParam(":puerto", $datos['puerto'], PDO::PARAM_INT);
            $stmt->bindParam(":tls", $datos['starttls'], PDO::PARAM_INT);
            $stmt->bindParam(":remitente", $datos['remitente'], PDO::PARAM_STR);
            $stmt->bindParam(":usuario", $datos['remitente'], PDO::PARAM_STR);
            $stmt->bindParam(":clave", $datos['remitente'], PDO::PARAM_STR);
            if ($stmt->execute()) {
                return 1;
            } else {
                return 0;
            }
        }
    }
    function limpiaServidor() {
        $pdo = (new SQLiteConnection())->connect();
        $stmt = $pdo->query("UPDATE servidor SET servidor=NULL, puerto=NULL,"
                . "tls=NULL,remitente=NULL,autentificacion=NULL,usuario=NULL, "
                . "clave=NULL WHERE id=1");
        if ($stmt->execute()) {
            return 1;
        } else {
            return 0;
        }
    }
    function guardaDestinatario($correo) {
        require 'modeloa.php';
        $contador = new Consulta();
        if ($contador->cuentaDestinatarios() < 6) {
            if ($contador->verificaDestinatario($correo) == 1) {
                return 3;
            } else {
                $pdo = (new SQLiteConnection())->connect();
                $stmt = $pdo->prepare("INSERT INTO destinatario(correo) values(:correo)");
                $stmt->bindParam(":correo", $correo, PDO::PARAM_STR);
                if ($stmt->execute()) {
                    return 1;
                } else {
                    return 0;
                }
            }
        } else {
            return 2;
        }
    }
    function eliminaDestinatario($id){
        $pdo = (new SQLiteConnection())->connect();
        $stmt = $pdo->prepare("DELETE from destinatario where id=:id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return 1;
        } else {
            return 0;
        }        
    }
    function guardaComando($comando){
        $pdo = (new SQLiteConnection())->connect();
        $stmt = $pdo->prepare("update comando set comando=:comando");
        $stmt->bindParam(":comando", $comando, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return 1;
        } else {
            return 0;
        }  
    }
}
