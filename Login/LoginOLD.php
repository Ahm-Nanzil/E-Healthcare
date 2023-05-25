<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

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

	$thisScriptName = "Login.php";



	$username = $_GET['email'];
    echo $username;
	
	if(isset($username)) {
		$password = $_GET['password'];
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

                    
                    
					header("Location:../DemoIndex.php");	


					echo '<a href="'.$thisScriptName.'">Logout</a>';			
			} else {
                
				echo "Access denied.<br /><br />";		
				echo '<a href="'.$thisScriptName.'">Try again</a>';			
			}
		}
		
	}

    


 }
 



//close database connection
 $conn->close();

?>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-49">
						Login
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="email" placeholder="Type your username">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
				 
					
					<div class="text-right p-t-8 p-b-31">
						<a href="#">
							Forgot password?
						</a>
					</div>
					
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit">
								Login
							</button>
							
						</div>
					</div>
		
            
				
					

					<!--
						<div class="txt1 text-center p-t-54 p-b-20">
						<span>
							Or Sign Up Using
						</span>
					</div>

					<div class="flex-c-m">
						<a href="#" class="login100-social-item bg1">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="login100-social-item bg2">
							<i class="fa fa-twitter"></i>
						</a>

						<a href="#" class="login100-social-item bg3">
							<i class="fa fa-google"></i>
						</a>
					</div>
				-->

					<div class="flex-col-c p-t-155">
						<span class="txt1 p-b-17">
							Or Sign Up Using
						</span>

						<a href="..\InsertInfo\StudentInfo.php" class="txt2">
							Sign Up
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>