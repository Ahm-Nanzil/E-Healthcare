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

    $thisScriptName = 'index.php?content=companyList';

    {	//  Get the details of the company selected 
        #$companyID = $_POST["companyID"];	
        $companyID=3;
        if ($companyID == 0) {
            header("Location: Student.php");	
        }
        
        $tCompany_SQLselect = "SELECT * ";
        $tCompany_SQLselect .= "FROM ";
        $tCompany_SQLselect .= "Student ";
        $tCompany_SQLselect .= "WHERE ID = '".$companyID."' ";
        
        $tCompany_SQLselect_Query = mysqli_query($conn,$tCompany_SQLselect);	
        
        while ($row = mysqli_fetch_array($tCompany_SQLselect_Query, MYSQLI_ASSOC)) {
            $SurName = $row['SurName'];
            $Name = $row['Name'];
            $RegType = $row['RegType'];
            
            $fullCoyName = trim($SurName." ".$Name."");
            
            $Age = $row['Age'];
            $Blood = $row['Blood'];
            $Contact = $row['Contact'];
            $Address = $row['Address'];
            $Town = $row['Town'];
            $Postcode = $row['Postcode'];
            $COUNTRY = $row['COUNTRY'];
            $Health_Condition = $row['Health_Condition'];

             
                                 
        }
        
        mysqli_free_result($tCompany_SQLselect_Query);			
}
    //OutPut Of Profile details
    echo "Name: ";
    echo $fullCoyName;
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
    echo "Address ";
    echo $Address;
    echo "<br /><hr /><br />";
    echo "Town: ";
    echo $Town;
    echo "<br /><hr /><br />";
    echo "Postcode: ";
    echo $Postcode;
    echo "<br /><hr /><br />";
    echo "COUNTRY: ";
    echo .$COUNTRY.;
    echo "<br /><hr /><br />";
    echo "Health_Condition: ";
    echo $Health_Condition;
    echo "<br /><hr /><br />";
    echo '<a href="..\InsertInfo\EditInfo.php">Edit</a>';

			
				echo '<td>'.$Health_Condition.'&nbsp;</td>'; 
				echo '<td>'.$fullCoyName.'&nbsp;</td>'; 
				echo '<td>'.$Age.'&nbsp;</td>';
				echo '<td>'.$Blood.'&nbsp;</td>';
				echo '<td>'.$Contact.'&nbsp;</td>';
				echo '<td>'.$Address.'&nbsp;</td>';
				echo '<td>'.$Postcode.'&nbsp;</td>';
				echo '<td>'.$COUNTRY.'&nbsp;</td>';
		
			


 }
 



//close database connection
 $conn->close();

?>