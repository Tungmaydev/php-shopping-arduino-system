<?php
function check_login($user_name,$dest){
	if(!isset($_SESSION[$user_name])){
		  header("location:$dest");
		    return;
		
	}
	
}
	

?>