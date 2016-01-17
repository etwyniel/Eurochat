<?php
    session_start();
    if (!$_SESSION['logged_in']) {
        header('Location: login_page.php');
    }
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
		<div id="side">
			<h3>Created by:</h3>
			<ul>
                <li><a href="http://euw.leagueoflegends.com">Etwyniel</a></li>
                <li>Aymeric</li>
                <li>Beringer</li>
                <li><span style="font-size: 7px">Caillou</span></li>
            </ul>
		</div>
		<div id="main">
			<br>
			<h3> Welcome to Lobby <?php echo $_GET['lobby'];?>!</h3><br>
			<p class="wrap">Welcome to this website!<br>It doesn't really serve any purpose for now...</p>
		    <textarea rows="4" cols="50" readonly="true" id="chat" name="output"></textarea>
            <script type="text/javascript">
                var username = '<?php echo $_SESSION['username'];?>';

                function send() {
                    document.getElementById('chat').value += username + ": " + document.getElementById('send').value + "\n";
                    var value = document.createTextNode(document.getElementById('send').value);
                    document.getElementById('send').value = "";
                }
            </script>
                <input 
            id="send" 
            size="100em" 
            type="text" 
            onsubmit="send" 
            onkeypress="if (event.keyCode==13 && document.getElementById('send').value != '') {send();}"
            autofocus="true">
                <input type="button" onclick="if (document.getElementById('send').value != '') {send();}" value="Send">
        </div>
		<h6>&#169; Aymeric Beringer 2016 - All rights reserved</h6>
	</body>
	
</html>
