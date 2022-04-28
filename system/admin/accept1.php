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
if (isset($_GET['id'])) {
		$id = $_GET['id'];
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
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:\xampp\htdocs\email\vendor\autoload.php';
$mail = new PHPMailer(TRUE);
try {
   
   $mail->setFrom('sabinbhurtel@gmail.com', 'System');
   $mail->addAddress($email, 'Applicant');

   $mail->Subject = 'Application Accepted';
   $mail->Body = 'Dear '.$fname.',

   		Your application has been accepted to join ABC College.';
   
   /* SMTP parameters. */
   
   /* Tells PHPMailer to use SMTP. */
   $mail->isSMTP();
   
   /* SMTP server address. */
   $mail->Host = 'smtp.elasticemail.com';

   /* Use SMTP authentication. */
   $mail->SMTPAuth = TRUE;
   
   /* Set the encryption system. */
   $mail->SMTPSecure = 'tls';
   
   /* SMTP authentication username. */
   $mail->Username = 'sabinbhurtel@gmail.com';
   
   /* SMTP authentication password. */
   $mail->Password = '5F228B1569386096945A692FEEA6FA8CA867';
   
   /* Set the SMTP port. */
   $mail->Port = 587;
   
   /* Finally send the mail. */
   
   if ($mail->send()) {
   	$sql = mysqli_query($db, "UPDATE status Set status='Accepted' WHERE id = $id");
   }
   header('location:view.php');
}
catch (Exception $e)
{
   echo $e->errorMessage();
}
catch (\Exception $e)
{
   echo $e->getMessage();
}

?>
