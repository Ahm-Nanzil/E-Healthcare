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

    {
		
		{  //   collect the data with $_POST
		
			$SurName = $_POST["SurName"];
            $Name = $_POST["Name"];	
			$RegType = $_POST["RegType"];	
			$Address = $_POST["Address"];	
			//$StreetB = $_POST["StreetB"];	
			//$StreetC = $_POST["StreetC"];
            $Age = $_POST["Age"];
            $Blood = $_POST["Blood"];	
			$Contact = $_POST["Contact"];
            $Town = $_POST["Town"];	
			$Postcode = $_POST["Postcode"];	
			$COUNTRY = $_POST["COUNTRY"];
            $Health_Condition = $_POST["Health_Condition"];
			$AccessLevel=$_POST["accessLevel"];	
		}
			
		{  //   SQL:     $tCompany_SQLinsert	
		
			$tCompany_SQLinsert = "INSERT INTO student (";			
			$tCompany_SQLinsert .=  "SurName, ";
			$tCompany_SQLinsert .=  "Name, ";
			$tCompany_SQLinsert .=  "RegType, ";
			$tCompany_SQLinsert .=  "Age, ";
			$tCompany_SQLinsert .=  "Blood, ";
			$tCompany_SQLinsert .=  "Contact, ";
            $tCompany_SQLinsert .=  "Address, ";
			$tCompany_SQLinsert .=  "Town, ";
			$tCompany_SQLinsert .=  "Postcode, ";	
			$tCompany_SQLinsert .=  "COUNTRY, ";
            $tCompany_SQLinsert .=  "Health_Condition, ";
			$tCompany_SQLinsert .=  "accessLevel";
			$tCompany_SQLinsert .=  ") ";
			
			$tCompany_SQLinsert .=  "VALUES (";
			$tCompany_SQLinsert .=  "'".$SurName."', ";
			$tCompany_SQLinsert .=  "'".$Name."', ";
			$tCompany_SQLinsert .=  "'".$RegType."', ";
			$tCompany_SQLinsert .=  "'".$Age."', ";
			$tCompany_SQLinsert .=  "'".$Blood."', ";
			$tCompany_SQLinsert .=  "'".$Contact."', ";
            $tCompany_SQLinsert .=  "'".$Address."', ";
			$tCompany_SQLinsert .=  "'".$Town."', ";
			$tCompany_SQLinsert .=  "'".$Postcode."', ";		
			$tCompany_SQLinsert .=  "'".$COUNTRY."', ";
			$tCompany_SQLinsert .=  "'".$Health_Condition."', ";
            $tCompany_SQLinsert .=  "'".$AccessLevel."' ";
			$tCompany_SQLinsert .=  ") ";
		}
		
		{	//		check the data and process it 
			
			if (empty($Name)) {
				echo '<span style="color:red; ">Cannot add Info with no name.</span><br /><br />'; 
			} else {
					echo '<span style = "text-decoration: underline;">
							SQL statement:</span>
							<br />'.$tCompany_SQLinsert.'<br /><br />';
							
					if (mysqli_query($conn,$tCompany_SQLinsert))  {	
						echo 'used to Successfully add new Info.<br /><br />';
					} else {
						echo '<span style="color:red; ">FAILED to add .</span><br /><br />';
						
					}	
			}
		}

}

echo "<br /><hr /><br />";

echo '<a href="StudentInfo.php">Create another Info</a>';
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo '<a href="..\Login\index.html">Quit - to homepage</a>';


 }




//close database connection
 $conn->close();

?>