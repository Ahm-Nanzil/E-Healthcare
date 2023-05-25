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

<?php
{
    include 'C:\xampp\htdocs\Health Care\Config\Config.php';
    $conn = new mysqli($servername, $username, $password,$dbname); 
    $dbSuccess=FALSE;
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    else $dbSuccess=TRUE;

    }

    $userID_value= $_COOKIE["userID"];

$edit_doctor_profile_query="select * from doctor where ID='$userID_value'" ;
	
	$edit_run_doctor_profile_query=mysqli_query($conn,$edit_doctor_profile_query);
 
				   while($drow = mysqli_fetch_array($edit_run_doctor_profile_query))
				   {
				?>
			
			
						<?php	 
				  
if(isset($_POST['submit'])){
$userID_value= $_COOKIE["userID"];
$d_Day_Time1=$_REQUEST['Day_Time1'];
  $sat=implode($d_Day_Time1);

$d_Day_Time2=$_REQUEST['Day_Time2'];
$sun=implode($d_Day_Time2);

$d_Day_Time3=$_REQUEST['Day_Time3'];
$mon=implode($d_Day_Time3);

$d_Day_Time4=$_REQUEST['Day_Time4'];
$tues=implode($d_Day_Time4);

$d_Day_Time5=$_REQUEST['Day_Time5'];
$wed=implode($d_Day_Time5);

$d_Day_Time6=$_REQUEST['Day_Time6'];
$thus=implode($d_Day_Time6);

$d_Day_Time7=$_REQUEST['Day_Time7'];
$fri=implode($d_Day_Time7);
$d_d_id=$_COOKIE["userID"];
$choose_doctor_schedule_query="select* from schedule  ";
	$run_doctor_schedule_query=mysqli_query($conn,$choose_doctor_schedule_query);
	
	if(mysqli_num_rows($run_doctor_schedule_query)>0)
	{
	$check_drow= mysqli_fetch_assoc($run_doctor_schedule_query);

	$update_doctor_schedule_query="update schedule set 
	                          Day_Time1='$sat',
							  Day_Time2='$sun' ,
							  Day_Time3='$mon' ,
							  Day_Time4='$tues' ,
							  Day_Time5='$wed' ,
							  Day_Time6='$thus' ,
							  Day_Time7='$fri' 
							
							 where d_id='$d_d_id'  ";
							    
	
	
	$run_update_doctor_schedule_query=mysqli_query($conn,$update_doctor_schedule_query);
	if(isset($run_update_doctor_schedule_query))
	{
	$update_msg="updated ";
		echo"	<script> alert ('Your Scheduling Has Been Submitted')</script> ";
	
	}
	else
	{
	$error_msg="not updated";
	}
	
	}
		else
	{
	$error_msg="user not found";
	}
}


?>
<?php 



?>
<form class=" text-center text-drak text-xl-info font-weight-bold" action = "index.php?content=edit_schedule&d_id='.$userID_value.'" method="POST">
<h3>Enter Your ID :</h3>  <?php
echo $drow['id'];  echo "  " ;		         
 }   ?><br /><br />
 <input  style="color:#000000"type = "d_id" name="d_id"/> <br /><br />
 
<input style="color:#000000" type ="checkbox" name ="Day_Time1[]"  value="Saturday 9:00 AM To 9:00 PM"> Saturday      9:00 AM To 9:00 PM<br />
 
 

<input style="color:#000000" type ="checkbox" name ="Day_Time2[] " value="Sunday 9:00 AM To 9:00 PM">   Sunday        9:00 AM To 9:00 PM<br />
 

<input style="color:#000000" type ="checkbox" name ="Day_Time3[]"  value="Monday 9:00 AM To 9:00 PM">    Monday        9:00 AM To 9:00 PM<br />
 
 
  
<input style="color:#000000"type ="checkbox" name ="Day_Time4[] " value="Tuesday 9:00 AM To 9:00 PM">  Tuesday       9:00 AM To 9:00 PM<br />
 
 

<input style="color:#000000"type ="checkbox" name ="Day_Time5[] " value="Wednesday 9:00 AM To 9:00 PM">Wednesday     9:00 AM To 9:00 PM<br />
 


<input style="color:#000000"type ="checkbox" name ="Day_Time6[]"  value="Thursday 9:00 AM To 9:00 PM"> Thursday       9:00 AM To 9:00 PM<br />
 


<input style="color:#000000"type ="checkbox" name ="Day_Time7[] " value="Friday 9:00 AM To 9:00 PM">  Friday         9:00 AM To 9:00 PM<br />

 <br /><button class="btn"><i class="fa fa-fa-2x "></i> <input style="color:#000000" class="text-xl-info font-weight-bold" type ="submit" name="submit" value="Submit"></i></button>  <br />
	
                
     <?php               
if(isset($error_msg)){echo $error_msg;}
if(isset($update_msg)){echo $update_msg;}

?>

</form>

</body>
</html>