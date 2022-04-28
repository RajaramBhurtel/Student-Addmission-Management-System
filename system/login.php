<?php
include('functions.php')
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<section>
		<div class="imgBx">
			<img src="images/adm.jpg">
		</div>
		<div class="contentBx">
			<div class="formBx">
				<h2>Login</h2>
				<form method="post" action="#">
					<?php echo display_error(); ?>
					<div class="inputBx">
						<span>Username</span>
						<input type="text" name="username">
					</div>
					<div class="inputBx">
						<span>Password</span>
						<input type="password" name="password">
					</div>
					<div class="inputBx">
						<input type="submit" value="Log In" name="login">
					</div>
					<div class="inputBx">
						<p>Don't have an account? <a href="register.php"> Sign Up</a></p>
					</div>
				</form>
				
			</div>
		</div>
	</section>
</body>
</html>