<?php


{
    include 'C:\xampp\htdocs\NewWeb\Config\dbConfig.php';
    $dbName="mydb";
    $conn = new mysqli($servername, $username, $password,$dbName); 
    $dbSuccess=FALSE;
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    else $dbSuccess=TRUE;

    }

if($dbSuccess){


  //include_once('includes/fn_authorise.php');
  include_once('includes/fn_strings.php');
  include_once('includes/fn_formatting.php');
   

    	$menuFile = '';
		$contentFile = '';
		$contentMsg = '';
		
		$loginAuthorised = ($_COOKIE["loginAuthorised"] == "loginAuthorised");
        //
		//$loginAuthorised= FALSE;

		//$accessLevel=99;

		if ($loginAuthorised) {
			
            $accessLevel = $_COOKIE["accessLevel"];
			$userID = $_COOKIE["userID"];
					
			$status = $_GET['status'];
			if (isset($status) AND ($status == "logout")) {
				setcookie("loginAuthorised", "", time()-7200,"/");	
				header("Location: index.php");
				//$loginAuthorised= FALSE;
			} 
			else {
				
				//		This is where we manage CONTENT for LOGGED-IN users
				$menuFile = 'includes/tp_crmMenu.php';
				
				$contentCode = $_GET['content'];


								//  SWITCH processing on $contentCode.  
				//		update code:   0905 Content management SYSTEMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM 
				switch ($contentCode) {
				    case "companyList":
						$contentFile = "includes/tp_companyList.php";

				        break;
				    case "insertCompany":
				        $contentMsg = $contentCode;
				        break;
				    case "editCompany":
				        $contentMsg = $contentCode;
				        break;
				    case "insertUser":
						$contentFile = "includes/tp_userInsert.php";
				        //$contentMsg = $contentCode;
				        break;

						case "companyPeopleEdit":						
							$contentFile = "includes/tp_companyPeopleEdit.php";
						  break;
						  case "insertUserSave":						
							$contentFile = "includes/fn_tUser_SQL.php";
						  break;
  
  
				}			

				
				//  DO SOMETHING depending on the $contentCode.   eg


				
				//$contentMsg = $contentCode;

			}
		

		
		}
         else {


            $email = $_POST['email'];
			$password = $_POST['password'];
			//echo $email;
			//echo $password;
           /* if (isset ($userAuthorised)
             && $userAuthorised = userAuthorised($email, $password)){
				header("Location: index.php");
			} else {
				
				$contentFile = 'includes/tp_loginForm.php';
			}*/
			//Authorsied for myself


			$md5Password = md5($password);
			//echo "<br>";
			//echo $md5Password;
			$tUser_SQLselect = "SELECT ID, email, password, accessLevel FROM H_User ";
			$tUser_SQLselect .= "WHERE email = '".$email."' ";	
	
			$tUser_SQLselect_Query = mysqli_query($conn,$tUser_SQLselect); 	
			while ($row = mysqli_fetch_array($tUser_SQLselect_Query, MYSQLI_ASSOC)) {
				$userID = $row['ID'];
				$email = $row['email'];
				$passwordRetrieved = $row['password'];
				$accessLevel = $row['accessLevel'];
			}
		
			mysqli_free_result($tUser_SQLselect_Query);
	
			//echo "<br>";
			//echo $userID;
			//echo "<br>";
			//echo $passwordRetrieved;

			if (!empty($passwordRetrieved) AND ($md5Password == $passwordRetrieved)) {
	
				setcookie("accessLevel", $accessLevel, time()+7200, "/");	
				setcookie("userID", $userID, time()+7200, "/");	
				setcookie("loginAuthorised", "loginAuthorised", time()+7200, "/");
				setcookie("email", $email, time()+7200, "/");
				
				$returnCode = true;
				//echo "Success";
				{
					$success = false;
					//	Get current date-time in MySQL format
					$nowTimeStamp = date("Y-m-d H:i:s");
					//	Get user's IP address
					$userIP = $_SERVER['REMOTE_ADDR'];
				
					$insertLogin_SQL = 'INSERT INTO H_AccessLog (
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
		else {
			$returnCode = false;
			//echo "Fail";			
		}

		

		//echo $returnCode;




			if ( $returnCode) {
				header("Location: index.php");
				//echo "hellllllllllllllllllllllll";

			} else {
				
				header("Location: Login/Login.php");
				//$contentFile = 'Login/Login.php';
			}



				
			//$contentFile = 'includes/tp_loginForm.php';
		
		}

    


 }
 



//close database connection
 $conn->close();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<title>php MySQL Training</title>
<meta name="generator" content="Bluefish 2.0.0" >
<meta name="author" content="ks106" >
<meta name="date" content="2010-07-26T15:23:42+0100" >
<meta name="copyright" content="TMIT World Limited">
<meta name="keywords" content="Infinite Skills - php/MySQL Training">
<meta name="description" content="Infinite Skills - php/MySQL Training">
<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
<link rel="stylesheet" href="css/alphacrm_layout.css" type="text/css" />
<link rel="stylesheet" href="css/alphacrm_style.css" type="text/css" />


	<!-- HTML Headers and Links to CSS -->

</head>
<body>

<div id="outerWrapper">

<div id="header">
		    	<p class="todGreeting">
			    	<?php 
		    			if ($loginAuthorised) { 
			    			//echo todGreeting();
		    			} 
			    	?>
		    	</p>
		      <p>alpha CRM application</p>				
		    </div><!-- end header -->



<div id="innerWrapper">

  <div id="menuColumn">
        <p>Menu</p>	
        <br />
      			<?php      				
      				if (file_exists($menuFile)) {include($menuFile);} 
      			?>
				
  </div><!-- end menuColumn -->

  <div id="contentColumn">
        <p>content</p> 
        <br />
      			<?php       				
      				if (file_exists($contentFile)) {include($contentFile);} 
  	      			
                      if (!empty($contentMsg)) { echo $contentMsg; }


      			?>
       
  </div><!-- end contentColumn -->
  
</div><!-- end innerWrapper -->

<div id="footer">
<p>&copy; 2010, <a href="http://www.TMITworld.com" target="_TMIT">
		      TMIT World - the database experts
		      </a></p>
		
</div><!-- end footer -->

</div><!-- end outerWrapper -->


	<!-- HTML or php rendering here -->
	<?php
		// can contain most php code - except header()function
	?>


</body>
</html>