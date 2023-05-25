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
    	$newTableName = "H_AccessLog";
	
	{		//	drop & create table
		$dropTestTable = 'DROP TABLE '.$newTableName;
			if (mysqli_query($conn,$dropTestTable))  {	
				echo 'Table Dropped.<br /><br />';
			} else {
				echo '<span style="color:red; ">
						FAILED to DROP table.'.$newTableName.'</span>
						<br /><br />';
				echo mysqli_error($conn);
			}

		$createTestTable = 'CREATE TABLE '.$newTableName.' (
									ID INT (11) NOT NULL  AUTO_INCREMENT PRIMARY KEY ,
									userID INT( 11 ) NOT NULL, 
									timeLogin DATETIME, 
									timeLogout DATETIME, 
									IPaddress VARCHAR (15) 
								)';		
											
			if (mysqli_query($conn,$createTestTable))  {	
				echo '<br />Table '.$newTableName.' Added.<br /><br />';
			} else {
				echo '<span style="color:red; "><br />FAILED to Add table '
						.$newTableName.'.</span><br /><br />';
				echo mysqli_error($conn);
			}
	}


    


 }
 



//close database connection
 $conn->close();

?>