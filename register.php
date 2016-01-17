<?php
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$mysqli = new mysqli('localhost', 'root', 'bdaea8ke', 'user_data');

$check_username = "SELECT * FROM credentials WHERE username = '$username'";
$check_email = "SELECT * FROM credentials WHERE email = '$email'";
if (strlen($username) < 4) {
    header('Location :register_page.php?error=username_short');
    $mysqli->close();
    exit();
} elseif (strlen($username) > 16) {
    header('Location :register_page.php?error=username_long');
    $mysqli->close();
    exit();
} elseif (strlen($password) < 8) {
    header('Location :register_page.php?error=password_short');
    $mysqli->close();
    exit();
} elseif (strlen($password) > 20) {
    header('Location :register_page.php?error=password_long');
    $mysqli->close();
    exit();
} elseif ($mysqli->query($check_username)->num_rows) {
    header('Location :register_page.php?error=username_taken');
    $mysqli->close();
    exit();
} elseif ($mysqli->query($check_email)->num_rows) {
    header('Location :register_page.php?error=email_taken');
    $mysqli->close();
    exit();
} else {
    echo 'Free username!';
    $pwd = crypt($password, 'botsrule');
    $sql = "INSERT INTO credentials (username, password, email) VALUES ('$username', '$pwd', '$email')";
    $mysqli->query($sql);
    $mysqli->close();
    header('Location :register_page.php?error=none');
    exit();
}
?>