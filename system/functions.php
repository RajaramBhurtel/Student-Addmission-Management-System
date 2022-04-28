<?php 
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'admission');

// variable declaration
$username = "";
$email    = "";
$errors   = array(); 


//code to perform user registration
// call the register() function if register_btn is clicked
if (isset($_POST['register'])) {
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    =  e($_POST['username']);
	$lastname    =  e($_POST['lastname']);
	$email       =  e($_POST['email']);
	$password_1  =  e($_POST['pw1']);
	$password_2  =  e($_POST['pw2']);

	// form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($lastname)) { 
		array_push($errors, "Lastname is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE fname='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['fname'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email already exists");
    }
  }


	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO users (fname, lname, email, password, user_type) 
					  VALUES('$username', '$lastname', '$email', '$password', '$user_type')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location:login.php');
		}
		else{
			
			
			$query = "INSERT INTO users (fname, lname, email, password, user_type) 
					  VALUES('$username', '$lastname', '$email', '$password', 'user')";

			mysqli_query($db, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location:login.php');				
		}

	}
}


// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

// log user out if logout button clicked
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}


// call the login() function if register_btn is clicked
if (isset($_POST['login'])) {
	login();
}

// LOGIN USER
function login(){
	global $db, $username, $errors;

	// grap form values
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM users WHERE fname='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {


				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: admin/home.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: index.php');
			}
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}



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


// call the add() function if next_btn is clicked
/*if (isset($_POST['add11'])) {
	admission();
}
function add11(){
	global $db;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$firstname  =  e($_POST['fname']);
	$lastname   =  e($_POST['lname']);
	$email      =  e($_POST['email']);
	$mobile  	=  e($_POST['smob']);
	$pname  	=  e($_POST['pname']);
	$pocc  		=  e($_POST['pocc']);
	$pmbl  		=  e($_POST['pmbl']);
	$gender  	=  e($_POST['gen']);
	$ctole  	=  e($_POST['ctl']);
	$cmun  		=  e($_POST['cmp']);
	$ccity  	=  e($_POST['cct']);
	$ptole  	=  e($_POST['ptl']);
	$pmun  		=  e($_POST['pmun']);
	$pcity  	=  e($_POST['pct']);
	$subject  	=  e($_POST['sub']);
	$sboard  	=  e($_POST['b1']);
	$syear  	=  e($_POST['y1']);
	$sgpa  		=  e($_POST['g1']);
	$nboard  	=  e($_POST['b2']);
	$nyear  	=  e($_POST['y2']);
	$ngpa  		=  e($_POST['g2']);
	

	$query = "INSERT INTO application (fname, Last, email, umobile, pname, pocc, pmobile, gender,
			  ctole, cmun, ccity, ptole, pmun, pcity ,subject, tboard, tyear, tgpa, bboard, byear,bgpa)

			  VALUES('$firstname','$lastname','$email','$mobile','$pname','$pocc','$pmbl','$gender','
			  $ctole','$cmun','$ccity','$ptole','$pmun','$pcity','$subject','$sboard','$syear','$sgpa','$nboard','$nyear','$ngpa' )";


	mysqli_query($db, $query);
	$_SESSION['success']  = "New user successfully created!!";
	header('location:upload.php');


	}*/



if (isset($_POST['add1'])) {
	add1();
}
function add1(){
	global $db;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
    $id=$_SESSION['user']['id'];
	// $firstname  =  e($_POST['fname']);
	// $lastname   =  e($_POST['lname']);
	// $email      =  e($_POST['email']);
	$mobile  	=  e($_POST['smob']);
	$pname  	=  e($_POST['pname']);
	$pocc  		=  e($_POST['pocc']);
	$pmbl  		=  e($_POST['pmbl']);
	$gender  	=  e($_POST['gen']);
	$ctole  	=  e($_POST['ctl']);
	$cmun  		=  e($_POST['cmp']);
	$ccity  	=  e($_POST['cct']);
	$ptole  	=  e($_POST['ptl']);
	$pmun  		=  e($_POST['pmun']);
	$pcity  	=  e($_POST['pct']);

	

	$query = "INSERT INTO application (id, umobile, pname, pocc, pmobile, gender,
			  ctole, cmun, ccity, ptole, pmun, pcity)

			  VALUES('$id','$mobile','$pname','$pocc','$pmbl','$gender','
			  $ctole','$cmun','$ccity','$ptole','$pmun','$pcity')";


	mysqli_query($db, $query);
	$_SESSION['success']  = "Updated successfully!!";
	header('location:admission2.php');


	}

