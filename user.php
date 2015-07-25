<?php 
	
	session_start();
	
	include_once 'dbconnect.php';
	
	if (isset($_SESSION['username'])) {
		$username = mysqli_real_escape_string($mysqli, strip_tags($_SESSION['username']));
	} else {
		header("Location: error.php");
	}
			
	$title = "$username's Playlists";
	
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
		
		<a href="uploadPlaylist.php">Upload New Playlist</a><br><br>
		
		<script type="text/javascript">
			$(document).ready(function() {
				$.getJSON("./temp/<?php echo $username; ?>/playlists.js", function(data) {
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