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

   
    


    $userID_value= $_COOKIE["userID"];
    $eMail=$_COOKIE["email"];
    $passWord=$_COOKIE["password"];
    $historyBills=$_GET["history"];
    $register=$_COOKIE['register'];
    //echo $register;
    //echo $userID_value;


    $user_bills = "SELECT * ";
    $user_bills  .= "FROM ";
    $user_bills  .= "payment ";
    $user_bills  .= "WHERE u_ID = '".$userID_value."' ";
    
    $user_bills_Query = mysqli_query($conn,$user_bills );
    $row = mysqli_fetch_array($user_bills_Query, MYSQLI_ASSOC);
        
        $Bills = $row['amount'];
    
         
                             
    
    
    
    
    
        echo "Total Bills: ";
    //echo '<a href="index.php?content=bill_details>Total Bills</a>';
    echo $Bills;
    echo "Tk";
    echo "<br /><hr /><br />";



 if(isset($historyBills)){
     //echo "hiiiiiiii";

     
        if($register=="student"){
            $user_bills = "SELECT * ";
     $user_bills  .= "FROM ";
     $user_bills  .= "medical_bills ";
     $user_bills  .= "WHERE u_ID = '".$userID_value."' ";

    
     echo "<table style='width:100%'>
  <tr>
    <th>Transaction ID: </th>
    <th>Tk: </th>
    <th>Doctors's ID: </th>
    <th>Date: </th>
  </tr>";
     
     $user_bills_Query = mysqli_query($conn,$user_bills );
     while($row = mysqli_fetch_array($user_bills_Query, MYSQLI_ASSOC)){
        $t_ID = $row['ID'];
        $Bills = $row['Bills'];
        $d_id=$row['d_ID'];
        $date=$row['Date'];
    
  
    //echo '<a href="index.php?content=bill_details>Total Bills</a>';
   echo "<tr>
    <td>".$t_ID."</td>
    <td>".$Bills."</td>
    <td>".$d_id."</td>
    <td>".$date."</td>
  </tr>";
    
    //echo "<br /><hr /><br />";

     }
     echo '</table>';
     //mysqli_free_result($massageSQL_Query);
     
        }

        if($register=="doctor"){
            $user_bills = "SELECT * ";
     $user_bills  .= "FROM ";
     $user_bills  .= "medical_bills ";
     $user_bills  .= "WHERE d_ID = '".$userID_value."' ";

     echo "<table style='width:100%'>
  <tr>
    <th>Transaction ID: </th>
    <th>Tk: </th>
    <th>Patient's ID: </th>
    <th>Date: </th>
  </tr>";

    
     
     $user_bills_Query = mysqli_query($conn,$user_bills );
     while($row = mysqli_fetch_array($user_bills_Query, MYSQLI_ASSOC)){
        $t_ID = $row['ID'];
        $Bills = $row['Bills'];
        $u_id=$row['u_ID'];
        $date=$row['Date'];
    
  
    //echo '<a href="index.php?content=bill_details>Total Bills</a>';
    echo "<tr>
    <td>".$t_ID."</td>
    <td>".$Bills."</td>
    <td>".$u_id."</td>
    <td>".$date."</td>
  </tr>";
    

     }
     echo '</table>';
     //mysqli_free_result($massageSQL_Query);
     
        }

       
 
  }
     
 }
 echo "<br /><hr /><br />";
 echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<a href="index.php?content=payment&history=history">See full History</a>';

//close database connection
 $conn->close();

?>