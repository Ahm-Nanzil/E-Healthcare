<body class="container-fluid">
<h1 class="text-monocase text-capitalize text-center text-light">All The Doctor's Profile&Schedule List</h1>
    
<ul class="text-center font-weight-bold text-monospace text-dark">  
<table border="1" 
class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col" >Name</th>
      <th scope="col" >Specialist</th>
      
      <th scope="col">Qualification</th>

    </tr>
  </thead>
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
?><br/>
<?php
        $docID=$_GET['s_id'];
        
        $specialist=$_GET['specialist'];
        
        
        
       $query ="SELECT * 
                     FROM hospital_doctor inner join hospital_doctor_schedule on hospital_doctor_schedule.d_id=hospital_doctor.id   where specialist like'".$specialist."' ";
				   $run = mysqli_query($conn, $query);
				   while($row = mysqli_fetch_array($run, MYSQLI_ASSOC))
				   {
            
				         
                         $fullCoyName = trim($row['f_name']." ".$row['l_name']."");
					  //echo  "<h3><tr><th><a href='Demo/detail.php?s_id={$row['s_id']}'>{$row['f_name']}{$row['l_name']}</a></h3>";
                      echo  "<h3><tr><th><a href='?content=info&d_id={$row['id']}&s_id={$row['ID']}'>$fullCoyName</a></h3>";

						 echo "<h3><th>". $row['specialist'] ." </h3>" ;
						   echo "<h3><th>". $row['qualification'] ." </th></tr></h3>";
				   }
           echo $docID;
				    
			   ?></table></ul>
<?php 



?>