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

    $newTableName = "Doctor";
    $dropTable = 'DROP TABLE '.$newTableName;
			if (mysqli_query($conn,$dropTable))  {	
				echo 'Table Dropped.<br /><br />';
			} else {
				echo '<span style="color:red; ">
						FAILED to DROP table.'.$newTableName.'</span>
						<br /><br />';
				echo mysqli_error($conn);
			}

   
$sql_Student = "CREATE TABLE ".$newTableName."  (
    f_name  VARCHAR( 100 ) ,
    ID INT( 9 ) NOT NULL AUTO_INCREMENT PRIMARY KEY , 
    l_name VARCHAR( 100 ) ,
    email VARCHAR( 250 ) , 
    contact VARCHAR( 50 ),
    specialist VARCHAR( 100 ) , 
    qualification VARCHAR( 150 ) ,
    DOB DATE ,
    gender VARCHAR( 150 )  , 
    bmdc_reg_num int( 11 )  , 
    address TEXT  , 
    pswd VARCHAR( 250 ) ,
    date DATE,
    permission VARCHAR( 100 ) 
    )";



if ($conn->query($sql_Student) === TRUE) {
echo "Table created successfully";
} else {
echo "Error creating table: " . $conn->error;
}

 }
 

//close database connection
 $conn->close();

?>