<?php
    session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../stylesheet.css" />
		<title>Eurochat</title>
        <link rel="shortcut icon" href="http://sstatic.net/stackoverflow/img/favicon.ico">
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
			<a href="..">Home</a> | 
			<a href="../lobby?lobby=1"> FRA - ENG </a> | 
			<a href="../lobby?lobby=2"> FRA - DEU </a> | 
			<a href="../lobby?lobby=3"> FRA - SPA </a> | 
			<a href="../lobby?lobby=4"> FRA - USA </a> | 
			<a href="../about"> Info</a>
		</p>
		<br>
		<div id="main">
			<br>
            <?php if ($_GET['error'] != 'none'):?>
			<h3> Create an account:</h3><br>
			<p class="wrap">Please enter a name, a password and a valid email adress.</p>
             <form action="register.php" method="post" style="margin: auto">
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
                 Username:<input type="text" name="username" id="username" required autofocus="true">
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
                         for (var key in params) {
                             if (params.hasOwnProperty(key)) {
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
                         var email_template = /\S+@\S+\.\S+/;
                         var error = document.getElementById('error');

                         if (username.length < 4) {
                             error.innerHTML = "This username is too short. Usernames must be between 4 and 16 characters.";
                         } else if (username.length > 16) {
                             error.innerHTML = "This username is too long. Usernames must be between 4 and 16 characters.";
                         } else if (password.length < 8) {
                             error.innerHTML = "This password is too short. Passwords must be between 8 and 20 characters.";
                         } else if (password.length > 20) {
                             error.innerHTML = "This password is too long. Passwords must be between 8 and 20 characters.";
                         } else if (!email_template.test(email) || email.length <= 5) {
                             error.innerHTML = "Invalid email adress.";
                         } else {
                             post('register.php', { username: username, password: password, email: email });
                         }
                     }
                 </script>
                 <input type="button" value="Create account" onclick="check_length();" style="margin-top: .3em">
</form>
            <?php else: ?>
            <h3>Account successfully created!</h3>
            <?php endif ?>
		</div>
		<footer>&#169 Aymeric Beringer 2016 - All rights reserved</footer>
	</body>
	
</html>
