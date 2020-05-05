<?php include("db.php"); ?>

<?php  ?>

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
                    <form id="task-form" action="save_task.php " method="POST">
                    
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
                        // $sentencia = $base_de_datos->query("SELECT title, description, TO_TIMESTAMP(created_at, 'YYYY-MM-DD HH12:MI:SS') FROM task");
                        $mascotas = $sentencia->fetchAll(PDO::FETCH_OBJ);

                        foreach($mascotas as $mascota){
                    ?>
                    
                    <tr>
                        <td><?php echo $mascota->title ?></td>
                        <td><?php echo $mascota->description ?></td>
                        <td><?php 
                            
                            $m = $mascota->created_at;
                            echo $m;
                              ?> </td>
                        <td>
                            <!-- estara abajo lo q deba poner cuando desarrolle el editar -->
                            <!-- edit.php?id=<?php //echo $mascota->id?> -->
                            <a href="" class="btn btn-secondary">
                                <i class="fas fa-marker"></i>
                            </a>
                            <!-- s -->
                            <a href="edit.php?id=<?php echo $mascota->id?>" class="btn btn-secondary">
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

    <?php 
        $request = '{
            "api_key":"f22f8c8bee544a719eb6b799aca51c36",
            "messages":[
                {
                    "from":"GOOD PIZZA",
                    "to":"937810661",
                    "text":"Hi John, today 2x1 in pizzas, watch the game like a boss with our new pepperoni pizza!",
                    "send_at":"2018-02-18 17:30:00"
                }
            ]
        }';
                    
        $headers = array('Content-Type: application/json');        	
        
        $ch = curl_init('https://api.gateway360.com/api/3.0/sms/send');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
        
        $result = curl_exec($ch);
         
        if (curl_errno($ch) != 0 ){
            die("curl error: ".curl_errno($ch));
        }   
    
    ?>


</main>

<?php include('includes/footer.php'); ?>


