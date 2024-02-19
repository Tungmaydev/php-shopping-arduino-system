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
        width: 75%;
        height: auto;
        margin: auto;
        margin-top: 10px;     
        background-color:#FFFFFF;  
    }

/*    #header_payment{
        background-color: #00b3b3;
        border:solid;
        width: 85%;
        margin:auto;      
    }  */
    #header_payment{
        background-color: #00b3b3;
        border:solid;
        width: 85%;
        margin:auto; ;
        height: 30px;
        padding-top: 10px;
        font-size:25px; ;
    } 
    #content_order{
        height:200px;
        background-color: #f2f2f2;
        border:solid;
        width: 85%;
        margin:auto;
        margin-bottom: 20px;  
        font-size: 22px

    } 
     #top_content_right{
        padding-top: 25px;
        margin-left: 20px;
        height: 30px;
        text-align: left;
                 
    }
    @media only screen and (max-width: 480px),only screen and (max-device-width: 480px) {
    #content_right{
       float: left;
       width: 79%;      
       background-color:#FFFFFF;  
       margin-right: 8px;
        
    }
    #content_order{
        height:200px;
        background-color: #f2f2f2;
        border:solid;
        width: 85%;
        margin:auto;
        margin-bottom: 20px;  
        font-size: 18px

    } 
    #header_payment{
        background-color: #00b3b3;
        border:solid;
        width: 85%;
        margin:auto; ;
        height: 30px;
        padding-top: 10px;
        font-size:21px;        
        
    }
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
            <div id="top_content_right" >
                <span>
                 <a href="index.php" style="font-size: 20px;">Arduino ></a>
                 <a style="font-weight: bold; font-size: 20px; " href="#header_payment">Payment</a>
                </span>
            </div>
              <hr color="#f2f2f2">
             
              
            <!-- รูปโลโก้ -->
            <img src="images/logo.jpg" alt="logo.jpg" style="width: 40%;">
            
            
            <!-- กล่องกรอกรายละเอียด invoiced -->
            <div id="header_payment">
                <span style="color: white; margin-bottom: 3px; ">กรอกเลขที่การสั่งซื้อที่ต้องการชำระ</span>
                </div>

                <div id="content_order" >
                    <form>
                       <p>&nbsp;</p>
                       <table style="width: 80%; margin: auto;text-align: center;" cellspacing="1">       
                           <tr>
                               <td></td>
                           </tr>
                            <tr> 
                                <td style="width: 40%; text-align: center;">เลขที่ใบสั่งซื้อ (Order No) </td>
                                <td style="width: 40%; text-align: left;"><input style="height:27px;" name="od_id" type="number" id="od_id"  placeholder="invoice"  size="30" required /></td>
                            </tr>
                            <tr> 
                                <td style="width: 40%; text-align: center;">กรุณากรอก E-mail  </td>
                                <td style="width: 40%; text-align: left;"><input  style="height: 27px;" name="od_payment_email" type="email" id="od_payment_email"  placeholder="E-mail"  size="30" required /></td>
                            </tr>
                        </table><br /><br /> 
                        
                        
                        <div>
                            <button style="border-radius:8px; padding: 9px 11px;  width: 22%; background-color:#ff9900;  color: white; font-size:15px;" type="submit" name="submit" formmethod="POST" formaction="confirm_payment.php" >แจ้งการชำระเงิน</button> 
                        </div>
                    </form>
                </div>
            </div>  
     <?php include("include/footer.php"); ?>   
    </div>
  </body>
</html>