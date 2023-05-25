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
    $submit=$_POST['save'];
    $register=$_POST['designation'];
    //echo $register;
    $designation=$_POST['desig'];
   // echo $designation;
    //echo $submit;
    
 
				
    //$passWord=$_POST["passwordstu"];
    
     //echo $md5Password;
     //echo "<br>";
    if(isset($submit)){
        $nowTimeStamp = date("Y-m-d H:i:s");
        //$dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
       
        
        //echo "hi;";
        //if(!isset($RegType)){
           // echo '<a href="index.php?con=signup"><span style="color:red; ">please Fill up from correctly With Reg Type...</span></a><br /><br />';
            
        //}
        {
            {  
                //   SQL:     $NewUserSQL
                

                
                if($designation=='student'){
                   // echo "hiiiiiiiiii";
                   {  //   collect the data with $_POST for student
                    $nowTimeStamp = date("Y-m-d H:i:s");
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
                    
                    $passWord=$_POST["passwordstu"];
                    $md5Password=md5($passWord);
                    
                    
                }
            
                    $NewUserSQL = "INSERT INTO student (";			
                    $NewUserSQL .=  "SurName, ";
                    $NewUserSQL .=  "Name, ";
                    //$NewUserSQL .=  "RegType, ";
                    $NewUserSQL .=  "Age, ";
                    $NewUserSQL .=  "Blood, ";
                    $NewUserSQL .=  "Contact, ";
                    $NewUserSQL .=  "Address, ";
                    $NewUserSQL .=  "Town, ";
                    $NewUserSQL .=  "Postcode, ";
                    $NewUserSQL .=  "COUNTRY, ";
                    $NewUserSQL .=  "email, ";
                    $NewUserSQL .=  "password, ";
                    $NewUserSQL .=  "accessLevel";
                    $NewUserSQL .=  ") ";
                
                    $NewUserSQL .=  "VALUES (";
                    $NewUserSQL .=  "'".$SurName."', ";
                    $NewUserSQL .=  "'".$Name."', ";
                    //$NewUserSQL .=  "'".$RegType."', ";
                    $NewUserSQL .=  "'".$Age."', ";
                    $NewUserSQL .=  "'".$Blood."', ";
                    $NewUserSQL .=  "'".$Contact."', ";
                    $NewUserSQL .=  "'".$Address."', ";
                    $NewUserSQL .=  "'".$Town."', ";
                    $NewUserSQL .=  "'".$Postcode."', ";
                    $NewUserSQL .=  "'".$COUNTRY."', ";
                    $NewUserSQL .=  "'".$eMail."', ";	
                    $NewUserSQL .=  "'".$md5Password."', ";
                    $NewUserSQL .=  "1 ";
                    $NewUserSQL .=  ") ";
            
            
                        if (mysqli_query($conn,$NewUserSQL))  {
                            echo '<span style="color:green; ">used to Successfully Sign Up.</span><br /><br />';	
                            //echo '<a href="index.php">Please Wait For Log in To Use E-HealthCare... </a>';
                            //echo $NewUserSQL;
                            //echo $md5Password;

                            //Qery last insert
                            $lastID_SQl="SELECT ID
                            FROM student
                            ORDER BY ID DESC LIMIT 1";
                            $last_IDquery = mysqli_query($conn,$lastID_SQl );
                            $row = mysqli_fetch_array($last_IDquery, MYSQLI_ASSOC);
                            $last_ID=$row['ID'];
                            //echo $last_ID;
                            //For insert in New_User
                            $insert_uIDsql = "INSERT INTO new_user (";			
                    $insert_uIDsql .=  "u_ID, ";
                    $insert_uIDsql .=  "register";
                    $insert_uIDsql .=  ") ";
                
                    $insert_uIDsql .=  "VALUES (";
                    $insert_uIDsql .=  "'".$last_ID."', ";	
                    $insert_uIDsql .=  "'".$designation."' ";
                    $insert_uIDsql .=  ") ";


                    if (mysqli_query($conn,$insert_uIDsql))  {
                        echo '<span style="color:green; ">Please Wait for Admin Approval.</span><br /><br />';	
                        
                        //echo $designation;
                
                        } else {
                                echo '<span style="color:red; ">FAILED to add in New user.</span><br /><br />';
                                echo $designation;
                
                            }	

                            //echo $designation;
                    
                            } else {
                                    echo '<span style="color:red; ">FAILED to Sign Up.</span><br /><br />';
                    
                                }	
            
                        }

                        if($designation=='doctor'){
                             //echo "hiiiiiiiiii";
                             

                            {
            //   collect the data with $_POST for student
            $f_name=$_POST['f_name'];
            $l_name=$_POST['l_name'];
            $email=$_POST['email'];
           // echo $email;
            $contact=$_POST['contact'];
            //$contact=$_POST[''];
            $specialist=$_POST['specialist'];
            $qualification=$_POST['qualification'];
            $DOB=$_POST['DOB'];
            $gender=$_POST['gender'];
            $bmdc_reg_num=$_POST['bmdc_reg_num'];
            $address=$_POST['address'];
            $pswd=$_POST['pswd'];

            $md5pswd=md5($pswd);
            //echo $md5pswd;
        }
                     
                                 $NewUserSQL = "INSERT INTO doctor (";			
                             $NewUserSQL .=  "f_name, ";
                             $NewUserSQL .=  "l_name, ";
                             //$NewUserSQL .=  "RegType, ";
                             $NewUserSQL .=  "email, ";
                             $NewUserSQL .=  "contact, ";
                             $NewUserSQL .=  "specialist, ";
                             $NewUserSQL .=  "qualification, ";
                             $NewUserSQL .=  "DOB, ";
                             $NewUserSQL .=  "gender, ";
                             $NewUserSQL .=  "bmdc_reg_num, ";
                             $NewUserSQL .=  "address, ";
                             $NewUserSQL .=  "pswd, ";
                             $NewUserSQL .=  "date, ";
                             $NewUserSQL .=  "permission, ";
                             $NewUserSQL .=  "accessLavel";
                             $NewUserSQL .=  ") ";
                         
                             $NewUserSQL .=  "VALUES (";
                             $NewUserSQL .=  "'".$f_name."', ";
                             $NewUserSQL .=  "'".$l_name."', ";
                             //$NewUserSQL .=  "'".$RegType."', ";
                             $NewUserSQL .=  "'".$email."', ";
                             $NewUserSQL .=  "'".$contact."', ";
                             $NewUserSQL .=  "'".$specialist."', ";
                             $NewUserSQL .=  "'".$qualification."', ";
                             $NewUserSQL .=  "'".$DOB."', ";
                             $NewUserSQL .=  "'".$gender."', ";
                             $NewUserSQL .=  "'".$bmdc_reg_num."', ";
                             $NewUserSQL .=  "'".$address."', ";
                             $NewUserSQL .=  "'".$md5pswd."', ";	
                             $NewUserSQL .=  "'".$nowTimeStamp."', ";
                             $NewUserSQL .=  "'No', ";	
                             $NewUserSQL .=  "2 ";
                             $NewUserSQL .=  ") ";
                     
                     
                                 if (mysqli_query($conn,$NewUserSQL))  {
                                     echo '<span style="color:green; ">used to Successfully Sign Up.</span><br /><br />';	
                                    // echo '<a href="index.php">Please Log in To Use E-HealthCare... </a>';
                                     //echo $designation;
                                      //Qery last insert
                            $lastID_SQl="SELECT ID
                            FROM doctor
                            ORDER BY ID DESC LIMIT 1";
                            $last_IDquery = mysqli_query($conn,$lastID_SQl );
                            $row = mysqli_fetch_array($last_IDquery, MYSQLI_ASSOC);
                            $last_ID=$row['ID'];
                            //echo $last_ID;
                            //For insert in New_User
                            $insert_uIDsql = "INSERT INTO new_user (";			
                    $insert_uIDsql .=  "u_ID, ";
                    $insert_uIDsql .=  "register";
                    $insert_uIDsql .=  ") ";
                
                    $insert_uIDsql .=  "VALUES (";
                    $insert_uIDsql .=  "'".$last_ID."', ";	
                    $insert_uIDsql .=  "'".$designation."' ";
                    $insert_uIDsql .=  ") ";


                    if (mysqli_query($conn,$insert_uIDsql))  {
                        echo '<span style="color:green; ">Please Wait for Admin Approval.</span><br /><br />';	
                        
                        //echo $designation;
                
                        } else {
                                echo '<span style="color:red; ">FAILED to add in New user.</span><br /><br />';
                                echo $designation;
                
                            }
                             
                                     } else {
                                             echo '<span style="color:red; ">FAILED to Sign Up.</span><br /><br />';
                                             echo $designation;
                             
                                         }	
                     
                                 }



                
            
                
            }
        
        }
        

    }
    else{
        
       /* $drop= "SELECT  Content from catagory  ";

        echo '<form name="postLoginHid" action="" method="post">';	
            echo '
            <tr>
            <td>Sign Up as</td>
            <td><select name="designation">
            <option value="" disabled selected>Choose option</option>';

        $run = mysqli_query($conn, $drop);
				   while($row = mysqli_fetch_array($run, MYSQLI_ASSOC))
				   {
                       $catagory=$row['Content'];
            
                 echo '  <option value=>'.$catagory.'</option>'; 
					  
				   }

                 echo ' </select></td>
                   </tr>
                           
                           <input type="submit"  value="Sign UP" />
                       ';
               echo '</form>'; */ 

        if(!isset($register)){
            echo '<form name="postLoginHid" action="" method="post">';	
            echo '
            <tr>
            <td>Sign Up as</td>
            <td><select name="designation">
            <option value="" disabled selected>Choose option</option>
            <option value="doctor">Doctor</option>
            <option value="student">Student</option>
            <option value="faculty">Faculty</option>
            <option value="admin">Admin</option>
            
        </select></td>
        </tr>
                
                <input type="submit"  value="Sign UP" />
            ';
    echo '</form>';  
        }


        

        if($register=="student"){
            echo '<h2 style="font-family: arial, helvetica, sans-serif;" >
            Insert Your Information
        </h2>';

        {	//		FORM Student 
            echo '<form name="Info" action="index.php?con=signup" method="post">';
            echo '<input type="hidden" name="desig" value="student" />';
                    echo '
                    <table>
                        <tr>
                            <td>Sur Name</td>
                            <td><input type="text" name="SurName" /></td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td><input type="text" name="Name" /></td>
                        </tr>
                        
                        <tr>
                            <td>Age</td>
                            <td><input type="text" name="Age" /></td>
                        </tr>
                        <tr>
                            <td>Blood</td>
                            <td><input type="text" name="Blood" /></td>
                        </tr>
                        <tr>
                            <td>Contact No</td>
                            <td><input type="text" name="Contact" /></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><input type="text" name="Address" /></td>
                        </tr>
                        <tr>
                            <td>Town</td>
                            <td><input type="text" name="Town" /></td>
                        </tr>
                        <tr>
                            <td>Postcode</td>
                            <td><input type="text" name="Postcode" /></td>
                        </tr>
                        <tr>
                            <td>COUNTRY</td>
                            <td><input type="text" name="COUNTRY" /></td>
                        </tr>
                        <tr>
                        <td>E-Mail</td>
                        <td><input type="text" name="email" /></td>
                        </tr>
                        <tr>
                        <td>Password</td>
                        <td><input type="text" name="passwordstu" /></td>
                        </tr>
                        
                        

                        <tr>
                            <td></td>
                            <td align="right"><input type="submit" name="save"  value="Save" /></td>
                        </tr>
                    </table>
                    ';
                        
            echo '</form>';
        }
        }
        if($register=="doctor"){
            echo '<h2 style="font-family: arial, helvetica, sans-serif;" >
            Insert Your Information
        </h2>';

        {	//		FORM Doctor 
            echo '<form name="Info" action="" method="post">';
            echo '<input type="hidden" name="desig" value="doctor" />';
                    echo '
                    <table>
                        <tr>
                            <td>First Name</td>
                            <td><input type="text" name="f_name" /></td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td><input type="text" name="l_name" /></td>
                        </tr>
                        
                        
                        <tr>
                            <td>Contact No</td>
                            <td><input type="text" name="contact" /></td>
                        </tr>
                        <tr>
                            <td>Special In</td>
                            <td><input type="text" name="specialist" /></td>
                        </tr>
                        
                        <tr>
                            <td>Qualification</td>
                            <td><input type="text" name="qualification" /></td>
                        </tr>
                        <tr>
                            <td>Date of Birth</td>
                            <td><input type="text" name="DOB" /></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td><input type="text" name="gender" /></td>
                        </tr>
                        <tr>
                        <td>BMDC Register No</td>
                        <td><input type="text" name="bmdc_reg_num" /></td>
                        </tr>
                        <tr>
                        <td>Address</td>
                        <td><input type="text" name="address" /></td>
                        </tr>
                        <tr>
                            <td>E-Mail</td>
                            <td><input type="text" name="email" /></td>
                        </tr>
                        <tr>
                        <td>Password</td>
                        <td><input type="text" name="pswd" /></td>
                        </tr>
                        
                        

                        <tr>
                            <td></td>
                            <td align="right"><input type="submit" name="save"  value="Save" /></td>
                        </tr>
                    </table>
                    ';
                        
            echo '</form>';
        }
        }

       
    
       
        
        
    
    #echo '<a href="companyEdit.php">Select a different company</a>';
   
    
    
    }

	echo "<br /><hr /><br />";
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo '<a href="index.php">Quit - to homepage</a>';
 }
 



//close database connection
 $conn->close();

?>