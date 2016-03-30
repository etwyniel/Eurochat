<?php
    //On récupère le nom de l'utilisateur et le message passés en POST
    $username = $_POST['username'];
    $message = htmlspecialchars($_POST['message'], ENT_QUOTES);
    
    //On crée une connexion à la base de données MySQL distante
    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

    $db_server = $url["host"];
    $db_username = $url["user"];
    $db_password = $url["pass"];
    $db = substr($url["path"], 1);

    $mysqli = new mysqli($db_server, $db_username, $db_password, $db);
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
