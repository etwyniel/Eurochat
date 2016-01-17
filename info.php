<?php
    session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<title>Eurochat</title>
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
			<a href="lobby1.html"> FRA - ENG </a> | 
			<a href="lobby2.html"> FRA - DEU </a> | 
			<a href="lobby3.html"> FRA - SPA </a> | 
			<a href="lobby4.html"> FRA - USA </a> | 
			<a href="info.php"> Info</a>
		</p>
		<br>
		<div id="side">
			<h3>Created by:</h3>
			<ul><li><a href="http://euw.leagueoflegends.com">Etwyniel</a></li><li>Aymeric</li><li>Beringer</li><li><span style="font-size: 7px">Caillou</span></li></ul>
		</div>
		<div id="main">
			<br>
			<h3>Info!</h3>
			<p>This website was brought to you by:<br></p>
			<ul>
				<li>Aymeric Beringer</li>
				<li>Hideo Kojima</li>
				<li>Raphael Caillon</li>
				<li>Edouard Baetz</li>
				<li>Hideo Kojima</li>
			</ul>
		</div>
		<h6>&#169 Aymeric Beringer 2016 - All rights reserved</h6>
	</body>
	
</html>
