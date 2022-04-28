<?php include('functions.php') ?>

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
			<img src="images/sign.jpg">
		</div>
		<div class="contentBx">
			<div class="formBx">
				<h2>Sign Up</h2>
				<form method="post" action="#">
					<?php echo display_error(); ?>
					<div class="inputBx">
						<span>Your First Name</span>
						<input type="text" name="username" value="<?php echo $username; ?>">
					</div>
					<div class="inputBx">
						<span>Your Last Name</span>
						<input type="text" name="lastname">
					</div>
					<div class="inputBx">
						<span>Email</span>
						<input type="email" name="email" value="<?php echo $email; ?>">
					</div>
					<div class="inputBx">
						<span> New Password</span>
						<input type="password" name="pw1">
					</div>
					<div class="inputBx">
						<span> Confirm Password</span>
						<input type="password" name="pw2">
					</div>
					<div class="inputBx">
						<input type="submit" value="Sign Up" name="register">
					</div>
					<div class="inputBx">
						<p>Already have an account? <a href="login.php"> Log In</a></p>
					</div>
				</form>
				
			</div>
		</div>
	</section>
</body>
</html>