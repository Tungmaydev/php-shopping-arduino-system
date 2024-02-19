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
        #album_product > #product_list{
          float:left;
          width:33%;
          height: 300px;
          margin: 0;
          padding: 0;
          text-align:center;
          margin-bottom: 20px;
          outline: solid 0px #CCC;
           
        }
        #album_product > #product_list:hover{
          color: #00cccc;
         // text-decoration:none;
          outline: solid 2px #CCC;  
          
        }
        #album_product > #product_list > button:hover{
            border-radius:8px;
            padding: 5px 14px;
            background-color:#ff9900;
            color: white; 
            font-size: 13px;
            
        }
         #top_content_right{
          padding-top: 25px;
          margin-left: 20px;
          height: 30px;
          text-align: left;
          font-size:22px;
           
        }
  
  @media only screen and (max-width: 480px),only screen and (max-device-width: 480px) {
    #content_right{
       float: left;
       width: 79%;      
       background-color:#FFFFFF;  
       margin-right: 8px;
        
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
            <div id="top_content_right" >
              <span>
                <a href="index.php" style="font-size: 20px;">Arduino > </a>
                <a style="font-weight: bold; font-size: 20px;" href="#album_product" >สินค้าทั้งหมด</a>
              </span>
            </div>
            <hr color="#f2f2f2"><br>   
              
                
                <div id="album_product"> <!-- id="album_product div โชร์สินค้าทั้งหมด จากตาราง product-->    
                    
                <!--select เพื่อโชร์สินค้าทั้งหมด จากตาราง product-->
                       <?php
                         $sql  = "select * from product ";
                         $query = mysqli_query($link, $sql)or die(mysqli_error());
                       ?> 

                  <p style=" font-size:25px; text-align: left; ">สินค้าทั้งหมด</p>
                      <?php 
                        $i = 0;
                            while($result = mysqli_fetch_array($query)){ 
                              $i++;
                        ?>
                              <div id="product_list">
                                    <p style="margin-top: 0px; "><a href="product_detail.php?pd_id=<?php echo $result["pd_id"]; ?>">
                                        <img src="admin/images/product/<?php echo $result["pd_image"]; ?>" alt="<?php echo $result["pd_name"]; ?>" style="height: 150px;" /></a>
                                    </p>
                                        <?php 
                                            if($result["pd_id"] != ""){
                                        ?>
                                        
                                    <div style="height:90px;">
                                          <a style="font-size:16px; "href="product_detail.php?pd_id=<?php echo $result['pd_id']; ?>">
                                            <span style="font-size: 16px;">   
                                              รหัสสินค้า <?php echo $result['pd_code']; ?><br>
                                                      <?php echo $result['pd_name']; ?>
                                           </span></a><br><br>
                                    </div>
                                          <span style="font-size: 16px;"> <?php echo $result['pd_price']; ?> บาท </span><br>                                        
                                                      <?php 
                                                         if ($result['pd_qty'] > 0){
                                                      ?>

                                                      <button style="border-radius:8px; padding: 5px 14px;  font-size: 13px;" type="button"  onclick="window.location.href='addToCart.php?p=<?php  echo $result['pd_id'];?>'">สั่งซื้อ</button>
                                                      

                                                      <?php 
                                                         } 
                                                         else {
                                                             ?>
                                                             <span style="color:red; font-size: 16px;">สินค้าหมด </span><br>
                                                           <?php
                                                         }
                                                      ?>
                                       <?php 
                                          } 
                                       ?>
                              </div>

                    <?php
                      }
                    ?>
                </div>
        </div>
        <?php include("include/footer.php"); ?>   
  </div>
 </body>
</html>