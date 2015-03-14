<?php 

	include_once 'dbconnect.php';
	
	$result = mysqli_query($mysqli, "SELECT * FROM playlists WHERE user='GLOBAL'");
	$rows = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	
	$filename = "./temp/global_playlists.js";
	$file = fopen($filename, 'w');
	
	if (!$file) {
		die("Could not load global playlists");
	}
	
	fwrite($file, json_encode($rows));
	
	fclose($file);
	
	$mysqli->close();
	
?>