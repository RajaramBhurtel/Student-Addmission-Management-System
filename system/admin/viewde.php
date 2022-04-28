<?php
  
  include('../functions.php'); 

      if (!isLoggedIn()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}
  $id = $_GET['id'];
  // $con=mysqli_connect("localhost","root","","admission");
  $q=mysqli_query($db,"select fname from users where id=$id ");
  $n=  mysqli_fetch_assoc($q);
  $stname= $n['fname'];
  // $id=$_SESSION['user']['id'];

  $result = mysqli_query($db,"SELECT * FROM application WHERE id=$id ");
                      
                    while($row = mysqli_fetch_array($result))
                        {
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Admission Report</title>
        
        
        
       <!--  <link type="text/css" rel="stylesheet" href="style1.css"></link> -->
        <style>
                    table,
                      th,
                      td {
                    padding: 10px;
                    border: 2px solid black;
                    border-collapse: collapse;
                    padding: 8px;
                  }
                  .table{
                      border-collapse: collapse;
                       width: 60%;
                  }
                  .table td {
                    padding-top: 12px;
                    padding-bottom: 12px;
                    text-align: left;
                    
        
}
    </style>
       
        
        
    </head>
    <body>

      <?php include('head.php'); ?>

        <div class="container-fluid" id="print">
                            <div class="row">
                               <div class="col-sm-12">
      <center>  <table class="table table-bordered" style="font-family: Verdana" cellspacing="20">
                
                <tr><center>
                 <td style="width:5%;"><br><br><img src="../images/logo.png" width="90%"> </td></center>
                 <td style="width:8%;"><center><font style="font-family:Arial Black; font-size:20px;">
                     <br><br>
                   ABC College of science and technology</font></center>
                
                <center><font style="font-family:Verdana; font-size:18px;">
                    Phone : 01-4310000, Email:abccollege@edu.com
                    </font></center>
                
                <br>
                <br>
                <center><font style="font-family:Arial Black; font-size:20px;">
                    ADMISSIONS (2077/78)</font></center>
                </td>
                    <td colspan="2" width="5%" >
                   <?php
                  
                    $picfile_path ='../upload/pic/';
                    
                    $result1 = mysqli_query($db,"SELECT * FROM file where id=$id ");
                        
                    while($row1 = mysqli_fetch_array($result1))
                      {                  
                        $picsrc=$picfile_path.$row1['photo'];
                        
                        echo "<img src='$picsrc.' class='img-thumbnail' width='80%' style='height:160px;'>";
                        echo"<div>";
                      }
                      
                    
                      
                      
                        $resdata = mysqli_query($db,"SELECT * FROM users WHERE id=$id ");
                    
                    while($rowdata = mysqli_fetch_array($resdata))
                      {
                        
                    
                   ?>
                        </td>
                 </tr>      
                 <tr>
                    <td> <font style="font-family: Verdana;">Application ID  </font> </td>
                    <td colspan="3"> <?php echo $id ?> </td>
                </tr>
                 <tr>
                 <td style="width:4%;"> <font style="font-family: Verdana;">Name  </font> </td>
                    <td style="width:8%;" colspan="3"> <?php echo $stname;?> &nbsp; <?php echo $rowdata[2]  ?> </td>
                 </tr>
                 
                 
                
                  
                
                <tr>
                    <td> <font style="font-family: Verdana;">Email  </font> </td>
                      <td colspan="3"> <?php echo $rowdata[3]  ?> </td>
                </tr>
                  <?php
                      }
                      ?>
                
                
                  <tr>
                    <td > <font style="font-family: Verdana;"> Mobile No.</font>  </td>
                    <td colspan="3"> <?php echo $row[2]. '   ' ?></td>
                  </tr>
                
                  <tr>
                    <td><font style="font-family: Verdana;"> Parent's Name</font></td>
                    <td  colspan="3"><?php echo $row[3] ?> </td>
                   </tr>
                 


                  <tr>
                    <td> <font style="font-family: Verdana;"> Parent's Occupation</font></td>
                    <td> <?php echo $row[4] ?></td>
                </tr>

                    <tr>
                        <td><font style="font-family: Verdana;"> Parent's Mobile No.</font></td>
                        <td> <?php echo $row[5] ?> </td>
                  </tr>
                
                <tr>
                    <td> <font style="font-family: Verdana;">Sex </font></td>
                    <td colspan="3"><?php echo $row[6] ?></td>       
                    
                </tr>
                
                <tr>
                    <td><font style="font-family: Verdana;"> Correspondent Address</font>
                    <td colspan="3"><?php echo 'Tole :'. $row[7] ?><br>
                          <?php echo 'Municiapality :'. $row[8] ?><br>
                          <?php echo 'City :'. $row[9] ?><br>
                         
                </td>
                
                <tr>
                    <td> <font style="font-family: Verdana;">Permanent Address</font>
                    <td colspan="3"><?php echo 'Tole :'. $row[10] ?><br>
                          <?php echo 'Municiapality :'. $row[11] ?><br>
                          <?php echo 'City :'. $row[12] ?><br>
                          
                </td>
                </tr>   
               
               
                
                <tr>
                     <td><font style="font-family: Verdana;">Choice of stream</font></td>
                     <td colspan="3"><?php echo $row[13] ?>
                     </td>
                     
                </tr>
                
          
               <tr>
                   <td><font style="font-family: Verdana;">Academic Qualification</font></td>
                   <td colspan="3">
                       <table class="table table-hover">
                           <thead>
                               <tr>
                                    <th><font style="font-family: Verdana;font-size: small">Exam</font> <br><font style="font-family: Verdana; font-size: small">passed</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">Name of</font> <br><font style="font-family: Verdana;font-size: small">Board/University</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">Year of</font> <br><font style="font-family: Verdana;font-size: small"> Passing</font></th>
                                    <th><font style="font-family: Verdana;font-size: small">GPA</font><br><font style="font-family: Verdana;font-size: small"></font></th>

                              </tr>   
                           </thead>
                            <tbody>
                           <tr>
                               <td><?php echo "10th"; ?></td>
                               <td><?php echo $row[14] ?></td>
                               <td><?php echo $row[15] ?></td>
                               <td><?php echo $row[16] ?></td>
                               
                               
                           </tr>
                           <tr>
                               <td><?php echo "12th/Diploma"; ?> </td>
                               <td><?php echo $row[17] ?></td>
                               <td><?php echo $row[18] ?></td>
                               <td><?php echo $row[19] ?></td>
                              
                           </tr>
                           
                            </tbody>
                       </table>

                 
                       </table>
                               </div>
                            </div>
            </div>
        <?php
              }
        ?>
             <center> <br>  <br><input type="submit" id="print" class="btn" value="Print" onclick="printPageArea('print')">
              
             <!-- <a href="index.php?logout='1'" style="color: red;">logout</a> --></center>
    </body>
</html>

 <script type="text/javascript">
            

      function printPageArea(print){
      var printContents = document.getElementById('print').innerHTML;
      var originalContents = document.body.innerHTML;

      document.body.innerHTML = printContents;

      window.print();

      document.body.innerHTML = originalContents;

    }
        </script>


                     