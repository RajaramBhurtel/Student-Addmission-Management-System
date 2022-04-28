<?php
	include('functions.php'); 

  if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
  }

  $id=$_SESSION['user']['id'];
  $query1=mysqli_query($db ,"select * from application where id='".$id."'");
  $res1=mysqli_fetch_row($query1);

  if($res1)
   {
    header('location:report.php');
   }
  ?>

<?php include('header.php'); ?>
      <title>Admission Form</title>
    </head>
     <body >
            <div class="header">
        <h2>Personal Details</h2>
    </div>
        <form id="adform" action="functions.php" method="post">
           <table class="frmtbl" cellpadding="2" cellspacing="10">
                 <tr border="1" class="hdrow" >    
                 </tr>    
                  <tr>
                    <td class="input-group"> <font style="font-family: Verdana;">Student's Mobile No.</font>  </td>
                    <td colspan="3" class="input-group"> 
                    <input type="text" id="uphn2" name="smob" placeholder="Mobile Number" required="true" ></td>
                  </tr>
                
                  <tr>
                    <td><font style="font-family: Verdana;"> Parents's Name</font></td>
                    <td class="input-group" colspan="3"> <input type="text" id="name" name="pname" required="true" VT="NM"> </td>
                   </tr>
                 
                  <tr>
                    <td> <font style="font-family: Verdana;">Parents's Occupation</font></td>
                    <td class="input-group"> <input type="text" id="pocc" name="pocc" required="true" > </td>
                  </tr>
                  <tr>
                    <td><font style="font-family: Verdana;">Parent's Mobile No.</font></td>
                    <td class="input-group"> <input type="text" id="ufphn" name="pmbl" required="true" > </td>
                  </tr>
                
               
                <tr>
                    <td> <font style="font-family: Verdana;">Sex </font>
                    <td id="user_type1"><input type="radio" id="gen" name="gen" value="Male"><font style="font-family: Verdana;">Male</font>
                     <input type="radio" id="gen" name="gen" value="Female"><font style="font-family: Verdana;">Female </font></td>       
                    
                </tr>
                
                <tr>
                    <td><font style="font-family: Verdana;"> Correspondent Address</font>
                    <td class="input-group" colspan="3"><input type="text" id="ctl1" name="ctl" class="ad" placeholder="Tole" required="true"><br>
                          <input type="text" id="cast" name="cmp" class="ad" placeholder="Municipality" style="margin-top: 4px;" required="true"><br>
                          
                          <input type="text" id="camob" name="cct" class="ad" placeholder="City" style="margin-top: 4px;" required="true"><br>
                </td>
                
                <tr>
                    <td> <font style="font-family: Verdana;">Permanent Address</font>
                    <td class="input-group" colspan="3"><input type="text" id="ptl1" name="ptl" placeholder="Tole" class="ad" required="true"><br>
                          <input type="text" id="past" name="pmun" class="ad" placeholder="Municipality" style="margin-top: 4px;" required="true"><br>
                          
                          <input type="text" id="pamob" name="pct" class="ad" placeholder="City" style="margin-top: 4px;" required="true"><br>
                    </td>
                </tr>   
               </tbody>
              </table>
                  <tr>
                    <td colspan="4">
                      <center >        <div class="input-group">
                  <button type="submit" class="btn" name="add1">Next</button>
        </div></center>
                                </td>
                           </tr>
                       </table>
            <br>
                       
                            
            <br>

            <div>

                       
                  </form>


