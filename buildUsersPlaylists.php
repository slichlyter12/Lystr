<?php
	
	include_once 'dbconnect.php';
	
	$result = mysqli_query($mysqli, "SELECT * FROM playlists WHERE user='".$_SESSION['username']."'");
	$rows = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	
	$filename = "./temp/".$_SESSION['username']."/playlists.js";
	$file = fopen($filename, 'w');
	
	if (!$file) {
		die("Could not get playlists");
	}
	
	fwrite($file, json_encode($rows));
	
	fclose($file);
	
	$mysqli->close();
	
?>