<?php

/*		INCLUDE FILE:   fn_strings.php
*
*		folder:			includes/
*
*		used in:       index.php
*
*		version:    	1003   date: 2010-07-01
*
*		purpose:			string functions for use in alphaCRM		
*
*		Contents:		todGreeting()
*							fullCoName($coID, $preName, $coName, $regType)
*							shortCoName($coName, $regType)
*							coAddress($A, $B, $C)
*
*	===========================================================================
*/		



	
		function todGreeting()
		{	
			$todAMPM = date("A");
			$todHour = date("H");
			if ($todAMPM == "AM") {
				$todReturn = "Good Morning";	
			} else {
				if ($todHour > 18) {
					$todReturn = "Good Evening";	
				} else {
					$todReturn = "Good Afternoon";	
				}
			}
			$todReturn = '<span class="greeting">'.$todReturn.' ';
			$todReturn .= '<span class="greetingName">'.$_COOKIE["username"].'</span></span>';
							  
			return $todReturn;
		}

		function fullCoName($coID, $preName, $coName, $regType)
		{
			if (empty($coID)) {
				$temp = "Un-Allocated";
			} else {
				$temp = trim($preName." ".$coName." ".$regType);
			}
			return $temp;
		}


		function shortCoName($coName, $regType)
		{
			$temp = trim($coName." ".$regType);
			return $temp;
		}

		function coAddress($A, $B, $C)
		{
			$temp = $A;
			if (!empty($B)) { $temp .=  ", ".$B; }
			if (!empty($C)) { $temp .=  ", ".$C; }
			return $temp;
		}




        /*  eMail Functions        vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv*/
/*							revisions 1005								 */
/*
	   function check_email($email) {  
        if( (preg_match('/(@.*@)|(\.\.)|(@\.)|(\.@)|(^\.)/', $email)) || 
            (preg_match('/^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/',$email)) ) { 
             return true;
        } else {
             return false;
        }    	
    }

    function check_email_mx($email) {  
            $host = explode('@', $email);
       
            if(checkdnsrr($host[1].'.', 'MX') ) return true;
            if(checkdnsrr($host[1].'.', 'A') ) return true;
            if(checkdnsrr($host[1].'.', 'CNAME') ) return true;
       
        return false;
    }
	*/

/*							revisions 1005								 */	
/*^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^*/


?>