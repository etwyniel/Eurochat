<?php
$servername = 'sql4.freemysqlhosting.net';
$username = 'sql4103349';
$password = 'ugtSzWBZrY';
$database = 'sql4103349';


/*$db = new mysqli($servername, $username, $password);
if($db->query("CREATE DATABASE data")){

    echo 'works?<br>';
   "Failed creating new database: ".$db->connect_errno();
    die();

}*/

echo 'Still alive<br>';

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
//$sql = "CREATE DATABASE IF NOT EXISTS myDB";
//if (mysqli_query($conn, $sql)) {
    echo "Database created successfully<br>";
    mysqli_query($conn, 'USE myDB');
    echo mysqli_error($conn);
    $sql = "CREATE TABLE IF NOT EXISTS message (
    username VARCHAR(16) NOT NULL PRIMARY KEY,
    message VARCHAR(140) NOT NULL,
    reg_date TIMESTAMP
    )";

    if (mysqli_query($conn, $sql)) {
        echo 'Table created';
    } else {
        echo 'Could not create table<br>'. mysqli_error($conn);
    }
/*} else {
    echo "Error creating database: " . mysqli_error($conn);
}*/

mysqli_close($conn);
?> 
