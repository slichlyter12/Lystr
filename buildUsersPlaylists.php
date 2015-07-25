<?php
	
	include_once 'dbconnect.php';
	
	$username = mysqli_real_escape_string($mysqli, strip_tags($_SESSION['username']));
	
	$result = mysqli_query($mysqli, "SELECT * FROM playlists WHERE user='$username'");
	$rows = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	
	$filename = "./temp/$username/playlists.js";
	$file = fopen($filename, 'w');
	
	if (!$file) {
		die("Could not get playlists");
	}
	
	fwrite($file, json_encode($rows));
	
	fclose($file);
	
	$mysqli->close();
	
?>