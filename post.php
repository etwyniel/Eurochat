<?php
    //On récupère le nom de l'utilisateur et le message passés en POST
    $username = $_POST['username'];
    $message = htmlspecialchars($_POST['message'], ENT_QUOTES);
    
    //On crée une connexion à la base de données MySQL distante
    $mysqli = new mysqli($_ENV["DB_SERVER"], $_ENV["DB_user"], $_ENV["DB_PASSWORD"], $_ENV["DB_USER"]);
    //On crée un requête pour ajouter un message sur la base de données
    $query = "INSERT INTO message (username, message) VALUES ('$username', '$message')";

    //Si la requête est effectuée sans problème, l'utilisateur est redirigé vers la page d'accueil.
    //Sinon, il recoit un message d'erreur.
    if (mysqli_query($mysqli, $query)) {
        echo 'Success';
        header('Location: ..');
    } else {
        echo 'Could not post message.<br>';
        echo mysqli_error($mysqli );
    }
    //On ferme la connexion avec la base de données.
    mysqli_close($mysqli);
?>
