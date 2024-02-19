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
</head>
<style>    
    #content_right{
       width: 90%;
       height: auto;
       margin: auto;
       background-color:#FFFFFF; 
     
     }
    #order_status{    
       width: 95%;
       margin: auto; 
       padding-left: 10px; 
       background-color: #f2f2f2;
       padding: 25px;
    }   
    #status {
        width: 33%;
        float: left;
        margin: 0px;
        border: 0px;
        padding: 0px;
        outline: solid 1px #CCC;           
    }       
    #price{
        width: 33%;
        float: left;
        margin: 0px;
        border: 0px;
        padding: 0px;
        outline: solid 1px #CCC;
    }        
    #date{
        width: 33%;
        float: left;
        margin: 0px;
        border: 0px;
        padding: 0px;
        outline: solid 1px #CCC;            
    }         
    #how2{
        font-size: 19px;
        text-align: left;        
    }    
    #ins{
        font-size: 19px;
        text-align: left;
        color:#4d4d4d;
    }
     li{
        font-size: 19px;  
        color: #666666;
     }
@media only screen and (max-width: 480px),only screen and (max-device-width: 480px) {
    #content_right{
      // float: left;
       margin: auto;
       width: 90%;      
       background-color:#FFFFFF;    
       margin: auto; 
       padding: 30px;
                 
    }
}
            
