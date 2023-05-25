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


    $user=$_GET['user'];
    $ID=$_GET['id'];

    if($user=='student'){

        $student_ProfileSQL = "SELECT * ";
        $student_ProfileSQL .= "FROM ";
        $student_ProfileSQL .= "Student ";
        $student_ProfileSQL .= "WHERE ID = '".$ID."'";
        
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
else if($user=='doctor'){
    $doctor_SQL = "SELECT * ";
    $doctor_SQL .= "FROM ";
    $doctor_SQL .= "doctor ";
    $doctor_SQL .= "WHERE ID = '".$ID."' ";
    
    $doctor_SQL_Query = mysqli_query($conn,$doctor_SQL);	

    


    
    while ($row = mysqli_fetch_array($doctor_SQL_Query, MYSQLI_ASSOC)) {
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
    
    mysqli_free_result($doctor_SQL_Query);			


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


    else{

    
    $user_bills = "SELECT * ";
    $user_bills  .= "FROM ";
    $user_bills  .= "new_user ";
    //$user_bills  .= "WHERE u_ID = '".$userID_value."' ";
    $user_bills_Query = mysqli_query($conn,$user_bills );
     while($row = mysqli_fetch_array($user_bills_Query, MYSQLI_ASSOC)){
        $User_ID = $row['u_ID'];
        $register = $row['register'];
        
    
  
    //echo '<a href="index.php?content=bill_details>Total Bills</a>';
      echo '<a href="index.php?content=apporve&user='.$register.'&id='.$User_ID.'">'.$User_ID.'</a>';
    //echo $User_ID;
    echo str_repeat("&nbsp;", 20);
    
    echo $register;
    echo str_repeat("&nbsp;", 20);

    echo '<a href="index.php?content=approve_p&u_id='.$User_ID.'&register='.$register.'">Click Here to approve this User..</a>';
    echo "<br /><hr /><br />";

     }
     //mysqli_free_result($massageSQL_Query)

    }


 }
 



//close database connection
 $conn->close();

?>