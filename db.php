<?php
session_start();

// $conn = mysqli_connect(
//   'localhost:3306',
//   'root',
//   'root',
//   'php_mysql_crud'
// ) ;


// $conexion = pg_connect("host=ec2-50-17-21-170.compute-1.amazonaws.com
// dbname=dbh7halgvlf2ik user=qrujeifnhirixc password=218314ef88a26eec4696998743fc71739693cd49b883c63d50b6cef6cd7573e0");

// if(!conn){
//   die(mysqli_error($mysqli));
// }
// $start_script= false;

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
