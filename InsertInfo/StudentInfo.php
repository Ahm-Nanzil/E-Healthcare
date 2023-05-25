<?php


{
    include 'C:\xampp\htdocs\Health Care\Config\Config.php';
    $dbName="mydb";
    $conn = new mysqli($servername, $username, $password,$dbname); 
    $dbSuccess=FALSE;
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    else $dbSuccess=TRUE;

    }

if($dbSuccess){

    {

        echo '<h2 style="font-family: arial, helvetica, sans-serif;" >
                    Information
                </h2>';
    
        echo "<br />";
        
        {	//		FORM postCompany 
            echo '<form name="Info" action="StudentSave.php" method="post">';
            
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
                            <td>AccessLevel</td>
                            <td><input type="text" name="accessLevel" /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td align="right"><input type="submit"  value="Save" /></td>
                        </tr>
                    </table>
                    ';
                        
            echo '</form>';
        }
    
    }

 }
 

//close database connection
 $conn->close();

?>