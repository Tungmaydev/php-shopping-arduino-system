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
        width: 80%; 
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
        font-size:12px; 
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
          
 if(isset($_SESSION['cart_id'])== FALSE){ //เช็กค่า  cart_id จาก session ถ้าไม่ใช่ไปหน้า index.php
   header('Location:index.php');
   }
    else {
         $sid = $_SESSION['cart_id'];    
         
         $cartContent = getCartContent();

           if(isset($_POST['optShip']) ==  FALSE){
              header('Location:info.php');
                       
           }
          
        ?>       
            <br/><br/><br/>
            <div id="head" style="font-size:26px; text-align: center;"> 
                <span id="cart" style="color:#3333cc">ตะกร้าสินค้า</span>&nbsp;
                <span class="raquo" style="color:#3333cc" >&raquo;&nbsp;</span>
                <span id="cust" style="color:#3333cc">ที่อยู่ในการจัดส่ง</span>&nbsp;
                <span class="raquo" style="color:#3333cc" >&raquo;&nbsp;</span>
                <span id="done"style="color:#3333cc">ตรวจสอบรายการสั่งซื้อ</span>
                <span class="raquo" style="color:#000" >&raquo;&nbsp;</span>
                <span id="done"style="color:#9A9A9A">สั่งซื้อเรียบร้อย</span>
            </div><br/>
            <div id="content_right">
               <div id="head_detail">
                     <span style="font-size:33px; font-weight: bold;">ตรวจสอบรายการสั่งซื้อ</span><br>
                     <span style="font-size:20px">กรุณาตรวจสอบรายการสินค้าและข้อมูลการจัดส่งว่าถูกต้องครบถ้วน จากนั้นกดปุ่ม <span style="font-weight: bold;"> “ยืนยันการสั่งซื้อ”</span>                         
                     </span>
               </div> 
               <hr color="#004d4d"><br/>

<!--                    <form action="order_success.php" method="post" name="frmCheckout" id="frmCheckout" onsubmit="javascript:return checkNull();">-->
                        <form>
                        <!--รายการสั่งสินค้า-->
                        <table style="width: 100%; text-align: center;" cellpadding="6" cellspacing="1">
                            <span style="font-size: 22px; color:#009999; text-align:left;">รายการสั่งสินค้า</span><br>
                            <tr style="height: 50px; background-color:#CCC; font-size: 22px;"> 
                                <td style="width: 55%">สินค้า</td>
                                <td style="width: 15%; text-align: right;">ราคา</td>
                                <td style="width: 15%; text-align: right;">จำนวน</td>
                                <td style="width: 15%; text-align: right;" >ราคารวม</td>
                            </tr>
                                <?php 
                                      $numItem  = count($cartContent);
                                      $subTotal = 0;
                                         for ($i = 0; $i < $numItem; $i++) {
                                               extract($cartContent[$i]);
                                                $subTotal += $pd_price * $ct_qty;

                                ?>
                                    <tr style="height: 30px;">
                                        <td style="text-align: left;"><img src="admin/images/product/<?php echo $pd_image; ?>" border="0" style="height:40px;">&nbsp;<?php echo $pd_name; ?></td>
                                        <td style="text-align: right;"><?php echo $pd_price; ?></td>
                                        <td style="text-align: right;"><?php echo $ct_qty ; ?></td>
                                        <td style="text-align: right;"><?php echo ($ct_qty * $pd_price); ?></td>
                                    </tr>
                                <?php 
                                        }
                                ?>

                                <tr style="height: 30px;">
                                    <td  style="font-size: 20px; font-weight: bold; text-align: right;"colspan="3" >รวมทั้งหมด (บาท)</td>
                                    <td style="text-align: right;" colspan="3"><?php  echo $subTotal; ?>
                                        <input name="hidsubTotal" type="hidden" id="hidsubTotal" value="<?php echo $subTotal; ?>"  />   
                                    </td>
                                </tr>

                                <?php
                                 //ราคาค่าส่ง ที่ลูกค้าเลือกส่ง 3 วิธี
                                 $shippingCost = "" ;  
                                    if  ($_POST['optShip'] ==  'EMS'){
                                          $shippingCost = 50;  
                                    }else if ($_POST['optShip'] ==  'Re'){
                                          $shippingCost = 30; 
                                    }else{
                                          $shippingCost = 0; 
                                    }
                                ?>
                                <tr style="height: 30px;">
                                    <td style="font-size: 20px;" colspan="2" align="left">
                                        <?php
                                         if  ($_POST['optShip'] ==  'EMS'){
                                                echo "พัสดุ EMS (แนะนำ) : ภาคกลางใช้เวลาส่ง 1 วันต่างภาค 2-3 วัน";  
                                         }else if ($_POST['optShip'] ==  'Re'){
                                                echo "พัสดุลงทะเบียน : ใช้เวลาส่ง 3-7 วัน";
                                         }else{
                                                echo "ฟรี! พัสดุ EMS : ภาคกลางใช้เวลาส่ง 1 วันต่างภาค 2-3 วัน";
                                         }
                                         $optShip =  $_POST['optShip'];
                                          
                                        ?>

                                    </td>
                                        <input  name="hidShip" type="hidden" id="hidShip" value="<?php echo $optShip ; ?>"  />
                                     <td  style="font-size: 20px; text-align: right; font-weight: bold;">ราคาค่าจัดส่ง (บาท)</td>
                                     <td style="font-size: 20px; text-align: right;"><?php echo $shippingCost; ?></td>
                                       <input name="hidShipCost" type="hidden" id="hidShipCost" value="<?php echo $shippingCost; ?>"  />
                                </tr>
                        </label>
                        
                        <table style="width: 100%">
                            <hr color="#d9d9d9">
                                <tr style="height: 30px;">
                                    <td  style="font-size: 22px; text-align: right; font-weight: bold;" colspan="3" >ราคาสุทธิที่ต้องชำระ (บาท)</td>
                                    <td style="text-align: right; color: #F00; font-weight: bold;" colspan="3"><?php echo ($subTotal + $shippingCost ); ?></td>
                                </tr>
                        </table><br><br>
                         <!--EDN รายการสั่งสินค้า-->
                        
                         
                        <!--ข้อมูลผู้รับสินค้า (สำหรับลงที่อยู่พัสดุ)-->
                        <div id="od_shipping">
                            <span style="font-size: 22px; color:#009999; text-align:left;">ข้อมูลผู้รับสินค้า (สำหรับลงที่อยู่พัสดุ)</span><i style="color:#F00; font-size: 18px;">*</i>:<br>
                              <hr color="#004d4d"><br>
                              <table style="width: 80%; text-align: center; margin-left: 50px;" cellspacing="1">
                                        <tr>
                                            <td style="font-size: 20px; width: 15%; text-align: left;">ชื่อ</td>
                                            <td style="color:dimgray; font-size: 19px; text-align: left; width: 70%;"><?php echo $_POST['txtShippingFirstName']; ?>
                                                 <input style="font-size:18px; color: #595959; height: 20px;" name="hidShippingFirstName" type="hidden" id="hidShippingFirstName" value="<?php echo $_POST['txtShippingFirstName']; ?>">
                                            </td>
                                        </tr>
                                       
                                        <tr>
                                            <td style="font-size: 20px; text-align: left;" >นามสกุล</td>
                                            <td style="color:dimgray; font-size: 19px; text-align: left;"><?php echo $_POST['txtShippingLastName']; ?>
                                               <input style="font-size:18px; color: #595959; height: 20px;"  name="hidShippingLastName" type="hidden" id="hidShippingLastName" value="<?php echo $_POST['txtShippingLastName']; ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td  style="font-size: 20px;text-align: left;" >เบอร์โทรศัพท์</td>
                                            <td  style="color:dimgray; font-size: 19px; text-align: left;"><?php echo $_POST['txtShippingPhone'];  ?>
                                              <input style="font-size:18px; color: #595959; height: 20px;"  name="hidShippingPhone" type="hidden" id="hidShippingPhone" value="<?php echo $_POST['txtShippingPhone']; ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 20px;text-align: left;" >ที่อยู่ผู้รับ</td>
                                            <td style="color:dimgray; font-size: 19px;text-align: left;"><?php echo $_POST['txtShippingAddress1']; ?>
                                               <input style="font-size:18px; color: #595959; height: 20px;" name="hidShippingAddress1" type="hidden" id="hidShippingAddress1" value="<?php echo $_POST['txtShippingAddress1']; ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 20px; text-align: left;" >ตำบล / แขวง</td>
                                            <td style="color:dimgray; font-size: 19px;text-align: left;"><?php echo $_POST['txtShippingAddress2']; ?>
                                              <input style="font-size:18px; color: #595959; height: 20px;" name="hidShippingAddress2" type="hidden" id="hidShippingAddress2" value="<?php echo $_POST['txtShippingAddress2']; ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 20px; text-align: left;" >อำเภอ / เขต</td>
                                            <td style="color:dimgray; font-size: 19px;text-align: left;"><?php echo $_POST['txtShippingState']; ?>
                                               <input style="font-size:18px; color: #595959; height: 20px;" name="hidShippingState" type="hidden" id="hidShippingState" value="<?php echo $_POST['txtShippingState']; ?>" >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 20px;text-align: left;" >จังหวัด</td>
                                            <td style="color:dimgray; font-size: 19px;text-align: left;"><?php echo $_POST['txtShippingCity']; ?>
                                               <input style="font-size:18px; color: #595959; height: 20px;" name="hidShippingCity" type="hidden" id="hidShippingCity" value="<?php echo $_POST['txtShippingCity']; ?>" >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td  style="font-size: 20px;text-align: left;" >รหัสไปรษณีย์</td>
                                            <td  style="color:dimgray; font-size: 19px;text-align: left;"><?php echo $_POST['txtShippingPostalCode']; ?>
                                            <input style="font-size:18px; color: #595959; height: 20px;" name="hidShippingPostalCode" type="hidden" id="hidShippingPostalCode" value="<?php echo $_POST['txtShippingPostalCode']; ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 20px;text-align: left;" >E-mail</td>
                                            <td style="color:dimgray; font-size: 19px;text-align: left;"><?php echo $_POST['txtShippingEmail']; ?>
                                               <input style="font-size:18px; color: #595959; height: 20px;" name="hidShippingEmail" type="hidden" id="hidShippingEmail" value="<?php echo $_POST['txtShippingEmail']; ?>">
                                            </td>
                                        </tr>

                                    </table>
                        </div><br><br/>
                        <!--END ข้อมูลผู้รับสินค้า (สำหรับลงที่อยู่พัสดุ)-->

                        
                        <!--ข้อมูลผู้ซื้อสินค้า (สำหรับติดต่อ/แจ้งเตือน)-->
                        <div id="od_payment">
                            <span style="font-size: 22px; color:#009999; text-align:left;">ข้อมูลผู้ซื้อสินค้า (สำหรับติดต่อ/แจ้งเตือน)</span><i style="color:#F00; font-size: 18px;">*</i>:
                                <hr color="#004d4d"><br>
                                <table style="width: 80%; text-align: center; margin-left: 50px;"  cellspacing="1" >
                                    <tr>
                                        <td style="width: 15%; text-align: left; font-size: 20px;">ชื่อ</td>
                                        <td style="color:dimgray; font-size: 19px;width: 70%;text-align: left;"><?php echo $_POST['txtPaymentFirstName']; ?>
                                          <input style="font-size:18px; color: #595959; height: 20px;" name="hidPaymentFirstName" type="hidden" id="hidPaymentFirstName" value="<?php echo $_POST['txtPaymentFirstName']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 20px; text-align: left;" >นามสกุล</td>
                                        <td style="color:dimgray; font-size: 19px;text-align: left;"><?php echo $_POST['txtPaymentLastName']; ?>
                                        <input  style="font-size:18px; color: #595959; height: 20px;" name="hidPaymentLastName" type="hidden" id="hidPaymentLastName" value="<?php echo $_POST['txtPaymentLastName']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 20px; text-align: left;" >เบอร์โทรศัพท์</td>
                                        <td style="color:dimgray; font-size: 19px;text-align: left;"><?php echo $_POST['txtPaymentPhone'];  ?> 
                                        <input style="font-size:18px; color: #595959; height: 20px;" name="hidPaymentPhone" type="hidden" id="hidPaymentPhone" value="<?php echo $_POST['txtPaymentPhone']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 20px; text-align: left;">ที่อยู่ผู้รับ</td>
                                        <td style="color:dimgray; font-size: 19px;text-align: left;"><?php echo $_POST['txtPaymentAddress1']; ?>
                                        <input style="font-size:18px; color: #595959; height: 20px;"  name="hidPaymentAddress1" type="hidden" id="hidPaymentAddress1" value="<?php echo $_POST['txtPaymentAddress1']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 20px; text-align: left;" >ตำบล / แขวง</td>
                                        <td style="color:dimgray; font-size: 19px;text-align: left;"><?php echo $_POST['txtPaymentAddress2']; ?> 
                                        <input style="font-size:18px; color: #595959; height: 20px;"  name="hidPaymentAddress2" type="hidden" id="hidPaymentAddress2" value="<?php echo $_POST['txtPaymentAddress2']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 20px; text-align: left;">อำเภอ / เขต</td>
                                        <td style="color:dimgray; font-size: 19px;text-align: left;"><?php echo $_POST['txtPaymentState']; ?>
                                        <input style="font-size:18px; color: #595959; height: 20px;" name="hidPaymentState" type="hidden" id="hidPaymentState" value="<?php echo $_POST['txtPaymentState']; ?>" ></td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 20px; text-align: left;">จังหวัด</td>
                                        <td style="color:dimgray; font-size: 19px;text-align: left;"><?php echo $_POST['txtPaymentCity']; ?>
                                        <input  style="font-size:18px; color: #595959; height: 20px;" name="hidPaymentCity" type="hidden" id="hidPaymentCity" value="<?php echo $_POST['txtPaymentCity']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 20px; text-align: left;" >รหัสไปรษณีย์</td>
                                        <td style="color:dimgray; font-size: 19px;text-align: left;"><?php echo $_POST['txtPaymentPostalCode']; ?>
                                        <input style="font-size:18px; color: #595959; height: 20px;" name="hidPaymentPostalCode" type="hidden" id="hidPaymentPostalCode" value="<?php echo $_POST['txtPaymentPostalCode']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 20px; text-align: left;" >E-mail</td>
                                        <td style="color:dimgray; font-size: 19px;text-align: left;"><?php echo $_POST['txtPaymentEmail']; ?>
                                        <input style="font-size:18px; color: #595959; height: 20px;"  name="hidPaymentEmail" type="hidden" id="hidPaymentEmail" value="<?php echo $_POST['txtPaymentEmail']; ?>">
                                        </td>
                                    </tr>
                                </table>
                            </div><br><br/>
                            <!--END ข้อมูลผู้ซื้อสินค้า (สำหรับติดต่อ/แจ้งเตือน)-->
                             
                            
                            <!--ปุ่ม ยืนยันการสั่งซื้อ -->
                                <hr color="#004d4d">
                                                               
                                <table style="width:100%; text-align: center;" cellspacing="1" >
                                    <tr style="height:50px; font-size:17px;"> 
                                       <td style="text-align: left">
                                          <input style="border-radius:8px; padding: 9px 12px; background-color:#CCCCCC;  font-size: 15px;"   height="50px;"  name="btnBack" type="button"  value="<< กลับ" onclick="window.location.href = 'info.php';">
                                       </td>
                                       <td style="text-align: right">
                                          <input style="border-radius:8px; padding: 9px 12px; background-color:#CCCCCC;  font-size: 15px;" formaction="order_success.php" formmethod="POST"  height="50px;" name="frmCheckout" id="frmCheckout" type="submit"  value="ยืนยันการสั่งซื้อ >>" onsubmit="javascript:return checkNull();">
                                       </td>
                                    </tr>
                              </table><br/><br/><br/><br/>
                            <!--END ปุ่ม ยืนยันการสั่งซื้อ -->
                            <div style="background-color:#CCC;">&nbsp;&nbsp;&nbsp;</div>
                            <hr color="#004d4d">
                            <br/><br/><br/><br/>
                    </form>
            </div>
  <?php } ?>
  <?php include("include/footer.php"); ?>     
 </div>
</body>