<?php
 //session_start();
 header('Content-Type: text/html; charset=utf-8'); 
    require_once 'library/config.php';
  
       unset($_SESSION['member_name']);
                header("Refresh: 1; url=index.php");
                echo "<h2>คุณได้ออกจากระบบ ...</h2>";
        exit;
	   
		
?>