<?php
    session_start();
    session_destroy();
    header("Location: webpage.php");
    exit;
?>