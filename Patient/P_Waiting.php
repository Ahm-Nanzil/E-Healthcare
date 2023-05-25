<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <style>
  table, th, td {
  border: 1px solid white;
  border-collapse: collapse;
}
th, td {
  background-color: #96D4D4;
}
td {
  text-align: center;
}
tr:hover {background-color: #D6EEEE;}
</style>
</head>
<body>

</body>
</html>
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

  function getPatient($id){
    $tCompany_SQLselect = "SELECT * ";
        $tCompany_SQLselect .= "FROM ";
        $tCompany_SQLselect .= "student";
        $tCompany_SQLselect .= "WHERE ID = '".$id."' ";

        $tCompany_SQLselect_Query = mysqli_query($conn,$tCompany_SQLselect);
        $row = mysqli_fetch_array($tCompany_SQLselect_Query, MYSQLI_ASSOC);
        $fname=$row['SurName']	;
        $lname=$row['Name'];
        $fullCoyName = trim($fname." ".$lname."");

    return $fullCoyName;                          
}



    
    {	//  Get the details of the company selected 
       
      $userID_value= $_COOKIE["userID"];
      $line=$_GET['line'];
         //$name=getPatient(68);
        echo $name;

if ($line=='online'){
  echo "Offline Schedule Request";
  $tCompany_SQLselect = "SELECT * ";
        $tCompany_SQLselect .= "FROM ";
        $tCompany_SQLselect .= "doctor_appoinment ";
        $tCompany_SQLselect .= "WHERE d_ID = '".$userID_value."' AND online_status!=''";
       
        echo "<table style='width:100%'>
  <tr>
    <th>Patient ID</th>
    <th>Schedule Request</th>
    <th>Online Request</th>
    

  </tr>";
        
        $tCompany_SQLselect_Query = mysqli_query($conn,$tCompany_SQLselect);	
        
        while ($row = mysqli_fetch_array($tCompany_SQLselect_Query, MYSQLI_ASSOC)) {

          
           $status_ID=$row['ID'];
            $patient_ID = $row['p_ID'];
            //$name=getPatient($patient_ID);
            //$doctor_fName = $row['f_name'];
            //$doctor_lName = $row['l_name'];
            $appoinmentStatus_Online = $row['online_status'];          
            
            //echo $patient_ID;
            echo "<tr>
            <td>".$patient_ID."</td>
            <td>".$appoinmentStatus_Online."</td>";
           // <td>".$appoinmentStatus_Online."</td>";
            $wait_online_p='<a href="index.php?content=status_changeP&catagory=online&s_id='.$status_ID.'&p_id='.$patient_ID.'">Click To Accept</a>';
            $wait_online_n='<a href="index.php?content=status_changeN&catagory=online&s_id='.$status_ID.'&p_id='.$patient_ID.'">Click To Cancel</a>';
           echo " <td>".$wait_online_p." <br>
            ".$wait_online_n."
            </td>";        
                                
        }
            
        echo '</table>';
        mysqli_free_result($tCompany_SQLselect_Query);			
}
    else if($line=='offline'){

      echo "Offline Schedule Request";

      $tCompany_SQLselect = "SELECT * ";
        $tCompany_SQLselect .= "FROM ";
        $tCompany_SQLselect .= "doctor_appoinment ";
        $tCompany_SQLselect .= "WHERE d_ID = '".$userID_value."' AND offline_status!=''";
       
      echo "<table style='width:100%'>
      <tr>
        <th>Patient ID</th>
        <th>Schedule Request</th>
        <th>Online Request</th>
        
    
      </tr>";
            
            $tCompany_SQLselect_Query = mysqli_query($conn,$tCompany_SQLselect);	
            
            while ($row = mysqli_fetch_array($tCompany_SQLselect_Query, MYSQLI_ASSOC)) {
    
              
                $status_ID=$row['ID'];
                $patient_ID = $row['p_ID'];
                //echo $patient_ID;
                //$doctor_fName = $row['f_name'];
                //$doctor_lName = $row['l_name'];
                $appoinmentStatus_Online = $row['online_status'];
                $appoinmentStatus_Offline = $row['offline_status'];
                
    
              
                
                //echo $patient_ID;
                echo "<tr>
                <td>".$patient_ID."</td>
                <td>".$status_ID."</td>";
                
                  $waitP='<a href="index.php?content=status_changeP&s_id='.$status_ID.'&p_id='.$patient_ID.'">Click To Accecpt</a>';
                  $waitN='<a href="index.php?content=status_changeN&s_id='.$status_ID.'&p_id='.$patient_ID.'">Click To Cancel</a>';
                  
                
  
             echo " <td>".$waitP." <br>
              ".$waitN."
              </td>
            </tr>"; 
         
                                    
            }
                
            echo '</table>';
            mysqli_free_result($tCompany_SQLselect_Query);	

    }

      else{
        echo '<a href="index.php?content=waiting&line=online">Online Appoinment</a>';
        echo '<br><a href="index.php?content=waiting&line=offline">Offline Appoinment</a>';
      
      }

 }
 
}


//close database connection
 $conn->close();

?>