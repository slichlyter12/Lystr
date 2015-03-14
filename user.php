<?php 
	
	session_start();
	
	if (!isset($_SESSION["username"])) {
		header("Location: error.php");
	}
		
	$title = $_SESSION["username"]."'s Playlists";
	
	include 'buildUsersPlaylists.php';
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Lystr | <?php echo $title; ?></title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="icon" type="image/png" href="favicon.png">
		<script type="text/javascript" src="jquery-2.1.3.min.js"></script>
	</head>
	<body>
		<?php include("topbar.php"); ?>
		<h1 class="pageTitle"><?php echo $_SESSION["username"]; ?></h1>
		
		<a href="uploadPlaylist.php">Upload New Playlist</a>
		
		<script type="text/javascript">
			$(document).ready(function() {
				$.getJSON("./temp/<?php echo $_SESSION['username']; ?>/playlists.js", function(data) {
					var items = [];
					$.each(data, function(key, val) {
						items.push("<a href='#'><li id='" + key + "' class='data_block'>" + data[key]['name'] + "</li></a>");
					});
					
					$("<ul/>", {
						"class": "playlistList",
						html: items.join("")
					}).appendTo("body");
				});
			});
		</script>
		
	</body>
</html>