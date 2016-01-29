<?php
    session_start();

    
    $lobby = $_POST['lobby'];
    $log = "log" . $lobby . ".txt";
    $message = $_POST['message'];
    echo $message;

    $file = fopen($log, 'a');
    $toSend = $_SESSION['username'] . ': ' . $message . '
';
    fwrite($file, $toSend);
    fclose($file);
?>
