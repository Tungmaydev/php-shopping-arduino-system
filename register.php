<?php
require_once 'library/config.php';
header('Content-Type: text/html; charset=utf-8');

if(!isset($_POST['submit'])){
     echo '<h3> กรุณาตรวจสอบ email ของท่าน และ ลงชื่อเข้าใช้งาน...<h3>';
     header("Refresh: 2; url=register_form.php");
}
 else{
        if(isset($_POST) ==  TRUE){
           $member_name   = $_REQUEST['member_name'];
           $email_login   = $_REQUEST['email_login'];
           $password      = sha1($_POST['password']);
           $confirm       = sha1($_POST['confirm_password']);
           include("include/random_password.php");
          // $captcha       = $_POST['captcha'];
           $code          = random_password(5);

            $errmsg = "";
                //ตรวจสอบชื่อผู้ใช้
                if(empty($member_name)) {
                    $errmsg = "ท่านยังไม่ได้กำหนดชื่อ</br>";
                }
                    $sql      ="SELECT COUNT(*) FROM member_customers WHERE  member_name='$member_name'";
                    $result   = mysqli_query($link, $sql)or die(mysqli_error());
                    $row      = mysqli_fetch_array($result);
                    $num_user = $row["COUNT(*)"];

                if ($num_user !=0){
                    $errmsg = "ชื่อนี้มีผู้ใช้แล้ว</br>";
                }


                //ตรวจสอบ email
                if (!filter_var($email_login, FILTER_VALIDATE_EMAIL)) {
                         $errmsg = "email ไม่ถูกต้องตามรูปแบบ</br>";	
                }

                    $sql      = "SELECT COUNT(*) FROM member_customers WHERE email_login ='$email_login'";
                    $result   = mysqli_query($link, $sql)or die(mysqli_error());
                    $row      = mysqli_fetch_array($result);
                    $num_user = $row["COUNT(*)"];

                        if ($num_user !=0){
                             $errmsg = "email ของท่านมีผู้ใช้แล้ว</br>";
                        }

                //ตรวจ password
                if($password != $confirm) {
                    $errmsg = "ท่านใส่รหัสผ่านสองครั้งไม่ตรงกัน</br>";
                }
                //ต้องใส่ //!eregi เพราะ มีการแจ้งเตือน การเลิกใช้งานFunction eregi() is deprecated
                //else if(!eregi("[a-z0-9]{4,10}", $password)) {  
                //	$errmsg = "รหัสผ่านต้องประกอบด้วย a-z หรือ 0-9 จำนวน 4-10 ตัว";
                //}

                // ตรวจสอบ ใส่อักขระไม่ตรงกับในภาพ
//                if($_POST['captcha'] != $_SESSION['captcha']) {
//                    $errmsg = "ท่านใส่อักขระไม่ตรงกับในภาพ";
//                }

                //ลงฐานข้อมูล
                    if($errmsg == "") {

                        $sql = "INSERT INTO member_customers 
                                 VALUES (0, '$member_name', '$email_login', '$password','$code',CURDATE(),'No');";
                        //@mysql_query($sql) or die(mysql_error());
                        $result   = mysqli_query($link, $sql)or die(mysqli_error());


                 //2.3.3 ลบบัญชีผู้ใช้
                        $sql = "DELETE  FROM member_customers WHERE code<>''
                                AND DATEDIFF(CURDATE(),`create`)>3";
                       // @mysql_query($sql) or die(mysql_error());
                        $result   = mysqli_query($link, $sql)or die(mysqli_error());
                    }


                    if($errmsg != "") {
                          echo "<font size=5 color=red> $errmsg <p />
                                <a href=\"javascript: history.back()\">ย้อนกลับไปแก้ไข</a></font>";
                    }else{
?>	   
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <meta name="keywords" content="ขาย จำหน่ายอุปกรณ์ MikroTik ,อุปกรณ์ MikroTik , ขาย MikroTik, ติดตั้ง MikroTik," />
            <meta name="description" content="จำหน่ายอุปกรณ์ MIkroTik สื่อความรู้ ,อุปกรณ์ MikroTik ,ติดตั้ง MikroTik " />
            <title>Arduino Bangkok</title>
            <title>ขาย จำหน่ายอุปกรณ์ MikroTik ,อุปกรณ์ MikroTik , ขาย MikroTik, ติดตั้ง MikroTik, โดยArduino Bangkok </title>
            <link rel="stylesheet" type="text/css" href="css/main.css">
         <!--        <link href="New_Img/favicon.ico" rel="shortcut icon" type="image/x-icon" /> รูปที่  URL -->
         <style>
             #content_right{
                width: 90%;
                height: auto;
                margin: auto;
            }
             #status{ 
                width: 95%; 
                margin: auto; 
                padding-left: 10px; 
                background-color: #f2f2f2;
                padding: 25px;
            }
        </style>    
        </head>
         <body>
         <div id="wrapper">       
        <?php 
            include"include/branner.php";
            include"include/menu.php";  
        ?>
            <div id="content_right">
               <br><br><br><br>
                    <div style="background-color:#CCC;">&nbsp;&nbsp;&nbsp;</div>
                        <div id="status">
                            <div style="margin: auto;"><img src="images/check.png" width="40" height="40"></div>
                                <span style="font-size: 36px; text-align: center; color: #333333;"><b>ข้อมูลถูกจัดเก็บเรียบร้อยแล้ว</b></span><br>
                                <br><br>
                                <span style="font-size: 25px; text-align:left; ">  ระบบจะส่งอีเมลอัตโนมัติไปยัง e-mail ของท่าน  เพื่อ Activate บัญชี<br>
                                 <i style="color:#F00; font-size: 16px;">*</i>&nbsp;<i>หากท่านไม่ทำการยืนยันการลงทะเบียน &nbsp; ท่านจะไม่สามารถเข้าสุ่ระบบได้</i> 
                                </span><br /><br /><br /><br /><br />

                            <?php
                //ถ้าต้องการรัน mail กับ 000host	
                                 $To        =  $email_login;
                                 $Subject  =  "การยืนยันการลงทะเบียน";
                                 include './mail_register.php';
                                 include ("send_mail.php");
                                $strTo = $To;
                                $strHeader = "MIME-Version: 1.0" . "\r\n";
                                $strHeader .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                                $strHeader .= "From: xxxxxxxxx@gmail.com" . "\r\n";
                                $strSubject = $Subject;  
                                $strMessage = $Message;
                                $flgSend = @mail($strHeader,$strTo,$strSubject,$strMessage);  
                                        if($flgSend){
                                            echo "Email Sending.";
                                        }
                                         else{
                                            echo "Email Can Not Send.";
                                        }
                            
                            ?>
                                
                       </div>
                        <h3 style="text-align: center; color:#00b3b3; font-size: 20px;"><a href="index.php">กลับสู่หน้าร้านค้า </a></h3><br />
                </div>
                <?php include("include/footer.php"); ?>  
        </div>
        </body>
        </html>
   <?php	
}
	exit;
}
 }

?>