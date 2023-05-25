<?php 
/*
session_start();
$userID_value = $_SESSION['userid'];
*/
?>
<?php
$userID_value= $_COOKIE["userID"];

	
	

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
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
  
    //Catch Value    
    $content=$_GET['content'];
    $d_id=$_GET['d_id'];

    $p_Massage=$_POST['text'];
    $submit=$_POST['submit'];

   
  {

    
    $nowTimeStamp = date("Y-m-d H:i:s");
    
    {  //   SQL:     $massage_SQLinsert	
		
        $massage_SQLinsert = "INSERT INTO d_p_massage (";			
        $massage_SQLinsert .=  "p_ID, ";
        //$massage_SQLinsert .=  "SurName, ";
        //$massage_SQLinsert .=  "Name, ";
        $massage_SQLinsert .=  "d_ID, ";
        $massage_SQLinsert .=  "p_massage";
        $massage_SQLinsert .=  ") ";
        
        $massage_SQLinsert .=  "VALUES (";
        $massage_SQLinsert .=  "'".$userID_value."', ";
        $massage_SQLinsert .=  "'".$d_id."', ";
        $massage_SQLinsert .=  "'".$p_Massage."' ";
        $massage_SQLinsert .=  ") ";
    }
    
    
    {	//		check the data and process it 
        
        if (empty($p_Massage)) {
            echo '<span style="color:red; ">Please Massage.</span><br /><br />'; 
        } else {
                
                        
                if (mysqli_query($conn,$massage_SQLinsert))  {	
                    echo 'Used to Successfully Send Your Problem!.<br /><br />';
                    echo "<hr>";

                 } else {
                    echo '<span style="color:red; ">Cannot add Massage.</span><br /><br />';
                    echo "<hr>";
                }	
        }
        
    }
    

 }

{

  
$uploadActivated = $_POST['uploadActivated'];

if (isset($uploadActivated) AND $uploadActivated == 1) {
	
	$uploaddir = 'images/';
	$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
	

	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
		 chmod($uploadfile, 0666);			//		used for commercial grade systems 		
	    echo "File is valid, and was successfully uploaded.<br />";

		echo 'The image uploaded was "'.$uploadfile.'"<br /><br /><br />';	
		echo '<img src="'.$uploadfile.'" alt="Test Image uploaded" />';
    echo "<hr>";

	} else {
	    echo "File upload error!<br />";
	}
		
	unset($uploadActivated);	
		
}

		
echo '
 Please Submit Jpg ,doc type File....
<form enctype="multipart/form-data" action="" method="POST">
    MAX_FILE_SIZE must precede the file input field 
    <input type="hidden" name="uploadActivated" value=1 />
    
    <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
     Name of input element determines name in $_FILES array 
    Send this file: <input name="userfile" type="file" />
    <input type="submit" value="Upload File" />
</form>';

    echo '<!--Contact Us-->
<div class="w3-col m6" >
  <form action = "" method="POST" >
        <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
        <!-- 
        <div class="w3-half">
            <input class="w3-input w3-border" type="name" placeholder="Name" required name="name">
          </div>
          <div class="w3-half">
            <input class="w3-input w3-border" type="email" placeholder="Email/Gmail" required name="gmail">
          </div>
-->
        </div>
        <div class="row">
      <div class="col-25">
        <label for="subject">Subject</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="text" placeholder="Write about your disease.." style="height:200px"></textarea>
      </div>
    </div>
    
        
             
        
         <input type ="submit" class="w3-button w3-black w3-section w3-center" name="submit" value="SEND"> 
         ';

}




echo '<a href="index.php">Back To HomePage</a>';
 }




//close database connection
 $conn->close();

?>
</body>
</html>