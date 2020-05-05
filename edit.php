<?php
include("db.php");
$title = '';
$description= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];

  $sentencia = $base_de_datos->prepare("SELECT * FROM task WHERE id=?");
  $sentencia->execute([$id]);

  $ejecutar = $sentencia->fetchObject();

  

  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $title = $row['title'];
    $description = $row['description'];
  }
  
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $title= $_POST['title'];
  $description = $_POST['description'];

  $query = "UPDATE task set title = '$title', description = '$description' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Tarea actualizada correctamente';
  $_SESSION['message_type'] = 'secondary';
  // $_SESSION['message_text'] = 'red';

  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="title" type="text" class="form-control" value="<?php echo $title; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
        <textarea name="description" class="form-control" cols="30" rows="10"><?php echo $description;?></textarea>
        </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>

















<?php
/*
CRUD con PostgreSQL y PHP
@author parzibyte [parzibyte.me/blog]
@date 2019-06-17
================================
Este archivo muestra un formulario llenado automáticamente
(a partir del ID pasado por la URL) para editar
================================
 */

if (!isset($_GET["id"])) {
    exit();
}

$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id, nombre, edad FROM mascotas WHERE id = ?;");
$sentencia->execute([$id]);
$mascota = $sentencia->fetchObject();
if (!$mascota) {
    #No existe
    echo "¡No existe alguna mascota con ese ID!";
    exit();
}

#Si la mascota existe, se ejecuta esta parte del código
?>
<?php include_once "encabezado.php"?>
<div class="row">
	<div class="col-12">
		<h1>Editar</h1>
		<form action="guardarDatosEditados.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $mascota->id; ?>">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input value="<?php echo $mascota->nombre; ?>" required name="nombre" type="text" id="nombre" placeholder="Nombre de mascota" class="form-control">
			</div>
			<div class="form-group">
				<label for="edad">Edad</label>
				<input value="<?php echo $mascota->edad; ?>" required name="edad" type="number" id="edad" placeholder="Edad de mascota" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Guardar</button>
			<a href="./listar.php" class="btn btn-warning">Volver</a>
		</form>
	</div>
</div>
<?php include_once "pie.php"?>