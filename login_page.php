<?php
    session_start();
    session_destroy();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<title>Eurochat</title>
        <link rel="shortcut icon" href="http://sstatic.net/stackoverflow/img/favicon.ico">
	</head>
	<body>
		<div  id="header"><a href="index.php">
			<h1>EuroChat</h1>
			<h2>An efficient way of communicating between penfriends</h2>
		</a></div>
            <?php if ($_SESSION['logged_in']) {
     echo "<div id='log'><a href='logout.php'>Log out</a></div>";
 } else {
     echo "<div id='log'><a href='register_page.php'>Register</a> <a href='login_page.php'>Log in</a></div>";
 }?>
		<p id="links">
			<a href="index.php">Home</a> | 
			<a href="lobby.php?lobby=1"> FRA - ENG </a> | 
			<a href="lobby.php?lobby=2"> FRA - DEU </a> | 
			<a href="lobby.php?lobby=3"> FRA - SPA </a> | 
			<a href="lobby.php?lobby=4"> FRA - USA </a> | 
			<a href="info.php"> Info</a>
		</p>
        <?php
            $e = $_GET['error'];
            switch ($e) {
                case 'no_username':
                echo "<p>Please enter your username.</p>";
                break;
            case 'no_pwd':
                echo "<p>Please enter your password.</p>";
                break;
            case 'unregistered':
                echo "<p>Uknown account.</p>";
                break;
            case 'wrong_pwd':
                echo "<p>Wrong password.</p>";
                break;
            }
        ?>
		<br>
		<div id="main">
			<br>
			<h3>Log in using your credentials:</h3><br>
             <form style="margin: auto" action="login.php" method="post">
                 Username:<input type="text" name="username" autocomplete="off" autofocus="true">
                 Password:<input type="password" name="password">
                <input type="submit" value="Log in" onkeypress="enter">
             </form>
		</div>
		<footer>&#169 Aymeric Beringer 2016 - All rights reserved</footer>
	</body>
	
</html>
