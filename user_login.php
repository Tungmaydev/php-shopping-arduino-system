<?php
header('Content-Type: text/html; charset=utf-8');
    require_once 'library/config.php';

    

if(!isset($_POST['submit'])){
     echo '------ กรุณาลงชื่อเข้าใช้งาน ------';
     header("refresh: 2; url=user_login_form.php");
}
 else{    
    
//รับค่าตัวแปร	
	$member_name  =  $_REQUEST["member_name"];
	$password     =  sha1($_REQUEST["password"]);
	
	
//ตรวจดูว่าผู้ใช้ที่เข้า login นั้น activate บัญชีทาง e-mail หรือยัง เช็ค member_name & password & activation
	$sql    = "SELECT * FROM member_customers WHERE member_name = '$member_name' ";
	$result = mysqli_query($link, $sql)or die(mysqli_error());
	$row    = mysqli_fetch_array($result);
	
	if(!$row){
		echo "<h3>ไม่พบชื่อผู้ใช้..! ลองใหม่อีกครั้งค่ะ...</h3></br>";
		header("refresh: 1; url=user_login_form.php");

	
	}else if ($row["password"] !=$password){
		echo "<h3>รหัสผ่านไม่ถูกต้อง..! ลองใหม่อีกครั้งค่ะ...</h3></br>";
		header("refresh: 1; url=user_login_form.php");
				
	}
	else if ($row["active"] != "Yes"){
	    echo "<h3>บัญชีนี้ยังไม่เปิดให้บริการ กรุณายืนยันผ่าน e-mail ของคุณ...</h3></br>";
		header("refresh: 1; url=user_login_form.php");
		
	}else if ($row){
		 echo "<h3>กำลังเข้าสู่ระบบ กรุณารอสักครู่...</h3></br>";
		 $_SESSION["member_name"]  = $member_name;
		 header("refresh: 1; url=index.php");
	}
 }	
?>

