<?php
	
	$title = "Logout";
	
	session_start();
	session_destroy();
	if (isset($_SESSION['username'])) {
		$msg = "<h2>You are now logged out</h2>";
	} else {
		$msg = "<h2>You are not logged in</h2>";
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
