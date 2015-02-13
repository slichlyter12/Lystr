<?php
	
	$title = "Logout";
	
	session_start();
	session_destroy();
	if (isset($_SESSION['username'])) {
		$msg = "You are now logged out";
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
