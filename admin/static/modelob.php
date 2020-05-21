<?php

require_once 'SQLiteConnection.php';

class Registro {
    
    function actualizaRadio($user, $pass) {
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
    
    public function actualizaBaja($valor,$estado) {
        $pdo = (new SQLiteConnection())->connect();
        #$conexion = (new SQLiteConnection())->connect();
        $stmt = $pdo->prepare("UPDATE baja SET valor=:valor, estado=:estado WHERE id=2");
        $stmt->bindParam(":valor",$valor,PDO::PARAM_INT);
        $stmt->bindParam(":estado",$estado,PDO::PARAM_INT);
        if($stmt->execute()){
            return 1;
        }else{
            return 0;
        }        
    }

}
