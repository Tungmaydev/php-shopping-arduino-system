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
         height: auto;
     }
     table{
         font-size: 25px;
         
     }
 </style>
</head>
<body>
    <div id="wrapper">
     <?php
         include("library/config.php");
         include("library/cart-functions.php");
         include("library/checkout-functions.php");
           
                    //$subTotal = $_REQUEST['subTotal'];
                   // $subTotal = $_GET['subTotal'];
                   
            if(isCartEmpty()){
               //ตรวจดูว่าตะกร้าว่าง จะไม่อณุญาตให้สั่ง เช็คเอาท์ และจะกลับไปหน้า cart.php   
               header('Location:cart.php');   
            //}else if(isset($_GET['step']) && (int)$_GET['step']>0 && (int)$_GET['step']<=3){
            }else if(isset($_GET['step']) && $_GET['step'] != ''){
                  //ตรวจสอบว่าเป็นขั้นตอนที่เท่าใด
                 $step = $_GET['step'];
                 $includeFile = '';
                      
                    if($step=='info'){
                        $subTotal = $_REQUEST['subTotal'];
                        $includeFile = 'shippingAndPaymentInfo.php';
                      
                    }elseif ($step=='confirmation') {
                       
                        $includeFile = 'checkoutConfirmation.php';
                      
                    }else if ($step=='order_success') {
                        
                        $orderId     = saveOrder();                        
                        $orderAmount = getOrderAmount($orderId);
                        
                        $sql    = "INSERT INTO order_bank (od_id, amt)
                                   VALUES ($orderId, $orderAmount )"; //จะบันทึกเข้า ตาราง order_bank  และสงไปยังหน้า success_ATM.php			  
                                    $result = mysqli_query($link,$sql) or die(mysqli_error());	

                                    $_SESSION['orderId'] = $orderId;
                                   header('Location:success.php');
                      
                            //เลือกวิธีการชำระเงิน
//                            if ($_POST['hidPaymentMethod'] == 'cod'){  //1. โอนเงินผ่านตู้ ATM จะบัยทึกเข้า ตาราง order เพื่อระบุ payment_methods = 'ATM'
//                                if ($orderId)
////                                    { 
////                                    $sql    = "UPDATE tbl_order  SET payment_methods = 'ATM' 
////                                               WHERE od_id = $orderId";
////                                    $result = mysql_query($sql) or die(mysql_error());	
////                                }
//                                {
//                                    $sql    = "INSERT INTO order_bank (od_id, amt)
//                                               VALUES ($orderId, $orderAmount )";		 //จะบัยทึกเข้า ตาราง order_bank  และสงไปยังหน้า success_ATM.php			  
//                                    $result = mysql_query($sql) or die(mysql_error());	
//
//                                    $_SESSION['orderId'] = $orderId;
//                                   header('Location:success.php');
//                                }
//                            }
                        
                                        
                       
//                        else if($_POST['hidPaymentMethod'] == 'credit'){    //2. โอนเงินpaysbuy ด้วยบัตรเครดิต จะบัยทึกเข้า ตาราง order เพื่อระบุ payment_methods = 'Credit'
//                            if ($orderId) {
//                                $sql    = "UPDATE order SET payment_methods = 'Credit'
//                                           WHERE od_id = $orderId";
//                                $result = mysql_query($sql) or die(mysql_error());	
//                            }
//
//                                $sql    = "INSERT INTO order_paysbuy (od_id,amt)
//                                           VALUES ($orderId , $orderAmount )";   //จะบัยทึกเข้า ตาราง order_paysbuy  และสงไปยังหน้า paynow_credit.php เพือส่งข้อมูลไปยัง เว็บของ paysbuy 	
//                                $result = mysql_query($sql) or die(mysql_error());	
//                                
//                                $includeFile = 'include/paynow_credit.php';
//
//                        }else{
//                            if ($orderId) {                                     //3. โอนเงิน paysbuy ด้วย i-banking จะบัยทึกเข้า ตาราง order เพื่อระบุ payment_methods = 'I-banking'
//                                $sql    = "UPDATE order SET payment_methods = 'I-banking'
//                                           WHERE od_id = $orderId";
//                                $result = mysql_query($sql) or die(mysql_error());	
//                            }
//
//                                $sql    = "INSERT INTO order_paysbuy (od_id,amt)
//                                           VALUES ($orderId , $orderAmount )";      //จะบัยทึกเข้า ตาราง order_paysbuy  และสงไปยังหน้า paynow_i-banking.php' เพือส่งข้อมูลไปยัง เว็บของ paysbuy 	
//                                $result = mysql_query($sql) or die(mysql_error());
//                                
//                                $includeFile = 'include/paynow_i-banking.php';	
//
//                        }
                    }else {
                     
                        
                        
                        
                    }
            }else {
	        header('Location: index.php');
	    }
        ?>     
                   
        <?php include("include/branner.php"); ?> 
       
        <div id="content_right">
            <script language="JavaScript" type="text/javascript" src="library/checkout.js"></script>
            <?php require_once "library/$includeFile"; ?>
            
        </div>
        <?php include("include/footer.php"); ?>   
    </div>
    </body>
</html>