<?php
$username = htmlspecialchars($_POST['username'], ENT_QUOTES);
$password = $_POST['password'];
$email = htmlspecialchars($_POST['email'], ENT_QUOTES);

$mysqli = new mysqli('sql4.freemysqlhosting.net', 'sql4103349', 'ugtSzWBZrY', 'sql4103349');

/*if ($mysqli->connect_errno > 0) {
    header('Location: ../newDB');
}*/

$check_username = "SELECT * FROM credentials WHERE username = '$username'";
$check_email = "SELECT * FROM credentials WHERE email = '$email'";
if (strlen($username) < 4) {
    header('Location: ../register?error=username_short');
    $mysqli->close();
    exit();
} elseif (strlen($username) > 16) {
    header('Location: ../register?error=username_long');
    $mysqli->close();
    exit();
} elseif (strlen($password) < 8) {
    header('Location: ../register?error=password_short');
    $mysqli->close();
    exit();
} elseif (strlen($password) > 20) {
    header('Location: ../register?error=password_long');
    $mysqli->close();
    exit();
} elseif ($mysqli->query($check_username)->num_rows) {
    header('Location: ../register?error=username_taken');
    $mysqli->close();
    exit();
} elseif ($mysqli->query($check_email)->num_rows) {
    header('Location: ../register?error=email_taken');
    $mysqli->close();
    exit();
} else {
    $pwd = crypt($password, 'botsrule');
    $sql = "INSERT INTO credentials (username, password, email) VALUES ('$username', '$pwd', '$email')";
    $mysqli->query($sql);
    $mysqli->close();
    if ($mysqli->error) {
        header('Location: ../register?error=format')
    }
    header('Location: ../register?error=none');
    exit();
}
?>
