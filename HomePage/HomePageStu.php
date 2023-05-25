<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>





.dropup {
  position: relative;
  display: inline-block;
}

.dropup-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  bottom: 50px;
  z-index: 1;
}

.dropup-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropup-content a:hover {background-color: #ccc}

.dropup:hover .dropup-content {
  display: block;
}

.dropup:hover .dropbtn {
  background-color: #2980B9;
}







.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 6px 6px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
</head>
<body>
<?php



//echo '<script type="text/javascript">
   //    window.onload = function () { alert("Welcome"); } 
//</script>'; 

/*		INCLUDE FILE:   HomePage For all
*
*		folder:			includes/
*
*		used in:        index.php
*
*		version:    	0901   date: 2010-07-01
*
*		purpose:		MENU for the TEMPLATE version of alpha CRM
*
*	===========================================================================
*/		
	// For	Student 
	// if (isset($accessLevel) AND $accessLevel == 1) 
	{

//echo "hiiiiiiiiiiiiiiiii";

		echo '<a href="index.php?content=profile">
			<span class="mainMenuItem">Profile</span>
			</a>';
	echo '<br /><br />';
	echo '<a href="index.php?content=payment">
			<span class="mainMenuItem">Payment</span>
			</a>';
	echo '<br /><br />';
	echo '<a href="index.php?content=conver">
			<span class="mainMenuItem">Massage</span>
			</a>';
	echo '<br /><br />';
	echo '<a href="index.php?content=massageSession">
			<span class="mainMenuItem">Session</span>
			</a>';
	echo '<br /><br />';
	echo 	'<div class="dropdown">
	<button class="dropbtn">Appointments</button>
	<div class="dropdown-content">
  <a href="index.php?content=doctorsDept">Booking Appoinment</a>
  <a href="index.php?content=myappoinment">My Appoinment</a>
  
	</div>
  </div>';

echo '<br /><br />';
echo '<a href="index.php?content=suggestion">
				<span class="mainMenuItem">Suggested Doctors</span>
				</a>';
		echo '<br /><br />';

		echo '<a href="index.php?content=notification">
		<span class="mainMenuItem">Notification</span>
		</a>';
	echo '<br /><br />';

	echo '<a href="index.php?content=search">
				<span class="mainMenuItem">Search</span>
				</a>';
		echo '<br /><br />';

		echo 	'<div class="dropdown">
		<button class="dropbtn">Hospital</button>
		<div class="dropdown-content">
	  <a href="index.php?content=dhaka">Dhaka</a>
	  <a href="#">Chittagong</a>
	  
	  <a href="#">Syllet</a>
		</div>
	  </div>';
	  echo '<br /><br />';

	  echo '<a href="index.php?status=logout">
	  <span class="mainMenuItem">Logout</span>
	  </a>';
	echo '<br /><br />';


	}






	

	


	
		
		

	//	Restricted - Editor Only menu items
	if (isset($accessLevel) AND $accessLevel == 2) {

		//echo "hiiiiiiiiiiiiiiiii22222222222222222";

		echo '<a href="index.php?content=profile_d">
			<span class="mainMenuItem">Profile</span>
			</a>';
	echo '<br /><br />';
	echo '<a href="index.php?content=payment">
			<span class="mainMenuItem">Income</span>
			</a>';
	echo '<br /><br />';
	echo '<a href="index.php?content=chat_d">
			<span class="mainMenuItem">Massage</span>
			</a>';
	echo '<br /><br />';
	echo 	'<div class="dropdown">
  		<button class="dropbtn">Patients</button>
  		<div class="dropdown-content">
    	<a href="index.php?content=p_massage">Online</a>
    	<a href="index.php?content=waiting">Waiting </a>
    	
  		</div>
		</div>';
		echo '<br /><br />';
		echo '<a href="index.php?content=schedule ">
				<span class="mainMenuItem">My Schedule</span>
				</a>';
		echo '<br /><br />';
		echo '<a href="index.php?content=notification">
		<span class="mainMenuItem">Notification</span>
		</a>';
	echo '<br /><br />';

	echo 	'<div class="dropdown">
		<button class="dropbtn">Hospital</button>
		<div class="dropdown-content">
	  <a href="index.php?content=dhaka">Dhaka</a>
	  <a href="#">Chittagong</a>
	  
	  <a href="#">Syllet</a>
		</div>
	  </div>';
	  echo '<br /><br />';

	  echo '<a href="index.php?status=logout">
	  <span class="mainMenuItem">Logout</span>
	  </a>';
	echo '<br /><br />';
	
		
		
	}


	
	if (isset($accessLevel) AND $accessLevel == 4) {
		echo '<a href="index.php?content=profile_d">
			<span class="mainMenuItem">Profile</span>
			</a>';
	echo '<br /><br />';
			
		echo '<a href="index.php?content=doctors ">
					<span class="mainMenuItem">Doctors</span>
					</a>';
			echo '<br /><br />';	
			echo '<a href="index.php?content=doctors ">
					<span class="mainMenuItem">Students</span>
					</a>';
			echo '<br /><br />';
			echo '<a href="index.php?content=doctors ">
					<span class="mainMenuItem">Faculty</span>
					</a>';
			echo '<br /><br />';
			echo '<a href="index.php?content=apporve">
					<span class="mainMenuItem">Wait For Approval</span>
					</a>';
			echo '<br /><br />';
			
	
		
	//	Restricted - Admin Only menu items
		//if (isset($accessLevel) AND $accessLevel >= 99) {	
	
			echo '<a href="index.php?content=insertUser">
					<span class="mainMenuItem">create NEW USER</span>
					</a>';
			echo '<br /><br />';
		//}
		echo '<a href="index.php?status=logout">
	  <span class="mainMenuItem">Logout</span>
	  </a>';
	echo '<br /><br />';
	
		//	Logout menu item 
	
	}

	






	






	

		
	


?>
</body>
</html>