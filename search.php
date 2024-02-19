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
      // padding-left: 20px; 
        background-color: #FFFFFF;          

      }     
   
     #top_content_right{
        padding-top: 25px;
        margin-left: 20px;
        height: 30px;
        text-align: left;
        font-size:22px;              
                
    }
    #search{ 
       width: 100%;
       text-align:left;
       margin: 0px ;
       padding: 0px;
       border: 0px;
	
    }
        #search > #product_list{
        float:left;
        width: 33%;
        height: 290px;
        margin: 0;
        padding: 0;
        text-align:center;
        margin-bottom: 20px;
        outline: solid 0px #CCC;  
            
    }   
    
    #search > #product_list:hover{
        color: #00cccc;
         // text-decoration:none;
        outline: solid 2px #CCC;  
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
  include "library/config.php";  
  include "include/branner.php"; 
  include "item_miniCart.php"; 
  include "include/menu.php"; 
  include "include/content_left.php";
?>
    <div id="content_right">
     <div id="top_content_right" >
        <span>
            <a href="index.php">Arduino</a> > 
            <b><a href="#search">ค้นหา</a></b>
        </span>
     </div>
     <hr color="#f2f2f2">      
     <!-- <span style="font-size: 30px; text-align: center; color: #e90;">------ กรุณาใส่ข้อมูลในการค้นหาคะ ------</span>-->
        <?php
        if(!isset($_POST['submit'])){          
        
        header('Location:product_all.php');
        }
        else{            
        
            if($_POST['search_pd'] == ''){
            ?>
                     <br><br><br>
                     <span style="font-size: 30px; text-align: center; color: #e90;">------ กรุณาใส่ข้อมูลในการค้นหาคะ ------</span>
            <?php
            }else{
                  $search_pd = $_REQUEST['search_pd']; 
                  $sql  = " SELECT * FROM category  
                            INNER JOIN main_category  ON category.main_id = main_category.main_id
                            INNER JOIN product        ON category.cat_id = product.cat_id
                            WHERE category.cat_name 
                            LIKE '%$search_pd%' or product.pd_name LIKE '%$search_pd%'";
                //   $result = mysqli_query($link, $sql);
                   $query = mysqli_query($link, $sql)or die(mysqli_error());

        ?>
            <div style="text-align: left; font-size:22px; color: #666; padding-left: 10px;">
                <span>ผลการค้นหา :<b style="color: #e90"> <?php echo $search_pd; ?></b></span>
            </div>
            <div id="search">
                <?php
                    $i = 0;
                     while($result = mysqli_fetch_array($query)){ 
                      $i++;
                ?>
                    <div id="product_list">
                        <p style="margin-top: 0px;"><a href="product_detail.php?pd_id=<?php echo $result["pd_id"]; ?>">
                            <img src="admin/images/product/<?php echo $result["pd_image"]; ?>" alt="<?php echo $result["pd_name"]; ?>" style="height: 150px;" /></a>
                        </p>
                        <a style="font-size: 16px"href="product_detail.php?pd_id=<?php echo $result['pd_id']; ?>">
                            รหัสสินค้า <?php echo $result['pd_code']; ?><br>
                                    <?php echo $result['pd_name']; ?></a> <br><br>
                                    <?php echo $result['pd_price']; ?> บาท<br>
                                    <?php 
                                      if ($result['pd_qty'] > 0){
                                     ?>
                                       <button  type="button"  onclick="window.location.href='cart.php?action=add&p=<?php  echo $result['pd_id'];?>'">สั่งซื้อ</button>
                                    <?php 
                                     } 
                                      else {
                                         echo "<font color=\"#e60000\" size=5px>สินค้าหมด </font><br>";
                                     }
                                     ?>
                    </div>
                <?php       
                    } 
                ?>

            </div>
        <?php       
            } 
            
        }
        ?>         
    </div>
   <?php include("include/footer.php"); ?>   
</div>
</body>
</html>