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
        width: 95%; 
        border: solid 0px #F00; 
        margin: auto; 
       // padding-left: 15px; 
        overflow-y: hidden;
       
    } 
    
    #member{
        width: 45%;
        border: solid  1px #CCCCCC;
        border-radius:8px;
        padding:20px;
        margin: 0px;
        color: #40454b;
        text-align: left;
        font-weight: bold;
        float: left;
        height: 276px;   
        
        
    }
    #register{
        width:45%;
        height: 276px; 
        border: solid  1px #CCCCCC;
        border-radius:8px;
        padding:20px;
        margin: 0px;
        color: #40454b;
        text-align: left;
        font-weight: bold;
        float: right;
        margin-bottom: 60px;
      
    } 
    #no_sid{
       border-radius: 20px;
       border: solid  1px #CCCCCC;
       width: 80%;
       margin: auto;
    }
@media only screen and (max-width: 480px),only screen and (max-device-width: 480px) {
    #content_right{
       float: left;
       width: 98%;      
       background-color:#FFFFFF; 
       border: solid 0px #F00;
       margin-right: 20px;
       margin-left: 12px;
       overflow-y: hidden;
        
    }
     #member{
        width: 45%;
        border: solid  1px #CCCCCC;
        border-radius:8px;
        padding:20px;
        margin: 0px;
        color: #40454b;
        text-align: left;
        font-weight: bold;
        float: left;
        height: 300px;   
        
    }
     #register{
        width:45%;
        height: 300px; 
        border: solid  1px #CCCCCC;
        border-radius:8px;
        padding:20px;
        margin: 0px;
        color: #40454b;
        text-align: left;
        font-weight: bold;
        float: right;
        margin-bottom: 60px;
        font-size: 18px;
       
    } 
}
        
</style>
</head>
<body>
<div id="wrapper">
    <?php 
        include"library/config.php";
        include"include/branner.php";
        include"library/cart-functions.php";
    ?>
    <div id="content_right"><br>
           <hr color="#f2f2f2"><br><br> 
            <?php
            include("shopping_time.php"); //เช็คเวลา 30 นาที ต่อหน้า
              if(isset($_SESSION['cart_id'])){ //เช็กค่า  cart_id จาก session 
                   
            ?>           
                <!--สมาชิก-->
                <div id="member">                    
                    <form>                        
                    <span style=" font-size:30px; ">สมาชิก</span> <br><hr color="#f2f2f2"><br>
                        <table style="width: 80%; padding-left: 25px; font-size: 20px; border:1px;">
                            <tr>
                                <td style="color:#666; width: 100%;">ชื่อล็อกอิน : 
                                    <span  style="color:#a6a6a6; font-size: 18px;">  (กรอกชื่อล็อกอินหรืออีเมล์)</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input style="border-radius: 4px; height: 22px; width:80%;" name="member_name" type="text" id="name" placeholder="ชื่อผู้ใช้" size="25" value="<?php //echo $member_name ?>" />
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
                                    <input style="border-radius: 4px; height:22px; width: 80%; " name="password" type="password" id="password"  size="25"  placeholder="รหัสผ่าน" >
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">
                                    <button  height="50px;" type="submit" name="submit" formaction="checkout_user_login.php" formmethod="post" style="border-radius:8px; padding: 9px 11px;  width: 40%; background-color:#ff9900;  color: white; font-size: 15px;">เข้าสู่ระบบ</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>

                <!--ลงทะเบียน-->
                <div id="register">
                    <form>
                        <span style=" font-size:30px;">สั่งซื้อครั้งแรก</span><br><hr color="#f2f2f2">
                        <table style="width: 80%; padding-left: 25px; font-size: 20px; border:1px;">
                            <tr>
                                <td style="text-align: center;">
                                    <button style="border-radius:8px; padding: 9px 12px; background-color:#ff9900; color: white; font-size: 15px;"  height="50px;" type="submit" formaction="checkout_register_form.php" >สมัครสมาชิกและสั่งซื้อ</button>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">
                                    <button style="border-radius:8px; padding: 9px 12px; background-color:#CCCCCC;  font-size: 15px; width: 80%"  height="50px;" type="submit"  formaction="info.php" >สั่งซื้อสินค้าโดยไม่เป็นสมาชิก</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                    <hr color="#f2f2f2">
                        <span style=" font-size:20px; color: #000080;">
                          &nbsp;&nbsp;สั่งซื้อสินค้าโดยไม่เป็นสมาชิก  คุณสามารถทำรายการสั่งซื้อของร้านค้านี้ได้โดยไม่ต้องเป็นสมาชิก
                        </span><br>
                           <li style=" font-size:18px; color: #666666;">เหมาะสำหรับการสั่งซื้อเพียงครั้งเดียว</li>
                           <li style=" font-size:18px; color: #666666;">ไม่ได้รับสิทธิ์โปรโมชั่นดีๆ จากร้านค้า</li>
                           <li style=" font-size:18px; color: #666666;">ไม่สามารถรับข้อมูลข่าวสารต่างๆ จากทางร้านได้</li>
                </div><br/><br/>

            <div style="clear: both;">
                 <button style="border-radius:8px; padding: 9px 12px; background-color:#CCCCCC;  font-size: 15px;"   height="50px;"  onclick="window.location.href = 'cart.php';"><< ดูตะกร้าสินค้า</button>
                    <br/><br/><br/><br/><br/><br/>
            </div>
     </div>   
    <?php   
   }
    else  { //ถ้าเข้ามาตรงๆ แบบไม่มีสินค้า
    ?>
        
        <div id="no_sid"> 
            <table style="width: 100%;"  border="0"  cellpadding="10" cellspacing="0">
                <tr>
                    <td><p align="center" style="color:#F00; font-size: 25px;"  >ตะกร้าสินค้าว่างเปล่า..!</p>
                </tr>
                <tr>
                    <td>                        
                         <button style="border-radius:8px; padding: 9px 12px; background-color:#CCCCCC;  font-size: 15px;"   height="50px;"   onClick="window.location.href='product_all.php';">เลือกสินค้า</button>
                    </td>
                </tr>
             </table>
        </div>
         <br/><br/><br/><br/><br/><br/><br/><br/>
         
        <?php  
        
     //  exit();
        }
        ?>       
       
           
</div>
   <?php include("include/footer.php"); ?>
</body>
</html>