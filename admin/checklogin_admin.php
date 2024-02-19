<?php
header('Content-Type: text/html; charset=utf-8');
	require_once '../library/config.php';

//รับค่าตัวแปร	

        $user_name         =  $_REQUEST["user_name"];
//	$user_password     =  sha1($_REQUEST["user_password"]);  เข้ารหัส
        $user_password     =  $_REQUEST["user_password"];

	
	//ตรวจดูว่าผู้ใช้ที่เข้า login 
	$sql    = "SELECT * FROM tbl_user WHERE user_name = '$user_name'  ";
	$result = mysqli_query($link, $sql)or die(mysqli_error());
	$row    = mysqli_fetch_array($result);
	//echo "$user_password"."<br>";
       // echo $row['user_password'];
        
	if(!$row){
		echo "<h3>ไม่พบชื่อผู้ใช้..! ลองใหม่อีกครั้งค่ะ...</h3></br>";
		header("refresh: 2; url=checklogin_admin_form.php");
		
	
	}else if ($row["user_password"] !=$user_password){
		echo "<h3>รหัสผ่านไม่ถูกต้อง..! ลองใหม่อีกครั้งค่ะ</h3></br>";
		header("refresh: 2; url=checklogin_admin_form.php");
				
		
	}else if ($row){
		 echo "<h3>กำลังเข้าสู่ระบบ กรุณารอสักครู่...</h3>/br>";
		 $_SESSION["user_name"]  = $user_name;
	    header("Location:index_admin.php");	
		//header("refresh: 1; url=cart.php?action=view");	
		}
	

   
	
?>

