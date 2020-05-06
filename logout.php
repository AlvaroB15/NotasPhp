<?php

    //logout.php

    include('config.php');

    //Reset OAuth access token
    $google_client->revokeToken();

    $terminar = false;

    //Destroy entire session data.
    session_destroy();

    //redirect page to index.php
    header('location:index.php');


?>