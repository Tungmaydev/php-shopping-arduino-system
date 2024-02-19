<!DOCTYPE html>
<html>
<head>      
<title></title>
<style>
    #miniCart{
        padding-top: 5px;
        float: right;
        width: 10%;
        height: 15%;
        text-align: center;        
        color: orangered;
        font-weight: bold;
        background: #e6e6e6;
        border-radius: 15px ;
        box-shadow: 50px;
        padding: 4px 7px;
        font-size: 22px
       
    }
    @media only screen and (max-width: 480px),only screen and (max-device-width: 480px) {
         #miniCart{
        padding-top: 5px;
        float: right;
        width: 15%;
        height: 15%;
        text-align: center;       
        color: orangered;
        font-weight: bold;
        background: #e6e6e6;
        border-radius: 15px ;
        box-shadow: 50px;
        padding: 4px 7px;
        font-size: 18px;
       
    }
        
    }
</style>
</head>
    <body>  
    <?php  include("library/cart-functions.php"); ?> 
    <div id="item_miniCart" >
        <div id="miniCart">
            <img src="images/minicart5.png" style="width: 22%;">&nbsp;
            <span style="font-size: 20px;">
           <?php
              if(isset($_SESSION['cart_id'])){ //เช็กค่า  cart_id จาก session 
                  $sid = $_SESSION['cart_id']; 
                        $cartContent = getCartContent(); // ดึงข้อมูลจากตาราง cart โดยอ้างอิงถึง session id ของตะกร้าปัจจุบัน แล้วนำไปเก็บในตัวแปร $cartContent
                        $numItem = count($cartContent);  //นับจำนวนข้อมูลใน $cartContent (ตะกร้า)
                
                    if ($numItem > 0 ) {
                            //    print_r($numItem);
                           echo $numItem."&nbsp;" ;
                           
                    } 
                    
               }else {
                         echo 0 ;
               }

             ?>
            </span>
            <span style="color: #666;font-size: 20px;">item</span> <br>
            <span><a href="cart.php">ดูสินค้าในตะกร้า</a></span>           
    </div>
 </div>
</body>
</html>
