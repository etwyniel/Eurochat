<?php
    session_start();
    if (!$_SESSION['logged_in'] or !$_GET['lobby']) {
        header('Location: ../login');
        die();
    }
    $_SESSION['lobby'] = $_GET['lobby'];
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
     echo "<div id='log'><a href='../register'>Register</a> <a href='../login'>Log in</a></div>";
 }?>
			<h2>An efficient way of communicating between penfriends</h2>
		</a></div>
		<p id="links">
			<a href="../">Home</a> &emsp;| &emsp;
			<a href="../lobby?lobby=1"> FRA - ENG </a> &emsp;| &emsp;
			<a href="../lobby?lobby=2"> FRA - DEU </a> &emsp;| &emsp;
			<a href="../lobby?lobby=3"> FRA - SPA </a> &emsp;| &emsp;
			<a href="../lobby?lobby=4"> FRA - USA </a> &emsp;| &emsp;
			<a href="../about"> Info</a>
		</p>
		<br>
		<div id="main">
			<br>
			<h3> Welcome to Lobby <?php echo $_GET['lobby'];?>!</h3><br>
			<p class="wrap">Welcome to this website!<br>It doesn't really serve any purpose for now...</p>
		    <textarea rows="4" cols="50" readonly id="chat" name="output"></textarea>
            <script type="text/javascript">
                window.onload = function () {
                    function readTextfile() {
                        var xhr = new XMLHttpRequest();

                        xhr.onreadystatechange = function () {
                            if (xhr.readyState === 4) {
                                if (xhr.status == 200) {
                                    showContents(xhr.responseText, xhr);
                                }
                            }
                        }

                        xhr.open('GET', 'log<?php echo $_GET['lobby']; ?>.txt', true);
                        xhr.send();
                    setTimeout(readTextfile, 50 );
                    }
                var previous;
                    function showContents(responseText) {
                        var chat = document.getElementById('chat');

                        if (previous != responseText) {
                            chat.scrollTop = document.getElementById("chat").scrollHeight;
                        }
                        chat.value = responseText;
                        previous = responseText;
                    }

                    
                    readTextfile();
                    
                }
            </script>
            
            <script type="text/javascript">


                var username = '<?php echo $_SESSION['username'];?>';
                
                function send() {
                    var request = new XMLHttpRequest();
                    var message = document.getElementById('send').value;
                    var param = 'message=' + message + '&lobby=' + <?php echo $_GET['lobby']?>;

                    request.open('POST', 'write.php?lobby=1', 'true');
                    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                    request.send(param);
                    /*document.getElementById('chat').value += username + ": " + document.getElementById('send').value + "\n";
                    var value = document.createTextNode(document.getElementById('send').value);*/
                    document.getElementById('send').value = "";
                }
            </script>
                <input 
            id="send" 
            style="width: 92%" 
            type="text" 
            onsubmit="send" 
            onkeypress="if (event.keyCode==13 && document.getElementById('send').value != '') {send();}"
            autofocus="true"
            autocomplete="off">
                <input type="button" onclick="if (document.getElementById('send').value != '') {
                                                        send();
                                                        document.getElementById('send').focus();}" value="Send">
        </div>
		<footer>&#169; BERBAECA 2016 - All rights reserved</footer>
	</body>
	
</html>
