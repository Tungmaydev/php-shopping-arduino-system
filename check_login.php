<?php
function check_login($member_name,$dest){
	if(!isset($_SESSION[$member_name])){
		  //header("location:$dest");
            header("location:info.php");
		    return;
		
	}
	header("location:info.php");
}
       

?>
