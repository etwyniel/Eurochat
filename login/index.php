<?php
    session_start();
    session_destroy();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
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
			<a href="..">Home</a>&emsp; | &emsp;
			<a href="../lobby?lobby=1"> FRA - ENG </a> &emsp;| &emsp;
			<a href="../lobby?lobby=2"> FRA - DEU </a>&emsp; |&emsp; 
			<a href="../lobby?lobby=3"> FRA - SPA </a>&emsp; | &emsp;
			<a href="../lobby?lobby=4"> FRA - USA </a> &emsp;| &emsp;
			<a href="../about"> Info</a>
		</p>
		<br>
		<div id="main">
			<br>
			<h3>Log in using your credentials:</h3><br>
			<p style="color: red;
			font-size: 0.7em;
			text-align: center;
			background: white;
			border-radius: 3px;
			width: 50%;
			margin: auto">
        <?php
            $e = $_GET['error'];
            switch ($e) {
                case 'no_username':
                echo "Please enter your username.";
                break;
            case 'no_pwd':
                echo "Please enter your password.";
                break;
            case 'unregistered':
                echo "Uknown account.";
                break;
            case 'wrong_pwd':
                echo "Wrong password.";
                break;
            }
        ?>
	 	</p>
             <form style="margin: auto" action="login.php" method="post">
                 Username:<input type="text" name="username" autocomplete="off" autofocus="true" required>
                 Password:<input type="password" name="password" required>
                <input class="fancy_button" type="submit" value="Log in" style="margin-top: .3em">
             </form>
		</div>
		<footer>&#169 BERBAECA 2016 - All rights reserved</footer>
	</body>
	
</html>
