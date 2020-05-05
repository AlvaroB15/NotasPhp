<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>PHP CRUD MYSQL</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <meta name="google-site-verification" content="9NOxi-n_px-5JH2MzkxAt-BQI6mBMaTLkTHiISmg4Fg" />
    
    <!-- BOOTSTRAP 4 -->
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <!-- FONT AWESOEM -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  </head>
  <body>
    <?php
      include('login.php');
    ?>

    <nav class="navbar navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="index.php"><strong>INICIO</strong></a>

        <?php
          //This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
          if(!isset($_SESSION['access_token'])){
              //Create a URL to obtain user authorization
              // $login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="sign-in-with-google.png" /></a>';
              $login_button = '<a class="navbar-brand" href="'.$google_client->createAuthUrl().'" ><strong>LOGIN</strong></a>';
              // $login_button = ' <button type="button" class="btn btn-outline-info btn-lg" onclick = " location.href= "'.$google_client->createAuthUrl().'" ">Logeate con Google</button>';
          }
        ?>

        <a class="navbar-brand" href="logout.php"><strong>LOGOUT</strong></a>

        <!-- <a class="navbar-brand" href="'.$google_client->createAuthUrl().'" ><strong>LOGIN</strong></a> -->
        <!-- <a class="navbar-brand" href=""><strong>REGISTRAR</strong></a> -->
        <!-- <div class="container">
          <a href="login.php">Login</a>
        </div> -->

      </div>

      
    </nav>
