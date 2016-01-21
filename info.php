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
			<a href="lobby.php?lobby=1"> FRA - ENG </a> | 
			<a href="lobby.php?lobby=2"> FRA - DEU </a> | 
			<a href="lobby.php?lobby=3"> FRA - SPA </a> | 
			<a href="lobby.php?lobby=4"> FRA - USA </a> | 
			<a href="info.php"> Info</a>
		</p>
        <?php if (!$_SESSION['logged_in']):?>
        <div id="login">
            <h3>Login:</h3>
            <form action="login.php" method="post">
                Username<input type="text" name="username">
                Password<input type="password" name="password">
                <input type="submit" value="Log in">
            </form>
            <a href="register_page.php" style="color:  white; font-size: .7em; margin-left: .6em">or create an account here</a>
        </div>
        <?php endif ?>
		<br>
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
		<footer>&#169 Aymeric Beringer 2016 - All rights reserved</footer>
	</body>
	
</html>
