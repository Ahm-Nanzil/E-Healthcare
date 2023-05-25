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
		
			#$companyID = $_POST["companyID"];	
            $companyID=7;
			
			{  //   collect the data with $_POST
		
                $SurName = $_POST["SurName"];
                $Name = $_POST["Name"];	
                $RegType = $_POST["RegType"];   	
                //$StreetB = $_POST["StreetB"];	
                //$StreetC = $_POST["StreetC"];
                $Age = $_POST["Age"];
                $Blood = $_POST["Blood"];	
                $Contact = $_POST["Contact"];
                $Address = $_POST["Address"];
                $Town = $_POST["Town"];	
                $Postcode = $_POST["Postcode"];	
                $COUNTRY = $_POST["COUNTRY"];
                $Health_Condition = $_POST["Health_Condition"];	
            }	
		}
        {
         //OutPut Of Profile details
        echo "Name: ";
       # echo $fullCoyName;
        echo "<br /><hr /><br />";
        echo "Age: ";
        echo $Age;
        echo "<br /><hr /><br />";
        echo "Blood: ";
        echo $Blood;
        echo "<br /><hr /><br />";
        echo "Contact: ";
        echo $Contact;
        echo "<br /><hr /><br />";
        echo "Address: ";
        echo $Address;
        echo "<br /><hr /><br />";
        echo "Town: ";
        echo $Town;
        echo "<br /><hr /><br />";
        echo "Postcode: ";
        echo $Postcode;
        echo "<br /><hr /><br />";
        echo "COUNTRY: ";
        echo $COUNTRY;
        echo "<br /><hr /><br />";
        echo "Health_Condition: ";
        echo $Health_Condition;
        echo "<br /><hr /><br />";
    }


    {  //   SQL:     UPDATE tCompany record
		
        $tCompany_SQLupdate = "UPDATE Student SET ";			
        $tCompany_SQLupdate .=  "SurName = '".$SurName."', ";
        $tCompany_SQLupdate .=  "Name = '".$Name."', ";
        $tCompany_SQLupdate .=  "RegType = '".$RegType."', ";
        $tCompany_SQLupdate .=  "Age = '".$Age."', ";
        $tCompany_SQLupdate .=  "Blood = '".$Blood."', ";
        $tCompany_SQLupdate .=  "Contact = '".$Contact."', ";
        $tCompany_SQLupdate .=  "Address = '".$Address."', ";
        $tCompany_SQLupdate .=  "Town = '".$Town."', ";
        #$tCompany_SQLupdate .=  "County = '".$County."', ";
        $tCompany_SQLupdate .=  "Postcode = '".$Postcode."', ";	
        $tCompany_SQLupdate .=  "COUNTRY = '".$COUNTRY."' ";
        $tCompany_SQLupdate .=  "WHERE ID = '".$companyID."' "; 			
    }

    {	//		check the data and process it 
			
        if (empty($Name)) {
            echo '<span style="color:red; ">Cannot make the company name empty.</span><br /><br />'; 
        } else {
                echo '<span style = "text-decoration: underline;">
                        SQL statement:</span>
                        <br />'.$tCompany_SQLupdate.'<br /><br />';
                        
                if (mysqli_query($conn,$tCompany_SQLupdate))  {	
                    echo 'used to Successfully update the company.<br /><br />';
                } else {
                    echo '<span style="color:red; ">FAILED to update the company.</span><br /><br />';
                    
                }	
        }
    }

    
		
		
	



 }
 
}


//close database connection
 $conn->close();

?>