if (isset($_POST['add2'])) {
	add2();
}
function add2(){
	global $db;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$id=$_SESSION['user']['id'];
	$subject  	=  e($_POST['sub']);
	$sboard  	=  e($_POST['b1']);
	$syear  	=  e($_POST['y1']);
	$sgpa  		=  e($_POST['g1']);
	$nboard  	=  e($_POST['b2']);
	$nyear  	=  e($_POST['y2']);
	$ngpa  		=  e($_POST['g2']);
	

	$query = "UPDATE application SET subject ='$subject', tboard ='$sboard', tyear ='$syear', tgpa ='$sgpa', bboard='$nboard', byear='$nyear',
		bgpa='$ngpa'
	 WHERE id=$id";


	mysqli_query($db, $query);
	$_SESSION['success']  = "Updated!!";
	header('location:admission3.php');


	}

	if (isset($_POST['add3'])){
		add3();
	}

	function add3(){
		global $db;

			/*$location="upload/";
			$file1=$_FILES['photo']['name'];
			$file_tmp1=$_FILES['photo']['tmp_name'];
			$file2=$_FILES['slc']['name'];
			$file_tmp2=$_FILES['slc']['tmp_name'];
			$file3=$_FILES['c2']['name'];
			$file_tmp3=$_FILES['c2']['tmp_name'];
			$file4=$_FILES['t2']['name'];
			$file_tmp4=$_FILES['t2']['tmp_name'];
			$data=[];
			$data=[$file1,$file2,$file3,$file4];

			$images=implode(' ',$data);
			$query="insert into upload (car_name,) values('$name','$images')";
			$fire=mysqli_query($con,$query);
			if($fire)
			{
				move_uploaded_file($file_tmp1, $location.$file1);
				move_uploaded_file($file_tmp2, $location.$file2);
				move_uploaded_file($file_tmp3, $location.$file3);
				move_uploaded_file($file_tmp4, $location.$file4);
				echo "success";
			}
			else
			{
				echo "failed";
			}*/


			$picpath="upload/pic/";
			$docpath="upload/cert/";
			$proofpath="upload/ctz/";
			/*$id=$_SESSION['user'];*/
			$id=$_SESSION['user']['id'];
			$picpath=$picpath.$_FILES['photo']['name'];
			$docpath1=$docpath.$_FILES['slc']['name'];     
			$docpath2=$docpath.$_FILES['c2']['name']; 
			$docpath3=$docpath.$_FILES['t2']['name']; 
			/*$docpath4=$docpath.$_FILES['fdcdoc']['name'];*/     
			$proofpath1=$proofpath.$_FILES['cf']['name']; 
			$proofpath2=$proofpath.$_FILES['cb']['name']; 

			if(move_uploaded_file($_FILES['photo']['tmp_name'],$picpath)
			  && move_uploaded_file($_FILES['slc']['tmp_name'],$docpath1)
			  && move_uploaded_file($_FILES['c2']['tmp_name'],$docpath2)
			  && move_uploaded_file($_FILES['t2']['tmp_name'],$docpath3)
			  /*&& move_uploaded_file($_FILES['fdcdoc']['tmp_name'],$docpath4)*/
			  && move_uploaded_file($_FILES['cf']['tmp_name'],$proofpath1)
			  && move_uploaded_file($_FILES['cb']['tmp_name'],$proofpath2))
			{

			$img=$_FILES['photo']['name'];
			$img1=$_FILES['slc']['name'];
			$img2=$_FILES['c2']['name'];
			$img3=$_FILES['t2']['name'];
			$img4=$_FILES['cf']['name'];
			$img5=$_FILES['cb']['name'];


			$sql="INSERT into file (id, photo, slc, character12, trans, citizen_f, citizen_b) 
			values ('$id','$img','$img1','$img2','$img3','$img4','$img5')";
			$sql1 ="INSERT into status (id, status) values ('$id','Pending..')";
			        if (mysqli_query($db, $sql)) {
			        		$res=mysqli_query($db, $sql1);
			        		header('location:report.php');
			     			echo "Inserted to DB "; 
			    }else
			    {
			         echo "Error: " . $sql . "<br>" . mysqli_error($db);       
			    }
			}
			else
			{
			echo "There is an error,please retry or ckeck path";
			}
	}
?>