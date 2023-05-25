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
    $eMail=$_COOKIE["email"];
    $passWord=$_COOKIE["password"];
   // echo $eMail;
    //echo $passWord;

    //$thisScriptName = 'index.php?content=companyList';


    {	//  Get the details of the company selected 
        if ($userID_value == 0) {
            //header("Location: Student.php");	
        }
        
        $student_ProfileSQL = "SELECT * ";
        $student_ProfileSQL .= "FROM ";
        $student_ProfileSQL .= "Student ";
        $student_ProfileSQL .= "WHERE email = '".$eMail."' AND password= '".$passWord."'";
        
        $student_ProfileSQL_Query = mysqli_query($conn,$student_ProfileSQL);	
        
        while ($row = mysqli_fetch_array($student_ProfileSQL_Query, MYSQLI_ASSOC)) {
            $SurName = $row['SurName'];
            $Name = $row['Name'];
            //$RegType = $row['RegType'];
            
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
        
        mysqli_free_result($student_ProfileSQL_Query);			
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
    echo "Address: ";
    echo $Address;
    echo "<br /><hr /><br />";
    echo "Town: ";
    echo $Town;
    echo "<br /><hr /><br />";
    echo "Postcode: ";
    echo $Postcode;

    echo "<br /><hr /><br />";
    echo "Country: ";
    echo $COUNTRY;
    
    echo "<br /><hr /><br />";
    echo "Health_Condition: ";
    echo $Health_Condition;
    echo "<br /><hr /><br />";
    echo '<a href="index.php?content=edit">Edit</a>';

			


 }
 



//close database connection
 $conn->close();

?>