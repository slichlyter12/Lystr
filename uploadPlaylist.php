<?php 
	
	session_start();
	
	$title = "Upload Playlist";
	
	if(isset($_SESSION["username"])) {
		
		include_once 'dbconnect.php';
		
		if($_FILES) {
			
			$name = $_FILES['file']['name'];
			$ext = $_FILES['file']['type'];
						
			if ($ext == "audio/x-mpegurl" || $ext == "audio/mpegurl") {
				
				$ext = "m3u";
				$title = strip_tags($_POST["title"]);
				$title = mysqli_real_escape_string($mysqli, $title);
				$n = $title.".$ext";
				move_uploaded_file($_FILES['file']['tmp_name'], "temp/".$_SESSION['username']."/$n");
				
				$result = mysqli_query($mysqli, "SELECT name FROM playlists WHERE name='$title' AND user='".$_SESSION['username']."'");
				$row = mysqli_fetch_row($result);
				$dbname = $row[0];
				if($title == $dbname) {
					die("<h2>You already have a playlist with that name, please choose a new name or delete the old playlist</h2>");
				}
				
				$query = "INSERT INTO playlists (name, user) VALUES ('$title','".$_SESSION['username']."')";
				if (mysqli_query($mysqli, $query)) {
					echo "Uploaded $title successfully!<br>";
					echo "<a href='user.php'>See my playlists</a>";
				} else {
					die("<h2>An unexpected error occurred</h2>");
				}
				
			} else {
				
				echo "$name is not an accepted playlist file<br>";
				echo "Please make sure the playlist file ends with .m3u";
				
			}
			
		}
		
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
		<h1 class="pageTitle"><?php echo $title; ?></h1>
		<form method="post" enctype="multipart/form-data">
			Playlist Title: <input class="input_field" type="text" name="title"><br>
			Select File: <input class="input_field" type="file" name="file"><br>
			<input class="submit_button" type="submit" value="Upload"><br><br>
			<p>Note: Please upload a playlist file of filetype M3U.</p>
			<p>Instructions on how to export playlists from iTunes can be found <i><a href="instructions.php">here</a></i>.</p>
		</form>
	</body>
</html>