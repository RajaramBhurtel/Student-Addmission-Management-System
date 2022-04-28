<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'admission');

	// initialize variables
	$fname = "";
	$lname = "";
	$email= "";
	$password= "";
	$id = 0;
	$update = false;


if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];


	mysqli_query($db, "UPDATE users SET fname='$fname', lname='$lname', email='$email' WHERE id=$id");
	$_SESSION['message'] = "Record updated!"; 
	header('location: edit.php');
}
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM users WHERE id=$id");
	$_SESSION['message'] = "Record deleted!"; 
	header('location: edit.php');
}