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
    {

        {	//  Get the details of the company selected 
               # $companyID = $_POST["companyID"];	
                
                $companyID=7;
                if ($companyID == 0) {
                    header("Location: companyEdit.php");	
                }
                
    
    
                $tCompany_SQLselect = "SELECT * ";
                $tCompany_SQLselect .= "FROM ";
                $tCompany_SQLselect .= "Student ";
                $tCompany_SQLselect .= "WHERE ID = '".$companyID."' ";
                
                $tCompany_SQLselect_Query = mysqli_query($conn,$tCompany_SQLselect);	
                
                while ($row = mysqli_fetch_array($tCompany_SQLselect_Query, MYSQLI_ASSOC)) {
            $SurName = $row['SurName'];
            $Name = $row['Name'];
            $RegType = $row['RegType'];
            
            $fullCoyName = trim($SurName." ".$Name."");
            
            $Age = $row['Age'];
            $Blood = $row['Blood'];
            $Contact = $row['Contact'];
            $Address = $row['Address'];
            $Town = $row['Town'];
            $Postcode = $row['Postcode'];
            $COUNTRY = $row['COUNTRY'];
            $Health_Condition = $row['Health_Condition'];

                     
                }
                
                mysqli_free_result($tCompany_SQLselect_Query);			
        }
    
        echo '<h2 style="font-family: arial, helvetica, sans-serif;" >
                    Edit Your Information
                </h2>';
        
                {	//		FORM postCompany 
                    echo '<form name="Info" action="StudentInfoUpdate.php" method="post">';
                    
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
                                    <td>Reg Type</td>
                                    <td><input type="text" name="RegType" /></td>
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
                                    <td>Health Condition</td>
                                    <td><input type="text" name="Health_Condition" /></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td align="right"><input type="submit"  value="Save" /></td>
                                </tr>
                            </table>
                            ';
                                
                    echo '</form>';
                }
        
        echo "<br /><hr /><br />";
    
    #echo '<a href="companyEdit.php">Select a different company</a>';
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo '<a href="../index.php">Quit - to homepage</a>';
    
    
    }

	

 }
 



//close database connection
 $conn->close();

?>