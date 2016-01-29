<?php
    session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
        <meta name="description" content="PLZ">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<title>Eurochat</title>
        <link rel="shortcut icon" href="pouletwyniel.ico">
	</head>
	<body>
		<div  id="header"><a href="index.php">
			<h1>Euro<wbr>Chat</h1>
            <?php if ($_SESSION['logged_in']) {
     echo "<div id='log'><a href='logout.php'>Log out</a></div>";
 } else {
     echo "<div id='log'><a href='register'>Register</a> or <a href='login'>Log in</a></div>";
 }?>
			<h2>An efficient way of communicating between penfriends</h2>
		</a></div>
		<p id="links">
			<a href="..">Home</a>&emsp; | &emsp;
			<a href="lobby?lobby=1"> FRA - ENG </a>&emsp; | &emsp;
			<a href="lobby?lobby=2"> FRA - DEU </a>&emsp; | &emsp;
			<a href="lobby?lobby=3"> FRA - SPA </a>&emsp; | &emsp;
			<a href="lobby?lobby=4"> FRA - USA </a>&emsp; | &emsp;
			<a href="about"> Info </a>
		</p>
        <?php if (!$_SESSION['logged_in']):?>
        <div id="login">
            <h3>Login:</h3>
            <form action="login/login.php" method="post">
                Username<br><input type="text" name="username" size="9%"><br>
                Password<br><input type="password" name="password" size="9em">
                <br>
                <input type="submit" value="Log in">
            </form>
            <a href="register" style="color:  white; font-size: .7em; margin-left: .6em">or create an account here</a>
        </div>
        <?php endif ?>
		<br>
		<div id="main">
			<br>
			<h3> Welcome <?php echo $_SESSION['username'];?>!</h3><br>
			<p class="wrap">Welcome to this website!<br>It doesn't really serve any purpose for now...</p>
            <p> To use  this website, please login, or if you do not have any account, please register. 
                This webapp has for purpose to develop communication between foreign students, allowing
                 a better understanding of the world thanks to some penfriends.</p>
            <script type="text/javascript">
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

                function send() {
                    var message = document.getElementById('send_forum');
                    var error = document.getElementById('error');

                    if (message.value.length > 1000) {
                        error.innerHTML = 'Message too long.';
                    } else if (message.value.length < 3) {
                        error.innerHTML = 'Message too short';
                    } else {
                        post('post.php', { username: '<?php echo $_SESSION['username']; ?>', message: message.value });
                    }
                }
            </script>
            
            <div id="forum">
                <?php if ($_SESSION['logged_in']):?>
                <form action="post.php" method="post" style="width: 100%">
                    Send a message:<p id="error"></p><div><textarea 
                           name="text"
                           placeholder="Type a message..."
                           autofocus="true"
                           rows="4"
                           id="send_forum"
                           onkeypress="if (event.keyCode==13 && document.getElementById('send_forum').value != '') {send();}">
</textarea></div><br>
                    <input 
                        style="
                            float: right;
                            position: relative;
                            top: -1em" 
                        type="button" 
                        value="Post" 
                        onclick="if (document.getElementById('send_forum').value != '') {send();}">
                </form>
                <?php endif ?>
            	<?php
            	    $mysqli = new mysqli('sql4.freemysqlhosting.net', 'sql4103349', 'ugtSzWBZrY', 'sql4103349');
            	    
            	    $query = "SELECT * FROM message ORDER BY reg_date DESC LIMIT 5";
            	    $r = mysqli_query($mysqli, $query);
            	    while ($a = $r->fetch_assoc()) {
            	    	echo '<div class="message"><strong>' . $a['username'] . ':</strong>';
            	    	echo '<div class="timestamp">[' . date('d/m/y G:i', strtotime($a['reg_date'])) . ']</div><br>';
            	    	echo $a['message'] . '</div>';
            	    	//echo '<br>';
            	    }
            	?>
            </div>
		</div>
		<footer>&#169 BERBAECA 2016 - All rights reserved</footer>
	</body>
	
</html>
