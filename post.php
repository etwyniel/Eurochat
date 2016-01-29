<?php
    $username = $_POST['username'];
    $message = htmlspecialchars($_POST['message']);

    $mysqli = new mysqli('sql4.freemysqlhosting.net', 'sql4103349', 'ugtSzWBZrY', 'sql4103349');
    $query = "INSERT INTO message (username, message) VALUES ('$username', '$message')";

    if (mysqli_query($mysqli, $query)) {
        echo 'Success';
        header('Location: ..');
    } else {
        echo 'Could not post message.<br>';
        echo mysqli_error($mysqli );
    }
    mysqli_close($mysqli);
?>
