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
        height: 350px;
        margin: auto;
     
    }
    
  </style>
</head>
<body>
<div id="wrapper">
    <?php 
     include("include/branner.php");
     include("include/menu.php"); 
    ?>
    <div id="content_right" ><br><br><br><br><br>

        <div id="member">
            <form>
          <span style=" font-size:35px; ">สมัครสมาชิกใหม่</span> <br><hr color="#f2f2f2"><br>
              <table style="width: 80%; padding-left: 25px; font-size: 20px; border:1px;">
                  <tr>
                        <td style="color:#666; width: 35%;">ชื่อล็อกอิน :</td>
                        <td> <input style="border-radius: 4px; height: 25px; width:80%;" name="member_name" type="text" id="name" placeholder="ชื่อที่ต้องการใช้ล็อกอิน" size="25" required /></td>
                  </tr>
                  <tr>
                        <td style="color:#666; width: 35%;">E-mail:</td>
                        <td>
                            <input style="border-radius: 4px; height:25px; width: 80%; " name="email_login" type="email" id="login" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  size="25"  placeholder="E-mail" >
                        </td>
                  </tr>
                  <tr>
                        <td style="color:#666; width: 35%;">รหัสผ่าน :</td>
                        <td>
                            <input style="border-radius: 4px; height:25px; width: 50%; " name="password" type="password" id="password" required size="25"  placeholder="รหัสผ่าน" >
                        </td>
                  </tr>
                  <tr>
                        <td style="color:#666; width: 35%;">ใส่รหัสผ่านซ้ำ:</td>
                        <td>
                            <input style="border-radius: 4px; height:25px; width: 50%; "  name="confirm" type="password" id="confirm"  required size="25"  placeholder="ยืนยันรหัสผ่านอีกครั้ง" >
                        </td>
                  </tr>
                  <tr>
                        <td style="color:#666; width: 35%;">อักขระในภาพ:</td>
                        <td style="width:50%;">
                            <input style="border-radius: 4px; height:25px; width: 50%; "  name="captcha" type="text" id="captcha"   required size="25"  placeholder="อักขระในภาพ" >
                        </td>
                        <td style="text-align: left;"><img src="captcha.php" ></td>
                  </tr>
                  <tr>
                        
                      <td></td>
                        <td style="text-align: center; ">
                            <button style="border-radius:8px; padding: 9px 11px;   background-color:#ff9900;  color: white; font-size: 15px;"  height="50px;" type="submit" name="submit" formaction="checkout_register.php" formmethod="post"/>เข้าสู่ระบบ</button>
                        </td>
                  </tr>
            </table>
        <input style="border-radius:8px; padding: 9px 11px; background-color:#CCC;   font-size: 13px;"   height="40px;"  type="button"  value="<< ดูตะกร้าสินค้า" onclick="window.location.href = 'cart.php';">
                     
        </form>
        </div><br><br><br>
        <?php include("include/footer.php"); ?>   
    </div>
</body>
</html>
