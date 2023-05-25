<?php


{
    
    include 'C:\xampp\htdocs\Health Care\Config\Config.php';
    $dbName="";
    $conn = new mysqli($servername, $username, $password); 
    $dbSuccess=FALSE;
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    else $dbSuccess=TRUE;

    }

if($dbSuccess){

    // Drop database
 $dbName="HealthCare";
 $sql = "CREATE DATABASE " . $dbName;
 if (mysqli_query($conn, $sql)) {
   echo "Database Create successfully";
 } else {
   echo "Error Creating database: " . mysqli_error($conn);
 }
 


 }
 



//close database connection
 $conn->close();

?>