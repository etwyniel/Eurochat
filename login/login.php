<?php
    //On récupère le nom d'utilisateur, et on l'encode pour éviter les caractères spéciaux
    $username = htmlspecialchars($_POST['username'], ENT_QUOTES);
    //On récupère le mot de passe
    $password = $_POST['password'];
    
    //On crée une connection à la base de donnée contenant les identifiants
    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

    $db_server = $url["host"];
    $db_username = $url["user"];
    $db_password = $url["pass"];
    $db = substr($url["path"], 1);

    $mysqli = new mysqli($db_server, $db_username, $db_password, $db);
    
    //On fait une requête avec le nom d'utilisateur
    $check_username = "SELECT * FROM credentials WHERE username = '$username'";
    $r = $mysqli->query($check_username);
    echo $r->num_rows;
    if ($r != false) {
        $a = $r->fetch_assoc();
    }

   if (!$username) {
        //Si aucun nom d'utilisateur n'a été donné, on redirige l'utilisateur vers la page de connexion
        header("Location: ../login?error=no_username");
        $mysqli->close();
        exit();
    } elseif (!$password) {
        //Si aucun mot de passe n'a été donné, on redirige l'utilisateur vers la page de connexion
        header("Location: ../login?error=no_pwd");
        $mysqli->close();
        exit();
    } elseif (!$r->num_rows) {
        //Si on ne trouve pas le nom de l'utilisateur dans la base de données, on redirige l'utilisateur vers la page de connexion
        header('Location: ../login?error=unregistered');
        $mysqli->close();
        exit();
    } elseif ($a['password'] != crypt($password, 'botsrule')) {
        //Si les mots de passe ne correspondent pas, on redirige l'utilisateur vers la page de connexion
        header('Location: ../login?error=wrong_pwd');
        $mysqli->close();
        exit();
    } else {
        //Si les identifiants sont corrects, on connecte l'utilisateur au site et on le redirige vers ka page d'accueil
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['logged_in'] = TRUE;
        header("Location: ../");
        exit();
    }
?>
