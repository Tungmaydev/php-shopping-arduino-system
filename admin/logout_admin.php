<?php

  header('Content-Type: text/html; charset=utf-8'); 
  require_once '../library/config.php';
  
    unset($_SESSION['user_name']);
            header("Refresh: 2; url=index_admin.php");
            echo "<h2>คุณได้ออกจากระบบ จะกลับสู่หน้าหลักใน 3 วินาที...</h2>";
			 

 exit;
	   
		
?>