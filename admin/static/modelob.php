<?php

require_once 'SQLiteConnection.php';

class Consulta {
    
    function validaUsuario($user, $pass) {
        $pdo = (new SQLiteConnection())->connect();
        $consulta = $pdo->prepare('SELECT count(usuario) as cuenta from usuario where usuario= :usuario and password= :password  and id=1;');
        #$resultado = $consulta->query('select * from usuario');

        #$consulta->bindParam('ss', $user, $pass);
        #$consulta->execute([':usuario' => $user,':password'=>$pass ]);
        $consulta->bindParam(":usuario",$user,PDO::PARAM_STR);
        $consulta->bindParam(":password",$pass,PDO::PARAM_STR);
        #$consulta->bindParam(":password",$pass,PDO::PARAM_STR);
        $consulta->execute();

        #$row = $consulta->fetch(\PDO::FETCH_ASSOC);
        #return $consulta;

        return $consulta->fetchColumn();
        #return $row['cuenta'];     
    }
    
    public function Test() {
        $pdo = (new SQLiteConnection())->connect();
        #$conexion = (new SQLiteConnection())->connect();
        $stmt = $pdo->query("SELECT * from usuario");
        $tables = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $tables[] = $row['usuario'];
        }
        return $tables;
    }

}
