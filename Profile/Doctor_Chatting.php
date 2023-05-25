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
       
      
        
        echo "<br /><hr /><br />";
        
$massageSQL="SELECT DISTINCT
p_ID, 
SurName,
Name

FROM
d_p_massage
INNER JOIN student
ON d_p_massage.p_ID = student.ID";



    
    $massageSQL_Query = mysqli_query($conn,$massageSQL);
    
    
    echo "<table style='width:100%'>
  <tr>
    <th>Patient's ID</th>
    <th>Patient's Name</th>
    <th>Full History</th>
  </tr>";
    while ($row = mysqli_fetch_array($massageSQL_Query, MYSQLI_ASSOC)) {
       $Surname=$row['SurName'];
       $name=$row['Name'];
        $fullCoyName = trim($Surname." ".$Name."");
        $p_ID = $row['p_ID'];
    

    
        
        echo '<tr>
    <td>'.$p_ID.'</td>
    <td>'.$fullCoyName.'</td>
    <td>  <a href="index.php?content=conv_d&p_id='.$p_ID.'"> Click To View Conversation</a>  </td>
  </tr>';
      }
        
    echo '</table>';
    mysqli_free_result($massageSQL_Query);			
}

		
}

 



//close database connection
 $conn->close();

?>