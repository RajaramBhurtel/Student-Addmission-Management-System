<?php 
	include('functions.php');

	if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
?>

	<?php include('header.php'); ?>

	<div class="header">
		<h2>Dashboard</h2>
		
	</div>

	<div class="content">
			

		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<!-- logged in user information -->
		<div class="profile_info">
			<img src="images/user.png"  >

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['fname']; ?></strong>

					

					

				<?php endif ?>
			</div>
		</div>
	</div>
</body>
</html>