<?php include("db.php"); ?>

<?php date_default_timezone_set("America/Lima"); ?>

<?php include('includes/header.php'); ?>

<main>
    <div class="container p-3">
        <div class="row">
            <div class="col">
                <!-- MESSAGES -->

                <?php if (isset($_SESSION['message'])) { ?>

                <div class="alert alert-<?= $_SESSION['message_type']?> 
                    alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php session_unset(); } ?>

                <!-- ADD TASK FORM -->
                <div class="card card-body">
                    <form action="save_task.php" method="POST">
                    
                        <div class="form-group">
                            <label for="titulo">TITULOSS: </label>
                            <input type="text" name="title" class="form-control" placeholder="Titulo de la nota" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">DESCRIPCION: </label>
                            <textarea name="description" rows="2" class="form-control" placeholder="Descripcion de la Nota"></textarea>
                        </div>

                        <input type="submit" name="save_task" class="btn btn-success btn-block" value="Save Task">
                    </form>
                </div>

            </div>
        </div>
    </div>


    <!-- https://stackoverflow.com/questions/50705636/bootstrap-4-table-responsive-horizontal-and-vertical-scroll -->
    <!-- https://v4-alpha.getbootstrap.com/content/tables/#responsive-tables -->
    
    <div class="container p-3">
        <div class="col table-responsive">
            <table class="table table-bordered  table-striped table-bordered ">
                <thead>
                    <tr>
                        <th>Titulo </th>
                        <th>Descripcion</th>
                        <th>Fecha creada</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include_once "db.php";
                        $sentencia = $base_de_datos->query("SELECT * FROM task");
                        $mascotas = $sentencia->fetchAll(PDO::FETCH_OBJ);
                        foreach($mascotas as $mascota){
                    ?>
                    
                    <tr>
                        <td><?php echo $mascota->title ?></td>
                        <td><?php echo $mascota->description ?></td>
                        <td><?php  $tiempo= $mascota->created_at;
                        $time = $tiempo->format('d-m-Y h:i:s'); echo $time ?>
                         </td>
                        <td>
                            <!-- estara abajo lo q deba poner cuando desarrolle el editar -->
                            <!-- edit.php?id=<?php //echo $mascota->id?> -->
                            <a href="" class="btn btn-secondary">
                                <i class="fas fa-marker"></i>
                            </a>
                            <a href="delete_task.php?id=<?php echo $mascota->id?>" class="btn btn-danger">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>    
    </div>
</main>

<?php include('includes/footer.php'); ?>


