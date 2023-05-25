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

    echo "hiiiiiiiiiiii";
    $FirstName = $_POST["Blood"];
    echo $FirstName;


    {	//		UPDATE Person Record
        if(isset($personEdited) AND $personEdited == '1'){

            $Salutation = $_POST["Salutation"];	
            $FirstName = $_POST["FirstName"];	
            $LastName = $_POST["LastName"];	
            $Tel = $_POST["Tel"];	
            $eMail = $_POST["eMail"];	
            $companyID = $_POST["companyID"];	
            
            $updateMsg = personUpdate($personID, $Salutation, $FirstName, $LastName, $Tel, $eMail, $companyID);
            if (!empty($updateMsg)) {
                echo $updateMsg;
            }
            
            unset($personEdited);
        }		
    //		END:  Insert New Person Record		
    }

    


 }
 



//close database connection
 $conn->close();

?>