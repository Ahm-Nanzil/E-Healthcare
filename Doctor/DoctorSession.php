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

    echo"	<script> alert ('500Tk For Each Session...')</script> ";

    $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
   
    $nowTime= $dt->format(' g:i a');
    $time = strtotime($nowTime); 
    //echo $time;
    echo "<br>";
     echo "<br>";
     echo "<br>";

 $appoinment_Query="SELECT * FROM doctor_appoinment WHERE online_status='Accept'" ;
 $appoinment_SQL_Query = mysqli_query($conn,$appoinment_Query);
 echo "<table style='width:100%'>
  <tr>
  <th>Doctor's ID</th>
  <th>Doctor's Name</th>
  <th>Schedule Time of You</th>
    <th>Click To Proceed</th>
    
  </tr>";

 while($row = mysqli_fetch_array($appoinment_SQL_Query, MYSQLI_ASSOC)){
     $mId=$row['d_ID'];
     $fname=$row['f_name'];
     $lname=$row['l_name'];
     $fullCoyName = trim($fname." ".$lname."");
     $schedule=$row['online_schedule']."<br>";
    // echo $mId;
     //echo $fullCoyName;
     //echo $schedule;
     $start=substr($schedule,0,5);
     $end=substr($schedule,8);
     //$ho=$end;
     //echo $ho;
     $start_Time = strtotime($start);
     $end_Time = strtotime($end);
    // echo gettype($start);
     //echo $start."<br>";
     //echo gettype($end);
    //  echo $end;
    //  echo "<br>";
    //  echo "<br>";
    //  echo "<br>";
    echo "<tr>";
   echo " <td>".$mId."</td>
   <td>".$fullCoyName."</td>
   <td>".$schedule."</td>";
         if ($time>=$start_Time){
        echo "<td>";
        echo '<a href="index.php?content=billadd&d_id='.$mId.'">Schedule Time Has been Stared,Start Your Session...</a>';
        echo "</td>";
    }
    else{
        echo "<td>";
        echo "Wait for Schedule Time";
        echo "</td>";
    }
    echo "</tr>";
    
    
 }
 echo '</table>';			   

//  $app_Query="SELECT * FROM schedule WHERE s_id=23" ;
//  $app_SQL_Query = mysqli_query($conn,$app_Query);
 
//  while($row = mysqli_fetch_array($app_SQL_Query, MYSQLI_ASSOC)){
//      $md=$row['Day_Time1'];
     
//      echo $md ."<br>";
//     //  echo $fullCoyName;
//     //  echo $schedule;
//      $starting=substr($md,8,-11);
//      $ending=substr($md,19);
//      $starting_Time = strtotime($starting);
//      $ending_Time = strtotime($ending);
//      echo $starting;
//      echo $starting_Time."<br>";
//      echo $ending;
//      echo $ending_Time;


//  }


 }
 



//close database connection
 $conn->close();

?>