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

    function personInsert($Salutation, $FirstName, $LastName, $Tel, $eMail, $companyID) {

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
		return $errorMsg;
	}


 }
 



//close database connection
 $conn->close();

?>