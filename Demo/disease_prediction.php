<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<title>php MySQL Training</title>
<meta name="generator" content="Bluefish 2.0.0" >
<meta name="author" content="ks106" >
<meta name="date" content="2010-07-26T15:23:42+03600" >
<meta name="copyright" content="TMIT World Limited">
<meta name="keywords" content="Infinite Skills - php/MySQL Training">
<meta name="description" content="Infinite Skills - php/MySQL Training">
<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
<link rel="stylesheet" href="css/alphacrm_layout.css" type="text/css" />
<link rel="stylesheet" href="css/alphacrm_style.css" type="text/css" />


<title>Disease Prediction</title>
</head>

<style>





</style>
<body class="">
<script>
var name1 = prompt('Are you experience any of these symptoms?\n\na) Fever, Cough, Headache, Abdominal pain, \n Yellow-eye, Vomiting, Constipation,\nLoose-motion,Burning chest, Itching, Skin-Lashion\n\n b) Chest pain, Breathlesness, Palpitation,\nVirtigo, Swelling leg, Senseless, Headache, Neck-pain\n\n c) Pregnency , P/V bleeding during pregnency,\nLess fatal movement, ecxcessive whitish discharge P/V, Severe lower abdominal pain puring menestrition, Lower abdominal pain\n \nd) Fractures, Dislocation, \nJoint pain, Swelling of joint, Bone Pain\n \ne) bleeding gum, gum-swelling,\n toothache, carries teeth');
//-------------If chose single option-----------------
if(name1=='a'){
 alert('Contact with our Medicine specialist...');
 }
		else if(name1=='b'){
		 alert('Contact with our Cardilogist...');
		 }
		else if(name1=='c'){
		 alert('Contact with our Gynocologist...');
		 }
		else if(name1=='d'){
	 alert('Contact with our Orthopedic ...');
 			}
				else if(name1=='e'){
	 alert('Contact with our Dentist...');
 			}
			//-------------If chose double options-----------------
						else if(name1=='ab'){
 			var name2= prompt('Are you experience any of these symptoms?\n\na) Fever, Cough, Abdominal pain, \n Yellow-eye, Vomiting, Constipation,\nLoose-motion,Burning chest, Itching, Skin-Lashion\n\n b) Chest pain, Breathlesness, Palpitation,\nVirtigo, Swelling leg, Senseless,  Neck-pain\n\n ');
		if(name2=='a'){
 alert('Contact with our Medicine specialist...');
			}
			else if(name2=='b')
 alert('Contact with our Cardilogist...');
			
			}
				else if(name1=='ac'){
	 alert('Contact with our Medicine specialist or  Gynocologist...');
 			}
			
				else if(name1=='ad'){
	 alert('Contact with our Medicine specialist or Orthopedic ...');
 			}
			
				else if(name1=='ae'){
	 alert('Contact with our Medicine specialist or  Dentist...');
 			}
							else if(name1=='bc'){
	 alert('Contact with our Cardilogist or  Gynocologist...');
 			}
			
				else if(name1=='bd'){
	 alert('Contact with our Cardilogist or Orthopedic ...');
 			}
			
				else if(name1=='be'){
	 alert('Contact with our Cardilogist or  Dentist...');
	
 			}
	else if(name1=='cd'){
	 alert('Contact with our Gynocologist or Orthopedic specialist ...');
 			}
			
				else if(name1=='ce'){
	 alert('Contact with our Gynocologist or  Dentist...');
	 }
				else if(name1=='de'){
	 alert('Contact with our Orthopedic specialist or  Dentist...');	
	 }
///------- finish c----------------

</script>

<?php 

//$orderClause= $_GET['orderClause'];



	echo '	<table class="table table-hover table-dark">
  		<thead>
    	<tr>
      
      <th scope="col" class="text-center text-warning">Specialist Name</th>

    </tr>
  </thead>

<tr><th class="text-center"><a href="index.php?content=doctorSpecial&specialist=medicine ">Medicine</a></th></tr>
<tr><th class="text-center"><a href=index.php?content=doctorSpecial&specialist=Orthopedic>Orthopedic</a></th></tr>
<tr><th class="text-center"><a href=index.php?content=doctorSpecial&specialist=dentist>Dentist</a></th></tr>
<tr><th class="text-center"><a href=index.php?content=doctorSpecial&specialist=cardiac%>Cardiac electrophysiologist</a></th></tr>
<tr><th class="text-center"><a href=index.php?content=doctorSpecial&specialist=cardiologist>Cardiologist</a></th></tr>
<tr><th class="text-center"><a href=index.php?content=doctorSpecial&specialist=surgeon>Surgeon</a></th></tr>
<tr><th class="text-center"><a href="index.php?content=doctorSpecial&specialist=gynecologist">Gynecologist</a></th></tr>
<br><br>
<h2><div class="container ">
<ul class="pager font-weight-bold text-monospace">
  <li class="previous "><a href="index.php">Home Page</a></li>

</ul></div></h2></table>';

?>

</body>
</html>

echo '<a href="index.php?content=notification">
	<span class="mainMenuItem">Notification</span>
	</a>';