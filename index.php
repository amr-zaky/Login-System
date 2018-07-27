<?php
 include_once "header.php";
?>

<section class="main-container">
	<div class="main-container">
		<h2>Home</h2>
		<?php
		if(isset($_SESSION['u_id']))
		{
			
			echo'<h2>Welcome </h2>'.$_SESSION['u_first'];
			
		}
		?>
	</div>
</section>

<?php
include_once "footer.php";
?>
