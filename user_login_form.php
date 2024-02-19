<?php
session_start();
  header('Content-Type: text/html; charset=utf-8');
      if(isset($_COOKIE["cookie_member_name"])){
          $member_name = $_COOKIE["cookie_member_name"];
	  $checked     = "checked='checked'";
      }  
      else{
	  $member_name ="";
	  $checked     ="";
      }
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
       width: 100%;
       margin: auto;
       height:auto;
    }

     #member{
        width: 60%;
        border: solid  1px #CCCCCC;
        border-radius:8px;
        padding:20px;       
        margin: 0px;
        color: #40454b;
        text-align: left;
        font-weight: bold;
        height: 300px;
        margin: auto;
        
    }
    
    </style>
</head>
    <body>
    <div id="wrapper">
        <?php include"include/branner.php"; ?> 
        <?php include"include/menu.php"; ?>
        <div id="content_right" ><br><br><br><br>
            <div id="member">
                <form>
                    <span style=" font-size:35px; ">เข้าสู่ระบบ</span> <br><hr color="#f2f2f2"><br>
                        <table style="width: 80%; padding-left: 25px; font-size: 20px; border:1px;">
                            <tr>
                                <td style="color:#666; width: 100%;">ชื่อล็อกอิน : 
                                    <span  style="color:#a6a6a6; font-size: 18px;">  (กรอกชื่อล็อกอินหรืออีเมล์)</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input style="border-radius: 4px; height: 25px; width:80%;" name="member_name" type="text" id="name" placeholder="ชื่อผู้ใช้" size="25" required />
                                </td>
                            </tr>
                            <tr>
                                <td style="color:#666">
                                    <br>
                                    รหัสผ่าน :
                                    <span  style="color:#a6a6a6; font-size: 18px;">(กรอกรหัสผ่าน)</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input style="border-radius: 4px; height:25px; width: 80%; " name="password" type="password" id="password"  size="25" required placeholder="รหัสผ่าน" >
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">
                                    <button style="border-radius:8px; padding: 9px 11px;  width: 40%; background-color:#ff9900;  color: white; font-size: 15px;"  height="50px;" type="submit" name="submit" formaction="user_login.php" formmethod="post"/>เข้าสู่ระบบ</button>
                                </td>
                            </tr>
                            
                            <tr>
                                <td style=" color:#666; text-align:right; ">
                                    <a href="forgot_password_from.php">ลืมรหัสผ่าน</a>
                                </td>   
                            </tr>
                        </table>
                        
                    </form>
                </div>
        </div> 
        <br><br>
        
      <?php include("include/footer.php"); ?>   
      </body>
</html>