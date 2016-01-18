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
			<a href="lobby.php?lobby=1"> FRA - ENG </a> | 
			<a href="lobby.php?lobby=2"> FRA - DEU </a> | 
			<a href="lobby.php?lobby=3"> FRA - SPA </a> | 
			<a href="lobby.php?lobby=4"> FRA - USA </a> | 
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
                 <p id="error"></p>
                 Username:<input type="text" name="username" id="username" required>
                 Password:<input type="password" name="password" id="password" required>
                 Email:<input type="email" name="email" id="email" required>
                 <script>
                 
                 	function post(path, params, method) {
    				method = method || "post"; // Set method to post by default if not specified.

				 // The rest of this code assumes you are not using a library.
				 // It can be made less wordy if you use one.
				 var form = document.createElement("form");
				 form.setAttribute("method", method);
				 form.setAttribute("action", path);
				
				 for(var key in params) {
				     if(params.hasOwnProperty(key)) {
				         var hiddenField = document.createElement("input");
				         hiddenField.setAttribute("type", "hidden");
				         hiddenField.setAttribute("name", key);
				         hiddenField.setAttribute("value", params[key]);
				
				         form.appendChild(hiddenField);
				      }
				 }

    document.body.appendChild(form);
    form.submit();
}
                 	function check_length() {
                 		var username = document.getElementById('username').value;
                 		var password = document.getElementById('password').value;
                 		var email = document.getElementById('email').value;
                 		var error = document.getElementById('error');
                 	
                 		if (username.length < 4) {
                 			error.innerHTML = "This username is too short. Usernames must be between 4 and 16 characters.";
                 		} elseif (username.length > 16) {
                 			error.innerHTML = "This username is too long. Usernames must be between 4 and 16 characters.";
                 		} elseif (password.length < 8) {
                 			error.innerHTML = "This password is too short. Passwords must be between 8 and 20 characters.";
                 		} elseif (password.length > 20) {
                 			error.innerHTML = "This password is too long. Passwords must be between 8 and 20 characters.";
                 		} else {
                 			post('register.php', {username: username, password: password, email: email})
                 		}
                 	}
                 </script>
                 <input type="submit" value="Create account">
</form>
            <?php else: ?>
            <h3>Account successfully created!</h3>
            <?php endif ?>
		</div>
		<h6>&#169 Aymeric Beringer 2016 - All rights reserved</h6>
	</body>
	
</html>
