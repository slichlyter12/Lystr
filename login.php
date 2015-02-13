<?php

	session_start();
	
	$title = "Login";
	
	if (isset($_POST['username'])) {
		
		require_once 'vendor/ircmaxell/password-compat/lib/password.php';
		include_once("dbconnect.php");
		
		$username = strip_tags($_POST["username"]);
		$password = strip_tags($_POST["password"]);
		
		$username = mysqli_real_escape_string($mysqli, $username);
		$password = mysqli_real_escape_string($mysqli, $password);
		
		$sql = "SELECT id, username, password FROM users WHERE username='".$username."' LIMIT 1";
		$query = mysqli_query($mysqli, $sql);
		$row = mysqli_fetch_row($query);
		$uid = $row[0];
		$dbUsername = $row[1];
		$dbPassword = $row[2];
		
		//check username and password are correct
		if ($username == $dbUsername && password_verify($password."lystr_playlists", $dbPassword)) {
			//set session variables
			$_SESSION['username'] = $username;
			$_SESSION['id'] = $uid;
			
			//now redirect user
			header("Location: index.php");
		} else {
			echo "<h2>Oops! That username and password combination was not found.<br>Please try again.</h2>";
		}
	}	
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title; ?></title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<?php include 'topbar.php'; ?>
		<div class="content">
			<h1>Login</h1>
			<form id="login_form" method="post">
				Username: <input class="input_field" type="text" name="username" required autofocus><br>
				Password: <input class="input_field" type="password" name="password" required><br>
				<input class="submit_button" type="submit" value="Login">
			</form>
	</body>
</html>
