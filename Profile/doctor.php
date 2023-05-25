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

    $userID_value= $_COOKIE["userID"];
     $userID_value;
   

    //$thisScriptName = 'index.php?content=companyList';


    {	//  Get the details of the company selected 
        if ($userID_value == 0) {
            //header("Location: Student.php");	
        }
        
        $tCompany_SQLselect = "SELECT * ";
        $tCompany_SQLselect .= "FROM ";
        $tCompany_SQLselect .= "doctor ";
        $tCompany_SQLselect .= "WHERE ID = '".$userID_value."' ";
        
        $tCompany_SQLselect_Query = mysqli_query($conn,$tCompany_SQLselect);	

        


        
        while ($row = mysqli_fetch_array($tCompany_SQLselect_Query, MYSQLI_ASSOC)) {
            $fName = $row['f_name'];
            $lName = $row['l_name'];
            $Gender = $row['gender'];
            
            $fullCoyName = trim($fName." ".$lName."");
            $specialist = $row['specialist'];
            $Qualification=$row['qualification'];
            $bmdc_reg_num = $row['bmdc_reg_num'];
         
            $DOB = $row['DOB'];
            $Contact = $row['contact'];
            $Address = $row['address'];
            $permission = $row['permission'];
           
             
                                 
        }
        
        mysqli_free_result($tCompany_SQLselect_Query);			
}
    
//echo $lName;
    //OutPut Of Profile details
    echo "Name: ";
    echo $fullCoyName;
    echo "<br /><hr /><br />";
    echo "Gender: ";
    echo $Gender;
    echo "<br /><hr /><br />";
    echo "Date of Birth: ";
    echo $DOB;
    echo "<br /><hr /><br />";
    echo "Specialist: ";
    echo $specialist;
    echo "<br /><hr /><br />";
    echo "Qualification ";
    echo $Qualification;
    echo "<br /><hr /><br />";
    echo "Bmdc_Reg_Num: ";
    echo $bmdc_reg_num;
    echo "<br /><hr /><br />";
    echo "Contact: ";
    echo $Contact;

    echo "<br /><hr /><br />";
    echo "Address: ";
    echo $Address;
    
    echo "<br /><hr /><br />";
    echo "Permission: ";
    echo $permission;
    echo "<br /><hr /><br />";
    echo '<a href="index.php?content=edit">Edit</a>';

			


 }
 



//close database connection
 $conn->close();

?>