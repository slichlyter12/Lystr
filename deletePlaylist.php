<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Delete Playlist</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="login_register"><a href="#">Login</a> | <a href="#">Register</a></div>
		<div class="little_logo_div"><a href="playlists.php"><img class="little_logo" src="Little-Lystr-Logo.gif" alt="little logo"><h3 class="little_logo_title">Lystr | Share Playlists</h3></a></div>
		<br><br>
		<?php
			
			$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "lichlyts-db", "yIXE9YLgTUnUSnZ1", "lichlyts-db");
// 			$mysqli = new mysqli("127.0.0.1", "root", "", "lystr");
			
			if ($mysqli->connect_errno) {
				die("Failed to connect to server with error: ".$mysqli->connect_errno);
			}
			
			$name = $_GET["playlist_name"];
			$id = $_GET["id"];
		
			if ($mysqli->query("DELETE FROM playlists WHERE id='$id' AND name='$name'")) {
				echo "<p id='add_status'>Successfully deleted $name from Lystr!</p>";
			} else {
				echo "<p id='add_status'>Oops! Something went wrong :(</p>";
			}
			
			$mysqli->close();
					
		?>
	</body>
</html>
