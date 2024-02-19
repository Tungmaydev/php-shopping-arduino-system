
<?php
header('Content-Type: text/html; charset=utf-8');
  include("library/config.php");
  
 
     
  //รับค่าตัวแปร  
	$member_name  =  $_REQUEST["member_name"];
	$password     =  sha1($_REQUEST["password"]);
        
  //ตรวจดูว่าผู้ใช้ที่เข้า login นั้น activate บัญชีทาง e-mail แล้วหรือยัง โดยเช็คจาก member_name หรือ email_login , password , activation
	$sql    = "SELECT * FROM member_customers WHERE member_name = '$member_name' or email_login ='$member_name' ";
        $result = mysqli_query($link, $sql)or die(mysqli_error());
	$row    = mysqli_fetch_array($result);
        
         if(!$row){
             echo " <span style=font-size:28px; color:#737373;>ไม่พบชื่อผู้ใช้..! ลองใหม่อีกครั้งค่ะ</span>";
                header(" refresh: 1; url=checkout_account.php");
             
         }else if($row["password"] !=$password) {
             echo " <span style=font-size:28px; color:#737373;>รหัสผ่านไม่ถูกต้อง..! ลองใหม่อีกครั้งค่ะ</span>";
                 header(" refresh: 1; url=checkout_account.php");
    
         }else if ($row["active"] != "Yes"){
             echo " <span style=font-size:28px; color:#737373;>บัญชีนี้ยังไม่เปิดให้บริการ กรุณายืนยันผ่าน e-mail ของคุณ</span>";
		header(" refresh: 1; url=checkout_account.php");
         
         }else{
		 echo "<h3>กำลังเข้าสู่ระบบ กรุณารอสักครู่...</h3></br>";
		 $_SESSION["member_name"]  = $member_name;
		 header("refresh: 1; url=info.php");
                 
                 
	}
     
         
?>
