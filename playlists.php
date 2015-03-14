<?php
	
	session_start();
	
	$title = "Playlists";
	
	if (isset($_SESSION["username"])) {
		
		include_once 'dbconnect.php';
		
	} else {
		header("Location: error.php");
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Lystr | <?php echo $title; ?></title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="icon" type="image/png" href="favicon.png">
	</head>
	<body>
		<?php include("topbar.php"); ?>
		<div class="content">
			<h1 class="pageTitle">Playlists:</h1>
			<?php
			
				echo "<ul class='playlistList'>\n";
				if ($result = $mysqli->query("SELECT id, name FROM playlists WHERE user='GLOBAL'")) {
					while ($obj = $result->fetch_object()) {
						echo "<a href='#'><li id='".htmlspecialchars($obj->id)."' class='data_block'>".htmlspecialchars($obj->name)."<a href='deletePlaylist.php?id=".htmlspecialchars($obj->id)."&playlist_name=".htmlspecialchars($obj->name)."' class='x_delete'>&times;</a></li></a>\n";
					}
					
					$result->close();
					
				}
				
				echo "</ul>\n";
				
			?>
			<form action="addPlaylist.php" method="get">
				<input class="add_playlist" type="text" name="playlist_name" placeholder="new playlist">
				<button type="submit">Add Playlist</button>
			</form>
		</div>
	</body>
</html>