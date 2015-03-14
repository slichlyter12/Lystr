<?php	
	
	session_start();
	
	$title = "Logout";
	
	//delete files and logout
	require_once 'recursiveRemove.php';
	recursiveRemove("./temp/".$_SESSION['username']);
	session_destroy();
	
	if (isset($_SESSION['username'])) {
		$msg = "<h2>You are now logged out</h2>";
	} else {
		$msg = "<h2>Could not log you out</h2>";
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Lystr | <?php echo $title; ?></title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<?php echo $msg; ?>
		<p><a href="index.php">Click here to return to the home page</a></p>
	</body>
</html>
