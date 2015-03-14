<?php
	
	if (isset($_SESSION["username"])) {
		$login_msg = "Welcome, <a href='user.php'>".$_SESSION['username']."</a> | <a href='logout.php'>Logout</a>";
	} else {
		$login_msg = "<a href='login.php'>Login</a> | <a href='register.php'>Register</a>";
	}
	
?>
<div class="login_register"><?php echo $login_msg; ?></div>
<div class="little_logo_div"><a href="index.php"><img class="little_logo" src="Little-Lystr-Logo.gif" alt="little logo"><h3 class="little_logo_title">Lystr | <?php echo $title; ?></h3></a></div>