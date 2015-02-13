<?php 
	
	session_start();
	
	if (isset($_SESSION["username"])) {
		$login_msg = "Welcome, ".$_SESSION['username']." | <a href='logout.php'>Logout</a>";
	} else {
		$login_msg = "<a href='login.php'>Login</a> | <a href='register.php'>Register</a>";
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Lystr | Share your playlists</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="icon" type="image/png" href="favicon.png">
	</head>
	<body>
		<!--TODO: TURN LOGIN/REGISTER INTO MODALS -->
		<div class="login_register"><?php echo $login_msg; ?></div>
		<img id="home_logo" src="Lystr-Logo.png" alt="Logo">
		<form><input class="search" type="text" placeholder="Find User" name="user" autofocus></form>
		<h2>Share music playlists with your friends</h2>
		<a href="playlists.php">Discover Playlists</a>
	</body>
</html>