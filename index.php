<?php
//FOR IGNORE NOTICE ERROR
error_reporting (E_ALL ^ E_NOTICE);


?>
<?php
//ob_start();

{
    include 'C:\xampp\htdocs\Health Care\Config\Config.php';
    $conn = new mysqli($servername, $username, $password, $dbname); 
    $dbSuccess=FALSE;
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    else $dbSuccess=TRUE;

    }

if($dbSuccess){


  //include_once('includes/fn_authorise.php');
  include_once('includes/fn_strings.php');
  //include_once('includes/fn_formatting.php');
   

    	$menuFile = '';
		$contentFile = '';
		$contentMsg = '';
		
		$loginAuthorised = ($_COOKIE["loginAuthorised"] == "loginAuthorised");
        //
		//$loginAuthorised= FALSE;

		//$accessLevel=99;
		$signUP=$_GET['con'];
		//echo $signUP;
		

		 if ($loginAuthorised)
		 {
			
            $accessLevel = $_COOKIE["accessLevel"];
			$userID = $_COOKIE["userID"];
					
			$status = $_GET['status'];
			if (isset($status) AND ($status == "logout")) {
				setcookie("loginAuthorised", "", time()-3600,"/");
				setcookie("userID", "", time()-3600,"/");
				session_destroy();
				unset($_SESSION['userid']);	
				header("Location: index.php");
				//$loginAuthorised= FALSE;
			} 
			else {
				
				//		This is where we manage CONTENT for LOGGED-IN users
				$useringID=$_GET['userid'];
				echo $useringID;
				$menuFile = "HomePage/HomePageStu.php";
				$uSER_ID=$_GET['uSER_id'];
				$contentCode = $_GET['content'];
				$specialIst= $_GET['specialist'];
				echo $uSER_ID;
				//echo $specialIst;
				
				if($contentCode==''){
					//$contentCode=$useringID;
					//$contentFile = "Demo/Student.php";

				}

								//  SWITCH processing on $contentCode.  
				//		update code:   0905 Content management SYSTEMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM 
				switch ($contentCode) {
				    case "profile":
						//echo $uSER_ID;
						$contentFile = "Profile/Student.php";
						//echo $uSER_ID;
						break;

				    case "doctors":
				        $contentFile = "Doctor/DoctorsDept.php";
						break;

					case "doctorSpecial":
						echo $orderClause;
						$contentFile = "Doctor/DoctorSpecial.php";
						break;


				    case "search":
						$contentFile = "Demo/Search.php";
				        //$contentMsg = $contentCode;
				        break;
						case "select":
							$contentFile = "Demo/FormSub.php";
							$contentMsg = $contentCode;
							break;

				    case "edit":
						
						$contentFile = "Demo/ProfileEdit.php";
				        //$contentMsg = $contentCode;
				        break;

					case "doctorsDept":						
						$contentFile = "Doctor/DoctorsDept.php";
						break;

					case "myappoinment":						
						$contentFile = "Profile/MyAppoinment.php";
						break;

					case "suggestion":						
						$contentFile = "Doctor/disease_prediction.php";
						break;

					case "info":						
						$contentFile = "Doctor/DoctorDetails.php";
						break;

					case "massage":						
						$contentFile = "Doctor/DoctorMsg.php";
						break;

					case "request":						
						$contentFile = "Doctor/DoctorRequest.php";
						break;

					case "dhaka":						
						$contentFile = "Hospital/Dhaka.html";
						break;

					case "p_massage":						
						$contentFile = "Patient/P_massage.php";
						break;
					case "waiting":						
						$contentFile = "Patient/P_Waiting.php";
						break;

						case "schedule":						
							$contentFile = "Doctor/Doctor_Schedule.php";
							break;
							case "status_changeP":						
								$contentFile = "Patient/Patient_appoinment_Status.php";
								break;
								case "reply_massage":						
									$contentFile = "Doctor/Doctor_Reply.php";
									break;
									case "chat":						
										$contentFile = "Profile/Chatting.php";
										break;
										case "edit_schedule":						
											$contentFile = "Doctor/MySchedule.php";
											break;
											case "status_changeN":						
												$contentFile = "Patient/Patient_appoinment_StatusN.php";
												break;
												case "payment":						
													$contentFile = "Profile/Total_Bills.php";
													break;

						case "profile_d":						
							$contentFile = "Profile/doctor.php";
							break;

						case "chat_d":						
							$contentFile = "Profile/Doctor_Chatting.php";
							break;
							case "apporve":						
								$contentFile = "Admin/Admin_approve.php";
								break;
								case "approve_p":						
									$contentFile = "Admin/User_approveSQL.php";
									break;
									case "hospital_doctor":						
										$contentFile = "Hospital/Hospital_doctor.php";
										break;
										case "location":						
											$contentFile = "Hospital/Location.php";
											break;
											case "massageSession":						
												$contentFile = "Doctor/DoctorSession.php";
												break;
												case "available":						
													$contentFile = "Doctor/Available.php";
													break;
												case "billadd":						
													$contentFile = "Profile/Billadd.php";
													break;
													case "conver":						
														$contentFile = "Profile/ConverSation.php";
														break;
														case "conv_d":						
															$contentFile = "Profile/ConverSation_Doc.php";
															break;
															case "notification":						
																$contentFile = "Includes\Notifacation.php";
																break;
																case "insertUser":						
																	$contentFile = "Admin\NewUser.php";
																	break;
																	case "doctorSpecial_hospital":						
																		$contentFile = "Hospital\DoctorSpecial_hospital.php";
																		break;
  
				}			

				
				//  DO SOMETHING depending on the $contentCode.   eg


				
				//$contentMsg = $contentCode;

			}
		

		
		}
		

		// else {


		// 			$email = $_POST['email'];
		// 			$password = $_POST['password'];
		// 			$accessDefine=$_POST['designation'];
		// 			//echo $email;
		// 			//echo $password;
			

		// 			//Authorsied for myself


		// 			$md5Password = md5($password);
		// 			//echo "<br>";
		// 			//echo $md5Password;
		// 			$Hstudent_SQLselect = "SELECT * FROM H_User ";
		// 			$Hstudent_SQLselect .= "WHERE email = '".$email."' ";	
		// 			$userID='';
		// 			$Hstudent_SQLselect_Query = mysqli_query($conn,$Hstudent_SQLselect); 	
		// 			while ($row = mysqli_fetch_array($Hstudent_SQLselect_Query, MYSQLI_ASSOC)) {
		// 				$userID = $row['u_ID'];
		// 				$email = $row['email'];
		// 				$passwordRetrieved = $row['password'];
		// 				$accessLevel = $row['accessLevel'];
		// 				$register= $row['register'];

		// 			}
					
		// 			mysqli_free_result($Hstudent_SQLselect_Query);
			
		// 			echo "<br>";
		// 			//echo $userID;
		// 			echo "<br>";
		// 			//echo $passwordRetrieved;
		// 			echo "<br>";
		// 			//echo $register;

		// 				if (!empty($passwordRetrieved) AND ($md5Password == $passwordRetrieved)) {
				
		// 					setcookie("accessLevel", $accessLevel, time()+3600, "/");	
		// 					setcookie("userID", $userID, time()+3600, "/");	
		// 					setcookie("loginAuthorised", "loginAuthorised", time()+3600, "/");
		// 					setcookie("email", $email, time()+3600, "/");
		// 					setcookie("password", $passwordRetrieved, time()+3600, "/");
		// 					setcookie("register", $register, time()+3600, "/");
							
		// 					$returnCode = true;
							
		// 					{
		// 						$success = false;
		// 						//	Get current date-time in MySQL format
		// 						$nowTimeStamp = date("Y-m-d H:i:s");
		// 						//	Get user's IP address
		// 						$userIP = $_SERVER['REMOTE_ADDR'];
							
		// 						$insertLogin_SQL = 'INSERT INTO H_AccessLog (
		// 														userID, 
		// 														timeLogin, 
		// 														IPaddress
		// 													) VALUES (
		// 														'.$userID.',
		// 														"'.$nowTimeStamp.'",
		// 														"'.$userIP.'"
		// 													)';
												
		// 									if (mysqli_query($conn,$insertLogin_SQL))  {	
		// 										$success = true;
		// 										//header("Location: NewDay.php");     //LogIn Location
		// 										//echo "successssssssssssssssssssssssssssssssssssssssssssssssssssss";
		// 									} else {
		// 										$success = $insertLogin_SQL."<br />".mysqli_error($conn);		
		// 									}	
						
					
				    	
		// 					}
				
								
		// 				} 
		// 				else {
		// 					$returnCode = false;
		// 					//echo "Fail";			
		// 				}




		// 			if ( $returnCode) {
		// 				// Initialize the session of UserId
		// 				session_start();
		// 				$userID_value=$userID;
							
		// 				$_SESSION['userid'] = $userID_value;
						
						

		// 				//
		// 				//header("Location: index.php?uSER_id=$userID_value");
		// 				header("Location: index.php");
						

		// 			} else if($signUP == "signup" ){
			
		// 				$contentFile= "InsertInfo/NewUser.php";
		// 			}
					
		// 			else{
						
		// 				//echo "hhhhhhhhhhh";
		// 				$contentFile = 'includes/LoginForm.php';
						
						
		// 			}



				
			
		
		// }

    
     

 }
 



