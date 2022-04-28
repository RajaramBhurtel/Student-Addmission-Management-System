<?php   
include('../functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../login.php");
}

?>
<html>
<head>
	<title>View Admission Details</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
	

</head>
<body>
	 <?php include('head.php'); ?>
	<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>

<?php $result1 = mysqli_query($db, "SELECT * FROM application"); ?>


<table>
	<thead>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Status</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	<?php 
	 while ($row1 = mysqli_fetch_array($result1)) { ?>
	 	<?php $id = $row1['id']; ?>
		<?php $results = mysqli_query($db, "SELECT * FROM users Where id = '$id'"); ?>
		<?php $result2 = mysqli_query($db, "SELECT * FROM status Where id = '$id'"); ?>
		<?php 
	  		while ($row = mysqli_fetch_array($results)) { ?>
	  			<?php 
	  				while ($row2 = mysqli_fetch_array($result2)) { ?>
				<tr>
					<td><?php echo $row['fname']; ?></td>
					<td><?php echo $row['lname']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td><?php echo $row2['status']; ?></td>

					<td id="dis">
						<a href="viewde.php?id=<?php echo $row['id']; ?>" class="view_btn">View</a>
						<a href="accept1.php?id=<?php echo $row['id']; ?>" class="edit_btn" id="btnid"  >Accept</a>
						<a href="rejected.php?id=<?php echo $row['id']; ?>" class="del_btn">Reject</a>
					</td>
				</tr>
	<?php } ?>
<?php } ?>
<?php } ?>
</table>


</body>
</html>
