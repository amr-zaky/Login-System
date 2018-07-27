

<?php
 include_once "header.php";
 include_once "includes/dbh.inc.php";
?>

<section class="main-container">
	<div class="main-container">
		<h2>Sign Up</h2>

		<form action="includes/siginup.inc.php" method="POST" class="signup-form" >
    		<input type="text" name="first" placeholder="First Name">
    		<br>
    		<input type="text" name="last" placeholder="last Name">
    		<br>
    		<input type="email" name="email" placeholder="@yahoo.com">
    		<br>
    		<input type="text" name="uid" placeholder="user Name">
    		<br>
    		<input type="Password" name="pwd" placeholder="Password">
    		<br>
    		<button type="submit" name="submit" >Sign Up</button>
    	</form>
	</div>
</section>

<?php
include_once "footer.php";
?>
