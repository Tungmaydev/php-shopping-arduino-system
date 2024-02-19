<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Arduino Bangkok</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
<!--    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>-->

    <link rel="stylesheet" type="text/css" href="ajax/jquery-ui.min.css">
    <script src="ajax/jquery-2.1.1.min.js"></script>
    <script src="ajax/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
    <!--        <link href="New_Img/favicon.ico" rel="shortcut icon" type="image/x-icon" /> รูปที่  URL -->
    <script>	 
            $(function() {
               $('[name=date]').datepicker({dateFormat: 'yy/mm/dd'});

            });

    </script>

    <style>
        #content_right{
            width: 80%;
            height: auto;
            margin: auto;
            border: solid 0px #0000FF; 
            padding-top: 15px;
            margin-top: 5px;     
            background-color:#FFFFFF; 
         }
        #header_payment{
            background-color:#008080;
            padding:15px; 
            color: #ccffff;
            margin: auto;
            width: 100%;
        }

        #style_header{
            text-align:left;
            font-size:20px; 
            color:#009999;

        }
        #content1 {
           width:1000px;
           height:400px;
           margin:auto;
        }

        #content_order{
           width:800px;
           height:auto;
           margin:auto;
           padding: 20px;
           background-color:#ffe6ff;
           border:solid;

        }
        #title{
            text-align:left;  
            font-size:16px;
            color:#009999;
            }
    </style>
</head>
<body>
<div id="wrapper">
   <?php 
   include"library/config.php"; 
   include"include/branner.php";
   include"include/menu.php";
   ?>  
   <?php
//    if(!isset($_POST['submit'])){
//        header("refresh: 2; url=informpayment.php");  
//       echo '------ กรุณากรอกรหัสออเดอร์ ที่เมนู Payment  ------';
//
//    }
//    else{     
//        if ($_POST){//ถ้าใช้ POST จะไม่รู้ว่าส่งมาแบบไหนมันเลย ERROR เลยใช้ $_REQUEST
//                $invoice     = $_REQUEST["od_id"];
//                $email       = $_REQUEST["od_payment_email"];
//
//                $sql     = "SELECT * FROM tbl_order WHERE od_id ='$invoice' AND od_payment_email='$email' OR od_shipping_email ='$email'";
//                $result  =  mysqli_query($link, $sql);
//                $row     = mysqli_fetch_array($result);
//
//                //ไม่มีในระบบ
//                    if(!$row){
//                     header("refresh: 2; url=informpayment.php");                      
                     ?>
<!--                     <div id="content1" ><br />
                         <p><img src="images/logo.jpg" alt="logo.jpg" style="width: 40%;"><br /><br />

                            <div id="content_order" >
                            <h3 style="text-align:center;"><span style="color:#F00;">
                                *** รหัสออเดอร์ของคุณไม่มีในระบบคะ ลองกรอกใหม่อีกครั้ง...!</span></h3>
                            </div> 
                            </div><br /><br />-->

                     <?php     
                     //ออเดอร์นี้มีการยืนยันแล้ว
//                    }else if ($row['od_status'] != 'New') {
//                     header("refresh: 2; url=informpayment.php");
                        ?>
<!--                          <div id="content1" ><br />
                                <p><img src="images/logo.jpg" alt="logo.jpg" style="width: 40%;" ><br /><br /> 
                                    
                                <div id="content_order" >
                                <h3 style="text-align:center;"><span style="color:#F00;">
                                    *** รหัสออเดอร์นี้มีการยืนยันการชำระแล้วค่ะ ..!</span></h3>
                                </div> 
                                </div><br /><br />-->
                   <?php         
//                    }  
//                    else{

                     ?> 
                    <div id="content_right"><br><br>
                        <div id="header_payment">
                              <h1>แจ้งชำระเงิน</h1>
                              <h2>สำหรับการโอนเงินผ่านธนาคาร</h2>
                        </div><br><br>
                           <form>
                               <div id="title" style="text-align: left;">รายการสั่งซื้อ (Invoice No) :<?php echo  $invoice ; ?> 
                                   <input name="invoice" type="hidden" id="strInvoice" value="<?php echo $invoice ; ?>">
                                </div>
                                <hr color="#004d4d">

                                <div style="background-color:#CCC;">&nbsp;&nbsp;&nbsp;</div><br>

                                 <?php 
                                 //ใช้ตคำสั่ง while วนให้โชว์หาสินค้า
//                                     $sql   = "SELECT * FROM order_item 
//                                               INNER JOIN product 
//                                               ON order_item.pd_id = product.pd_id
//                                               INNER JOIN tbl_order
//                                               ON order_item.od_id = tbl_order.od_id
//                                               WHERE order_item.od_id = '$invoice' ";
//                                     $result = mysqli_query($link, $sql)or die(mysqli_error());
//

                                 ?>

                                <table style="width: 100%; text-align: center; height:35px;" border="1" height="118" cellpadding="5" cellspacing="0">
                                    <tr style="background-color: #b3ffff;"> 
                                           <td style="width: 55%;text-align: center; height: 30px;">รายการ</td>
                                           <td style="width: 15%; text-align:center;">จำนวน</td>
                                           <td style="width: 15%; text-align: center;">ราคา</td>
                                           <td style="width: 15%; text-align: center;">จำนวนเงิน</td>
                                       </tr>
                                        <?php
