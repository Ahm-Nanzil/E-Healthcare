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

    $line=$_GET['line'];
  
  if($line=='on'){
    echo 'Online appoinment Status';

    {	//  Get the details of the company selected 
       
        
      $appoinmentQuery_SQL = "SELECT * ";
      $appoinmentQuery_SQL .= "FROM ";
      $appoinmentQuery_SQL .= "doctor_appoinment ";
      $appoinmentQuery_SQL .= "WHERE p_ID = '".$userID_value."' ";

      echo "<table style='width:100%'>
<tr>
  <th>Doctor's Name: </th>
  <th>Appoinment Status: </th>
  <th>Schedule Time </th>
  
</tr>";
      
      $appoinmentQuery_SQL_Query = mysqli_query($conn,$appoinmentQuery_SQL);	
      
      while ($row = mysqli_fetch_array($appoinmentQuery_SQL_Query, MYSQLI_ASSOC)) {
          //$doctor_ID = $row['d_ID'];
          $doctor_fName = $row['f_name'];
          $doctor_lName = $row['l_name'];
          $appoinmentStatus = $row['online_status'];
          $schedule=$row['online_schedule'];
          
          //echo $doctor_ID;

          if($appoinmentStatus!=null){
            $fullCoyName = trim($doctor_fName." ".$doctor_lName."");
            echo "<tr>
    <td>".$fullCoyName."</td>
    <td>".$appoinmentStatus."</td>
    
    <td> <a href='index.php?content=massageSession'>".$schedule."</a></td>
  </tr>";


          }          
                               
      }
      echo '</table>';
          
      
      mysqli_free_result($appoinmentQuery_SQL_Query);			
}
echo '<br><a href="index.php?content=myappoinment&line=off">Offline Appoinment</a>';

  }

  else if($line=='off'){
    echo 'offline appoinment Status';

    {	//  Get the details of the company selected 
       
        
      $appoinmentQuery_SQL = "SELECT * ";
      $appoinmentQuery_SQL .= "FROM ";
      $appoinmentQuery_SQL .= "doctor_appoinment ";
      $appoinmentQuery_SQL .= "WHERE p_ID = '".$userID_value."' ";

      echo "<table style='width:100%'>
<tr>
  <th>Doctor's Name: </th>
  <th>Appoinment Status: </th>
  <th>Schedule Time </th>
  
</tr>";
      
      $appoinmentQuery_SQL_Query = mysqli_query($conn,$appoinmentQuery_SQL);	
      
      while ($row = mysqli_fetch_array($appoinmentQuery_SQL_Query, MYSQLI_ASSOC)) {
          //$doctor_ID = $row['d_ID'];
          $doctor_fName = $row['f_name'];
          $doctor_lName = $row['l_name'];
          $appoinmentStatus = $row['offline_status'];
          $schedule_Time=$row['offline_schedule'];
          
          //echo $doctor_ID;

          if($appoinmentStatus!=null){
            $fullCoyName = trim($doctor_fName." ".$doctor_lName."");
            echo "<tr>
    <td>".$fullCoyName."</td>
    <td>".$appoinmentStatus."</td>
    <td>".$schedule_Time."</td>
  </tr>"; 

          }
          
                
                               
      }
      echo '</table>';
          
      
      mysqli_free_result($appoinmentQuery_SQL_Query);			
}
echo '<br><a href="index.php?content=myappoinment&line=on">Online Appoinment</a>';

  }

  else{
    echo '<a href="index.php?content=myappoinment&line=on">Online Appoinment</a>';
    echo '<br><a href="index.php?content=myappoinment&line=off">Offline Appoinment</a>';
  }

    

 }
 



//close database connection
 $conn->close();

?>