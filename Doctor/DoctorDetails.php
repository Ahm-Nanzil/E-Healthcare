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

    $sheduleID=$_GET['s_id'];
    $docID=$_GET['d_id'];

 
 $d_id=mysqli_query($conn,$sheduleID);
 	$show_doctor_profile_query="select * from doctor inner join schedule on schedule.d_id=doctor.id WHERE s_id='$_GET[s_id]'" ;
	   $show_run_doctor_profile_query=mysqli_query($conn,$show_doctor_profile_query);
	      $row = mysqli_fetch_array($show_run_doctor_profile_query);



         echo 	'<div class="dropdown">
  		<button class="dropbtn">Request For Appointment</button>
  		<div class="dropdown-content">
    	<a href="index.php?content=request&line=on&d_id='.$docID.'">Online Appoinment</a>
    	<a href="index.php?content=request&line=off&d_id='.$docID.'">Offline Appoinment</a>
    	
  		</div>
		</div>';

				?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <style>

  </style>
</head>
<body>
   <!-- Scroll -->
   <script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>





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
                  
                                     <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
</body>
</html>