<?php 
/*
session_start();
$userID_value = $_SESSION['userid'];
*/
?>
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

    $d_id=$_GET['d_id'];
    //$d_id='123';
    $line=$_GET['line'];
    
    //echo $
    $status='waiting';



     //Query Name of Doctor
     $dFullName = "SELECT * ";
     $dFullName .= "FROM ";
     $dFullName .= "doctor ";
     $dFullName .= "WHERE id = '".$d_id."' ";
     
     $dFullName_Query = mysqli_query($conn,$dFullName);	
     
     while ($row = mysqli_fetch_array($dFullName_Query, MYSQLI_ASSOC)) {
        
         $fName = $row['f_name'];
         $lName = $row['l_name'];
 
          
                              
     }
     mysqli_free_result($dFullName_Query);


     

    // {  //   SQL:     $appoinment_SQL
        

	
		
		
    //     $appoinment_SQL = "INSERT INTO doctor_appoinment (";			
    //     $appoinment_SQL .=  "d_ID, ";
    //     $appoinment_SQL .=  "f_name, ";
    //     $appoinment_SQL .=  "l_name, ";
    //     $appoinment_SQL .=  "p_ID, ";
    //     $appoinment_SQL .=  "offline_status";
    //     $appoinment_SQL .=  "online_status";
    //     $appoinment_SQL .=  "offline_schedule";
    //     $appoinment_SQL .=  "online_schedule";
    //     $appoinment_SQL .=  ") ";
        
    //     $appoinment_SQL .=  "VALUES (";
    //     $appoinment_SQL .=  "'".$d_id."', ";
    //     $appoinment_SQL .=  "'".$fName."', ";
    //     $appoinment_SQL .=  "'".$lName."', ";
    //     $appoinment_SQL .=  "'".$userID_value."', ";
    //     $appoinment_SQL .=  "'".$status."', ";
    //     $appoinment_SQL .=  ", ";
    //     $appoinment_SQL .=  ", ";
    //     $appoinment_SQL .=  " ";
    //     $appoinment_SQL .=  ") ";
    // }

    if($line=="off"){
     // echo "jjjjjjjjjjj";
     $appoinment_SQL='INSERT INTO doctor_appoinment(d_ID,f_name,l_name,p_ID,offline_status,online_status,offline_schedule,online_schedule)
     VALUES('.$d_id.',"'.$fName.'","'.$lName.'",'.$userID_value.',"'.$status.'","","","")';
 
 
     if (mysqli_query($conn,$appoinment_SQL))  {	
         echo '<span style="color:red; ">Please wait for Respond...</span><br /><br />';
         
         
     }
     else {
         echo '<span style="color:red; ">FAILED to add .</span><br /><br />';
         
     }
    }

    if($line=="on"){
        // echo "jjjjjjjjjjj";
        $appoinment_SQL='INSERT INTO doctor_appoinment(d_ID,f_name,l_name,p_ID,offline_status,online_status,offline_schedule,online_schedule)
        VALUES('.$d_id.',"'.$fName.'","'.$lName.'",'.$userID_value.',"","'.$status.'","","")';
    
    
        if (mysqli_query($conn,$appoinment_SQL))  {	
            echo '<span style="color:red; ">Please wait for Respond...</span><br /><br />';
            
            
        }
        else {
            echo '<span style="color:red; ">FAILED to add .</span><br /><br />';
            
        }
       }
    


 }
 



//close database connection
 $conn->close();

?>