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

   /* function check_email($email) {  
        if( (preg_match('/(@.*@)|(\.\.)|(@\.)|(\.@)|(^\.)/', $email)) || 
            (preg_match('/^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/',$email)) ) { 
             return true;
        } else {
             return false;
        }    	
    }

    function check_email_mx($email) {  
            $host = explode('@', $email);
       
            if(checkdnsrr($host[1].'.', 'MX') ) return true;
            if(checkdnsrr($host[1].'.', 'A') ) return true;
            if(checkdnsrr($host[1].'.', 'CNAME') ) return true;
       
        return false;
    }
*/
  
  
    
  {  //   collect the data with $_POST
	$register=$_POST['designation'];	
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
    $eMail = $_POST["email"];
    $passWord=$_POST["pasword"];
    $md5Password=md5($password);
}

//$checkEmail=check_email($eMail);
//$checkEmail_MX=check_email_mx($email);
echo $checkEmail;
echo $checkEmail_MX;
{
    {  
        //   SQL:     $NewUserSQL
        
        if($register=='student'){
    
            $NewUserSQL = "INSERT INTO student (";			
        $NewUserSQL .=  "SurName, ";
        $NewUserSQL .=  "Name, ";
        $NewUserSQL .=  "RegType, ";
        $NewUserSQL .=  "Age, ";
        $NewUserSQL .=  "Blood, ";
        $NewUserSQL .=  "Contact, ";
        $NewUserSQL .=  "Address, ";
        $NewUserSQL .=  "Town, ";
        $NewUserSQL .=  "Postcode, ";
        $NewUserSQL .=  "COUNTRY, ";
        $NewUserSQL .=  "accessLevel, ";
        $NewUserSQL .=  "email, ";
        $NewUserSQL .=  "password";
        $NewUserSQL .=  ") ";
        
        $NewUserSQL .=  "VALUES (";
        $NewUserSQL .=  "'".$SurName."', ";
        $NewUserSQL .=  "'".$Name."', ";
        $NewUserSQL .=  "'".$RegType."', ";
        $NewUserSQL .=  "'".$Age."', ";
        $NewUserSQL .=  "'".$Blood."', ";
        $NewUserSQL .=  "'".$Contact."', ";
        $NewUserSQL .=  "'".$Address."', ";
        $NewUserSQL .=  "'".$Town."', ";
        $NewUserSQL .=  "'".$Postcode."', ";
        $NewUserSQL .=  "'".$COUNTRY."', ";
        $NewUserSQL .=  "1, ";	
        $NewUserSQL .=  "'".$eMail."', ";	
        $NewUserSQL .=  "'".$md5Password."' ";
        $NewUserSQL .=  ") ";
    
    
        if (mysqli_query($conn,$NewUserSQL))  {	
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