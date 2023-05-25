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
    $userID_value= $_COOKIE["userID"];
    $patient_ID=$_GET['p_id'];
    $status_ID=$_GET['s_id'];
    $catagory=$_GET['catagory'];

    if($catagory){
        
        {  //   SQL:     UPDATE tCompany record
		
            $appoinment_SQLupdate = "UPDATE doctor_appoinment  SET ";			
            $appoinment_SQLupdate .=  "online_status = 'Cancel', online_schedule='' ";
            $appoinment_SQLupdate .=  "WHERE d_ID = '".$userID_value."' AND p_ID = '".$patient_ID."'AND ID = '".$status_ID."'"; 			
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
        {  //   SQL:     UPDATE tCompany record
		
            $appoinment_SQLupdate = "UPDATE doctor_appoinment  SET ";			
            $appoinment_SQLupdate .=  "offline_status = 'Cancel' , offline_schedule='' ";
            $appoinment_SQLupdate .=  "WHERE d_ID = '".$userID_value."' AND p_ID = '".$patient_ID."'AND ID = '".$status_ID."'"; 			
        }
        {
            
                    
            if (mysqli_query($conn,$appoinment_SQLupdate))  {	
                echo '<span style="color:green; ">Successfully update the Status.</span><br /><br />';
            } else {
                echo '<span style="color:red; ">FAILED to update the company.</span><br /><br />';
                
            }	
    }
    }

    


    


 }
 



//close database connection
 $conn->close();

?>