<?php
    require_once 'vendor/autoload.php';

    $google_client = new Google_Client();

    $google_client->setClientId('352759389830-r7ba3haoequa6mojg4qj3k3agupcs0du.apps.googleusercontent.com');

    $google_client->setClientSecret('Buw9RgVsN22tt1HdjKKfebIp');
    
    $google_client->setRedirectUri('http://localhost:8080/notasPhp/index.php');
    
    $google_client->addScope('email');
    
    $google_client->addScope('profile');

    session_start();

?>