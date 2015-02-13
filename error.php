<?php 
	
	session_start();
	
	$title = "Not Logged In";
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Lystr | <?php echo $title; ?></title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<?php include 'topbar.php'; ?>
		<div class="content">
			<h1>Oops! You need to be logged in to do that</h1>
			<p><a href="login.php">Log in here</a></p>
		</div>
	</body>
</html>
