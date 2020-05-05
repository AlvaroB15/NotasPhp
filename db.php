<?php
session_start();

            // De forma Local
            // me muestra la hora correcta, cuando lo esta en remota, se queda como en el servidor creado de amazon
// $contraseña = "root";
// $usuario = "postgres";
// $nombreBaseDeDatos = "php_mysql_crud";
// $rutaServidor = "localhost";
// $puerto = "5432";





// De forma remota
$contraseña = "218314ef88a26eec4696998743fc71739693cd49b883c63d50b6cef6cd7573e0";
$usuario = "qrujeifnhirixc";
$nombreBaseDeDatos = "dbh7halgvlf2ik";
$rutaServidor = "ec2-50-17-21-170.compute-1.amazonaws.com";
$puerto = "5432";

try {
    $base_de_datos = new PDO("pgsql:host=$rutaServidor;port=$puerto;dbname=$nombreBaseDeDatos", $usuario, $contraseña);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
}
?>
