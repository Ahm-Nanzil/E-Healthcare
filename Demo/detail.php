
<?php 
 if(isset($_GET['s_id'])){

    include 'C:\xampp\htdocs\Health Care\Config\Config.php';
    $conn = new mysqli($servername, $username, $password,$dbname); 
    $dbSuccess=FALSE;
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    else $dbSuccess=TRUE;

    }
 
 $d_id=mysqli_query($conn,$_GET['s_id']);
 	$show_doctor_profile_query="select * from doctor inner join schedule on schedule.d_id=doctor.id WHERE s_id='$_GET[s_id]'" ;
	   $show_run_doctor_profile_query=mysqli_query($conn,$show_doctor_profile_query);
	      $row = mysqli_fetch_array($show_run_doctor_profile_query);

				?>
                        <!-- Grid -->
<div class="w3-row">

<!-- Blog entries -->
<div class="w3-col 18 s12">
  <!-- Blog entry -->
  <div class="w3-card-4 w3-margin w3-black">
    <div class="w3-container">
                     <h1  class=" text-center font-weight-bold text-warning">Personal Information</h1> <hr color="#333333" />
                             <h3 class="text-white ">ID :    <?php  echo  $row['id'] . "<br />";?></br></h3> 
                             <h3 class="text-white"> Name :  <?php  echo   $row['f_name']; echo  $row['l_name']. "<br />";?></br></h3>
                             <h3 class="text-white">Email/Gmail Address :     <?php   echo $row['email'] . "<br />";?></br></h3>
                             <h3 class="text-white"> Contact Number :   <?php  echo   $row['contact'] . "<br />";?></br></h3>
                             <h3 class="text-white"> Clinic Address :   <?php  echo  $row['address'] . "<br />";?></br></h3>
                             <h3 class="text-white"> Qualification :    <?php  echo  $row['qualification'] . "<br />";?></br></h3>
                             <h3 class="text-white"> BMDC Registration Number: <?php  echo  $row['bmdc_reg_num'] . "<br />";?></br></h3>
                              <h3 class="text-white"> Specialism :    <?php  echo  $row['specialist'] . "<br />". "<br />". "<br />";?></h3>
                       <h1 class=" text-center font-weight-bold  text-warning"> Visiting/Appointment Information</h1> <hr color="#333333" />
                          <p class="text-white  font-weight-bold">Schedule ID :    <?php  echo  $row['s_id'] . "<br />";?></p>
                                    <li>  <?php   echo $row['Day_Time1'] . "<br />";?></br></li>
                                    <li>  <?php   echo $row['Day_Time2'] . "<br />";?></br></li>
                                    <li>  <?php   echo $row['Day_Time3'] . "<br />";?></br></li>
                                     <li><?php   echo $row['Day_Time4'] . "<br />";?></br></li>
                                    <li>  <?php   echo $row['Day_Time5'] . "<br />";?></br></li>
                                     <li> <?php   echo $row['Day_Time6'] . "<br />";?></br></li>
                                     <li> <?php   echo $row['Day_Time7'] . "<br />";?></br></br></li>
                        <?php
                      
						
					
				   
		   ?>