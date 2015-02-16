<?php 
	
	session_start();
	
	$title = "Register";
	
	if (isset($_POST["username"])) {
		
		require_once 'vendor/ircmaxell/password-compat/lib/password.php';
		include_once 'dbconnect.php';
		
		$username = strip_tags($_POST["username"]);
		$password = strip_tags($_POST["password"]);
		$confirm_pass = strip_tags($_POST["confirm_pass"]);
		$email = strip_tags($_POST["email"]);
		
		$username = mysqli_real_escape_string($mysqli, $username);
		$password = mysqli_real_escape_string($mysqli, $password);
		$confirm_pass = mysqli_real_escape_string($mysqli, $confirm_pass);
		$email = mysqli_real_escape_string($mysqli, $email);
		
		//check passwords
		if ($password != $confirm_pass) {
			die( "<h2>Passwords are not the same, please <a href='register.php'>try again</a></h2>" );
		}
		
		//hash password
		$hashed_pass = password_hash($password."lystr_playlists", PASSWORD_DEFAULT);
		$hashed_confirm_pass = password_hash($confirm_pass."lystr_playlists", PASSWORD_DEFAULT);
		
		//check if username already exists
		$result = mysqli_query($mysqli, "SELECT username FROM users WHERE username='".$username."' LIMIT 1");
		$row = mysqli_fetch_row($result);
		$dbusername = $row[0];
		if ($username == $dbusername) {
			die( "<h2>A user with that username already exists, would you like to <a href='index.php'>login</a>?" );
		}
		
		//check if valid email address
		if (!preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/", $email)) {
			die("<h2>Not a valid email address</h2><br><a href='register.php'>Try again?</a>");
		}
		
		//check if email already exists
		$result = mysqli_query($mysqli, "SELECT email FROM users WHERE email='$email' LIMIT 1");
		$row = mysqli_fetch_row($result);
		$dbemail = $row[0];
		if ($email == $dbemail) {
			die( "<h2>This email already has an account, would you like to <a href='login.php'>login</a>?</h2>" );
		}
		
		//if pass all checks, register new user
		$query = "INSERT INTO users (username, password, email) VALUES ('".$username."', '".$hashed_pass."', '".$email."')";
		if (mysqli_query($mysqli, $query)) {
			echo "<h2>Successfully registered!</h2>";
			echo "<a href='login.php'>Login</a>";
		} else {
			die( "<h2>An unexpected error occurred</h2>" );
		}
		
	}	
	
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
			<h1>Register</h1>
			<form id="register_form" method="post">
				Username: <input class="input_field" type="text" name="username" autofocus required><br>
				Password: <input class="input_field" type="password" name="password" required><br>
				Confirm Password: <input class="input_field" type="password" name="confirm_pass" required><br>
				Email: <input class="input_field" type="email" name="email" required><br>
				<input class="reset_button" type="reset" value="Reset">
				<input class="submit_button" type="submit" value="Register">
			</form>
	</body>
</html>
