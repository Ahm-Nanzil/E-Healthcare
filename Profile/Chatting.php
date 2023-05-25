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
    // echo "hiiiiiiiiii";  
    $userID_value= $_COOKIE["userID"];
    //echo $userID_value;
    $doc_ID=$_GET["d_id"];
    //echo $doc_ID;
       
      //  echo '<a href="index.php?content=reply_massage&p_id='.$p_ID.'&massage_id='.$ID.'">Click To Accecpt</a>';
        
        echo "<br /><hr /><br />";
        // $massageSQL="SELECT * 
        //                     FROM d_p_massage inner join doctor on doctor.id=d_p_massage.ID where ";
    
$massageSQL="SELECT  
p_massage,
d_massage,
f_name,
l_name
FROM
d_p_massage
INNER JOIN doctor
ON d_p_massage.d_ID = doctor.id 
where d_ID=$doc_ID AND p_ID=$userID_value";



    // $massageSQL = "SELECT * ";
    // $massageSQL .= "FROM ";
    // $massageSQL .= "d_p_massage ";
    // $massageSQL .= "WHERE p_ID = '".$userID_value."' ";
    
    $massageSQL_Query = mysqli_query($conn,$massageSQL);
    
    
    echo "<table style='width:100%'>
  <tr>
    
    <th>Your Massage</th>
    <th>Doctor's Massage</th>
  </tr>";
    while ($row = mysqli_fetch_array($massageSQL_Query, MYSQLI_ASSOC)) {
       $fname=$row['f_name'];
       $lname=$row['l_name'];
       $fullCoyName = trim($fname." ".$lname."");
        $ID = $row['ID'];
        $p_ID = $row['p_ID'];
        $d_ID = $row['d_ID'];
        $p_Massage = $row['p_massage'];
        $d_Massage = $row['d_massage'];

    
        
        echo "<tr>
    
    <td>".$p_Massage."</td>
    <td>".$d_Massage."</td>
  </tr>";
        //echo $doctor_ID;s
        //echo str_repeat("&nbsp;", 20);
       // $fullCoyName = trim($doctor_fName." ".$doctor_lName."");
      //  echo '<a href="index.php?content=reply_massage&p_id='.$p_ID.'&massage_id='.$ID.'">Click To Accecpt</a>';                          
    }
        
    echo '</table>';
    mysqli_free_result($massageSQL_Query);			
}

/*$d_massageSQL = "SELECT * ";
    $d_massageSQL .= "FROM ";
    $d_massageSQL .= "d_p_massage ";
    $d_massageSQL .= "WHERE p_ID = '".$userID_value."' ";
    
    $d_massageSQL_Query = mysqli_query($conn,$d_massageSQL);
    
    
    
    while ($row = mysqli_fetch_array($d_massageSQL_Query, MYSQLI_ASSOC)) {
        $ID = $row['ID'];
        $p_ID = $row['p_ID'];
        $d_ID = $row['d_ID'];
        $p_Massage = $row['p_massage'];
        $d_Massage = $row['d_massage'];

    
        
        
        //echo $doctor_ID;s
        //echo str_repeat("&nbsp;", 20);
       // $fullCoyName = trim($doctor_fName." ".$doctor_lName."");
        echo $d_ID;
        echo str_repeat("&nbsp;", 20);
        echo $p_Massage;
        echo str_repeat("&nbsp;", 20);
        echo $d_Massage;
      //  echo '<a href="index.php?content=reply_massage&p_id='.$p_ID.'&massage_id='.$ID.'">Click To Accecpt</a>';
        
        echo "<br /><hr /><br />";
         
                             
    }
    
        
    
    mysqli_free_result($d_massageSQL_Query);
    */			
}

 



//close database connection
 $conn->close();

?>