//                                          $subTotal = 0;
//                                           while( $row = mysqli_fetch_array($result)){
//                                              $subTotal   += $row ["pd_price"] * $row ["od_qty"]                              

                                        ?>

                                      <tr> 
                                         <td style="text-align: left;"><?php// echo $row ["pd_name"]; ?></td>
                                         <td style="text-align: right;"><?php// echo $row ["od_qty"]; ?></td>
                                         <td  style="text-align: right;"><?php// echo $row ["pd_price"]; ?></td>
                                         <td  style="text-align: right;"><?php// echo ($row["pd_price"] * $row["od_qty"]); ?></td>
                                      </tr>     
                                      <?php
                          //                 }
                                      ?>
                                      <tr> 
                                          <td style="text-align: right; height: 30px;" colspan="3">รวมทั้งหมด (บาท)</td>
                                          <td style="text-align: right;"><?php// echo $subTotal  ?></td>

                                      </tr>



                                      <?php 
                                      //ให้โชว์วิธีการส่งสินค้า
//                                        $sql_ship    = "SELECT * FROM tbl_order WHERE  od_id = '$invoice' ";                                    
//                                        $result_ship = mysqli_query($link, $sql_ship)or die(mysqli_error());
//                                        $row         = mysqli_fetch_array($result_ship);

                                     ?>

                                      <tr> 
                                          <td style="text-align: left; width: 100%;height: 30px;" colspan="2">
                                              <?php

//                                                 if ($row ["ship"] ==  'EMS'){
//                                                        echo "พัสดุ EMS (แนะนำ) : ภาคกลางใช้เวลาส่ง 1 วันต่างภาค 2-3 วัน";  
//                                                    }else if ($row ["ship"] ==  'Re'){
//                                                            echo "พัสดุลงทะเบียน : ใช้เวลาส่ง 3-7 วัน";
//                                                    }else{
//                                                            echo "ฟรี! พัสดุ EMS : ภาคกลางใช้เวลาส่ง 1 วันต่างภาค 2-3 วัน";
//                                                    }
                                              ?>
                                          </td>
                                          <td style="width: 20%; text-align: right;height: 30px; font-weight: bolder;">ราคาค่าจัดส่ง (บาท)</td>
                                            <?php
