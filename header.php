<?php 
session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header>
	<nav>
		<div class="main-wrapper">
			<ul>
				<li><a href="index.php">Home</a></li>

			</ul>
			<div class="nav-login">
				<?php
				if(isset($_SESSION['u_id']))
				{
					echo'<form action="includes/logout.inc.php" method="POST">
					<button type="submit" name="submit">Log Out</button>
				</form>';
				}
				else {
					echo'<form action="includes/login.inc.php" method="POST">
					<input type="text" name="user-id" placeholder="UserName/email">
					<br>
					<input type="password" name="pwd" placeholder="password">
					<br>
					<button name="submit"> Log In</button>
				</form>
				<a href="signup.php"><h5>Sign Up</h5></a>';
				}
				?>
				
				
			</div>
		</div>
	</nav>
</header>
