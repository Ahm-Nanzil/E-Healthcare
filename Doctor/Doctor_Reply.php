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

    $userID_value= $_COOKIE["userID"];
    $patient_ID=$_GET['p_id'];
    $massage_ID=$_GET['massage_id'];
    $d_Massage=$_POST['text'];
    $submit=$_POST['submit'];

    //echo $massage_ID;


    

     if($submit){

        {  //   SQL:     UPDATE tCompany record
		
            $appoinment_SQLupdate = "UPDATE d_p_massage  SET ";			
            $appoinment_SQLupdate .=  "d_massage = '".$d_Massage."' ";
            $appoinment_SQLupdate .=  "WHERE d_ID = '".$userID_value."' AND p_ID = '".$patient_ID."'AND ID = '".$massage_ID."'"; 			
        }
        {
           /* echo '<span style = "text-decoration: underline;">
                    SQL statement:</span>
                    <br />'.$appoinment_SQLupdate.'<br /><br />';
                    */
                    
            if (mysqli_query($conn,$appoinment_SQLupdate))  {	
              echo '<span style="color:green; ">SuccessFully deliverd.</span><br /><br />';
            } else {
                echo '<span style="color:red; ">FAILED to update the company.</span><br /><br />';
                
            }	
    }

    }

    else {
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
                <input class="w3-input w3-border" type="text" placeholder="Give Feedback---" required name="text">
                     
                
                 <input type ="submit" class="w3-button w3-black w3-section w3-center" name="submit" value="SEND"> 
                 ';

    }


    


 }


//close database connection
 $conn->close();

?>

</body>
</html>