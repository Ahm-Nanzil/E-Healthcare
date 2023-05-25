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
  echo $time;

  echo "<br>";
   echo "<br>";
   //echo $dayofWeek='Saturday';
   echo "<br>";
    // $x='9 pm';
    // $y='8 am';
    // if($x>$y){
    //     echo "x big";
    // }
    // if ($x<=$y){
    //     echo "y is bigger";
    // }
 
    //echo "hi";
    $appoinmentQuery_SQL = "SELECT * ";
    $appoinmentQuery_SQL .= "FROM ";
    $appoinmentQuery_SQL .= "schedule ";
   $appoinmentQuery_SQL .= "WHERE s_ID = 23";
    // $appoinmentQuery_SQL="SELECT * 
    // FROM schedule";

    $appoinmentQuery_SQL_Query = mysqli_query($conn,$appoinmentQuery_SQL);	
      
      while ($row = mysqli_fetch_array($appoinmentQuery_SQL_Query, MYSQLI_ASSOC)){
          $saturday=$row['Day_Time1'];
          $sunday=$row['Day_Time2'];
          $monday=$row['Day_Time3'];
          $tuesday=$row['Day_Time4'];
          $wednesday=$row['Day_Time5'];
          $thrusday=$row['Day_Time6'];
          $friday=$row['Day_Time7'];
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

            $am= substr($saturday,8,-11)."<br>";
          echo $am;
          $pm= substr($saturday,19)."<br>";
          echo $pm;
          $start_Time = strtotime($am);
          $end_Time = strtotime($pm);
          echo $start_Time."<br>";
          echo $end_Time;

          if($start_Time<=$nowTime AND $end_Time>=$nowTime){
            echo "hi<br>";
          }
          else{
            echo "unavailable";
          }


          }
          if($dayofWeek=='Sunday'){

        //echo "naaaaaaaaaaaaaaaaana";

            $am= substr($sunday,7,7)."<br>";
          echo $am;
          echo gettype($am)."<br>";
          echo strlen($am)."<br>";
          $a="9:00 AM";
          echo gettype($a);
          echo strlen($a)."<br>";
          echo $a."<br>";
          $pm= substr($sunday,18)."<br>";
          echo $pm;
          $start_Time = strtotime($am)."<br>";
          $start_Timerrr = strtotime($a)."<br>";
          echo $start_Time;
          echo $start_Timerrr;
          $end_Time = strtotime($pm)."<br>";
          $end_Time;




          if($start_Time<=$nowTime AND $end_Time>=$nowTime){
            echo "hi<br>";
          }
          else{
            echo "unavailable";
          }


          }
          if($dayofWeek=='Monday'){

            $am= substr($monday,7,-11)."<br>";
          echo $am;
          $pm= substr($monday,18)."<br>";
          echo $pm;
          $start_Time = strtotime($am);
          $end_Time = strtotime($pm);
          if($start_Time<=$nowTime AND $end_Time>=$nowTime){
            echo "hi<br>";
          }
          else{
            echo "unavailable";
          }


          }
          if($dayofWeek=='Tuesday'){

            $am= substr($tuesday,8,-11)."<br>";
          echo $am;
          $pm= substr($tuesday,19)."<br>";
          echo $pm;
          $start_Time = strtotime($am);
          $end_Time = strtotime($pm);
          if($start_Time<=$nowTime AND $end_Time>=$nowTime){
            echo "hi<br>";
          }
          else{
            echo "unavailable";
          }


          }

          if($dayofWeek=='Wednesday'){

            $am= substr($wednesday,9,-11)."<br>";
          echo $am;
          $pm= substr($wednesday,20)."<br>";
          echo $pm;
          $start_Time = strtotime($am);
          $end_Time = strtotime($pm);
          if($start_Time<=$nowTime AND $end_Time>=$nowTime){
            echo "hi<br>";
          }
          else{
            echo "unavailable";
          }


          }

          if($dayofWeek=='Thursday'){

            $am= substr($thrusday,8,-11)."<br>";
          echo $am;
          $pm= substr($thrusday,19)."<br>";
          echo $pm;
          $start_Time = strtotime($am);
          $end_Time = strtotime($pm);
          echo $start_Time."<br>";
          echo $end_Time;
          if($start_Time<=$nowTime AND $end_Time>=$nowTime){
            echo "hi<br>";
          }
          else{
            echo "unavailable";
          }


          }

          if($dayofWeek=='Friday'){

            $am= substr($friday,7,-11)."<br>";
          echo $am;
          $pm= substr($friday,18)."<br>";
          echo $pm;
          $start_Time = strtotime($am);
          $end_Time = strtotime($pm);
          if($start_Time<=$nowTime AND $end_Time>=$nowTime){
            echo "hi<br>";
          }
          else{
            echo "unavailable";
          }


          }
          
          
        //   echo $monday;
        //   echo $tuesday;
        //   echo $wednesday;
        //   echo $thrusday;
        //   echo $fridayday;
          echo "<hr>";
      }

 }
 



//close database connection
 $conn->close();

?>