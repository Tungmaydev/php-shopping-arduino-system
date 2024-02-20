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

  <script src="library/checkout.js" type="text/javascript"></script>
 <style>
    #content_right{
           width: 85%; 
           border: solid 0px #F00; 
           margin: auto; 
           padding-left: 20px; 
           padding: 35px;

        }
        
        #head_detail{
            
            text-align: left;
        }
      
        #od_shipping{
            text-align:left;
            font-size:20px; 
            color:#009999;
           
            
        }
        #od_payment{
           text-align:left;
            font-size:12px; 
            color:#009999; 
            
            
        }
        #shipping{
            text-align:left;
            font-size:12px; 
            color:#009999; 
        }
 @media only screen and (max-width: 480px),only screen and (max-device-width: 480px) {
    #content_right{
      // float: left;
      margin: auto;
       width: 90%;      
       background-color:#FFFFFF;  
     //  margin-right: 2%;
      // margin-left: 12px;
       margin: auto; 
       padding: 30px;
                 
    }
     #od_shipping{
            text-align:left;
            font-size:12px; 
            color:#009999;
            
        }
        #od_payment{
           text-align:left;
            font-size:12px; 
            color:#009999; 
            
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
    include"library/checkout-functions.php";
    include"shopping_time.php"; //เช็คเวลา 30 นาที ต่อหน้า

      if(isset($_SESSION['cart_id'])== FALSE){ //เช็กค่า  cart_id จาก session 
           header('Location:index.php');
           }
            else {
                $sid = $_SESSION['cart_id'];
            ?>
            <br/>
            <div id="head" style="font-size:26px; text-align: center;"> 
                    <span id="cart" style="color:#3333cc">ตะกร้าสินค้า</span>&nbsp;
                    <span class="raquo" style="color:#3333cc" >&raquo;&nbsp;</span>
                    <span id="cust" style="color:#3333cc">ที่อยู่ในการจัดส่ง</span>&nbsp;
                    <span class="raquo" style="color:#000" >&raquo;&nbsp;</span>
                    <span id="done"style="color:#9A9A9A">ตรวจสอบรายการสั่งซื้อ</span>
                    <span class="raquo" style="color:#000" >&raquo;&nbsp;</span>
                    <span id="done"style="color:#9A9A9A">สั่งซื้อเรียบร้อย</span>
            </div><br/>
      
            <div id="content_right">
               <div id="head_detail">
                     <span style="font-size:33px; font-weight: bold;"> ที่อยู่ในการจัดส่ง</span><br>
                      <span style="font-size:20px">
                          กรุณากรอกรายละเอียดและที่อยู่ในการจัดส่งสินค้าให้ครบถ้วน เพิ่มความมั่นใจในการส่งสินค้าถึงปลายทาง จากนั้นคลิกปุ่ม<span style="font-weight: bold;"> “ดำเนินการต่อ”</span>
                     </span>
                </div><br/>     

                    <form  action="confirm_order.php" method="post" name="frmCheckout" id="frmCheckout" >
                        <div id="od_shipping">
                            <span style="font-size: 22px; color:#009999; text-align:left;">ข้อมูลผู้รับสินค้า (สำหรับลงที่อยู่พัสดุ)</span><i style="color:#F00; font-size: 18px;">*</i>:<br>
                            <hr color="#004d4d"><br>
                            <table style="width:80%; text-align: center; margin-left: 50px; " cellspacing="1">
                                <tr>
                                    <td style="width:15%; text-align:left; font-size: 20px;">ชื่อ</td>
                                    <td style="width:70%; text-align:left; color:#999; ">
                                        <input style="font-size:18px; color: #595959; height: 20px;"  name="txtShippingFirstName" type="text"  id="txtShippingFirstName" size="30" maxlength="50" required="required" value="ปาริชาต">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 20px;text-align:left;">นามสกุล</td>
                                    <td style="color:#999;text-align:left; ">
                                        <input style="font-size:18px; color: #595959; height: 20px;"  name="txtShippingLastName" type="text"  id="txtShippingLastName" size="30" maxlength="50" required="required" value="ซื่อธานุวงค์">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 20px;text-align:left;">เบอร์โทรศัพท์</td>
                                    <td style="color:#999;text-align:left; ">
                                        <input  style="font-size:18px; color: #595959;height: 20px;"  name="txtShippingPhone" type="text"  id="txtShippingPhone" size="30" maxlength="50" required="required"
                                        value="086474272">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 20px;text-align:left;">ที่อยู่ผู้รับ</td>
                                    <td style="color:#999;text-align:left;">
                                        <input  style="font-size:18px; color: #595959;height: 20px;" name="txtShippingAddress1" type="text"  id="txtShippingAddress1" size="30" maxlength="50" required="required"
                                        value="610 ม.10">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 20px;text-align:left;">ตำบล / แขวง</td>
                                    <td style="color:#999;text-align:left;">
                                        <input  style="font-size:18px; color: #595959;height: 20px;"  name="txtShippingAddress2" type="text"  id="txtShippingAddress2" size="30" maxlength="50" required="required"
                                         value="บ้านส้อง">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 20px;text-align:left;" >อำเภอ / เขต</td>
                                    <td style="color:#999;text-align:left; ">
                                        <input  style="font-size:18px; color: #595959;height: 20px;" name="txtShippingState" type="text"  id="txtShippingState" size="30" maxlength="50" required="required"
                                       value="เวียงสระ">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 20px;text-align:left;">จังหวัด</td>
                                    <td style="color:#999;text-align:left; ">
                                        <input  style="font-size:18px; color: #595959;height: 20px;" name="txtShippingCity" type="text"  id="txtShippingCity" size="30" maxlength="50" required="required"
                                    value="สุราษฎร์ธานี">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 20px;text-align:left;">รหัสไปรษณีย์</td>
                                    <td style="color:#999;text-align:left; ">
                                        <input  style="font-size:18px; color: #595959;height: 20px;" name="txtShippingPostalCode" type="text"  id="txtShippingPostalCode" size="30" maxlength="50"required="required" value="84190">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 20px;text-align:left;">E-mail</td>
                                    <td style="color:#999;text-align:left; ">
                                        <input  style="font-size:18px; color: #595959;height: 20px;" name="txtShippingEmail" type="email" class="box" id="txtShippingEmail" size="30" maxlength="50" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="xxxxxxxxxx@gmail.com">
                                    </td>
                                </tr>
                            </table>
                        </div><br><br/>

                        <div id="od_payment">
                            <span style="font-size: 22px; color:#009999; text-align:left;">ข้อมูลผู้ซื้อสินค้า (สำหรับติดต่อ/แจ้งเตือน)</span><i style="color:#F00; font-size: 18px;">*</i>:
                            <input type="checkbox" name="chkSame" id="chkSame" value="checkbox" onClick="setPaymentInfo(this.checked);"> 
                               <label  for="chkSame" style="cursor:pointer; font-size: 22px; color: #212121;">ใช้ข้อมูลเดียวกับข้อมูลผู้รับสินค้า</label><br>
                                <hr color="#004d4d"><br>

                            <table style="width:80%; text-align: center; margin-left: 50px;" cellspacing="1">
                                <tr>
                                    <td style="width:15%; text-align:left; font-size: 20px;">ชื่อ</td>
                                    <td style="width:70%; text-align:left; color:#999">
                                        <input  style="font-size:18px; color: #595959; height: 20px;" name="txtPaymentFirstName" type="text"  id="txtPaymentFirstName" size="30" maxlength="50" required="required">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 20px;text-align:left;" >นามสกุล</td>
                                    <td style="color:#999;text-align:left; ">
                                       <input  style="font-size:18px; color: #595959; height: 20px;" name="txtPaymentLastName" type="text"  id="txtPaymentLastName" size="30" maxlength="50" required="required">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 20px;text-align:left;" >เบอร์โทรศัพท์</td>
                                    <td style="color:#999;text-align:left; ">
                                        <input  style="font-size:18px; color: #595959; height: 20px;"  name="txtPaymentPhone" type="text"  id="txtPaymentPhone" size="30" maxlength="50" required="required">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 20px;text-align:left;">ที่อยู่ผู้รับ</td>
                                    <td style="color:#999;text-align:left; ">
                                       <input   style="font-size:18px; color: #595959; height: 20px;"  name="txtPaymentAddress1" type="text"  id="txtPaymentAddress1" size="30" maxlength="50" required="required">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 20px;text-align:left;" >ตำบล / แขวง</td>
                                    <td style="color:#999;text-align:left; ">
                                       <input  style="font-size:18px; color: #595959; height: 20px;" name="txtPaymentAddress2" type="text"  id="txtPaymentAddress2"size="30" maxlength="50"  required="required">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 20px;text-align:left;">อำเภอ / เขต</td>
                                    <td style="color:#999;text-align:left; ">
                                       <input   style="font-size:18px; color: #595959;height: 20px;"  name="txtPaymentState" type="text"  id="txtPaymentState" size="30" maxlength="50"required="required">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 20px;text-align:left;" >จังหวัด</td>
                                    <td style="color:#999;text-align:left; ">
                                        <input  style="font-size:18px; color: #595959;height: 20px;"  name="txtPaymentCity" type="text"  id="txtPaymentCity" size="30" maxlength="50" required="required">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 20px;text-align:left;" >รหัสไปรษณีย์</td>
                                    <td style="color:#999;text-align:left; ">
                                       <input  style="font-size:18px; color: #595959;height: 20px;"   name="txtPaymentPostalCode" type="text"  id="txtPaymentPostalCode"  size="30" maxlength="50" required="required">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 20px;text-align:left;" >E-mail</td>
                                    <td style="color:#999;text-align:left; ">
                                        <input  style="font-size:18px; color: #595959;height: 20px;" name="txtPaymentEmail" type="email"  id="txtPaymentEmail" size="30" maxlength="50" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  >
                                    </td>
                                </tr>
                            </table>
                            </div><br><br/>


                            <div id="shipping">
                                <!-- วิธีการขนส่งสินค้า ถ้าซื้อ < 1000 มีให้เลือก 2 แบบ คน ลทบ กับ ems  ถ้าซื้อ  1000 ขึ้นไป  ส่งฟรี ems-->
                                <span style="font-size: 22px; color:#009999; text-align:left;">เลือกวิธีการจัดส่งสินค้า</span><i style="color:#F00; font-size: 18px;">*</i>:
                                <hr color="#004d4d">
                                    <table style="width:80%; text-align:left;" cellspacing="1">
                                          <?php
                                            $sql_subTotal   = "SELECT * FROM cart WHERE ct_id = '$sid'";
                                            $result_subTotal = mysqli_query($link, $sql_subTotal )or die(mysqli_error()); 
                                            $row = mysqli_fetch_assoc($result_subTotal);

                                            //จำนวนราคาสินค้าของ  $sid       
                                              $subTotal = $row['subTotal'];  
                                          
                                             if  ($subTotal < 1000){
                                          ?>  
                                                        <!--   แบบที่ 1 ส่งแบบ ems-->
                                                        <tr style="height:50px; font-size:17px;"> 
                                                            <td >
                                                               <input  style="font-size:18px; color: #595959;" name="optShip" type="radio" id="ship_EMS" value="EMS"  checked="checked" />
                                                               <label for="ship_EMS" style="cursor:pointer"> พัสดุ EMS (แนะนำ) : ภาคกลางใช้เวลาส่ง 1 วันต่างภาค 2-3 วัน </label>
                                                            </td>
                                                        </tr>
                                                        <!--   แบบที่ 2  ส่งแบบ ลทบ-->
                                                        <tr style="height:50px; font-size:17px;"> 
                                                            <td >
                                                               <input  style="font-size:18px; color: #595959;" name="optShip" type="radio" id="ship_Re" value="Re"  />
                                                               <label for="ship_Re" style="cursor:pointer"> พัสดุลงทะเบียน : ใช้เวลาส่ง 3-7 วัน </label>
                                                            </td>
                                                        </tr>
                                          <?php 
                                             }  
                                              else{
                                           ?>
                                                         <!-- ซื้อมากกว่า 1000 ส่งฟรี ems-->
                                                        <tr style="font-size:17px;">
                                                            <td>
                                                                <span style="font-size: 17px; color:#737373; text-align:left;">ราคาสินค้าทั้งหมด <b ><?php echo $subTotal ?></b> บาท</span>
                                                            </td>
                                                         </tr>
                                                        <tr style="font-size:17px;"> 
                                                            <td>
                                                              <i style="color:#F00">*</i>
                                                                ยอดสั่งซื้อของคุณมากกว่า 1,000 บาท  คุณได้สิทธิ์พิเศษ <span style="color:#F00">จัดส่งฟรี พัสดุ EMS</span><br>
                                                                <input  style="font-size:18px; color: #595959;" name="optShip" type="radio" id="ship_Free" value="Free"  checked="checked"/>
                                                                <label for="ship_Free" style="cursor:pointer">   ฟรี ! พัสดุ EMS : ภาคกลางใช้เวลาส่ง 1 วันต่างภาค 2-3 วัน </label>
                                                            </td>
                                                        </tr>
                                            <?php
                                              }
                                            ?>
                                    </table>  
                            </div><br/><br/><br/>

                            <hr color="#004d4d">
                            
                                 <table style="width:100%; text-align: center;" cellspacing="1" >
                                    <tr style="height:50px; font-size:17px;"> 
                                       <td style="text-align: left">
                                           <input style="border-radius:8px; padding: 9px 12px; background-color:#CCCCCC;  font-size: 15px;"   height="50px;"  name="btnStep0" type="button"  value="<< ดูตะกร้าสินค้า" onclick="window.location.href = 'cart.php';">
                                        </td>
                                        <td style="text-align: right">
                                           <input style="border-radius:8px; padding: 9px 12px; background-color:#CCCCCC;  font-size: 15px;"   height="50px;" name="btnStep1" type="submit"  value="ดำเนินการต่อ >>">
                                        </td>
                                    </tr>
                                  </table><br/><br/><br/><br/>
                            
                              <div style="background-color:#CCC;">&nbsp;&nbsp;&nbsp;</div>
                              <hr color="#004d4d">
                              <br/><br/><br/>
                    </form>
            </div>  
     <?php } ?>
    
    <?php include("include/footer.php"); ?>     
    </div>
 </body>
        
 
