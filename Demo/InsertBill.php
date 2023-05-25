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
    $userID_value=123;
    $d_id=1234027;


    $doc_paymentSQL = "SELECT * ";
    $doc_paymentSQL .= "FROM ";
    $doc_paymentSQL .= "payment ";
    $doc_paymentSQL .= "WHERE u_ID = '".$d_id."' ";
    
    $doc_paymentSQL_Query = mysqli_query($conn,$doc_paymentSQL);	
    
    while ($row = mysqli_fetch_array($doc_paymentSQL_Query, MYSQLI_ASSOC)) {
       
        $total_bills = $row['amount'];

         
                             
    }
    
    mysqli_free_result($doc_paymentSQL_Query);

    echo $total_bills;
    
    $user_Bills=$total_bills+500;

    echo $user_Bills;

    {  //   SQL:     UPDATE tCompany record
		
        $income_Update = "UPDATE payment SET ";    	
        $income_Update .=  "amount = '".$user_Bills."' ";
        $income_Update .=  "WHERE u_ID = '".$d_id."' "; 			
    }
    if (mysqli_query($conn,$income_Update ))  {	
        echo 'used to Successfully add new .<br /><br />';
    }
    else {
        echo '<span style="color:red; ">FAILED to add .</span><br /><br />';
        
    }
        
    

   


 }
 



//close database connection
 $conn->close();

?>