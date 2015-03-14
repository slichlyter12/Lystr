<?php session_start(); $title = "Upload Playlist"; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Lystr | <?php echo $title; ?></title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<?php include 'topbar.php'; ?>
		<br><br>
		<?php
			
			include_once 'dbconnect.php';
			
			if ($mysqli->connect_errno) {
				die("Failed to connect to server with error: ".$mysqli->connect_errno);
			}
			
			$playlist_name = htmlspecialchars($_GET["playlist_name"]);
			
			if ($playlist_name."" == "") {
				die("Insufficient playlist name");
			}
			
			if ($compare_names = $mysqli->query("SELECT name FROM playlists")) {
				while ($name_obj = $compare_names->fetch_object()) {
					if ($playlist_name == $name_obj->name) {
						die("Playlist name already exists");
					}
				}
			}
			
			if ($get_id = $mysqli->query("SELECT id FROM playlists")) {
				while ($obj = $get_id->fetch_object()) {
					$id = $obj->id;
				}
			}
			
			$id += 1;
		
			if ($mysqli->query("INSERT INTO playlists (id, name, user) VALUES ('$id', '$playlist_name', 'GLOBAL')")) {
				echo "<p id='add_status'>Successfully added $playlist_name to Lystr!</p>";
			} else {
				echo "<p id='add_status'>Oops! Something went wrong :(</p>";
			}
			
			$mysqli->close();
					
		?>
	</body>
</html>