//close database connection
 $conn->close();
//ob_end_flush();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<title>php MySQL Training</title>
<meta name="generator" content="Bluefish 2.0.0" >
<meta name="author" content="ks106" >
<meta name="date" content="2010-07-26T15:23:42+03600" >
<meta name="copyright" content="TMIT World Limited">
<meta name="keywords" content="Infinite Skills - php/MySQL Training">
<meta name="description" content="Infinite Skills - php/MySQL Training">
<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
<link rel="stylesheet" href="css/alphacrm_layout.css" type="text/css" />
<link rel="stylesheet" href="css/alphacrm_style.css" type="text/css" />


	<!-- HTML Headers and Links to CSS -->

	
<style>
	.background {
  background-image: url('images\download.jpg');
}
</style>
</head>
<body>

<div id="outerWrapper">

<div id="header">

<!-- <div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script> -->

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


		    	<p class="todGreeting">
			    	<?php 
		    			// if ($loginAuthorised) { 
			    		// 	echo todGreeting();
		    			// }

			    	?>
		    	</p>
				<p class="time">
					<?php
					$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
						echo $dt->format('F j, Y ');
						echo '<br>';
						echo $dt->format(' g:i a');
					?>
					</p>
		      <p>E-HEALTHCARE</p>				
		    </div><!-- end header -->



<div id="innerWrapper">

  <div id="menuColumn">
        <p>Menu</p>	
        <br />
      			<?php      				
      				if (file_exists($menuFile)) {include($menuFile);} 
      			?>
				
  </div><!-- end menuColumn -->

  <div id="contentColumn" >
        <p></p> 
        <br />
      			<?php       				
      				if (file_exists($contentFile)) {include($contentFile);} 
  	      			
                      if (!empty($contentMsg)) { echo $contentMsg; }


      			?>
       
  </div><!-- end contentColumn -->
  
</div><!-- end innerWrapper -->

<div id="footer">
<p>&copy; 2022, <a href="" target="">
		      Ahm Nanzil - Developer
		      </a></p>
		
</div><!-- end footer -->

</div><!-- end outerWrapper -->


	<!-- HTML or php rendering here -->
	<?php
		// can contain most php code - except header()function
	?>


</body>
</html>
