<?php
    $username = $_POST['username'];
    $password = $_POST['password'];

    $mysqli = new mysqli('sql4.freemysqlhosting.net', 'sql4103349', 'ugtSzWBZrY', 'sql4103349');
    $check_username = "SELECT * FROM credentials WHERE username = '$username'";
    $r = $mysqli->query($check_username);
    echo $r->num_rows;
    $a = $r->fetch_assoc();
    echo '<br>' . $a['password'];
    echo '<br>' . crypt($password, 'botsrule');

   if (!$username) {
        header("Location: ../login?error=no_username");
        $mysqli->close();
        exit();
    } elseif (!$password) {
        header("Location: ../login?error=no_pwd");
        $mysqli->close();
        exit();
    } elseif (!$r->num_rows) {
        header('Location: ../login?error=unregistered');
        $mysqli->close();
        exit();
    } elseif ($a['password'] != crypt($password, 'botsrule')) {
        header('Location: ../login?error=wrong_pwd');
        $mysqli->close();
        exit();
    } else {
        session_start();
        $_SESSION['password'] = $password;
        $_SESSION['username'] = $username;
        $_SESSION['logged_in'] = TRUE;
        header("Location: ../");
        exit();
    }
?>