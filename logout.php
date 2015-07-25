<?php	
	
	session_start();
	
	include('dbconnect.php');
	
	$title = "Logout";
	if (isset($_SESSION['username'])) {
		$username = mysqli_real_escape_string($mysqli, strip_tags($_SESSION['username']));	
	}
	
	//delete files and logout
	require_once 'recursiveRemove.php';
	recursiveRemove("./temp/$username");
	session_destroy();
	
	if (isset($username)) {
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
