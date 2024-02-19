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
        background-color:#FFFFFF;     
       
    }  
    a {
        text-decoration:none;
        color:#054a6d;
    } 
    a:hover{
        color: #b3b3ff;
        text-decoration:none;
    }
        
    #album_product{ 
        float: left;
        width: 100%;
        text-align:left;
        margin: 0px ;
        padding: 0px;
        border: 0px;	
    } 
    
    #top_content_right{
        padding-top: 25px;
        margin-left: 20px;
        height: 30px;
        text-align: left;
        font-size: 20px;
                
    }
        
    #product_show{
        border:solid 1.5px #CCCCCC ;
        width:760px;
        height:510px;
        -webkit-border-radius:10px;
        -moz-border-radius:10px;
        border-radius:10px;
        margin:1.5px;
    }
    
    #prodcut_detail{
	float:left;
        outline: solid 0px #F00;
        width:50%;
        height:auto;
        margin:0px;
        padding:0px;
      
    }
    
    #img{
        width:90%; 
        border:solid 3px #d9d9d9;
        height:auto;
        margin:auto;
        border-radius:10px;
        padding:0px;
        text-align: center;
      
    }
    
    #detail{
        float:right;
	width:50%;
        height:auto;
        margin:0px;
        padding:0px;
    		
    }
    
    #detail_list{
        font-size: 21px; 
        width:80%;
        padding: 17px;
        border:solid 10px #f2f2f2;       
        
    }
    
    li{
        font-size: 18px;  
        color: #666666;
        text-align: left;
    }
    
    #detail_bottom{
        width: 70%; 
            
    }
    
@media only screen and (max-width: 480px),only screen and (max-device-width: 480px) {
    #content_right{
       float: left;
       width: 79%;      
       background-color:#FFFFFF;  
       margin-right: 8px;
        
    }
    #detail_list{
        font-size: 18px; 
        width:80%;
        padding: 17px;
        border:solid 10px #f2f2f2;       
        
    }
}


    </style>
</head>
<body>
  <div id="wrapper">
  <?php 
     include"library/config.php"; 
     include"include/branner.php";
     include"item_miniCart.php"; 
     include"include/menu.php"; 
     include"include/content_left.php"; 
  ?>
    <div id="content_right">
        <?php
            $pd_id = $_REQUEST['pd_id'];

            $sql  = "select * from category,product where product.cat_id = category.cat_id and product.pd_id=" . $_GET['pd_id'] . "  ";                       
            $query = mysqli_query($link, $sql)or die(mysqli_error());
            $result = mysqli_fetch_array($query);
                 
        ?>
        <!-- header-->                               
            <div id="top_content_right" >
               <span>                 
                  <a href="index.php" style="font-size: 20px;">หมวดหมู่สินค้า > </a>
                  <a href="product_all.php">สินค้าทั้งหมด > </a> 
                  <a href="product_show.php?cat_id=<?php echo $result['cat_id'] ?>"><?php echo $result['cat_name']; ?> </a> 
<!--                  <a style="font-weight: bold;" href="#album_product"><?php //echo $result['pd_name']; ?></a>-->
               </span>
            </div>
        <hr color="#f2f2f2"><br>
            <!-- End header-->               
                
            <p style=" font-size:21px; text-align: left; padding-left: 28px; "><?php echo $result['pd_name']; ?></p><br>
                
                      
                <div id="album_product"><!-- id="album_product div โชร์สินค้าทั้งหมด จากตาราง product-->
                  <!--select เพื่อโชร์สินค้าทั้งหมด จากตาราง product-->
                 <?php
                    //$pd_id มาจาก $pd_id = $_REQUEST['pd_id']; ด้านบ่น บรรทัด 52                 
                   //  $sql_pd  = "SELECT * FROM product WHERE pd_id = '$pd_id'";
                   //  $query_pd = mysql_query($sql_pd)or die(mysql_error());
                   ?>                  
                  <div id="product_show " >
                      <div id="prodcut_detail" >
                          <div id="img">
                                <img src="admin/images/product/<?php echo $result["pd_image"]; ?>" alt="<?php echo $result["pd_name"]; ?>" height="250px">
                          </div>  
                      </div>

                       <div id="detail">
                           <div id="detail_list">
                               <table style="width: 100%; " border="0" cellspacing="3" cellpadding="0" >
                               <tr>
                                   <td style="width: 40%; text-align: left; color:#666;">รหัสสินค้า </td>
                                   <td style="width: 60%; color:#666"><?php echo $result["pd_code"];?></td>
                               </tr> 
                                <tr>
                                   <td style="color:#666">หมวดหมู่สินค้า </td>
                                   <td style="color:#666"><?php echo $result["cat_name"];?></td>
                               </tr>
                               <tr>
                                   <td style="color:#666">ราคา </td>
                                   <td style="color:#666"><?php echo $result["pd_price"];?> บาท</td>
                               </tr>
                               <tr>
                                   <td style="color:#666;">สถานะสินค้า </td>
                                   <td style="color:#666"><img src="images/check.png" width="20" height="20"> สินค้าพร้อมส่ง</td>
                               </tr>
                               <tr>
                                   <td style="color:#666; ">จัดส่งภายใน  </td>
                                   <td style="color:limegreen; font-weight: bold;"><?php echo $result["date_ship"];?>  วัน</td>
                               </tr>
                               <tr>
                                   <td></td>
                                   <td>
                                    <?php 
                                        if ($result['pd_qty'] > 0){
                                            ?>
                                        <button style="border-radius:8px; padding: 9px 11px;  width:60%; background-color:#ff9900;  color: white; font-size:12px;" type="button"  onclick="window.location.href='addToCart.php?p=<?php  echo $result['pd_id'];?>'">หยิบใส่ตะกร้า</button>
                                            <?php 
                                         } 
                                          else {
                                         ?>
                                            <span style="color:red; font-size: 16px;">สินค้าหมด </span><br>
                                        <?php
                                        }
                                    ?>
                                 </td>
                           </tr>
                           </table>
                            <br><br>
                                 <p style="color:#060">แนะนำ!&nbsp;<font color="#00CC33">สินค้าชิ้นนี้อยู่ในระบบการันตี มั่นใจได้ของชัวร์์ 100%</font></p>
                    <!--        <img src="images/visa.png" width="45" height="24">
                                <img src="images/mastercard_logo.jpg" width="45" height="25">-->
                                 <img src="images/k-bank.jpg" style="width: 10%;">
                                <img src="images/ktb.png" style="width: 8%;">
                                <img src="images/scb.png" style="width: 8%;">
                                <img src="images/bbl.png" style="width: 8%;"><br><br>
                                <span style="font-size: 18px;">บริการจัดส่งโดย : &nbsp;&nbsp;&nbsp; <img src="images/thailandpost.jpg" style="width: 19%; height:35px;"></span>
                           </div>    
                       </div>
                  </div>
                </div>

        <div id="detail_bottom">
        <?php
           echo $result['detail']; //รายละเอียดสินค้า
        ?>

        </div>                 
                  
    </div>
       
    <?php include("include/footer.php"); ?>   
  
    </div>
    </body>
</html>