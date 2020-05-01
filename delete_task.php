<?php
// include("db.php");
include_once "db.php";

if(isset($_GET['id'])) {
  $id = $_GET['id'];

  $query = $base_de_datos->prepare("DELETE FROM task WHERE id = ?;");
  $resultado = $query->execute([$id]);

  if(!$resultado) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Tarea borrada correctamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}


?>