//                                                $shippingCost = "" ;
//                                                     if  ($row["ship"] ==  'EMS'){
//                                                        $shippingCost = 50.00;  
//                                                     }else if ($row["ship"] ==  'Re'){
//                                                        $shippingCost = 30.00; 
//                                                     }else{
//                                                        $shippingCost = 0.00; 
//                                                     }

                                        ?>

                                          <td style="text-align: right;"><?php //echo $shippingCost; ?></td>
                                      </tr>

                                      <tr> 
                                          <td style="text-align: right; height: 30px;" colspan="3" >ราคาสุทธิที่ต้องชำระ (บาท)</td>
                                         <td style="text-align: right; color:#F00;" ><?php // echo $shippingCost + $subTotal ?></td>
                                      </tr>
                                 </table></br></br>


                                 <div id="style_header" >ชำระเงินเข้าบัญชี <i style="color:#F00">*</i></div>
                                 <hr color="#004d4d">
                                    <div>&nbsp;
                                        <table style="width: 100%; text-align: center;"cellspacing="1" >
                                        <tr>
                                           <td style="width: 6%;"><input type="radio"  name="bank" value="K-bank" checked></td>
                                           <td style="width: 5%;"><img src="images/k-bank.png" style="width: 70%;"></td>
                                           <td style="width: 12%; text-align: left; color:#00773C; ">ธ.กสิกรไทย</td>
                                           <td style="width: 18%; text-align: left; color:#666;">116-2-82430-5</td>
                                           <td style="width: 17%; text-align: left; color:#999; ">ปาริชาต  กิจธิคุณ</td>
                                           <td style="width: 29%; text-align: right;color:#666; ">ออมทรัพย์</td>
                                           <td style="width: 13%; text-align: right; color:#999; ">ตรัง</td>
                                        </tr>
                                        <tr>
                                           <td style="width: 6%;"><input type="radio" name="bank" value="SCB"></td>
                                           <td style="width: 5%;"><img src="images/scb.png" style="width: 70%;"></td>
                                           <td style="width: 12%; text-align: left; color:#00773C; ">ธ.ไทยพาณิชย์</td>
                                           <td style="width: 18%; text-align: left; color:#666;">405-3-99323-0</td>
                                           <td style="width: 17%; text-align: left; color:#999; ">ปาริชาต  กิจธิคุณ</td>
                                           <td style="width: 29%; text-align: right;color:#666; ">ออมทรัพย์</td>
                                           <td style="width: 13%; text-align: right; color:#999; ">โรบินสัน ตรัง</td>
                                        </tr>
                                        <tr>
                                           <td style="width: 6%;"><input type="radio" name="bank" value="BBL"></td>
                                           <td style="width: 5%;"><img src="images/bbl.png"  style="width: 70%;"></td>
                                           <td style="width: 12%; text-align: left; color:#00773C; ">ธ.กรุงเทพ</td>
                                           <td style="width: 18%; text-align: left; color:#666;">261-4-24787-8</td>
                                           <td style="width: 17%; text-align: left; color:#999;">ปาริชาต  กิจธิคุณ</td>
                                           <td style="width: 29%; text-align: right;color:#666; ">ออมทรัพย์</td>
                                           <td style="width: 13%; text-align: right; color:#999; ">ตรัง</td>
                                        </tr>
                                        <tr>
                                           <td style="width: 6%;"><input type="radio" name="bank" value="KTB"></td>
                                           <td style="width: 5%;"><img src="images/ktb.png"  style="width: 70%;"></td>
                                           <td style="width: 12%; text-align: left; color:#00773C; ">ธ.กรุงไทย</td>
                                           <td style="width: 18%; text-align: left; color:#666;">903-0-52795-1</td>
                                           <td style="width: 17%; text-align: left; color:#999;">ปาริชาต  กิจธิคุณ</td>
                                           <td style="width: 29%; text-align: right;color:#666; ">ออมทรัพย์</td>
                                           <td style="width: 13%; text-align: right; color:#999; ">ตรัง</td>
                                        </tr>
                                       </table>
                                     </div></br></br></br>


                                     <div id="style_header" >กรอกรายละเอียด <i style="color:#F00">*</i>
                                     <hr color="#004d4d">

                                     <table width="100%" cellspacing="1"  align="center">
                                        <tr>
                                           <td width="30%" align="left">จำนวนเงินที่โอนเงินเข้าบัญชี</td>
                                           <td width="70%" align="left" style="color:#999"><?php  echo  $shippingCost + $subTotal ?> บาท</td>
                                        </tr>

                                        <tr>
                                           <td width="30%" align="left" >วันที่โอน</td>
                                           <td width="70%" align="left">
                                              <input type="text" name="date" placeholder="วันเดือนปี *" required readonly>
                                                วันเดือนปี (ตัวอย่าง 2016/04/26)
                                           </td>
                                        </tr>

                                        <tr>
                                           <td width="30%" align="left">เวลาโอนโดยประมาณ</td>
                                           <td width="70%" align="left">
                                           <input type="number" name="hour" placeholder="ชั่วโมง *"  min="0" max="23" required >
                                           <input type="number" name="min" placeholder="นาที *"  min="0" max="59" required>  เวลา (ชั่วโมง นาที)
                                           </td>
                                        </tr>

                                        <tr>
                                           <td width="30%" align="left">หลักฐานการชำระเงิน</td>
                                           <td width="70%" align="left">
                                              <input type="file" name="fleImage">
                                           </td>
                                        </tr>
                                     </table>
                                     </div></br></br></br>



                                     <div id="style_header">รายละเอียดเพิ่มเติม
                                       <hr color="#004d4d">
                                         <textarea name="detail" placeholder="ระบุหมายเหตุเพิ่มเติมได้ที่นี่" rows="7" cols="122"></textarea>
                                     </div></br></br></br>

                                     <div  style="color:#CCC" align="center">
                                         <button  type="submit" name="submit" formmethod="POST" formaction="save_confirm_payment.php" formenctype="multipart/form-data">แจ้งชำระเงิน</button>			
                                     </div></br></br>

                                     <div style="background-color:#CCC;">&nbsp;&nbsp;&nbsp;</div>
                                        <hr color="#004d4d">

                                     <div align="left" style="margin:10px; margin-bottom:20px; color:  #009999;">
                                         &nbsp;&nbsp;&nbsp;คุณจะได้รับอีเมลยืนยันการแจ้งชำระเงินจาก ทางร้าน Arduino Bangkok ทุกครั้งเมื่อกดปุ่มแจ้งชำระเงินเสร็จเรียบร้อย หากไม่ได้รับอีเมลยืนยัน<br>
                                            กรุณาติดต่อทางร้าน  โทร. <a href='contact.php' >086-947-4272</a> หรือส่งอีเมลมาที่ arduinobangkok@gmail.com</a>

                                     </div></br></br>
                <?php  
//                    }
//      }
//    } ?>
                      </form>
                  </div> </br></br></br></br></br></br>
            </div>
            <?php include("include/footer.php"); ?>
        </body> 
</html>