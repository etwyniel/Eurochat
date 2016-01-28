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
			<h1>EuroChat</h1>
            <?php if ($_SESSION['logged_in']) {
     echo "<div id='log'><a href='logout.php'>Log out</a></div>";
 } else {
     echo "<div id='log'><a href='register'>Register</a> or <a href='login'>Log in</a></div>";
 }?>
			<h2>An efficient way of communicating between penfriends</h2>
		</a></div>
		<p id="links">
			<a href="..">Home</a> | 
			<a href="lobby?lobby=1"> FRA - ENG </a> | 
			<a href="lobby?lobby=2"> FRA - DEU </a> | 
			<a href="lobby?lobby=3"> FRA - SPA </a> | 
			<a href="lobby?lobby=4"> FRA - USA </a> | 
			<a href="about"> Info </a>
		</p>
        <?php if (!$_SESSION['logged_in']):?>
        <div id="login">
            <h3>Login:</h3>
            <form action="login/login.php" method="post">
                Username<input type="text" name="username" size="10em">
                Password<input type="password" name="password" size="10em">
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
            <p> To use  this website, please login, or if you do not have any account, please register. This webapp has for purpose to develop communication between foreign students, allowing a better understanding of the world thanks to some penfriends.</p>
            <p>Lorem ipsum dolor sit amet, a nulla nulla lacus dolor ut, nulla urna cubilia suspendisse urna. Praesent mollis, nunc sed nisi mollis fringilla sociis, sed lacus suspendisse consectetuer sed lectus, ultrices tellus turpis urna. Nulla mollis massa vitae molestie auctor, eget in, aliquam a arcu orci porta vitae, in scelerisque suspendisse ac est urna, condimentum nam. Phasellus vel elit voluptas maecenas, vel wisi pede, at condimentum in non eu, neque nec. Rutrum vulputate semper turpis tortor. A at aliquet, id maecenas dui quis, nam tortor, hic laoreet mauris, morbi mauris. Ac id ridiculus elit lorem accumsan, magna gravida augue, enim ut, libero erat, lorem non. Maecenas lectus vestibulum nunc velit, eget erat ipsum, ultrices volutpat felis, volutpat volutpat laoreet mi in sed, turpis pellentesque sollicitudin a convallis. Gravida tellus et nunc lectus enim risus, augue et cursus elementum luctus sit, felis vel scelerisque, ac mauris metus nulla mi lacus maecenas. Imperdiet eius arcu platea non interdum. Sed nulla sem duis commodo urna, dolor adipiscing, enim imperdiet pellentesque dignissim, lectus suspendisse lacinia amet, suscipit tellus quis. Quam et morbi, vel fringilla sit. Neque lorem et, nec ipsum donec. Pharetra et nunc placerat, ac elit non nunc nulla mattis consectetuer, lectus quam nunc. Erat justo ac, dolor habitasse consequat, justo ligula sed, neque in mauris commodo amet libero, platea pede at iaculis. Faucibus neque felis libero suscipit suscipit sit. Est nam corporis iaculis. Fringilla fringilla, sollicitudin sodales morbi ac ultrices neque ut. Velit aut porttitor eleifend augue suscipit posuere, maecenas et ante vestibulum, consequat hendrerit vestibulum ipsum fusce. Ac porta id, porta interdum eget nulla placerat diam nulla, senectus feugiat mauris, aenean malesuada ipsum lacinia donec morbi, volutpat maecenas. Elit luctus nec mi nunc et vehicula, wisi rutrum non. Rutrum mi aliquam, amet accumsan dui vel at ac nec, in rutrum viverra. Aliquam nec faucibus suspendisse, nam ut vestibulum volutpat feugiat aliquam, orci in. Scelerisque tristique ut. Dui arcu proin magna officia ut tempus, at ullamcorper vitae et adipiscing. Dui vel vestibulum vehicula ac vitae in, duis nostra. Vestibulum non vel molestie tincidunt ligula, mauris sed. Elit placerat pellentesque aliquam vel, mi ut vel. Et mauris neque risus nulla metus, viverra nec vel dolorum at sapien elit, metus ridiculus mauris, amet sociis, ligula augue tristique nunc.</p>
            <div id="forum">
            	<?php
            	    $mysqli = new mysqli('sql4.freemysqlhosting.net', 'sql4103349', 'ugtSzWBZrY', 'sql4103349');
            	    
            	    $query = "SELECT * FROM message";
            	    $r = mysqli_query($mysqli, $query);
            	    $a = $r->fetch_assoc();
            	    echo $a['message'];
            	?>
            </div>
		</div>
		<footer>&#169 BERBAECA 2016 - All rights reserved</footer>
	</body>
	
</html>
