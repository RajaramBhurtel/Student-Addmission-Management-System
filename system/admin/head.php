<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../style1.css">
</head>
<body>
		<div class="topnav">
		<a href="home.php">Dashboard</a>
		<a href="view.php">View Admission</a>
		<!-- <a href="report.php">Student Profile</a> -->
		<a href="create_user.php">Add User</a>
		<a href="edit.php" >View User</a>
		<a href="change1.php" >Change Password</a>
		<a href="../index.php?logout='1'" style="color: red;" id="right"><small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						</small>Logout</a>

		</div>