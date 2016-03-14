<?php
    session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Encodage, titre et icone de la page -->
		<meta charset="utf-8" />
        	<meta name="description" content="PLZ">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<title>SUASM</title>
        	<link rel="shortcut icon" href="pouletwyniel.ico">
	</head>
	<body>
		<!-- Haut de la page, titre et sous-titre -->
		<div  id="header"><a href="index.php">
			<h1>Stand up against<wbr> school shootings</h1>
            <?php 
            //Si l'utilisateur n'est pas connecté, on lui propose des liens vers les pages de connexion et de création de compte
            //Sinon, on lui propose de se déconnecter
            if ($_SESSION['logged_in']) {
     echo "<div id='log'><a href='logout.php'>Log out</a></div>";
 } else {
     echo "<div id='log'><a href='register'>Register</a> or <a href='login'>Log in</a></div>";
 }?>
			<h2>An initiative to prevent school shootings at every scale
		<!-- Liens vers les différentes pages du site -->
		<p id="links">
			<a href="..">Home</a>&emsp; | &emsp;
			<a href="lobby?lobby=1"> Education </a>&emsp; | &emsp;
			<a href="lobby?lobby=2"> Restriction bills </a>&emsp; | &emsp;
			<a href="lobby?lobby=3"> Being responsible </a>&emsp; | &emsp;
			<a href="lobby?lobby=4"> Bonds for guns </a>&emsp; | &emsp;
			<a href="about"> Contact </a>
		</p>
        <?php 
        //Si l'utilisateur n'est pas connecté, on lui affiche une boîte dans laquelle il peut entrer ses identifiants.
        if (!$_SESSION['logged_in']):?>
        <div id="login">
            <h3>Login:</h3>
            <form action="login/login.php" method="post">
                Username<br><input type="text" name="username" size="9%"><br>
                Password<br><input type="password" name="password" size="9em">
                <br>
                <input class="fancy_button" type="submit" value="Log in">
            </form>
            <a href="register" style="color:  white; font-size: .7em; margin-left: .6em">or create an account here</a>
        </div>
        <?php endif ?>
		<br>
		<!-- Principal élément de la page -->
		<div id="main">
			<br>
			<h3> Welcome <?php 
				//Si l'utilisateur est connecté, on affiche son nom après 'Welcome'
				echo $_SESSION['username'];
			?>!</h3><br>
			<p class="wrap">Welcome to this website.<br>Here, you can have a closer look at the current situation, sign petitions and donate to support families and our cause.To use properly this website, please login, or if you do not have any account, please register. 
                As we are here to find solutions, and not create conflicts, we will not tolerate bad behaviors, insults, and unrelevant discussions.</p>
            <p> To use properly this website, please login, or if you do not have any account, please register. 
               </p>
                <p></p>
                <p>NEWS : Jamie Gilt, a young 31 years old pro-gun activist, was shot 5 days ago by her 4 years old son, who used her legally purchased gun, which he was easily able to catch. Her life is not in danger anymore.</p>
                <p></p>
                <p> NEWS : On the fifth of January 2016, President Barack Obama made a heartmoving speech about the dangers that weapons represents in our country. He even cried as he spoke about these innocent victims</p>
                <p>Here, you can see two of the last posters of our new sensibilization campaign <br />
                </p>
    <img src="http://imageshack.com/a/img924/3963/9NAv8g.png" alt="Poster 1" /></p>
    <p></p>
    <img src="http://imageshack.com/a/img921/3936/JrHqMI.png" alt="Poster 2" />
    <p></p>
    <h4><p> A list of events and some statistics:</p>   
    <p> University of texas : happened in August 1966, 14 people have been killed and 32 injured. The felon’s name is Whitman and he was a student at this university. Firearms implicated : YES <br />
    <img src="http://www2.luventicus.org/cartes/etatsunis/texas.gif" alt="Map of texas" /></p>
    <p> Cleveland elementary school : January 29, 1979, in San Diego, California. 2 people killed and 9 injured. Perpetrated by a 16 years old female student. Firearms implicated : YES <br />
    <img src="http://www2.luventicus.org/cartes/etatsunis/californie.gif" alt="Map of california" /></p>
    <p> Virginia tech institute : April 16, 2007. 32 peole were found dead and 23 were injured. The shooter was identified as a senior at Virginia Tech, 23-year-old Seung-Hui Cho. Firearms implicated : YES <br />
    <img src="http://www2.luventicus.org/cartes/etatsunis/virginie.gif" alt="Map of virginia" /></p>
    </h4>
                <script type="text/javascript">
            	window.onload = function () {
            		var login = document.getElementById('login');
            		var chat = document.getElementById('send_forum');
            		
            		if (login) {
            			login.style.top = '19.05em';
            		} else {
	            		var chat = document.getElementById('send_forum');
            		}
            		chat.style.height = '10em';
            	}
                //Méthode qui permet d'effectuer un 'POST' avec javascript
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
		//Méthode pour envoyer un message sur le forum. On vérifie la longueur du texte tapé par l'utilisateur.
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
                <?php 
                //Si l'utilisateur est connecté, on affiche le textarea pour qu'il envoie un message
                if ($_SESSION['logged_in']):?>
                <form action="post.php" method="post" style="width: 100%">
                    Send a message:<p id="error"></p><div><textarea 
                    	   style="height: 0em; transition-duration: 0.3s; transition-delay: 0.5s"
                           name="text"
                           placeholder="Type a message..."
                           autofocus="true"
                           rows="4"
                           id="send_forum"
                           onkeypress="if (event.keyCode==13 && document.getElementById('send_forum').value != '') {send();}">
</textarea></div><br>
		<!-- Bouton pour exécuter la méthode d'envoi -->
                    <input 
                    	style="
				float: right;
        			position: relative;
        			top: -1em;"
                    	class="fancy_button"
                        type="button" 
                        value="Post" 
                        onclick="if (document.getElementById('send_forum').value != '') {send();}">
                </form>
                <?php endif ?>
            	<?php
            	    //affichage des 5 derniers messages stockés sur la base de données
            	    $mysqli = new mysqli($_ENV['DB_SERVER'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], $_ENV['DB_USER']);
            	    
            	    $query = "SELECT * FROM message ORDER BY reg_date DESC LIMIT 5";
            	    $r = mysqli_query($mysqli, $query);
            	    while ($a = $r->fetch_assoc()) {
            	    	echo '<div class="message"><strong>' . $a['username'] . ':</strong>';
            	    	echo '<div class="timestamp">[' . date('d/m/y G:i', strtotime($a['reg_date'])) . ']</div><br>';
            	    	echo $a['message'] . '</div>';
            	    }
            	?>
            </div>
		</div>
		<!-- Bas de la page, ou on affiche les mentions légales -->
		<footer>&#169 BERCASTE 2016 - All rights reserved</footer>
	</body>
	
</html>
