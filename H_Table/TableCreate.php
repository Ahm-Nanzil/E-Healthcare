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

    $newTableName = "Student";
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
    ID INT( 9 ) NOT NULL AUTO_INCREMENT PRIMARY KEY , 
    SurName VARCHAR( 50 ) ,
    Name VARCHAR( 250 ) NOT NULL, 
    RegType VARCHAR( 50 )  NULL,
    Age float(4) Null, 
    Blood VARCHAR( 150 )  NULL,
    Contact VARCHAR(14) Null,
    Address VARCHAR( 150 )  NULL, 
    Town VARCHAR( 150 )  NULL, 
    Postcode VARCHAR( 50 )  NULL, 
    COUNTRY VARCHAR( 250 ) NOT NULL,
    Health_Condition VARCHAR(100) NOT NULL,
    accessLevel INT( 11 ) NOT NULL
    )";



if ($conn->query($sql_Student) === TRUE) {
echo "Table created successfully";
} else {
echo "Error creating table: " . $conn->error;
}
/*
				//   SQL script to create table Faculty 
        
$sql_Faculty = "CREATE TABLE Faculty (
    ID INT( 9 ) NOT NULL AUTO_INCREMENT PRIMARY KEY , 
    SurName VARCHAR( 50 ) ,
    Name VARCHAR( 250 ) NOT NULL, 
    RegType VARCHAR( 50 )  NULL,
    Age float(4) Null, 
    Blood VARCHAR( 150 )  NULL,
    Contact VARCHAR(14) Null,
    Address VARCHAR( 150 )  NULL, 
    Town VARCHAR( 150 )  NULL, 
    Postcode VARCHAR( 50 )  NULL, 
    COUNTRY VARCHAR( 250 ) NOT NULL,
    Health_Condition VARCHAR(100) NOT NULL
    )";



if ($conn->query($sql_Faculty) === TRUE) {
echo "Table created successfully";
} else {
echo "Error creating table: " . $conn->error;

    				//   SQL script to create table Staff
        
$sql_Staff = "CREATE TABLE Staff (
    ID INT( 9 ) NOT NULL AUTO_INCREMENT PRIMARY KEY , 
    SurName VARCHAR( 50 ) ,
    Name VARCHAR( 250 ) NOT NULL, 
    RegType VARCHAR( 50 )  NULL,
    Age float(4) Null, 
    Blood VARCHAR( 150 )  NULL,
    Contact VARCHAR(14) Null,
    Address VARCHAR( 150 )  NULL, 
    Town VARCHAR( 150 )  NULL, 
    Postcode VARCHAR( 50 )  NULL, 
    COUNTRY VARCHAR( 250 ) NOT NULL,
    Health_Condition VARCHAR(100) NOT NULL
    )";



if ($conn->query($sql_Staff) === TRUE) {
echo "Table created successfully";
} else {
echo "Error creating table: " . $conn->error;
}



$sql_Doc = "CREATE TABLE Doctor (
    ID INT( 9 ) NOT NULL AUTO_INCREMENT PRIMARY KEY , 
    SurName VARCHAR( 50 ) ,
    Name VARCHAR( 250 ) NOT NULL, 
    RegType VARCHAR( 50 )  NULL,
    #Age float(4) Null, 
    #Blood VARCHAR( 150 )  NULL,
    Contact VARCHAR(14) Null,
    Address VARCHAR( 150 )  NULL, 
    Town VARCHAR( 150 )  NULL, 
    Postcode VARCHAR( 50 )  NULL, 
    COUNTRY VARCHAR( 250 ) NOT NULL
    #Health_Condition VARCHAR(100) NOT NULL
    )";



if ($conn->query($sql_Doc) === TRUE) {
echo "Table created successfully";
} else {
echo "Error creating table: " . $conn->error;
}


}

*/

 }
 

//close database connection
 $conn->close();

?>