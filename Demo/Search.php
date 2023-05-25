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

      echo '<form action = "index.php?content=search" method = "POST">

<input type = "text" name="f_name" placeholder="Search By Doctor Name..." />
                  <input  type="submit"name="doc"  value="GO" />
                      

      </form>';

    //$=$_POST['f_name'];
      $docSearch=$_POST['doc'];

      if($docSearch=='GO')
			
				{ 

					$name=$_POST['f_name'];  
					 
				        $query1 = "SELECT * from doctor inner join schedule on schedule.d_id=doctor.id WHERE  (permission='approved' OR permission='Added') AND (f_name like'%$name%'  or f_name like'%$name%')";   
							  $run = mysqli_query($conn,$query1);
							
						
							  while($row=mysqli_fetch_array($run))
							   {

                             echo ' <tr><th> <h3 class="text-center font-weight-bold ">';
							       echo "<a href='?content=info&s_id={$row['s_id']}'>{$row['f_name']}{$row['l_name']}</a>            ";   
								   echo "specialist of  " ; 
                                                   echo  $row["specialist"]."</br>";
                                                   echo '</h3></th></tr>';

                                             }

    


 }

}

?>
<!--
<h2 text-align:center>Massage</h2>
<p></p>
<!--
<div class="container">
  <form action="index.php?content=select" method = "POST">

  <input type="hidden" id="content" name='content1234' >
   
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
-->