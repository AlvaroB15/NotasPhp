<?php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('352759389830-r7ba3haoequa6mojg4qj3k3agupcs0du.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('Buw9RgVsN22tt1HdjKKfebIp');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('https://autenticacion-google.herokuapp.com/');

//
$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page
session_start();

?>