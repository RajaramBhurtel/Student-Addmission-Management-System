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
        <h2>Academic Details</h2>
    </div>
        <form id="adform" action="#" method="post"> 
            <table class="frmtbl" cellpadding="2" cellspacing="10">
                
                <tr border="1" class="hdrow" >
                    
                 </tr>       
               <tr>
                    <td><font style="font-family: Verdana;">Choice of Subject</font></td>
                    <td class="input-group"><select  name="sub" >
                         <option>Select</option>
                         <option value="+2(Science)">+2(Science)</option>
                         <option value="+2(Management)">+2(Management)</option>
                         <option value="BCA">BCA</option>
                         <option value="BBS">BBS</option>
                         <option value="BSW">BSW</option>
                        
                         </select>
                     </td>
               </tr>
                <tr>
                   <td><font style="font-family: Verdana;">Academic Qualification</font></td>
                   <td colspan="3">
                       <table class="table table-hover">
                           <thead>
                               <tr>
                                    <th ><font style="font-family: Verdana;font-size: small">Exam</font> <br><font style="font-family: Verdana; font-size: small">passed</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">Name of</font> <br><font style="font-family: Verdana;font-size: small">Board/University</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">Year of</font> <br><font style="font-family: Verdana;font-size: small"> Passing</font></th>
                                    
                                    
                                    <th><font style="font-family: Verdana;font-size: small">GPA</font></th>
                 </tr>   
                           </thead>
                            <tbody>
                           <tr>
                               <td ><?php echo "10th"; ?></td>
                               <td class="input-group"><input type="text" id="nob1" name="b1" required="true"></td>
                               <td class="input-group"><input type="text" id="yop1" name="y1" class="actab" required="true"></td>
                               <td class="input-group"><input type="text" id="tm1" name="g1" class="actab" required="true"></td>
                              
                           </tr>
                           <tr>
                               <td><?php echo "12th/Diploma"; ?> </td>
                               <td class="input-group"><input type="text" id="nob2" name="b2" required="true"></td>
                               <td class="input-group"><input type="text" id="yop2" name="y2" class="actab" required="true"></td>
                               <td class="input-group"><input type="text" id="tm2" name="g2" class="actab" required="true"></td>
                         
                           </tr>
                           
                            </tbody>
                       </table>
               <tr>
                                <td colspan="4">
                                   <center >        <div class="input-group">
            <button type="submit" class="btn" name="add2">Next</button>
        </div></center>
                                </td>
                           </tr>
                       </table>
            <br>
                       
                            
            <br>
                       
                  </form>

