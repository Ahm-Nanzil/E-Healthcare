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

    $thisScriptName = "loginform1.php";



	$username = $_POST['email'];
	
	if(isset($username)) {
		$password = $_POST['password'];
		echo "username = ".$username."<br />";
		echo "password = ".$password."<br />";
        $md5Password = md5($password);
		

		
		{	//		SELECT password for this user from the DB and see it it matches 
									//		update code:   0807_01
			$tUser_SQLselect = "SELECT ID, password, accessLevel FROM H_User ";
			$tUser_SQLselect .= "WHERE email = '".$username."' ";	

			$tUser_SQLselect_Query = mysqli_query($conn,$tUser_SQLselect); 	
			while ($row = mysqli_fetch_array($tUser_SQLselect_Query, MYSQLI_ASSOC)) {
			    $userID = $row['ID'];
			    $passwordRetrieved = $row['password'];
			    $accessLevel = $row['accessLevel'];
			}

            
			mysqli_free_result($tUser_SQLselect_Query);
			
			echo "passwordRetrieved = ".$passwordRetrieved."<br />";
			
			if (!empty($passwordRetrieved) AND ($md5Password == $passwordRetrieved)) {
			
               // header("Location: ../UdemyDEmo/index.php?auth=1");
              /* echo '<form name="authForm" action="../UdemyDEmo/index.php" method="post">';	
               echo '
                   <input type="hidden" name="auth" value="1" />
                   Password OK: 									
                   <input type="submit"  value="Click to Proceed" />
               ';
       echo '</form>';*/
       //		update code:   0806_01 
					setcookie("loginAuthorised", "loginAuthorised", time()+7200, "/");

                    			    	//		update code:   0807_02 cookies	
					setcookie("accessLevel", $accessLevel, time()+7200, "/");	
					setcookie("userID", $userID, time()+7200, "/");	

                    
                    
					header("Location:index.php");	


					echo '<a href="'.$thisScriptName.'">Logout</a>';			
			} else {
                
				echo "Access denied.<br /><br />";		
				echo '<a href="'.$thisScriptName.'">Try again</a>';			
			}
		}
		
	} else {
        echo '<h2>Login Form alphaCRM</h2>';

		echo '<form name="postLoginHid" action="'.$thisScriptName.'" method="post">';	
				echo '
					<P>E-Mail: 
					<INPUT TYPE=text NAME=email value="" SIZE=50 MAXLENGTH=50></P>
					<P>Password: 
					<INPUT TYPE=password NAME=password value="" SIZE=12 MAXLENGTH=16></P>
					<input type="submit"  value="Login" />
				';
		echo '</form>';
        echo '<h2>--------- END Login Form --------</h2>';

	}
	


 }
 



//close database connection
 $conn->close();

?>