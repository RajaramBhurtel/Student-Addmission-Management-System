<?php
// $id =$_GET['edit'];
// echo "$id";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:\xampp\htdocs\email\vendor\autoload.php';

$mail = new PHPMailer(TRUE);

try {
   
   $mail->setFrom('sabinbhurtel@gmail.com', 'System');
   $mail->addAddress('baskotaomprakash1@gmail.com', 'Applicant');
   $mail->Subject = 'Application Accepted';
   $mail->Body = 'Your application has been accepted to join ABC College';
   
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
   $mail->send();
}
catch (Exception $e)
{
   echo $e->errorMessage();
}
catch (\Exception $e)
{
   echo $e->getMessage();
}