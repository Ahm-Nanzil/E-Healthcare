

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
       
    $content=$_GET['content'];
    $d_id=$_GET['d_id'];

    
    $p_Massage=$_POST['text'];
    $submit=$_POST['submit'];

    
    
   


     
/*echo '<h2 text-align:center>Massage</h2>
<p></p>

<div class="container">
  <form action="">

  <input type="hidden" id="content" name='.$content.' >
   
    <div class="row">
      <div class="col-25">
        <label for="country">Country</label>
      </div>
      <div class="col-75">
        <select id="country" name="country">
          <option value="australia">Australia</option>
          <option value="canada">Canada</option>
          <option value="usa">USA</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="subject">Subject</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="p_msg" placeholder="Write about your disease.." style="height:200px"></textarea>
      </div>
    </div>
    <div class="row">
      <input type="submit"  value="Submit">
    </div>
  </form>
</div>';
*/

 if($submit){
    

	$submit=$_POST['submit'];
    echo $content;
    echo $d_id;
    echo $p_Massage;
    echo $submit;
    echo $userID_value;
    /*
    {  //   SQL:     $tCompany_SQLinsert	
		
        $tCompany_SQLinsert = "INSERT INTO d_p_massage (";			
        $tCompany_SQLinsert .=  "ID, ";
        $tCompany_SQLinsert .=  "p_ID, ";
        $tCompany_SQLinsert .=  "d_ID, ";
        $tCompany_SQLinsert .=  "massage";
        $tCompany_SQLinsert .=  ") ";
        
        $tCompany_SQLinsert .=  "VALUES (";
        $tCompany_SQLinsert .=  "'".$SurName."', ";
        $tCompany_SQLinsert .=  "'".$Name."', ";
        $tCompany_SQLinsert .=  "'".$RegType."', ";
        $tCompany_SQLinsert .=  "'".$Age."', ";
        $tCompany_SQLinsert .=  "'".$Blood."', ";
        $tCompany_SQLinsert .=  "'".$Contact."', ";
        $tCompany_SQLinsert .=  "'".$Address."', ";
        $tCompany_SQLinsert .=  "'".$Town."', ";
        $tCompany_SQLinsert .=  "'".$Postcode."', ";		
        $tCompany_SQLinsert .=  "'".$COUNTRY."', ";
        $tCompany_SQLinsert .=  "'".$Health_Condition."', ";
        $tCompany_SQLinsert .=  "'".$p_Massage."' ";
        $tCompany_SQLinsert .=  ") ";
    }
    
    {	//		check the data and process it 
        
        if (empty($Name)) {
            echo '<span style="color:red; ">Cannot add Info with no name.</span><br /><br />'; 
        } else {
                echo '<span style = "text-decoration: underline;">
                        SQL statement:</span>
                        <br />'.$tCompany_SQLinsert.'<br /><br />';
                        
                if (mysqli_query($conn,$tCompany_SQLinsert))  {	
                    echo 'used to Successfully add new Info.<br /><br />';
                } else {
                    echo '<span style="color:red; ">FAILED to add .</span><br /><br />';
                    
                }	
        }
    }
    */

 }

else{

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
        <input class="w3-input w3-border" type="text" placeholder="Write about your disease---" required name="text">
             
        
         <input type ="submit" class="w3-button w3-black w3-section w3-center" name="submit" value="SEND"> 
         ';

}




 }




//close database connection
 $conn->close();

?>



 
</body>
</html>