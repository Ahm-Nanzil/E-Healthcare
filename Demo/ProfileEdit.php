<?php 
/*
session_start();
$userID_value = $_SESSION['userid'];
*/
?>
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
	//echo "hiiiiiiiiiiiiii";
    
	//echo $id1234567;
	//$userID_value= $_COOKIE["userID"];
	 //$userID_value=1;
	 $eMail=$_COOKIE["email"];
    $passWord=$_COOKIE["password"];

	$submit=$_POST['submit'];

	//echo $SurName;
	

	if($submit=='save'){
		//echo "hiiiiiiiiiiiiii11111111111111111111";
		$SurName=$_POST['SurName'];
		$Name=$_POST['Name'];
		$Age=$_POST['Age'];
		$Blood=$_POST['Blood'];
		$Contact=$_POST['Contact'];
		$Address=$_POST['Address'];
		$Town=$_POST['Town'];
		$Postcode=$_POST['Postcode'];
		$Country=$_POST['Country'];


		//echo $SurName;
	
	
		{  //   SQL:     UPDATE tCompany record
		
			$student_SQLupdate = "UPDATE Student SET ";			
			$student_SQLupdate .=  "SurName = '".$SurName."', ";
			$student_SQLupdate .=  "Name = '".$Name."', ";
			$student_SQLupdate .=  "Age = '".$Age."', ";
			$student_SQLupdate .=  "Blood = '".$Blood."', ";
			$student_SQLupdate .=  "Contact = '".$Contact."', ";
			$student_SQLupdate .=  "Address = '".$Address."', ";
			$student_SQLupdate .=  "Town = '".$Town."', ";
			$student_SQLupdate .=  "Postcode = '".$Postcode."', ";
			$student_SQLupdate .=  "COUNTRY = '".$Country."' ";
			$student_SQLupdate .=  "WHERE email = '".$eMail."'AND password = '".$passWord."' "; 			
		}
	

	
		{	//		check the data and process it 
			
			if (empty($Name)) {
				echo '<span style="color:red; ">Cannot make Name empty.</span><br /><br />'; 
			} else{
					// echo '<span style = "text-decoration: underline;">
					// 		SQL statement:</span>
					// 		<br />'.$student_SQLupdate.'<br /><br />';
							
					if (mysqli_query($conn,$student_SQLupdate))  {	
						echo '<span style="color:green; ">Congrats!!!</span><br /><br />';
						echo '<span style="color:green; ">Successfully Update</span><br /><br />';
					} else {
						echo '<span style="color:red; ">FAILED to update the company.</span><br /><br />';
						
					}	
			}
		}



	}
	else{
		$tPerson_SQLselect = "SELECT * ";
		$tPerson_SQLselect .= "FROM ";
		$tPerson_SQLselect .= "Student ";
		$tPerson_SQLselect .= "WHERE email = '".$eMail."' AND password= '".$passWord."'";
		
		$tPerson_SQLselect_Query = mysqli_query($conn,$tPerson_SQLselect);
	
		
				
		while ($row = mysqli_fetch_array($tPerson_SQLselect_Query, MYSQLI_ASSOC)) {
					$current_SurName = $row['SurName'];
					$current_Name = $row['Name'];
					$current_Age = $row['Age'];
					$current_Blood = $row['Blood'];
					$current_Contact = $row['Contact'];
					$current_Address= $row['Address'];
					$current_Town = $row['Town'];
					$current_Postcode = $row['Postcode'];
					$current_COUNTRY = $row['COUNTRY'];
					$current_Health_Condition = $row['Health_Condition'];
	
					
					 
				}
	
				//echo $current_Name;
				//  END: Get the details of the person selected 
			
	
			{	//		Create form fields 
				$fld_personID = '<input type="hidden" name="personID" value="'.$personID.'"/>';
				$fld_personEdited = '<input type="hidden" name="personEdited" value="1"/>';
		
				$fld_SurName = '<input type="text" name="SurName" placeholder="'.$current_SurName.'" value="'.$current_SurName.'"/>';
				$fld_Name = '<input type="text" name="Name" value="'.$current_Name.'"/>';
				$fld_Age = '<input type="text" name="Age" value="'.$current_Age.'"/>';
				$fld_Blood = '<input type="text" name="Blood" value="'.$current_Blood.'"/>';
				$fld_Contact = '<input type="text" name="Contact" value="'.$current_Contact.'"/>';
				$fld_Address = '<input type="text" name="Address" value="'.$current_Address.'"/>';
				$fld_Town = '<input type="text" name="Town" value="'.$current_Town.'"/>';
				$fld_Postcode = '<input type="text" name="Postcode" value="'.$current_Postcode.'"/>';
				$fld_Country = '<input type="text" name="Country" value="'.$current_COUNTRY.'"/>';
				
			//  END: Create form fields 
			}
	
	
			{	//	render the FORM 
	
				echo '<form name="postPerson" action="index.php?content=edit" method="post">';
					echo '
					<table>
						<tr>
							<td>SurName</td>
							<td>'.$fld_SurName.'</td>
						</tr>
						<tr>
							<td>Name</td>
							<td>'.$fld_Name.'</td>
						</tr>
						<tr>
							<td>Age</td>
							<td>'.$fld_Age.'</td>
						</tr>
						<tr>
	
						<tr>
							<td>Blood</td>
							<td>'.$fld_Blood.'</td>
						</tr>
						<tr>
	
						<td>Contact</td>
	
							<td>'.$fld_Contact.'</td>
	
						</tr>
						<tr>
							<td>Address</td>
							<td>'.$fld_Address.'</td>
						</tr>
						<tr>
							<td>Town</td>
							<td>'.$fld_Town.'</td>
						</tr>
						<tr>
							<td>Postcode</td>
							<td>'.$fld_Postcode.'</td>
						</tr>
						<tr>
							<td>Country</td>
							<td>'.$fld_Country.'</td>
						</tr>
	
						<tr>
							<td>&nbsp;</td>
							<td align="right"><input type="submit" name="submit" value="save" /></td>
						</tr>					
					</table>
					';
						
				echo '</form>';
			//		END: render the FORM 
	
	
	
	
	
			}
	
		
	
	
	 }
	
	}




 echo '<br /><hr /><br />';
//echo '<a href="index.php?content=companyPeopleEdit&companyID='.$companyID.'">Back to Company/People List</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<a href="index.php">Back to Homepage</a>';
 



//close database connection
 $conn->close();

?>