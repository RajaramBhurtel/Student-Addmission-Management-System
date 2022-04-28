<?php  

include('functions.php');
//check if user is login or not
	if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../login.php");
}
//code for editing
		$id = $_SESSION['user']['id'];
		$update = true;
		$record1 = mysqli_query($db, "SELECT * FROM users WHERE id=$id");
		$record2 = mysqli_query($db, "SELECT * FROM application WHERE id=$id");

		if (mysqli_num_rows($record1) == 1 ) {
			$n = mysqli_fetch_array($record1);
			$fname = $n['fname'];
			$lname = $n['lname'];
			$email = $n['email'];
			// $password = $n['password'];
		}
		if (mysqli_num_rows($record2) == 1 ) {
			$n = mysqli_fetch_array($record2);
			$snum = $n['umobile'];
			$pname = $n['pname'];
			$pocc =$n['pocc'];
			$pmob = $n['pmobile'];
			$gn = $n['gender'];
			$ctol = $n['ctole'];
			$cmun = $n['cmun'];
			$ccity = $n['ccity'];
			$ptole = $n['ptole'];
			$pmun = $n['pmun'];
			$pcity = $n['pcity'];
			$sub = $n['subject'];
			$tb = $n['tboard'];
			$ty = $n['tyear'];
			$tg = $n['tgpa'];
			$bb = $n['bboard'];
			$by = $n['byear'];
			$bg = $n['bgpa'];
			// $password = $n['password'];
		}

?>
<html>
<head>
	<title>Update Application</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
	<?php include('header.php'); ?>

	<div class="header">
        <h2>Update Details</h2>
    </div>
        <form id="adform" action="update2.php" method="post">
      <table class="frmtbl" cellpadding="2" cellspacing="10">
                
                <tr border="1" class="hdrow" >
                    
                 </tr>       
                 <div class="input-group">
			
			<input type="hidden" name="id" value="<?php echo $id; ?>">
		</div>
                 <tr>
                    <td><font style="font-family: Verdana;"> First Name</font></td>
                    <td class="input-group" colspan="3"> <input type="text" id="fname" name="fname" value="<?php echo $fname; ?>"> </td>
                 </tr>
                 <tr>
                    <td><font style="font-family: Verdana;"> Last Name</font></td>
                    <td class="input-group" colspan="3"> <input type="text" id="lname" name="lname" value="<?php echo $lname; ?>"> </td>
                   </tr>
                 <tr>
                    <td><font style="font-family: Verdana;"> Email</font></td>
                    <td class="input-group" colspan="3"> <input type="text" id="ufname" name="email" value="<?php echo $email; ?>"> </td>
                 </tr>

                  <tr>
                    <td class="input-group"> <font style="font-family: Verdana;">Student's Mobile No.</font>  </td>
                    <td colspan="3" class="input-group"> 
                    <input type="text" id="uphn2" name="smob" value="<?php echo $snum; ?>" ></td>
                  </tr>
                
                  <tr>
                    <td><font style="font-family: Verdana;"> Parents's Name</font></td>
                    <td class="input-group" colspan="3"> <input type="text" id="name" name="pname" value="<?php echo $pname; ?>"> </td>
                   </tr>
                 
                  <tr>
                    <td> <font style="font-family: Verdana;">Parents's Occupation</font></td>
                    <td class="input-group"> <input type="text" id="pocc" name="pocc" value="<?php echo $pocc; ?>" > </td>
                  </tr>
                  <tr>
                    <td><font style="font-family: Verdana;">Parent's Mobile No.</font></td>
                    <td class="input-group"> <input type="text" id="ufphn" name="pmbl" value="<?php echo $pmob; ?>" > </td>
                  </tr><tr>
                    <td> <font style="font-family: Verdana;">Gender </font>
                    <td id="user_type1"><input type="radio" id="gen" name="gen" value="Male"><font style="font-family: Verdana;">Male</font>
                     <input type="radio" id="gen" name="gen" value="Female"><font style="font-family: Verdana;">Female </font></td>       
                    
                </tr><tr>
                    <td><font style="font-family: Verdana;"> Correspondent Address</font>
                    <td class="input-group" colspan="3"><input type="text" id="ctl1" name="ctl" class="ad" value="<?php echo $ctol; ?>"><br>
                          <input type="text" id="cast" name="cmp" class="ad" value="<?php echo $cmun; ?>"><br>
                          
                          <input type="text" id="camob" name="cct" class="ad" value="<?php echo $ccity; ?>"><br>
                </td><tr>
                    <td> <font style="font-family: Verdana;">Permanent Address</font>
                    <td class="input-group" colspan="3"><input type="text" id="ptl1" name="ptl" value="<?php echo $ptole; ?>"><br>
                          <input type="text" id="past" name="pmun" class="ad" value="<?php echo $pmun; ?>"><br>
                          
                          <input type="text" id="pamob" name="pct" class="ad" value="<?php echo $pcity; ?>"><br>
                    </td>
                </tr>  <tr>
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
               </tr><tr>
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
                               <td ><?php /*echo "10th";*/ ?></td>
                               <td class="input-group"><input type="text" id="nob1" name="b1" value="<?php echo $tb; ?>"></td>
                               <td class="input-group"><input type="text" id="yop1" name="y1" class="actab" value="<?php echo $ty; ?>"></td>
                               <td class="input-group"><input type="text" id="tm1" name="g1" class="actab" value="<?php echo $tg; ?>"></td>
                              
                           </tr>
                           <tr>
                               <td><?php /*echo "12th/Diploma"*/; ?> </td>
                               <td class="input-group"><input type="text" id="nob2" name="b2" value="<?php echo $bb; ?>"></td>
                               <td class="input-group"><input type="text" id="yop2" name="y2" class="actab" value="<?php echo $by; ?>"></td>
                               <td class="input-group"><input type="text" id="tm2" name="g2" class="actab" value="<?php echo $bg; ?>"></td>
                         
                           </tr>
                           
                            </tbody>
                       </table>
                       
  
                           

                 
                           
                           <tr>
                                <td colspan="4">
                                   <center >        <div class="input-group">
            <button type="submit" class="btn" name="update">Update</button>
        </div></center>
                                </td>
                           </tr>
                       </table>
            <br>
                       
                            
            <br>

            <div>

                       
                  </form>
</body>
</html>