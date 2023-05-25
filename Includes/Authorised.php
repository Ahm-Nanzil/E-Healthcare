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
    function userAuthorised($username, $password) {

        $md5Password = md5($password);
        $tUser_SQLselect = "SELECT ID, Password, AccessLevel FROM H_User ";
        $tUser_SQLselect .= "WHERE E-mail = '".$username."' ";	

        $tUser_SQLselect_Query = mysqli_query($conn,$tUser_SQLselect); 	
        while ($row = mysqli_fetch_array($tUser_SQLselect_Query, MYSQLI_ASSOC)) {
            $userID = $row['ID'];
            $passwordRetrieved = $row['Password'];
            $accessLevel = $row['AccessLevel'];
        }

        echo $userID;
        echo $passwordRetrieved;
        echo $accessLevel;
        echo "Bal";
        echo "Bal";  
        mysqli_free_result($tUser_SQLselect_Query);
                    
        if (!empty($passwordRetrieved) AND ($md5Password == $passwordRetrieved)) {

                setcookie("accessLevel", $accessLevel, time()+7200, "/");	
                setcookie("userID", $userID, time()+7200, "/");	
                setcookie("loginAuthorised", "loginAuthorised", time()+7200, "/");
                
                $returnCode = true;
                
                $sessionLogged = insertLogin($userID);
                if (!$sessionLogged) {
                    setcookie("sessionLogging", "failed", time()+300, "/");
                }				
        } else {
            $returnCode = false;			
        }
        
    return $returnCode;
}


function insertLogin($userID) {
    $success = false;
    //	Get current date-time in MySQL format
    $nowTimeStamp = date("Y-m-d H:i:s");
    //	Get user's IP address
    $userIP = $_SERVER['REMOTE_ADDR'];

    $insertLogin_SQL = 'INSERT INTO tAccessLog (
                                    userID, 
                                    timeLogin, 
                                    IPaddress
                                ) VALUES (
                                    '.$userID.',
                                    "'.$nowTimeStamp.'",
                                    "'.$userIP.'"
                                )';
                                
        if (mysqli_query($conn,$insertLogin_SQL))  {	
            $success = true;
        } else {
            $success = $insertLogin_SQL."<br />".mysqli_connect_error();		
        }	
        
    return $success;	
}
echo "sucess";



    


 }
 



//close database connection
 $conn->close();

?>