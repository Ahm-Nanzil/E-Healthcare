<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>
<style>
	.dropdown-contento{
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  width: 100%;
  left: 0;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
<body>
<script>
//var name1 = prompt('Are you experience any of these symptoms?\n\na) Fever, Cough, Headache, Abdominal pain, \n Yellow-eye, Vomiting, Constipation,\nLoose-motion,Burning chest, Itching, Skin-Lashion\n\n b) Chest pain, Breathlesness, Palpitation,\nVirtigo, Swelling leg, Senseless, Headache, Neck-pain\n\n 
// c) Pregnency , P/V bleeding during pregnency,\nLess fatal movement, ecxcessive whitish discharge P/V, Severe lower abdominal pain puring menestrition, Lower abdominal pain\n \n
// d) Fractures, Dislocation, \nJoint pain, Swelling of joint, Bone Pain\n \ne) bleeding gum, gum-swelling,\n toothache, carries teeth');
// //-------------If chose single option-----------------
// if(name1=='a'){
//  alert('Contact with our Medicine specialist...');
//  }
// 		else if(name1=='b'){
// 		 alert('Contact with our Cardilogist...');
// 		 }
// 		else if(name1=='c'){
// 		 alert('Contact with our Gynocologist...');
// 		 }
// 		else if(name1=='d'){
// 	 alert('Contact with our Orthopedic ...');
//  			}
// 				else if(name1=='e'){
// 	 alert('Contact with our Dentist...');
//  			}
// 			//-------------If chose double options-----------------
// 						else if(name1=='ab'){
//  			var name2= prompt('Are you experience any of these symptoms?\n\na) Fever, Cough, Abdominal pain, \n Yellow-eye, Vomiting, Constipation,\nLoose-motion,Burning chest, Itching, Skin-Lashion\n\n b) Chest pain, Breathlesness, Palpitation,\nVirtigo, Swelling leg, Senseless,  Neck-pain\n\n ');
// 		if(name2=='a'){
//  alert('Contact with our Medicine specialist...');
// 			}
// 			else if(name2=='b')
//  alert('Contact with our Cardilogist...');
			
// 			}
// 				else if(name1=='ac'){
// 	 alert('Contact with our Medicine specialist or  Gynocologist...');
//  			}
			
// 				else if(name1=='ad'){
// 	 alert('Contact with our Medicine specialist or Orthopedic ...');
//  			}
			
// 				else if(name1=='ae'){
// 	 alert('Contact with our Medicine specialist or  Dentist...');
//  			}
// 							else if(name1=='bc'){
// 	 alert('Contact with our Cardilogist or  Gynocologist...');
//  			}
			
// 				else if(name1=='bd'){
// 	 alert('Contact with our Cardilogist or Orthopedic ...');
//  			}
			
// 				else if(name1=='be'){
// 	 alert('Contact with our Cardilogist or  Dentist...');
	
//  			}
// 	else if(name1=='cd'){
// 	 alert('Contact with our Gynocologist or Orthopedic specialist ...');
//  			}
			
// 				else if(name1=='ce'){
// 	 alert('Contact with our Gynocologist or  Dentist...');
// 	 }
// 				else if(name1=='de'){
// 	 alert('Contact with our Orthopedic specialist or  Dentist...');	
// 	 }
// ///------- finish Promp SEction----------------
// </script>
<?php 

echo 	'<div class="dropdown">
	<button class="dropbtn"> Fever, Cough, Headache, Abdominal pain, <br /> Yellow-eye, Vomiting, Constipation,<br /> Loose-motion,Burning chest, Itching, Skin-Lashion</button>
	<div class="dropdown-content">
	<a href="index.php?content=doctorSpecial&specialist=medicine">Contact with our Medicine specialist...</a>

 </div>
  </div>	<br /><br />';
  echo 	'<div class="dropdown">
	<button class="dropbtn">Chest pain, Breathlesness, Palpitation,<br /> Virtigo, Swelling leg, Senseless, Headache, Neck-pain</button>
	<div class="dropdown-content">
  <a href="index.php?content=doctorSpecial&specialist=cardiologist">Contact with our Cardilogist...</a>
  
	</div>
  </div>	<br /><br />';
  echo 	'<div class="dropdown">
	<button class="dropbtn"> Pregnency , P/V bleeding during pregnency,<br />Less fatal movement, ecxcessive whitish discharge P/V,<br /> Severe lower abdominal pain puring menestrition, Lower abdominal pain</button>
	<div class="dropdown-content">
  <a href="index.php?content=doctorSpecial&specialist=gynecologist">Contact with our Gynocologist...</a>
  
	</div>
  </div>	<br /><br />';

   echo	'<div class="dropdown">
   <button class="dropbtn">Fractures, Dislocation, <br />Joint pain, Swelling of joint, Bone Pain</a>
   </button>
   <div class="dropdown-content">
 <a href="index.php?content=doctorSpecial&specialist=Orthopedic">Contact with our Orthopedic ...</a>
 
   </div>
 </div>	<br /><br />';

 echo 	'<div class="dropdown">
 <button class="dropbtn"> bleeding gum, gum-swelling,<br />toothache, carries teeth</button>
 <div class="dropdown-content">
<a href="index.php?content=doctorSpecial&specialist=dentist">Contact with our Dentist...</a>

 </div>
</div>';

echo'<br /><br /><br /><br /><br /><br /><a href="index.php">Home Page</a>';

//$orderClause= $_GET['orderClause'];



// 	echo '	<table class="table table-hover table-dark">
//   		<thead>
//     	<tr>
      
//       <th scope="col" class="text-center text-warning">Specialist Name</th>

//     </tr>
//   </thead>

// <tr><th class="text-center"><a href="index.php?content=doctorSpecial&specialist=medicine ">Medicine</a></th></tr>
// <tr><th class="text-center"><a href=index.php?content=doctorSpecial&specialist=Orthopedic>Orthopedic</a></th></tr>
// <tr><th class="text-center"><a href=index.php?content=doctorSpecial&specialist=dentist>Dentist</a></th></tr>
// <tr><th class="text-center"><a href=index.php?content=doctorSpecial&specialist=cardiac%>Cardiac electrophysiologist</a></th></tr>
// <tr><th class="text-center"><a href=index.php?content=doctorSpecial&specialist=cardiologist>Cardiologist</a></th></tr>
// <tr><th class="text-center"><a href=index.php?content=doctorSpecial&specialist=surgeon>Surgeon</a></th></tr>
// <tr><th class="text-center"><a href="index.php?content=doctorSpecial&specialist=gynecologist">Gynecologist</a></th></tr>
// <br><br>
// <h2><div class="container ">
// <ul class="pager font-weight-bold text-monospace">
//   <li class="previous "><a href="index.php">Home Page</a></li>

// </ul></div></h2></table>';

?>
</body>
</html>