<?php

// include('db.php');
include_once "db.php";

$start_script = true;

if (isset($_POST['save_task'])) {
  $title = $_POST['title'];
  $description = $_POST['description'];

  $query = $base_de_datos->prepare("INSERT INTO task(title, description, created_at) VALUES (?,?, CURRENT_TIMESTAMP)");
  $resultado = $query->execute([$title, $description]);

  // $query = "INSERT INTO task(title, description) VALUES ('$title', '$description')";


  // $result = mysqli_query($conn, $query);
  // if(!$result) {
  //   die("Query Failed.");
  // }

  $_SESSION['message'] = 'Tarea guardad correctamente';
  $_SESSION['message_type'] = 'primary';
  header('Location: index.php');

}

?>

<script src="index.js"></script>