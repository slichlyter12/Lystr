<?php 
	
	session_start();
	
	$title = "How to export playlists from iTunes";
	
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
		<h1 class="pageTitle"><?php echo $title; ?></h1>
		<ol>
			<li>Navigate to the playlist you wish to upload to Lystr</li>
			<li>Select File > Library > Export Playlist&hellip;</li>
			<li>At the bottom make sure the format is set to M3U</li>
		</ol>
	</body>
</html>