<?php
require './static/SQLiteConnection.php';

$pdo = (new SQLiteConnection())->connect();
if ($pdo != null) {
    echo 'Connected to the SQLite database successfully!';
} else {
    echo 'Whoops, could not connect to the SQLite database!';
}



require ('../admin/static/modelo.php');

$consulta = new Consulta();

$radio =$consulta->Radio();
print_r($radio['frecuencia']);

