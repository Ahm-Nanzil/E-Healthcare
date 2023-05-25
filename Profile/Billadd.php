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

    $userID_value=$_COOKIE["userID"];
    $d_Id=$_GET['d_id'];

    $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
			$todaysDate= $dt->format('F j, Y ');

 $flagg=0;
 $todaysBill="SELECT * 
 FROM medical_bills 
 WHERE u_ID=68 AND d_ID= 1234027";
 $todaysBill_SQL=mysqli_query($conn,$todaysBill);
 while($row = mysqli_fetch_array($todaysBill_SQL, MYSQLI_ASSOC)){
          $date=$row['Date'];
          //echo $date;

 }
 if ($todaysDate==$date){
$flagg=1;
echo "You are Payment Free For Today<br>";
echo '<a href="index.php?content=massage&d_id='.$d_Id.'"> Click To Procced</a>';
 }
else{
    //echo "Nana";
//Query Amount For User
$payment_SQL = "SELECT * ";
$payment_SQL .= "FROM ";
$payment_SQL .= "payment ";
$payment_SQL .= "WHERE u_ID = '".$userID_value."' ";

$payment_SQL_Query = mysqli_query($conn,$payment_SQL);	

while ($row = mysqli_fetch_array($payment_SQL_Query, MYSQLI_ASSOC)) {
   
    $total_bills = $row['amount'];

     
                         
}
    //Query for doctor
    $doc_paymentSQL = "SELECT * ";
    $doc_paymentSQL .= "FROM ";
    $doc_paymentSQL .= "payment ";
    $doc_paymentSQL .= "WHERE u_ID = '".$d_Id."' ";
    
    $doc_paymentSQL_Query = mysqli_query($conn,$doc_paymentSQL);	
    
    while ($row = mysqli_fetch_array($doc_paymentSQL_Query, MYSQLI_ASSOC)) {
       
        $total_income = $row['amount'];

         
                             
    }
    
    mysqli_free_result($doc_paymentSQL_Query);

    {  //   SQL:     $hBILLS_SQLinsert 	
		
        $hBILLS_SQLinsert  = "INSERT INTO medical_bills (";			
        $hBILLS_SQLinsert  .=  "u_ID, ";
        $hBILLS_SQLinsert  .=  "Bills, ";
        $hBILLS_SQLinsert  .=  "d_ID, ";
        $hBILLS_SQLinsert  .=  "Date";
        $hBILLS_SQLinsert  .=  ") ";
        
        $hBILLS_SQLinsert  .=  "VALUES (";
        $hBILLS_SQLinsert  .=  "'".$userID_value."', ";
        $hBILLS_SQLinsert  .=  "500, ";
        $hBILLS_SQLinsert  .=  "'".$d_Id."', ";
        $hBILLS_SQLinsert  .=  "'".$todaysDate."' ";
        $hBILLS_SQLinsert  .=  ") ";
    }


    $user_Bills=$total_bills+500;
    {  //   SQL:     UPDATE User Payment
		
      $bills_Update = "UPDATE payment SET ";    	
      $bills_Update .=  "amount = '".$user_Bills."' ";
      $bills_Update .=  "WHERE u_ID = '".$userID_value."' "; 			
    }
    $doc_bills=$total_income+500;
    {  //   SQL:     UPDATE Doctor Income
		
      $income_Update = "UPDATE payment SET ";    	
      $income_Update .=  "amount = '".$doc_bills."' ";
      $income_Update .=  "WHERE u_ID = '".$d_Id."' "; 			
    }


     //For  Bills
  if (mysqli_query($conn,$hBILLS_SQLinsert ))  {	
    echo 'used to Successfully inserted Your Bills..  .<br /><br />';

    
    if (mysqli_query($conn,$bills_Update ))  {	
        echo 'used to Successfully Update Your Bills .<br /><br />';
    }
    else {
        echo '<span style="color:red; ">FAILED to add .</span><br /><br />';
        
    }

    
    if (mysqli_query($conn,$income_Update ))  {	
        echo 'used to Successfully Update Doctors income .<br /><br />';
       
        
    }
    else {
        echo '<span style="color:red; ">FAILED to add .</span><br /><br />';
        
    }

    
      


}
else {
    echo '<span style="color:red; ">FAILED to add Bill.</span><br /><br />';
    
}




$flagg=1;
if($flagg==1) {
    echo '<a href="">Start Your Session</a>';
  }
}
   
 

  }




 
 



//close database connection
 $conn->close();

?>