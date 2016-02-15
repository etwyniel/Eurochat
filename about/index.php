<?php
    session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
        <meta name="description" content="PLZ">
		<link rel="stylesheet" type="text/css" href="../stylesheet.css" />
		<title>Eurochat</title>
        <link rel="shortcut icon" href="../pouletwyniel.ico">
	</head>
	<body>
		<div  id="header"><a href="..">
			<h1>EuroChat</h1>
        <?php if ($_SESSION['logged_in']) {
     echo "<div id='log'><a href='../logout.php'>Log out</a></div>";
 } else {
     echo "<div id='log'><a href='../register'>Register</a> or <a href='../login'>Log in</a></div>";
 }?>
			<h2>An efficient way of communicating between penfriends</h2>
		</a></div>
		<p id="links">
			<a href="..">Home</a> &emsp;| &emsp;
			<a href="../lobby?lobby=1"> FRA - ENG </a> &emsp;| &emsp;
			<a href="../lobby?lobby=2"> FRA - DEU </a> &emsp;| &emsp;
			<a href="../lobby?lobby=3"> FRA - SPA </a> &emsp;| &emsp;
			<a href="../lobby?lobby=4"> FRA - USA </a> &emsp;| &emsp;
			<a href="../about"> Info</a>
		</p>
        <?php if (!$_SESSION['logged_in']):?>
        <div id="login">
            <h3>Login:</h3>
            <form action="../login/login.php" method="post">
                Username<br><input type="text" name="username" size="11em"><br>
                Password<br><input type="password" name="password" size="11em">
                <br>
                <input type="submit" value="Log in">
            </form>
            <a href="../register" style="color:  white; font-size: .7em; margin-left: .6em">or create an account here</a>
        </div>
        <?php endif ?>
		<br>
		<div id="main">
			<br>
			<h3>Info!</h3>
			<p>This website was brought to you by:<br></p>
			<ul>
				<li>Aymeric Beringer</li>
				<li>Raphael Caillon</li>
				<li>Edouard Baetz</li>
				<li>Hideo Kojima</li>
				<li>Gabe Newell</li>
			</ul>
			<?php 
				$mysqli = new mysqli('sql4.freemysqlhosting.net', 'sql4103349', 'ugtSzWBZrY', 'sql4103349');
				$query = 'SELECT * FROM credentials';
				
				$r = mysqli_query($mysqli, $query);
				if ($r) {
					echo $r->num_rows;
					echo ' people are using EuroChat.';
				}
				
				mysqli_close($mysqli);
			?>
		</div>
		<footer>&#169 BERBAECA 2016 - All rights reserved</footer>
	</body>
	
</html>
