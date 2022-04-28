<?php
	include('functions.php'); 

      if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
  ?>
<?php include('header.php'); ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        
        <link type="text/css" rel="stylesheet" href="style1.css"></link>
         <script language="javascript" type="text/javascript" src="jquery/jquery-1.10.2.js"></script>
      <title>Admission Form</title>
    </head>
     <body >
            <div class="header">
        <h2>Documents Upload</h2>
         <h5>Each File Name must contains applicant name*</h5>
    </div>
        <form id="adform" action="#" method="post" enctype="multipart/form-data">
 <table class="frmtbl" cellpadding="2" cellspacing="10">
                
                <tr border="1" class="hdrow" >
                    
                 </tr>  <tr>
                    <td><font style="font-family: Verdana;">Student Photo</font></td>
                    <td class="input-group">
                      <input type="file" name="photo">
                     </td>
               </tr>

               <tr>
                    <td><font style="font-family: Verdana;">SLC Chatacter</font></td>
                    <td class="input-group">
                      <input type="file" name="slc">
                     </td>
               </tr>

               <tr>
                    <td><font style="font-family: Verdana;">+2 Character</font></td>
                    <td class="input-group">
                      <input type="file" name="c2">
                     </td>
               </tr>

               <tr>
                    <td><font style="font-family: Verdana;">+2 Transcript</font></td>
                    <td class="input-group">
                      <input type="file" name="t2">
                     </td>
               </tr>

               <tr>
                    <td><font style="font-family: Verdana;">Citizenship Front</font></td>
                    <td class="input-group">
                      <input type="file" name="cf">
                     </td>
               </tr>
               <tr>
                    <td><font style="font-family: Verdana;">Citizenship Back</font></td>
                    <td class="input-group">
                      <input type="file" name="cb">
                     </td>
               </tr>
         </tbody>
                       </table>
 <tr>
                                <td colspan="4">
                                   <center >        <div class="input-group">
            <button type="submit" class="btn" name="add3">Upload</button>
        </div></center>
                                </td>
                           </tr>
                       </table>
            <br>
                       
                            
            <br>
            
                       
                  </form>

