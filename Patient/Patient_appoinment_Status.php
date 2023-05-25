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

if($dbSuccess){

    //echo $patient_ID;
    $userID_value= $_COOKIE["userID"];
    $patient_ID=$_GET['p_id'];
    $status_ID=$_GET['s_id'];
    $catagory=$_GET['catagory'];
    
    //echo '<br>';
    //echo $patient_ID;
    $submit=$_POST['Submit'];
    $schedule=$_POST['schedule'];
   
    // echo $schedule;
    // echo $dupur;
    // echo $rat;
    // echo $submit;

    if($catagory){
        
  if (isset($submit)){

    // {
    //     $appoinment_Schedule="INSERT INTO `doctor_appoinment` (`ID`, `d_ID`, `f_name`, `l_name`, `p_ID`, `offline_status`, `online_status`, `offline_schedule`, `online_schedule`) VALUES ('".$status_ID."', '".$userID_value."', '', '', '".$patient_ID."', '', '', '', '".$schedule."')";
    //     if (mysqli_query($conn,$appoinment_Schedule))  {	
    //         echo '<span style="color:green; ">Successfully update the Status.</span><br /><br />';
    //     } else {
    //         echo '<span style="color:red; ">FAILED to update the company.</span><br /><br />';
            
    //     }
   
    // }
    

    {  //   SQL:     UPDATE tCompany record
		
        $appoinment_SQLupdate = "UPDATE doctor_appoinment  SET ";			
        $appoinment_SQLupdate .=  "online_status = 'Accept' , online_schedule='".$schedule."' ";
        $appoinment_SQLupdate .=  "WHERE d_ID = '".$userID_value."' AND p_ID = '".$patient_ID."' AND ID = '".$status_ID."'"; 			
    }
    {
        // echo '<span style = "text-decoration: underline;">
        //         SQL statement:</span>
        //         <br />'.$appoinment_SQLupdate.'<br /><br />';
                
        if (mysqli_query($conn,$appoinment_SQLupdate))  {	
            echo '<span style="color:green; ">Successfully update the Status.</span><br /><br />';
        } else {
            echo '<span style="color:red; ">FAILED to update the company.</span><br /><br />';
            
        }	
}

  }

  else {
    echo ' <form action="index.php?content=status_changeP&catagory=online&s_id='.$status_ID.'&p_id='.$patient_ID.'" method="post">
    <input type="radio" name="schedule" value="9 am">
    <label for="vehicle1">From 9:00 am </label><br>
    <input type="radio"  name="schedule" value="12 pm">
    <label for="vehicle1"> From 12:00 pm </label><br>
    <input type="radio"  name="schedule" value="3 pm">
    <label for="vehicle1"> From 6:00 pm </label><br>
    <input type="radio"  name="schedule" value="7 pm">
    <label for="vehicle1">From 8:00 pm </label><br>
    <input type="submit" name="Submit" value="Submit">
  </form>';
  }
  

        
    }


    else{

        if (isset($submit)){
        {  //   SQL:     UPDATE tCompany record
		
            $appoinment_SQLupdate = "UPDATE doctor_appoinment  SET ";			
            $appoinment_SQLupdate .=  "offline_status = 'Accept' , offline_schedule='".$schedule."'";
            $appoinment_SQLupdate .=  "WHERE d_ID = '".$userID_value."' AND p_ID = '".$patient_ID."' AND ID = '".$status_ID."'"; 			
        }
        {
                        
                    

            if (mysqli_query($conn,$appoinment_SQLupdate))  {	
                echo '<span style="color:green; ">Successfully update the Status.</span><br /><br />';
            } else {
                echo '<span style="color:red; ">FAILED to update the company.</span><br /><br />';
                
            }	
    }
    }
    else{
        echo ' <form action="index.php?content=status_changeP&s_id='.$status_ID.'&p_id='.$patient_ID.'" method="post">
        <input type="radio" name="schedule" value="9 am to 12 pm">
        <label for="vehicle1"> 9am to 12pm</label><br>
        
        <input type="radio"  name="schedule" value="3 pm to 6 pm">
        <label for="vehicle1"> 3pm to 6pm </label><br>
        <input type="radio"  name="schedule" value="7 pm to 8 pm">
        <label for="vehicle1">7pm to 8pm </label><br>
        <input type="submit" name="Submit" value="Submit">
      </form>';
    
    }
    

}

 }
 



//close database connection
 $conn->close();

?>