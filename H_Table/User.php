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

    $newTableName = "H_User";
	
	{		//	drop & create table
		$dropTestTable = 'DROP TABLE '.$newTableName;
			if (mysqlI_query($conn,$dropTestTable))  {	
				echo 'Table Dropped.<br /><br />';
			} else {
				echo '<span style="color:red; ">
						FAILED to DROP table.'.$newTableName.'</span>
						<br /><br />';
				echo mysqli_error($conn);
			}
	
		$createTestTable = 'CREATE TABLE '.$newTableName.' (
									ID INT NOT NULL  AUTO_INCREMENT PRIMARY KEY ,
									username VARCHAR( 16 ) NOT NULL, 
									password VARCHAR( 70 ) NOT NULL, 
									email VARCHAR( 250 ) NOT NULL, 
									UNIQUE (username)
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