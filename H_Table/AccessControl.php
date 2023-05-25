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
    
        
        {	//		Table Definition 
            $tableName = "H_AccessControl";	
    
            //		ONLY the fields to insert - NOT any auto_inc field	
            $tableField = array(
                        'accessLevel',
                        'userType' 
            );
            $numFields = sizeof($tableField);
            
            echo '$numFields : '.$numFields.'<br />';
    
            $createTable_SQL = 'CREATE TABLE '.$tableName.' (
                                        ID INT( 11 ) NOT NULL  AUTO_INCREMENT,
                                        accessLevel INT( 11 ) NOT NULL ,
                                        userType VARCHAR( 50 ) NOT NULL ,
                                        PRIMARY KEY ( ID ) ,
                                        UNIQUE (
                                        accessLevel ,
                                        userType)
                                        )';	
                                            
            echo $createTable_SQL."<br /><br />";	
            
            //		set startInsertsField to 1 if first field is auto_increment
            //			otherwise set to 0.
    
        }
    
        //	=======^^^^^^^^^^^^^^^^^^^^^^^=========  End of Definition Part ======^^^^^^^^^=====
                                            
            {  //		the Data
    
                $tableData[0] = explode(",", "99,Administrator");
                $tableData[1] = explode(",", "21,Editor");
                $tableData[2] = explode(",", "11,Registered User");
                
                $numRows = sizeof($tableData);
            }
            
            echo '$numRows : '.$numRows.'<br />';
            echo '$tableField[$numFields-1] : '.$tableField[$numFields-1].'<br />';
    
            {	//		DROP table		
                
                $drop_SQL = "DROP TABLE ".$tableName;
                
                if (mysqli_query($conn,$drop_SQL))  {	
                    echo "'DROP ".$tableName."' -  Successful.";
                } else {
                    echo "'DROP ".$tableName."' - Failed.";
                }
            }
            
            echo "<br /><hr /><br />";
        
            {	//		CREATE table		
                
                if (mysqli_query($conn,$createTable_SQL))  {	
                    echo "'CREATE ".$tableName."' -  Successful.";
                } else {
                    echo "'CREATE ".$tableName."' - Failed.";
                }
            }		
            echo "<br /><hr /><br />";
                
                $table_SQLinsert = "INSERT INTO ".$tableName." (";
                
                //$table_SQLinsert .=   "x"; 
                foreach($tableField as $tableFieldName) {
                    $table_SQLinsert .=  $tableFieldName;
                    if($tableFieldName <> $tableField[$numFields-1]) {
                        $table_SQLinsert .=  ", ";
                    }
                }
                $table_SQLinsert .=  ") VALUES ";
    
                $indx = 0;		
                while($indx < $numRows) {			
                    $table_SQLinsert .=  "(";
                    
                    foreach($tableField as $key => $tableFieldName) {
                        
                        $table_SQLinsert .=  "'".$tableData[$indx][$key]."'";
                        if($tableFieldName <> $tableField[$numFields-1]) {
                            $table_SQLinsert .=  ", ";
                        }
    
                    }
    
                    $table_SQLinsert .=  ") ";
                    if ($indx < ($numRows - 1)) {
                        $table_SQLinsert .=  ",\n";
                    }
                    
                    $indx++;
                }
            
                {	//	Echo and Execute the SQL and test for success   
                
                            echo "<strong><u>SQL:<br /></u></strong>";
                            echo $table_SQLinsert."<br /><br />";
                                
                            if (mysqli_query($conn,$table_SQLinsert))  {				
                                echo "was SUCCESSFUL.<br /><br />";
                            } else {
                                echo "FAILED.<br /><br />";		
                            }
                }
    }

}

//close database connection
 $conn->close();

?>