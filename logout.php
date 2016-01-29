<?php
    //On détruit la session dans laquelle les identifiants sont stockés.
    session_start();
    session_destroy();
    //On redirige l'utilisateur vers la page d'accueil.
    header("Location: ..");
    exit;
?>
