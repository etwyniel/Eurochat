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
     echo "<div id='log'><a href='register.php'>Register</a> <a href='login.php'>Log in</a></div>";
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
            <?php if ($_GET['error'] != 'none'):?>
			<h3> Create an account:</h3><br>
			<p class="wrap">Please enter a name, a password and a valid email adress.</p>
             <form action="register.php" method="post">
                 <?php 
                 $e = $_GET['error']; 
                 switch ($e) {
                 case 'username_taken': echo "<p>This username is already in use.</p>"; 
                 break;
                 case 'username_long': echo "<p>This username is too long. Usernames must be between 4 and 16 characters.</p>";
                 break;
                 case 'username_short': echo "<p>This username is too short. Usernames must be between 4 and 16 characters.</p>";
                 break;
                 case 'password_long': echo "<p>This password is too long. Passwords must be between 8 and 20 characters.</p>";
                 break;
                 case 'password_short': echo "<p>This password is too short. Passwords must be between 8 and 20 characters.</p>";
                 break;
                 case 'email_taken': echo "<p>This email is already in use.</p>";
                 }?>
                 Username:<input type="text" name="username">
                 Password:<input type="password" name="password">
                 Email:<input type="email" name="email">
                 <input type="submit" value="Create account">
</form>
            <?php else: ?>
            <h3>Account successfully created!</h3>
            <?php endif ?>
		</div>
		<h6>&#169 Aymeric Beringer 2016 - All rights reserved</h6>
	</body>
	
</html>
