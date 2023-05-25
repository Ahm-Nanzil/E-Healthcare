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

    echo "Hiiiiiiiiiiiiiiiiiiiiiiiiiii4444444444444444444";
            $userMail = $_POST['email'];
            $password = $_POST['password'];
        //echo $userMail;
        //echo $password;
       /* if (isset ($userAuthorised)
         && $userAuthorised = userAuthorised($userMail, $password)){
            header("Location: index.php");
        } else {
            
            $contentFile = 'includes/tp_loginForm.php';
        }*/
        //Authorsied for myself


            $md5Password = md5($password);
        //echo "<br>";
        //echo $md5Password;
            $tUser_SQLselect = "SELECT ID, email, password, accessLevel FROM H_User ";
            $tUser_SQLselect .= "WHERE email = '".$userMail."' ";	

            $tUser_SQLselect_Query = mysqli_query($conn,$tUser_SQLselect); 	
            while ($row = mysqli_fetch_array($tUser_SQLselect_Query, MYSQLI_ASSOC)) {
                $userID = $row['ID'];
                $userMail = $row['email'];
                $passwordRetrieved = $row['password'];
                $accessLevel = $row['accessLevel'];
            }
    
            mysqli_free_result($tUser_SQLselect_Query);

        //echo "<br>";
        //echo $userID;
        //echo "<br>";
        //echo $passwordRetrieved;
                //Password matching and Entry log
            if (!empty($passwordRetrieved) AND ($md5Password == $passwordRetrieved)) {

                    setcookie("accessLevel", $accessLevel, time()+7200, "/");	
                    setcookie("userID", $userID, time()+7200, "/");	
                    setcookie("loginAuthorised", "loginAuthorised", time()+7200, "/");
                    setcookie("email", $userMail, time()+7200, "/");
            
                    $returnCode = true;
            //echo "Success";
                        {
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
                                            header("Location: NewDay.php");     //LogIn Location
                        //echo "successssssssssssssssssssssssssssssssssssssssssssssssssssss";
                                            } else {
                                                $success = $insertLogin_SQL."<br />".mysqli_error($conn);		
                                            }	
                    
                //return $success;
               // 	
                        }           
            
                            
                    }
                    //_________END OF PASS MATCH AND ENTRY LOG 
            else {
                    echo "Hiiiiiiiiiiiiiiiiiiiiiiiiiii333333333333333333333";
                    $returnCode = false;	
                    }

    


 }
 



//close database connection
 $conn->close();

?>