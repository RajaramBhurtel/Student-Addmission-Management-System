<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
		<div class="topnav">
		<a href="index.php">Dashboard</a>
		<a href="admission1.php">Admission Form</a>
		<!-- <a href="report.php">Student Profile</a> -->
		<a href="update.php">Update Application</a>
		<a href="change.php" id="right1">Change Password</a>
		<a href="index.php?logout='1'" style="color: red;" id="right"><small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						</small>Logout</a>

		</div>