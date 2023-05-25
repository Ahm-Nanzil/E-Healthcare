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
    {	//  Get the details of the company selected 
       
        $userID_value= $_COOKIE["userID"];
        

        $d_massageSQL = "SELECT * ";
        $d_massageSQL .= "FROM ";
        $d_massageSQL .= "d_p_massage ";
        $d_massageSQL .= "WHERE d_ID = '".$userID_value."' ";

        echo "<table style='width:100%'>
  <tr>
    <th>Patient's ID</th>
    <th>Patient's Massage</th>
  </tr>";
        
        $d_massageSQL_Query = mysqli_query($conn,$d_massageSQL);	
        
        while ($row = mysqli_fetch_array($d_massageSQL_Query, MYSQLI_ASSOC)) {
            $ID = $row['ID'];
            $p_ID = $row['p_ID'];
           
            $p_Massage = $row['p_massage'];
            
            
            //echo $doctor_ID;s
            //echo str_repeat("&nbsp;", 20);
           // $fullCoyName = trim($doctor_fName." ".$doctor_lName."");
           $reply= '<a href="index.php?content=reply_massage&p_id='.$p_ID.'&massage_id='.$ID.'">Click To Replay</a>';
           echo "<tr>
    <td>".$p_ID."</td>
    <td>".$p_Massage."</td>
    <td>".$reply."</td>
    
  </tr>";
            
            
            
           
             
                                 
        }
            
        echo '</table>';
        mysqli_free_result($d_massageSQL_Query);			
}

    


 }
 



//close database connection
 $conn->close();

?>