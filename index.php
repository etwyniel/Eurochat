<?php
    session_start();
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
		<br>
		<aside id="side">
			<h3>Created by:</h3>
			<ul>
        		 <li>Etwyniel</li>
        		 <li>Aymeric</li>
        		 <li>Beringer</li>
        		 <li><span style="font-size: 7px">Caillou</span></li>
            		</ul>
		</aside>
		<div id="main">
			<br>
			<h3> Welcome <?php echo $_SESSION['username'];?>!</h3><br>
			<p class="wrap">Welcome to this website!<br>It doesn't really serve any purpose for now...</p>
		</div>
		<footer>&#169 Aymeric Beringer 2016 - All rights reserved</footer>
	</body>
	
</html>
