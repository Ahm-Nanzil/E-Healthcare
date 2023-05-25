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


    			//		update code:   0807_04
		{		//				Restrict Access to Editor or higher
			$accessLevel = $_COOKIE["accessLevel"];
			if (isset($accessLevel) AND $accessLevel >= 21) {

                echo '<a href="..\Profile\Student.php">Profile</a>';
        echo '<a href="">Doctor</a>';

			}
		//		END:		Restrict Access
		}


        

    echo '<a href="..\Profile\Student.php">Hospital</a>';




    echo '<br /><hr /><br />';
		
    /*echo '<form name="logoutForm" action="index.php" method="post">';	
            echo '
                <input type="hidden" name="auth" value="0" />
                <input type="submit"  value="Logout" />
            ';
    echo '</form>';*/
    		//		update code:   0806_03
            
		echo '<a href="DemoIndex.php?status=logout">
        <span style="color: maroon; ">Logout</span>
        </a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';



    


 }
 



//close database connection
 $conn->close();

?>