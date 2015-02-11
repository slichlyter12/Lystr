<?php

	include_once 'dbconnect.php';
	
	if ($mysqli->connect_errno) {
		die("Failed to connect to server with error: ".$mysqli->connect_errno);
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Lystr | Playlists</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="icon" type="image/png" href="favicon.png">
	</head>
	<body>
		<div class="login_register"><a href="#">Login</a> | <a href="#">Register</a></div>
		<div class="little_logo_div"><a href="index.html"><img class="little_logo" src="Little-Lystr-Logo.gif" alt="little logo"><h3 class="little_logo_title">Lystr | Share Playlists</h3></a></div>
		<h1 id="playlistTitle">Playlists:</h1>
		<?php
		
			echo "<ul class='playlistList'>\n";
			if ($result = $mysqli->query("SELECT id, name FROM playlists")) {
				while ($obj = $result->fetch_object()) {
// 					echo "<a href='playlist_".htmlspecialchars($obj->id)."'><li id='".htmlspecialchars($obj->id)."' class='playlist'>".htmlspecialchars($obj->name)."</li></a>\n";
					echo "<a href='#'><li id='".htmlspecialchars($obj->id)."' class='playlist'>".htmlspecialchars($obj->name)."<a href='deletePlaylist.php?id=".htmlspecialchars($obj->id)."&playlist_name=".htmlspecialchars($obj->name)."' class='x_delete'>x</a></li></a>\n";
				}
				
				$result->close();
				
			}
			
			echo "</ul>\n";
			
		?>
		<form action="addPlaylist.php" method="get">
			<input class="add_playlist" type="text" name="playlist_name" placeholder="new playlist">
			<button type="submit">Add Playlist</button>
		</form>
	</body>
</html>