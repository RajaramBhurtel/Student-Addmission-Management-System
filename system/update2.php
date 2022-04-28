<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'admission');

	// initialize variables
	$fname = "";
	$lname = "";
	$email= "";
	$id = 0;
	$update = false;


if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$snum = $_POST['smob'];
	$pname = $_POST['pname'];
	$pocc =$_POST['pocc'];
	$pmob = $_POST['pmbl'];
	$gn = $_POST['gen'];
	$ctol = $_POST['ctl'];
	$cmun = $_POST['cmp'];
	$ccity = $_POST['cct'];
	$ptole = $_POST['ptl'];
	$pmun = $_POST['pmun'];
	$pcity = $_POST['pct'];
	$sub = $_POST['sub'];
	$tb = $_POST['b1'];
	$ty = $_POST['y1'];
	$tg = $_POST['g1'];
	$bb = $_POST['b2'];
	$by = $_POST['y2'];
	$bg = $_POST['g2'];


	mysqli_query($db, "UPDATE users SET fname='$fname', lname='$lname', email='$email' WHERE id=$id");
	mysqli_query($db, "UPDATE application SET umobile='$snum', pname= '$pname', pmobile='$pmob', gender='$gn', ctole='$ctol', cmun='$cmun', ccity='$ccity', ptole='$ptole', pmun='$pmun', pcity='$pcity', subject='$sub', tboard='$tb', tyear='$ty', tgpa='$tg', bboard='$bb', byear='$by', bgpa='$bg' WHERE id=$id");
	$_SESSION['message'] = "Record updated!"; 
	header('location: report.php');
}
// if (isset($_GET['del'])) {
// 	$id = $_GET['del'];
// 	mysqli_query($db, "DELETE FROM users WHERE id=$id");
// 	$_SESSION['message'] = "Record deleted!"; 
// 	header('location: edit.php');
// }