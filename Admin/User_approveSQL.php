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
    

    $user_ID=$_GET['u_id'];
    $register=$_GET['register'];
    //echo $register;
    //echo $user_ID;
    if($register=="student"){
        $approve_requestSQL = "SELECT * ";
     $approve_requestSQL  .= "FROM ";
     $approve_requestSQL  .= "student ";
     $approve_requestSQL  .= "WHERE ID = '".$user_ID."' ";

     $approve_requestSQL_Query = mysqli_query($conn,$approve_requestSQL );
     while($row = mysqli_fetch_array($approve_requestSQL_Query, MYSQLI_ASSOC)){
        $ID = $row['ID'];
        $email = $row['email'];
        $pass=$row['password'];
        $accesslevel=$row['accessLevel'];
        //$registerAS=$row[''];
        
        //echo $ID;

    }

}
    if($register=="doctor"){
        //echo "HIIIIIIIII";
        $approve_requestSQL = "SELECT * ";
     $approve_requestSQL  .= "FROM ";
     $approve_requestSQL  .= "doctor ";
     $approve_requestSQL  .= "WHERE ID = '".$user_ID."' ";

     $approve_requestSQL_Query = mysqli_query($conn,$approve_requestSQL );
     while($row = mysqli_fetch_array($approve_requestSQL_Query, MYSQLI_ASSOC)){
        $ID = $row['id'];
        $email = $row['email'];
        $pass=$row['pswd'];
        $accesslevel=$row['accessLavel'];

        //echo $ID;
        


    }

   


 }

 //echo $ID;
 



$insertLoginUser_SQL='Insert into h_user (email, password,accessLevel,u_ID,register)
values ( "'.$email.'", "'.$pass.'","'.$accesslevel.'","'.$ID.'","'.$register.'")';

if (mysqli_query($conn,$insertLoginUser_SQL))  {	
    echo "Successfully approve for login..";
    //header("Location: NewDay.php");     //LogIn Location
    //echo "successssssssssssssssssssssssssssssssssssssssssssssssssssss";
} else {
   echo "failed";	
}


 }
 



//close database connection
 $conn->close();

?>