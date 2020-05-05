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





<?php

#Salir si alguno de los datos no está presente
if (
    !isset($_POST["nombre"]) ||
    !isset($_POST["edad"]) ||
    !isset($_POST["id"])
) {
    exit();
}

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id = $_POST["id"];
$nombre = $_POST["nombre"];
$edad = $_POST["edad"];

$sentencia = $base_de_datos->prepare("UPDATE mascotas SET nombre = ?, edad = ? WHERE id = ?;");
$resultado = $sentencia->execute([$nombre, $edad, $id]); # Pasar en el mismo orden de los ?
if ($resultado === true) {
    header("Location: listar.php");
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario";
}













































<?php
    //index.php

    //Include Configuration File
    include('config.php');

    $login_button = '';

    //This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
    if(isset($_GET["code"])){

        //It will Attempt to exchange a code for an valid authentication token.
        $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

        //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
        if(!isset($token['error'])){

            //Set the access token used for requests
            $google_client->setAccessToken($token['access_token']);

            //Store "access_token" value in $_SESSION variable for future use.
            $_SESSION['access_token'] = $token['access_token'];

            //Create Object of Google Service OAuth 2 class
            $google_service = new Google_Service_Oauth2($google_client);

            //Get user profile data from google
            $data = $google_service->userinfo->get();

            //Below you can find Get profile data and store into $_SESSION variable
            if(!empty($data['given_name'])){
            $_SESSION['user_first_name'] = $data['given_name'];
            }

            if(!empty($data['family_name'])){
            $_SESSION['user_last_name'] = $data['family_name'];
            }

            if(!empty($data['email'])){
            $_SESSION['user_email_address'] = $data['email'];
            }

            if(!empty($data['gender'])){
            $_SESSION['user_gender'] = $data['gender'];
            }

            if(!empty($data['picture'])){
            $_SESSION['user_image'] = $data['picture'];
            }

        }
    }

    //This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
    if(!isset($_SESSION['access_token'])){
        //Create a URL to obtain user authorization
        // echo "<a href='".$client->createAuthUrl()."'>Google Login</a>";
        // $login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="sign-in-with-google.png" /></a>';


        // $login_button = '<a href="'.$google_client->createAuthUrl().'">Google Login</a>';
        // $login_button = '<a href="'.$google_client->createAuthUrl().'">Google Login</a>';

        $login_button = ' <button type="button" class="btn btn-outline-info btn-lg" onclick = " location.href= "'.$google_client->createAuthUrl().'" ">Logeate con Google</button>';
        

        <!-- <button>  <a href="www.google.com.pe"></a>TOCAME</button> -->
        <button type="button" class="btn btn-outline-info btn-lg" onclick="location.href='https://www.facebook.com'">Llévame a otro lado</button>
        <!-- <button type="button" class="btn btn-info btn-lg">Large button</button> -->
        <!-- <button type="button" class="btn btn-outline-info">Logeate con Google</button> -->
    


    }

?>

<html>
    <head>
    
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>PHP Login using Google Account</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport'/>

        <meta name="google-site-verification" content="9NOxi-n_px-5JH2MzkxAt-BQI6mBMaTLkTHiISmg4Fg" />

        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    </head>

    <body>
        <div class="container">
            <br />
            <h2 align="center">PHP Login using Google Account</h2>
            <br />

            <div class="panel panel-default">
                <?php
                if($login_button == '')
                {
                    echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
                    echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
                    echo '<h3><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
                    echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
                    echo '<h3><a href="logout.php">Logout</h3></div>';
                }
                else
                {
                    echo '<div align="center">'.$login_button . '</div>';
                }
                ?>
            </div>

        </div>

    </body>
</html>