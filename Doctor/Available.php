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


  $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
   
  $nowTime= $dt->format(' g:i a');
  $dayofWeek=$dt->format('l');
  $time = strtotime($nowTime);
 // $dayofWeek='Monday'; 
  

  echo "<br>";
   echo "<br>";
   //echo $dayofWeek='Saturday';
   echo "<br>";
    
 
    //echo "hi";
    $appoinmentQuery_SQL = "SELECT * ";
    $appoinmentQuery_SQL .= "FROM ";
    $appoinmentQuery_SQL .= "hospital_doctor_schedule ";
   //$appoinmentQuery_SQL .= "WHERE ID = 23";
    // $appoinmentQuery_SQL="SELECT * 
    // FROM schedule";

    $appoinmentQuery_SQL_Query = mysqli_query($conn,$appoinmentQuery_SQL);	
      $count=0;
      $count_Un=0;
      while ($row = mysqli_fetch_array($appoinmentQuery_SQL_Query, MYSQLI_ASSOC)){
          $saturday=$row['Saturday'];
          $sunday=$row['Sunday'];
          $monday=$row['Monday'];
          $tuesday=$row['Tuesday'];
          $wednesday=$row['Wednesday'];
          $thrusday=$row['Thrusday'];
          $friday=$row['Friday'];
        //   echo strlen($saturday);
        //   echo "       ". strlen($sunday);
        //   echo "       ". strlen($monday);
        //   echo "       ". strlen($tuesday);
        //   echo "       ". strlen($wednesday);
        //   echo "       ". strlen($thrusday);
        //   echo "       ". strlen($fridayday);
        
          // $am= substr($saturday,8,-11)."<br>";
          // echo $am;
          // $pm= substr($saturday,19)."<br>";
          // echo $pm;
          if($dayofWeek=='Saturday'){

            $start_Time = strtotime($saturday)."<br>";
            $x=$time;
             $y=$start_Time;
            
             if($x>$y){
                 $count=$count+1;
             }
             if ($x<=$y){
                 $count_Un=$count_Un+1;
             }


          }
          if($dayofWeek=='Sunday'){
           $start_Time = strtotime($sunday)."<br>";
    $x=$time;
     $y=$start_Time;
    
     if($x>$y){
         $count=$count+1;
     }
     if ($x<=$y){
         $count_Un=$count_Un+1;
     }

        //echo "naaaaaaaaaaaaaaaaana";

            //$am= substr($sunday,0,7)."<br>";
          //echo $sunday;
          //echo gettype($sunday)."<br>";
          //echo strlen($sunday)."<br>";
          //$a="9:00 AM";
          //echo gettype($a);
         // echo strlen($a)."<br>";
          //echo $a."<br>";
          //$pm= substr($sunday,18)."<br>";
          //echo $pm;
         
          //$start_Timerrr = strtotime($a)."<br>";
          //echo $start_Time;
          //echo $start_Timerrr;
          //$end_Time = strtotime($pm)."<br>";
          //$end_Time;




         

          }
          if($dayofWeek=='Monday'){
            
            $start_Time = strtotime($monday)."<br>";
            $x=$time;
             $y=$start_Time;
            
             if($x>$y){
                 $count=$count+1;
             }
             if ($x<=$y){
                 $count_Un=$count_Un+1;
             }


          }
          if($dayofWeek=='Tuesday'){

            $start_Time = strtotime($tuesday)."<br>";
    $x=$time;
     $y=$start_Time;
    
     if($x>$y){
         $count=$count+1;
     }
     if ($x<=$y){
         $count_Un=$count_Un+1;
     }

          }

          if($dayofWeek=='Wednesday'){

            $start_Time = strtotime($wednesday)."<br>";
    $x=$time;
     $y=$start_Time;
    
     if($x>$y){
         $count=$count+1;
     }
     if ($x<=$y){
         $count_Un=$count_Un+1;
     }

          }

          if($dayofWeek=='Thursday'){

            $start_Time = strtotime($thrusday)."<br>";
    $x=$time;
     $y=$start_Time;
    
     if($x>$y){
         $count=$count+1;
     }
     if ($x<=$y){
         $count_Un=$count_Un+1;
     }

          }

          if($dayofWeek=='Friday'){

            $start_Time = strtotime($friday)."<br>";
    $x=$time;
     $y=$start_Time;
    
     if($x>$y){
         $count=$count+1;
     }
     if ($x<=$y){
         $count_Un=$count_Un+1;
     }

          }
          
          
        //   echo $monday;
        //   echo $tuesday;
        //   echo $wednesday;
        //   echo $thrusday;
        //   echo $fridayday;
          
      }


      echo "Available Doctor: ".$count;
      echo "<br>Unavailable Doctor: ".$count_Un;

 }
 



//close database connection
 $conn->close();

?>