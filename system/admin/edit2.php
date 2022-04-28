<?php  

include('../functions.php');
//check if admin is login or not
if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../login.php");
}
//code for editing
if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM users WHERE id=$id");

		if (mysqli_num_rows($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$fname = $n['fname'];
			$lname = $n['lname'];
			$email = $n['email'];
			$password = $n['password'];
		}
	}

?>
<html>
<head>
	<title>Update PHP MySQL</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>

	<form method="post" action="php_code.php" >
		<div class="input-group">
			<label>First Name</label>
			<input type="text" name="fname" value="<?php echo $fname; ?>">
		</div>
				<div class="input-group">
			
			<input type="hidden" name="id" value="<?php echo $id; ?>">
		</div>
		<div class="input-group">
			<label>Last Name</label>
			<input type="text" name="lname" value="<?php echo $lname; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="text" name="email" value="<?php echo $email; ?>">
		</div>

		<div class="input-group">
			<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
		</div>
	</form>
</body>
</html>