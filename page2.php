<!DOCTYPE html>
<?php
header('P3P: CP="CAO PSA OUR"');

 session_start();
 
    session_id(); 
  echo session_id()."<br>";
 
 if (isset($_SESSION['abc'])){
	 echo $_SESSION['abc'];
 }
else{
    echo "NO1";
    
}
 
;
 
 
 ?>