</style>
<body>
<div id="wrapper">
  <?php 
    include"library/config.php"; 
    include"include/branner.php";

  ?>      
  <br/><br/><br/>      
    <div id="head" style="font-size:26px;" align="center"> 
        <span id="cart" style="color:#3333cc">ตะกร้าสินค้า</span>&nbsp;
        <span class="raquo" style="color:#3333cc" >&raquo;&nbsp;</span>
        <span id="cust" style="color:#3333cc">ที่อยู่ในการจัดส่ง</span>&nbsp;
        <span class="raquo" style="color:#3333cc" >&raquo;&nbsp;</span>
        <span id="done"style="color:#3333cc">ตรวจสอบรายการสั่งซื้อ</span>
        <span class="raquo" style="color:#3333cc" >&raquo;&nbsp;</span>
        <span id="done"style="color:#3333cc">สั่งซื้อเรียบร้อย</span>
    </div><br/>

    <div id="content_right">
        <div id="order_status">
    <?php  
    
       if(isset($_SESSION['orderId']) ==  FALSE){
              header('Location:info.php');

        }else {          

                   $invoice = $_SESSION['orderId'];

                    $sql    = "SELECT * FROM tbl_order 
                               INNER JOIN order_bank 
                                ON tbl_order.od_id = order_bank.od_id
                                WHERE tbl_order.od_id = '$invoice' ";

                    $result = mysqli_query($link, $sql)or die(mysqli_error());
                    $row    = mysqli_fetch_array($result);

                       $od_date                  = $row['od_date']; //วันที่ทำรายการ
                       $amt                      = $row['amt']; // ยอดที่ต้องโอน (subTotal + Shipcost)
                       $customer_shipping        = $row['od_payment_first_name'] ."&nbsp;". $row['od_payment_last_name'] ;
                       $customer_payment         = $row['od_payment_first_name'] ."&nbsp;". $row['od_payment_last_name'] ;
                       $od_shipping_address1     = $row['od_shipping_address1']; //ที่อยู่ในการจัดส่ง
                       $od_shipping_address2     = $row['od_shipping_address2']; //ที่อยู่ในการจัดส่ง
                       $od_shipping_city         = $row['od_shipping_city']; // อำเภอที่จัดส่ง
                       $od_shipping_state        = $row['od_shipping_state']; //จังหวัดที่ จัดส่ง
                       $od_shipping_postal_code  = $row['od_shipping_postal_code']; //รหัวไปรษณีย์
                       $od_payment_phone         = $row['od_payment_phone']; // เบอร์ที่ติดต่อเมื่อมีปัญหา
                       $od_payment_email         = $row['od_payment_email']; // email
                       $ship                     = $row['ship']; //วิธีการจัดส่ง
                       $email_login              =  $od_payment_email;  // email ของผู้ที่จ่ายเงิน

                        //ถ้าต้องการรัน mail กับ 000hostจริง	   

                                        $To       = $email_login;
                                        $Subject  = "รายการสั่งซื้อ #:$invoice";
                                       include './mail_success.php';
                                       include "send_mail.php";
                                          if($flgSend){
                                                echo "Email Sending.";
                                          }
                                          else{
                                                echo "Email Can Not Send.";
                                          }  



                        // ถ้าต้องการรัน mail กับ locohost			  
//                             include ("class.phpmailer.php");
//                               $subject_body  = "รายการสั่งซื้อ #:$invoice";
//                                 include './mail_success.php';
//                                      $mail = new PHPMailer(); 
//                                      $mail->IsSMTP(); 
//                                      $mail->IsHTML(true);
//                                      $mail->Host = "ssl://smtp.gmail.com";
//                                      $mail->Port = 465; 
//                                      $mail->SMTPAuth = true;
//                                      $mail->Username = "arduinobangkok@gmail.com";
//                                      $mail->Password = "ninjapanda4628";
//                                      $mail->Sender = "arduinobangkok@gmail.com";
//                                      $mail->FromName = "Arduion Bangkok";// $email;
//                                      $mail->Subject  = $subject_body; //$subject_body;
//                                      $mail->Body     = $Message; //$message_body;
//                                      $mail->AltBody  = "Alternating Name"; // $message_body;
//                                      $mail->MsgHTML($Message); //$message_body);
//                                      $mail->AddAddress($email_login); 
//
//                                    if(!$mail->send()){
//                                         echo "Mailer Error: " . $mail->ErrorInfo;
//                                    } 
//                                     else {
//                                         echo "Message has been sent successfully";
//                                    } 
               ?>

                   <br>
                    <div style="background-color:#CCC;">&nbsp;&nbsp;</div>
                    <div style="margin: auto;"><img src="images/check.png" style="width: 40%"></div>

                    <span style="font-size: 35px; text-align: center; color: #333333; font-weight: bold;">สั่งซื้อเรียบร้อย</span><br>
                    <span style="font-size: 29px; text-align: center; color: #999999;">รายการสั่งซื้อของคุณคือ&nbsp; <?php echo $invoice ; ?></span><br><br>


                    <div id="status">
                        <img src="images/cost.png" alt="" style="width: 35%" /><br>
                        <span style="font-size: 19px; text-align: center; color: #333333; font-weight: bold;">สถานะรายการสั่งซื้อ</span><br>    
                        <span style="font-size: 28px; text-align: center; color: #00cc00; font-weight: bold;">
                                 <?php
                                     //ราคาค่าส่ง ที่ลูกค้าเลือกส่ง 3 วิธี
                                     $od_status = "" ;  
                                        if  ($row['od_status'] ==  'New'){
                                              $od_status = "รอชำระ";  
                                        }else if ($row['od_status']  ==  'Paid'){
                                              $od_status  = "ชำระเรียบร้อย"; 
                                        }else{
                                              $od_status  = "รอตรวจสอบยอดเงิน"; 
                                        }

                                      echo $od_status ;  
                                ?>
                        </span><br>
                        <span style="font-size: 19px; text-align: center; color: #333333;">กรุณาชำระเงินตามข้อมูลที่ระบุ</span>
                        <br><br>
                    </div>
                    
                    
                    <div id="price"><br>
                        <img src="images/coin-icon.png" alt="" width="15%" /><br>
                        <span style="font-size: 19px; text-align: center; color: #333333;font-weight: bold;">จำนวนเงินที่ต้องชำระ</span><br>
                        <span style="font-size: 27px; text-align: center; color:#ff9933;font-weight: bold;"><?php echo $row['amt'];?></span><br>
                        <span style="font-size: 19px; text-align: center; color: #333333;">เลือกวิธีการชำระเงินด้านล่างนี้</span>
                        <br><br>
                    </div>
                    
                    
                    <div id="date">
                        <br>
                        <img src="images/dinheiro-azul.png"  alt="" width="15%" /><br>
                        <span style="font-size: 19px; text-align: center; color: #333333;font-weight: bold;">ชำระค่าสินค้าและแจ้งชำระเงินภายใน</span><br>
                        <span style="font-size: 27px; text-align: center; color: #6699ff;font-weight: bold;"><?php echo Date('d-m-Y H:i:s',strtotime("+3 day")); ?></span><br>
                        <span style="font-size: 19px; text-align: center; color: #333333;">กรุณาชำระเงินตามข้อมูลที่ระบุ</span>
                        <br><br>
                    </div> 
                    <br><br>

                    <div style="clear: both;   ">
                    <br><br>
                        <span style="font-size:18px; text-align:left; color: #666;">   *ระบบจะส่งอีเมลอัตโนมัติไปยัง <?php echo $row['od_payment_email']; ?> เพื่อยืนยันการสั่งซื้อสินค้าครั้งนี้</span>
                    </div>
            </div><br><br><br><br>



            <hr color="#f2f2f2">
            <div id="how2">
                    <p style="text-align:center; font-size: 28px; color:#404040;font-weight: bold;">วิธีการชำระเงิน</p>

                    <p style="text-align:left; font-size: 19px; color:#666666; font-weight: bold;">มั่นใจ Arduino Bangkok</p>
                    <span style="color:#4d4d4d">
                        &nbsp;&nbsp;&nbsp;ซื้อสินค้ากับ Arduino Bangkok ได้ตลอด 24 ชั่วโมง มั่นใจได้ 100% เราจัดส่งสินค้าทางไปรษณีย์ 
                        ทั้งแบบลงทะเบียนและแบบ EMS แพ็คสินค้าอย่างดีปลอดภัย ส่งถึงมือลูกค้าอย่างแน่นอน ร้านเราอยู่ใกล้ไปรษณีย์ ถ้าแจ้งโอนก่อนเวลา 14:30 น. จัดส่งสินค้าในวันเดียวกัน ถ้าเกินจะจัดส่งสินค้าในตอนเช้าของวันถัดไป 
                          <ul>
                            <li>ค่าจัดส่งแบบไปรษณีย์ EMS 50 บาท</li>                               
                            <li>ค่าจัดส่งแบบไปรษณีย์ลงทะเบียน 30 บาท</li>
                            <li>สั่งซื้อสินค้า 1500 บาทขึ้นไป ส่งแบบ EMS ฟรี</li>
                            <li> <u><b>ถ้าทำรายการสั่งซื้อสำเร็จ = มีของพร้อมส่งทางร้านจองสินค้าไว้ให้ด้วย 3 วัน</b></u></li>
                          </ul>
                    </span><br>


                   
                    <img src="images/EMS1.jpg" alt="images/EMS1.jpg" style="width: 60%; text-align: center;" ><br>
                   
                    
                    <p style="text-align:left; font-size: 22px; font-weight: bold">ระยะเวลาจัดส่ง</p>
                    <span style="color:#4d4d4d">
                        &nbsp;&nbsp;&nbsp;เมื่อทางร้านได้รับการแจ้งชำระสินค้าเรียบร้อยแล้ว ถ้าแจ้งก่อน 14.30 น. ส่งของภายในวันเดียวกัน 
                      <ul style="padding-left: 28px;">
                        <li>แบบ EMS ภาคกลางได้รับภายใน 2 วัน ต่างภาคได้รับภายใน 3-4 วัน</li>                               
                        <li>แบบ ลงทะเบียน ได้รับภายในเวลา 3-7 วัน เหมาะกับลูกค้าที่ไม่ซีเรียสเรื่องเวลา</li>
                        <li>ระบบจะส่งเลขแทรคไปรษณีย์ ไปให้ทาง email และแจ้ง SMS ส่งตรงถึงโทรศัพท์มือถือ</li>
                        <li><u>ลูกค้าที่โอนเงินมาแล้วไม่ได้แจ้งทางร้าน เพื่อความรวดเร็วในการจัดส่งสินค้า ช่วยแจ้งด้วยนะครับ เพื่อที่จะได้จัดส่งภายในวันเดียวกัน</u></li>
                      </ul>
                    </span><br>


                     <p style="text-align:left; font-size: 22px; font-weight: bold">การจัดส่ง</p>
                                          
                          <ul style="padding-left: 28px; color:#4d4d4d; ">
                                <li><span style="color:#00C;  font-weight: bold; "><span style="text-decoration: underline;">วันจันทร์-ศุกร์</span></span>
                                    โอนเงินและแจ้งโอน<span style="color: #F00;font-weight: bold; "><span style="text-decoration: underline;">ก่อน</span></span>
                                    เวลา 14.30 น. จัดส่งสินค้า Arduino <span style="text-decoration: underline;">ในวันนั้น</span> (จันทร์-ศุกร์)</li>   

                                <li><span style="color:#00C;  font-weight: bold;"><span style="text-decoration: underline;">วันจันทร์-ศุกร์</span></span>
                                    โอนเงินและแจ้งโอน<span style="color: #F00;font-weight: bold; ;"><span style="text-decoration: underline;">หลัง</span></span>
                                    เวลา 14.30 น. จัดส่งสินค้า Arduino <span style="text-decoration: underline;">ในวันถัดไป</span> (จันทร์-ศุกร์)</li>

                                <li><span style="color:#00C; font-weight: bold;"><span style="text-decoration: underline;">วันศุกร์</span></span>
                                    โอนเงินและแจ้งโอน<span style="color: #F00;font-weight: bold; "><span style="text-decoration: underline;">หลัง</span></span>
                                    เวลา 14.30 น. ถึง 24.00 น. จัดส่งสินค้า Arduino <span style="text-decoration: underline;">ในวันเสาร์ตอนเช้า</span></li>

                                <li> โอนเงินและแจ้งโอน <span style="color:#00C; font-weight: bold;"><span style="text-decoration: underline;">วันเสาร์-อาทิตย์</span></span>
                                    จัดส่งสินค้า Arduino<span style="text-decoration: underline;">ในวันจันทร์</span></li>
                          </ul>                     
                      ***<span style="text-decoration: underline; color:#4d4d4d;">หมายเหตุ </span>:
                        <span style="text-decoration: underline; color:#4d4d4d;">ไปรษณีย์อัพเดทเลขแทรคตอน 16.00 น. ในวันปกติ วันเสาร์อัพเดทตอน 12.00 น.</span>
                    <br>

                    <span style="color:#4d4d4d; font-size: 22px;">
                      &nbsp;&nbsp;&nbsp; ชำระเงินผ่านธนาคาร เรามีหลายธนาคารให้เลือก เพื่ออำนวยความสะดวกให้กับลูกค้า 
                    </span><br><br>

                
                    <img src="images/how2.jpg" alt="images/how2.jpg" style="width: 70%; text-align: center;"><br>
                    
                    <p style=" font-size:20px; text-align:left">หมายเหตุ</p>
                    <p style=" font-size:19px; color: #008000; text-align:left">
                    <i style="color:#F00">*</i>
                         &nbsp;&nbsp; การทำธุรกรรมของธนาคารต่างสาขาหรือต่างธนาคาร จะมีค่าธรรมเนียมเพิ่ม แล้วแต่ธนาคาร

                    <i>ถ้าทำธุรกรรมภายในธนาคารเดียวกัน จะเสียค่าธรรมเนียมน้อยที่สุดหรือไม่เสียเลย</i> บางธนาคารจะไม่คิดค่าธรรมเนียมโดยจำกัดว่าฟรีได้กี่ครั้งใน 1 เดือน เช่นฟรีค่าธรรมเนียมเมื่อโอนในธนาคารเดียวกัน 5 ครั้ง/เดือน ผ่านทางตู้ ATM

                       ดังนั้น ควรเลือกโอนมาที่ธนาคารเดียวกัน จะเสียค่าธรรมเนียมน้อยที่สุดหรือไม่เสียค่าธรรมเนียมตามเงื่อนไขที่ธนาคารกำหนด

                    <p>&nbsp;</p>

            </div>    


            <div id="ins">
                <p style="text-align:left; font-size: 24px; color: #006666 ; padding-left: 28px;">การรับประกัน Arduino Bangkok</p>
                    <span style="padding-left: 28px;">โดย &nbsp;<span style="font-weight: bold;">เจ้าของร้าน</span></span>
                    
                <p style="text-align:left; font-size: 20px; color: darkblue; padding-left: 28px;">
                         &nbsp;&nbsp; Arduino Bangkok มี Arduio ครบทุกอย่างที่อยากได้ จากทุกแห่งทั่วโลก ในราคาที่ถูกที่สุด  
                         รับประกันคุณภาพ เสียเปลี่ยนตัวใหม่ให้ทันที ไม่ต้องรอ ไม่ต้องเสียค่าส่งสินค้ามาเคลม </p><br>
                    
                <div style="text-align: center; ">   
                        <img src="images/INS.jpg" alt="ins" style=" width:80%;padding-left: 10px; margin: auto;"><br><br>
                </div>
                     <span style="padding-left: 28px;">&nbsp;&nbsp; &nbsp;&nbsp; 
                          ซื้อสินค้าจาก Arduino Bangkok มั่นใจได้ รับประกันคุณภาพ ด้วยการมีประกันสินค้าที่ดีกว่าเราได้ตรวจเช็คและรับประกันสินค้าซื้อไปใช้ได้อย่างมั่นใจและสบายใจ  
                         เพื่อให้ลูกค้าถูกใจที่สุด
                     </span>
                    
                 <p>&nbsp;&nbsp; &nbsp;&nbsp; 
                        ทั้งนี้หากมีสินค้าที่ได้รับมีความผิดพลาดอันใด ที่อาจเกิดขึ้นได้  ไม่ว่าจะเป็นอุปกรณ์เสีย หรือความเสียหายระหว่างการส่ง โดยที่ลูกค้าไม่ได้เป็นคนกระทำ  Arduino Bangkok รับประกันเปลี่ยนตัวใหม่ให้ทันที <u>ภายใน 30 วันหลังจากได้รับสินค้า</u> พร้อมออกค่าส่งสินค้าให้ ทั้งค่าส่งมา และค่าส่งกลับ ลูกค้าไม่ต้องรับภาระเรื่องค่าจัดส่ง โดยสามารถใช้กล่องเดิมส่งมาได้  โดยมีเงื่อนไขดังนี้   
                </p><br>
                   <ul style="padding-left: 28px;">
                        <li>การ ซื้อสินค้า ถือว่าลูกค้ายินยอมและปฎิบัติตามเงื่อนไขการรับประกันของทางร้านแล้ว กรณีไม่ตรงตามเงื่อนไข 
                            ทางร้านขอสงวนสิทธิ์ในการรับประกันสินค้า</li>                               
                        <li>สินค้า ต้องเขียนรายละเอียดปัญหาแนบมาด้วย ส่งมาพร้อมใบเสร็จรับเงินหรือสำเนาใบเสร็จรับเงิน จาก Arduino Bangkok มา
                            ในกล่องด้วย เพื่อเป็นหลักฐานสำคัญมาก กรณีที่ไม่มีทางร้านขอสงวนสิทธิ์เนื่องจากไม่ตรงตามเงื่อนไขการรับประกัน</li>
                        <li>สินค้าจะต้องเป็นความเสียหายที่เกิดจากตัวอุปกรณ์ ไม่ใช่ความเสียหายที่เกิดจากการใช้งานของตัวลูกค้าเอง</li>
                        <li>สินค้าต้องอยู่ในสภาพที่สมบูรณ์เช่น ไม่มีรอยไหม้ แตกหัก ไม่มีรอยงัดแงะ หรืออื่น ๆ</li>
                        <li>ความเสียหายที่เกิดขึ้นต้องไม่เกิดจากใช้งานผิดประเภท ดัดแปลง แก้ไข หรือใส่ไฟผิดขั้ว</li>
                        <li>อุปกรณ์ประเภทเซอร์เฟสเมาส์ SMD การบัดกรีมีความเสียงต่ออุปกรณ์เสียหาย ทางร้านขอยกเว้นการรับประกันอุปกรณ์ประเภทนี้</li>
                        <li>การรับประกัน จะพิจารณาจากข้อเท็จจริง  ขึ้นอยู่กับทาง Arduino Bangkok</li>
                        <li>การรับประกันเปลี่ยนอุปกรณ์ใหม่ Arduino Bangkok รับประกันสินค้าทุกชิ้นที่ขายในร้าน โดยร้านเป็นผู้รับผิดชอบความเสียหายเอง</li>
                        <li>สการรับประกัน นี้ อาจเป็นการเปลี่ยนสินค้าใหม่ หรือ คืนเงิน ขึ้นอยู่กับ Arduino Bangkok พิจารณา</li>
                        <li>ถ้าสินค้ามีปัญหา การจัดส่งสินค้าตัวใหม่ ผ่านทางไปรษณีย์ Arduino Bangkok จะแนบค่าส่งตอนที่ส่งมาคืนให้ในกล่อง และออกค่าส่งกลับส่งไปให้ลูกค้า ลูกค้าไม่ต้องรับภาระเรื่องค่าจัดส่ง</li>
                        <li>การ นับวัน หากสินค้าถึงมือลูกค้าในวันที่ 1/5/2564 ( ตรวจสอบได้จากไปรษณีย์ไทย) เมื่อพบความเสียหาย ลูกค้าจะต้องส่งสินค้ากลับคืนมาที่ Arduino Bangkok ภายในวันที่ 31/5/2564 โดยอ้างอิงจากเลขแทรค ผ่านไปรษณีย์ลงทะเบียน หรือแบบ EMS 
                            ถ้ามีเลือกบริการเสริมพิเศษนอกเหนือจากวิธีส่งปกติ เช่น ค่าบริการพิเศษ พกง. ลูกค้าเป็นออกค่าบริการพิเศษนี้เอง</li>
                        <li>เมื่อ ทำการส่งเรียบร้อยแล้ว ลูกค้าจะต้อง ส่งหมายเลขพัสดุ tracking ที่สามารถ track ได้จากทางเว็บไซต์ของทางไปรษณีย์ไทย มาให้กับ Arduino Bangkok  แล้วเราจะพิจารณาตรวจสอบและแจ้งให้ลูกค้าทราบผ่านทางช่องทางที่ติดต่อได้ที่ ลูกค้าให้ไว้</li>
                    </ul>

             </div>

               <p style="text-align:left; font-size:25px; font-weight: bold;">วิธีการชำระเงิน</p>
            
               <table style=" width:100%; border: 0px; margin: auto; font-size:22px;">
                    <tr style="background-color: #e6e6e6; height:30px;" > 
                        <td style="width: 100%;  font-weight: bold;">วิธีการชำระเงิน </td>
                    </tr>

                    <tr style=" color:#4d4d4d;" >    
                        <td>
                            <span style="text-align: center;"> 
                                   ชำระเงินด้วยการโอนเงินผ่านธนาคาร (ATM)ชำระเงินผ่านธนาคาร <br>
                                    เรามีหลายธนาคารให้เลือก เพื่ออำนวยความสะดวกให้กับลูกค้า
                            </span> 
                            
                            <table style="width: 100%; text-align: center; font-size:18px "colspan="1" border="0"  >
                            <tr>
                                        <td style="width:5%;"><img src="images/k-bank.png" style="width: 80%;" ></td>
                                        <td style="width:19%; text-align: left; color:#00773C; ">ธ.กสิกรไทย</td>
                                        <td style="width:21%; text-align: left; color:#666">xxx-x-xxxxx-x</td>
                                        <td style="width:25%; text-align: left; color:#999">xxx  xxx</td>
                                        <td style="width:15%; text-align: right;color:#666">xxx</td>
                                        <td style="width:13%; text-align: right; color:#999">xxx</td>
                                     </tr>
                                     <tr>
                                        <td style="width:5%;"><img src="images/scb.png" style="width: 80%;"></td>
                                        <td style="width:19%; text-align: left; color:#909;" >ธ.ไทยพาณิชย์</td>
                                        <td style="width:21%; text-align: left; color:#666">xxx-x-xxxxx-x</td>
                                        <td style="width:25%; text-align: left; color:#999">xxx  xxx</td>
                                        <td style="width:15%; text-align: right;color:#666">xxx</td>
                                        <td style="width:13%; text-align: right; color:#999">xxx</td>
                                     </tr>
                                     <tr>

                                        <td  style="width:5%;"><img src="images/bbl.png" style="width: 80%;"></td>
                                        <td style="width:19%; text-align: left; color:#00C">ธ.กรุงเทพ</td>
                                        <td style="width:21%; text-align: left; color:#666">xxx-x-xxxxx-x</td>
                                        <td style="width:25%; text-align: left; color:#999">xxx  xxx</td>
                                        <td style="width:15%; text-align: right;color:#666">xxx</td>
                                        <td style="width:13%; text-align: right; color:#999">xxx</td>
                                     </tr>
                                     <tr>

                                        <td style="width:5%;"><img src="images/ktb.png"style="width: 80%;"></td>
                                        <td style="width:19%; text-align: left; color:#0FF">ธ.กรุงไทย</td>
                                        <td style="width:21%; text-align: left; color:#666">xxx-x-xxxxx-x</td>
                                        <td style="width:25%; text-align: left; color:#999">xxx  xxx</td>
                                        <td style="width:15%; text-align: right;color:#666">xxx</td>
                                        <td style="width:13%; text-align: right; color:#999">xxx</td>
                                     </tr>
                            </table>
                        </td>
                    </tr>  
                    </table><br/>

                        <p style=" font-size:22px; text-align:left; font-weight: bold; ">หมายเหตุ</p>
                        <p style=" font-size:19px; color: #008000; text-align:left">
                          <i style="color:#F00">*</i>
                             &nbsp;&nbsp; การทำธุรกรรมของธนาคารต่างสาขาหรือต่างธนาคาร จะมีค่าธรรมเนียมเพิ่ม แล้วแต่ธนาคาร
                             <i style="color: #666;">ถ้าทำธุรกรรมภายในธนาคารเดียวกัน จะเสียค่าธรรมเนียมน้อยที่สุดหรือไม่เสียเลย</i> บางธนาคารจะไม่คิดค่าธรรมเนียมโดยจำกัดว่าฟรีได้กี่ครั้งใน 1 เดือน เช่นฟรีค่าธรรมเนียมเมื่อโอนในธนาคารเดียวกัน 5 ครั้ง/เดือน ผ่านทางตู้ ATM

                           ดังนั้น ควรเลือกโอนมาที่ธนาคารเดียวกัน จะเสียค่าธรรมเนียมน้อยที่สุดหรือไม่เสียค่าธรรมเนียมตามเงื่อนไขที่ธนาคารกำหนด
                        </p>
                        <p>&nbsp;</p><br/><br/>
                    <div style="text-align: right;">


                        <input style="border-radius:8px; padding: 10px 13px; background-color:#CCCCCC;  font-size: 16px;"   height="50px;"  name="btnBack" type="button"  value="<< ไปหน้าแจ้งชำระเงิน" onclick="window.location.href = 'http://localhost/arduionbangkok_2/informpayment.php';">
                    </div>
                    <br/><br/>
                    <h3 style="text-align: center; color:#00b3b3; font-size: 20px;"><a href="index.php">กลับสู่หน้าร้านค้า </a></h3>


                 <br/><br/>
            </div>
    <?php
    }
    ?>
       
       <?php include("include/footer.php"); ?>     
     </div>            
   
    </body>
</html>