<?php
header('Content-Type: text/html; charset=utf-8');
  require_once 'library/config.php';
	
	$member_name = $_REQUEST["member_name"];
        $code        = $_REQUEST["code"];
	
	  $sql    = "SELECT * FROM member_customers WHERE member_name='$member_name' AND code = '$code'";
          $result = mysqli_query($link, $sql)or die(mysqli_error());
          $row    = mysqli_fetch_array($result);
	  
	  if(!$row){
		echo "การยืนยันล้มเหล้ว";
	  }
	  else
	  {	
		$sql      = "UPDATE member_customers SET Active='Yes' 
                             WHERE  member_name='$member_name' AND code = '$code'";
		$result   = mysqli_query($link, $sql)or die(mysqli_error());

		header("Refresh: 1; url= user_login_form.php");
                 echo "<h2>กำลังยืนยัน การเปิดบัญชีของท่าน...ทำการ Login เพื่อเข้าสู่ระบบ</h2>";
      
	  }
 

?>

