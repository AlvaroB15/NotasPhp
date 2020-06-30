<?php include("db.php"); ?>

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
                            <label for="titulo">TITULO: </label>
                            <input type="text" name="title" class="form-control" placeholder="Titulo de la nota" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">DESCRIPCION: </label>
                            <textarea name="description" rows="2" class="form-control" placeholder="Descripcion de la Nota"></textarea>
                        </div>

                        <input type="submit" name="save_task" class="btn btn-success btn-block" value="Save Task">
                    </form>
                    <p><button onclick="geoFindMe()">Show my location</button></p>
                    <div id="out"></div>
                    <script>
                        function geoFindMe() {
                            var output = document.getElementById("out");

                            if (!navigator.geolocation) {
                                output.innerHTML = "<p>Geolocation is not supported by your browser</p>";
                                return;
                            }

                            function success(position) {
                                var latitude = position.coords.latitude;
                                var longitude = position.coords.longitude;

                                output.innerHTML = '<p>Latitude is ' + latitude + '° <br>Longitude is ' + longitude + '°</p>';

                                var img = new Image();
                                img.src = "http://maps.googleapis.com/maps/api/staticmap?center=" + latitude + "," + longitude + "&zoom=13&size=300x300&sensor=false";

                                output.appendChild(img);
                            };

                            function error() {
                                output.innerHTML = "Unable to retrieve your location";
                            };

                            output.innerHTML = "<p>Locating…</p>";

                            navigator.geolocation.getCurrentPosition(success, error);
                        }
                    </script>
                    
                    
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
                    $query = "SELECT * FROM task";
                    $result_tasks = mysqli_query($conn, $query);    
                    while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                    <tr>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                <i class="fas fa-marker"></i>
                            </a>
                            <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
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
