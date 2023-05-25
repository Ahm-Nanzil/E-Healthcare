<body class="container-fluid">
<h1 class="text-monocase text-capitalize text-center text-light">Schedule List</h1>
    
<ul class="text-center font-weight-bold text-monospace text-dark">  
<table border="1" 
<class="table table-hover table-dark">
  <thead>
    

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
?><br/>
<?php
       $userID_value= $_COOKIE["userID"];
        
        //echo $specialist;

        
        
        $query ="SELECT * 
        FROM schedule  where d_id='".$userID_value."'";
$run = mysqli_query($conn, $query);
while($row = mysqli_fetch_array($run, MYSQLI_ASSOC))
{
 
 echo ' <tr>
  <td>Day1</td>
  <td>'. $row['Day_Time1'] .'</td>
</tr>
';
echo ' <tr>
<td>Day2</td>
<td>'. $row['Day_Time2'] .'</td>
</tr>
';
echo ' <tr>
<td>Day3</td>
<td>'. $row['Day_Time3'] .'</td>
</tr>
';
echo ' <tr>
<td>Day4</td>
<td>'. $row['Day_Time4'] .'</td>
</tr>
';
echo ' <tr>
<td>Day5</td>
<td>'. $row['Day_Time5'] .'</td>
</tr>
';
echo ' <tr>
<td>Day6</td>
<td>'. $row['Day_Time6'] .'</td>
</tr>
';
echo ' <tr>
<td>Day7</td>
<td>'. $row['Day_Time7'] .'</td>
</tr>
';
          
  
    //echo "<h3><th>". $row['Day_Time7'] ." </th></tr></h3>";
}
echo '<a href="index.php?content=edit_schedule&d_id='.$userID_value.'">Edit Your Schedule</a>';      
				    
			   ?>
        </thread>
</class> 
        </table></ul>

