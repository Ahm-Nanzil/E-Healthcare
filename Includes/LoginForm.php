<?php

/*		INCLUDE FILE:   tp_loginForm.php
*
*		folder:			includes/
*
*		used in:        index.php
*
*		version:    	0901   date: 2010-07-01
*
*		purpose:		login FORM for teh TEMPLATE version of alpha CRM
*
*	===========================================================================
*/


		echo '<p>Login Form E-Health Care</p>';

		echo '<form name="postLoginHid" action="index.php" method="post">';	
				echo '
					<P>User name: 
					<INPUT TYPE=text NAME=email value="" SIZE=20 MAXLENGTH=40></P>
					<P>Password: 
					<INPUT TYPE=password NAME=password value="" SIZE=20 MAXLENGTH=24></P>
					
					<input type="submit"  value="Login" />
				';
		echo '</form>'; 
		echo '<a href="index.php?con=signup">
		<span class="mainMenuItem">Sign UP</span>
		</a>';
	

?>