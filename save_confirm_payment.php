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
         float: left;
         width: 78%;
         padding-left: 20px; 
        

     }
      #top_content_right{
          padding-top: 5px;
          margin-left: 20px;
          height: 30px;
          text-align: left;
          font-size:22px;
                     
      }
      #confrim_payment{
            font-size: 19px;
      }
 </style>
</head>
<body>
<div id="wrapper">
<?php 
 include"library/config.php";
 include"include/branner.php"; 
 include"include/menu.php"; 
 include"include/content_left.php";
?>
   <div id="content_right">
   <?php     
if(!isset($_POST['submit'])){
         echo '------ กรุณาเข้าหน้าหลักของร้าน ------';
    }
     else{
      
        if ($_POST){
         $invoice  = $_POST['invoice'];
            $sql     = "SELECT * FROM tbl_order WHERE od_id ='$invoice' ";
            $result  = mysqli_query($link, $sql);
            $row     = mysqli_fetch_array($result);                     
		 
                if(!$row){
                       echo"การยืนยันล้มเหลว ติดต่อทางร้านโดยด่วน ภายใน 24 ชม.";
                    exit;
                }else{
                    if($_POST){
                        $invoice   = $_POST['invoice'];   
                        $bank      = $_POST['bank'];
                        $date      = date('Y-m-d', strtotime($_REQUEST['date']));
                        $h         = $_POST['hour'];
                        $m         = $_POST['min'];
                        $dt        = $_POST['date'] . " $h:$m";
                        $detail    = $_POST['detail'];


                                if($_FILES){
                                  $image  = $_FILES['fleImage']['name']; 
                                  //$newname = time().'-'.$invoice.'-'.$image;  //เปลี่ยนชื่อรูปใหม่ที่ลูกค้า เวลา-รหัสสินค้า-ชื่อรูป
                                //  $newname = $invoice.'-'.$image;  //เปลี่ยนชื่อรูปใหม่ที่ลูกค้า รหัสสินค้า-ชื่อรูป
                                   $sur = strrchr($image, "."); //ตัดนามสกุลไฟล์เก็บไว้
                                   $newname = $invoice."".$sur; //ปลี่ยนชื่อรูปใหม่ที่ลูกค้า รหัสสินค้า.นามสกุลไฟล์
                                      move_uploaded_file($_FILES['fleImage']['tmp_name'],"images/Slip_ATM/$newname");

                                        //เมื่อมีการยืนยัน ได้อัปเดสข้อมูลลงในตาราง order_bank  และเปลี่ยนข้อมูล od_status ในตาราง tbl_order จาก'NEW' เป็น 'paid'
                                        //payment_date คือ วันเวลาที่กำลังยืนยันออเดอร์ 
                                        //slip_date คือ วันเวลาที่แสดงอยู่ที่หน้าสลิป
                                         $sql = "UPDATE order_bank 
                                                 LEFT JOIN tbl_order 
                                                 ON order_bank .od_id= tbl_order .od_id 
                                                 SET  order_bank.bankname ='$bank',  
                                                 order_bank.imge='$newname',order_bank.other='$detail', 
                                                 order_bank.slip_date='$dt', 
                                                 tbl_order.od_status= 'Paid' 

                                                WHERE order_bank .od_id = '$invoice'";

                                         $result  = mysqli_query($link, $sql);
                                }   
                    }


                    $sql  = "SELECT * FROM tbl_order 
                             INNER JOIN order_bank 
                             ON tbl_order.od_id = order_bank.od_id
                             WHERE tbl_order.od_id = '$invoice' ";


                    $result = mysqli_query($link,$sql)or die (mysqli_error());
                    $row    = mysqli_fetch_array($result);

                           $customer_payment         = $row['od_payment_first_name'] ."&nbsp;". $row['od_payment_last_name'] ;
                           $bankname                 = $row['bankname'];
                           $slip_date                = $row['slip_date'];
                           $od_payment_email         = $row['od_payment_email'];
                           $email_login              = $od_payment_email;
                           $amt                      = $row['amt'];
                           $other                    = $row['other'];

        //<!-- **** ถ้าต้องการรัน mail กับ 000host -->			 
                           
        //             $To        =  $email_login;
        //             $Subject   =  "การยืนยันการชำระเงิน ";             	    
        //             $Message  =     include './mail_confirm_payment.php'; 
        //                   
                
                //          include ("send_mail.php");
                //	
                //	  // if($flgSend){
                //		  echo "Email Sending.";
                //	   }
                //	   else{
                //		  echo "Email Can Not Send.";
                //	   }
             



          //<!-- **** ถ้าต้องการรัน mail กับ locohost -->	
                    include ("class.phpmailer.php");
                      $subject_body  = "การยืนยันการชำระเงิน";
                        include './mail_confirm_payment.php';

                       $mail = new PHPMailer(); 
                       $mail->IsSMTP(); 
                       $mail->IsHTML(true);
                       $mail->Host = "ssl://smtp.gmail.com";
                       $mail->Port = 465; 
                       $mail->SMTPAuth = true;
                       $mail->Username = "xxxxxxxxxx@gmail.com";
                       $mail->Password = "xxxxxxxxxxxx";

                       $mail->Sender = "xxxxxxxxxxx@gmail.com";
                       $mail->FromName = "Arduion Bangkok";// $email;
                       $mail->Subject  = $subject_body; //$subject_body;
                       $mail->Body     = $message_body; //$message_body;
                       $mail->AltBody = "Alternating Name"; // $message_body;
                       $mail->MsgHTML($message_body); //$message_body);
                       $mail->AddAddress($email_login); 
                           // $result = $mail->Send(); 
                            if(!$mail->send()) {
                                echo "Mailer Error: " . $mail->ErrorInfo;
                            }
                            else{
                               echo "Message has been sent successfully";
                            } 
                            
                            ?>
       
       
       
                        <div id="top_content_right" >
                            <span>
                              <a href="index.php">ขาย Arduino</a> > 
                              <b><a href="#confrim_payment">แจ้งการชำระเงิน</a></b>
                            </span>
                        </div>
                          <hr color="#f2f2f2">

                    <div id="confrim_payment">
                        <?php
                         $invoice   = $_POST['invoice'];
                         $sql_show     = "SELECT * FROM order_bank WHERE od_id ='$invoice' ";                         
                         $result_show =  mysqli_query($link, $sql_show)or die(mysqli_error());
                         $row_show     = mysqli_fetch_array($result_show);
                        ?>

                        <div style="text-align: left; font-size: 28px;"><B>แจ้งชำระเงินเรียบร้อยแล้ว</B></div>
                        <div style="background-color:#CCC;">&nbsp;&nbsp;&nbsp;</div><br>

                        <div style="margin: auto;"><img src="images/check.png" width="40px" height="38px"></div>
                        <span style="text-align:center; font-size: 25px; "><B>ข้อมูลการแจ้งชำระเงิน #<?php echo $invoice ; ?></B></span><br>
                        <span style="text-align:center; font-size: 24px; ">
                            <B>ร้านค้าของเราได้รับข้อมูลของการแจ้งชำระเงินของท่านเรียบร้อยแล้ว  โดยมีรายละเอียดดังนี้</B></span><br><br>
                        <table width="60%" cellspacing="1"  align="center">
                             <tr>
                               <td width="30%" align="left"><B>แจ้งชำระเงินเมื่อ :</B></td>
                               <td width="70%" align="left" style="color:#999"><?php echo $row_show['slip_date'];?> </td>
                            </tr>
                            <tr>
                               <td width="30%" align="left"><B>โอนเงินเข้าบัญชี :</B></td>
                               <td width="70%" align="left" style="color:#999">
                                   <?php
                                   if ($row_show ["bankname"] ==  'K-bank'){
                                         echo "<img src='images/k-bank.png' width='29' height='25'> ธ.กสิกรไทย";  
                                    }else if ($row_show ["bankname"] ==  'SCB'){
                                         echo "<img src='images/scb.png' width='29' height='25'>  ธ.ไทยพาณิชย์";
                                    }else if ($row_show ["bankname"] ==  'BBL'){
                                         echo "<img src='images/bbl.png' width='29' height='25'>  ธ.กรุงเทพ";
                                    }else{
                                         echo "<img src='images/ktb.png' width='29' height='25'> ธ.กรุงไทย"; 
                                    }

                                ?>  
                               </td>
                            </tr>
                           
                            <tr>
                               <td width="30%" align="left"><B>จำนวนเงิน :</B></td>
                               <td width="70%" align="left" style="color:#999"><?php echo $row_show['amt'];?> &nbsp;บาท</td>
                            </tr>
                            <tr>
                               <td width="30%" align="left"><B>หลักฐานการโอน:</B></td>
                               <td width="70%" align="left" style="color:#999"><img src="images/Slip_ATM/<?php echo $row_show['imge']; ?>" alt="" style="width: 25%;"><td>
                            
                            </tr>
                        </table><br><br><br>

                        <div style="text-align: left;">
                            <p style="text-align:left; font-size: 19px; color:#666666"><B>มั่นใจ Arduino Bangkok</B></p>
                                <span style="color:#4d4d4d">
                                    &nbsp;&nbsp;&nbsp;ซื้อสินค้ากับ Arduino Bangkok ได้ตลอด 24 ชั่วโมง มั่นใจได้ 100% เราจัดส่งสินค้าทางไปรษณีย์ 
                                    ทั้งแบบลงทะเบียนและแบบ EMS แพ็คสินค้าอย่างดีปลอดภัย ส่งถึงมือลูกค้าอย่างแน่นอน ร้านเราอยู่ใกล้ไปรษณีย์ ถ้าแจ้งโอนก่อนเวลา 14:30 น. จัดส่งสินค้าในวันเดียวกัน ถ้าเกินจะจัดส่งสินค้าในตอนเช้าของวันถัดไป 
                                  <ul>
                                    <li>ค่าจัดส่งแบบไปรษณีย์ EMS 50 บาท</li>                               
                                    <li>ค่าจัดส่งแบบไปรษณีย์ลงทะเบียน 30 บาท</li>
                                    <li>สั่งซื้อสินค้า 1500 บาทขึ้นไป ส่งแบบ EMS ฟรี</li>
                                    <li>ถ้าทำรายการสั่งซื้อสำเร็จ = มีของพร้อมส่ง <u>ทางร้านจองสินค้าไว้ให้ด้วย 3 วัน</u></li>
                                  </ul>
                                </span><br>

                                <div style="text-align: center;">
                                    <img src="images/EMS1.jpg" alt=""  width=" 650px"> </div>


                                <p style="text-align:left; font-size: 22px;"><B>ระยะเวลาจัดส่ง</B></p>
                                <span style="color:#4d4d4d">
                                    &nbsp;&nbsp;&nbsp;เมื่อทางร้านได้รับการแจ้งชำระสินค้าเรียบร้อยแล้ว ถ้าแจ้งก่อน 14.30 น. ส่งของภายในวันเดียวกัน 
                                  <ul>
                                    <li>แบบ EMS ภาคกลางได้รับภายใน 1 วัน ต่างภาคได้รับภายใน 2-3 วัน</li>                               
                                    <li>แบบ ลงทะเบียน ได้รับภายในเวลา 3-7 วัน เหมาะกับลูกค้าที่ไม่ซีเรียสเรื่องเวลา</li>
                                    <li>ระบบจะส่งเลขแทรคไปรษณีย์ ไปให้ทาง email และแจ้ง SMS ส่งตรงถึงโทรศัพท์มือถือ</li>
                                    <li><u>ลูกค้าที่โอนเงินมาแล้วไม่ได้แจ้งทางร้าน เพื่อความรวดเร็วในการจัดส่งสินค้า ช่วยแจ้งด้วยนะครับ เพื่อที่จะได้จัดส่งภายในวันเดียวกัน</u></li>
                                  </ul>
                                </span><br>

                                <p style="text-align:left; font-size: 22px; "><B>การจัดส่ง</B></p>
                                <span style="color:#4d4d4d">
                                  <ul>
                                    <li> <span style="color:#00C; font-weight: bold;"><u>วันจันทร์-ศุกร์</u></span>โอนเงินและแจ้งโอน<span style="color: #F00;font-weight: bold;"><u>ก่อน</u></span>เวลา 14.30 น. จัดส่งสินค้า Arduino <u>ในวันนั้น</u> (จันทร์-ศุกร์)</li>                               
                                    <li> <span style="color:#00C; font-weight: bold;"><u>วันจันทร์-ศุกร์</u></span>โอนเงินและแจ้งโอน<span style="color: #F00;font-weight: bold;"><u>หลัง</u></span>เวลา 14.30 น. จัดส่งสินค้า Arduino <u>ในวันถัดไป</u> (จันทร์-ศุกร์)</li>
                                    <li> <span style="color:#00C; font-weight: bold;"><u>วันศุกร์</u></span> โอนเงินและแจ้งโอน<span style="color: #F00;font-weight: bold;"><u>หลัง</u></span>เวลา 14.30 น. ถึง 24.00 น. จัดส่งสินค้า Arduino <u>ในวันเสาร์ตอนเช้า</u></li>
                                    <li> โอนเงินและแจ้งโอน <span style="color:#00C; font-weight: bold;"><u>วันเสาร์-อาทิตย์</u></span>จัดส่งสินค้า Arduino <u>ในวันจันทร์</u></li>
                                 </ul>
                                    *** <u>หมายเหตุ </u>: <u>ไปรษณีย์อัพเดทเลขแทรคตอน 16.00 น. ในวันปกติ วันเสาร์อัพเดทตอน 12.00 น.</u> 
                                </span><br>
                        </div>
                    </div>          
                            
<?php                       
                } 
        }
    }
?> 
        
              
              
              
     </div>   
     <?php include("include/footer.php"); ?>   
    </div>
    
  </body>
</html>